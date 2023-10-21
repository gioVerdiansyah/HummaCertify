<?php

namespace App\Services;

use App\Contracts\Repositories\CertificateCategoriRepositori;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Contracts\Repositories\CertificateRepository;
use App\Contracts\Repositories\DaftarPesertaRepository;
use Illuminate\Database\Eloquent\Builder;

class CertificateService
{
    private CertificateRepository $certificate;
    private CertificateCategoriRepositori $categories;
    private DaftarPesertaRepository $user;
    private DaftarPesertaRepository $peserta;
    public function __construct(CertificateRepository $certificate, CertificateCategoriRepositori $categories, DaftarPesertaRepository $user, DaftarPesertaRepository $peserta)
    {
        $this->certificate = $certificate;
        $this->categories = $categories;
        $this->peserta = $peserta;
        $this->user = $user;
    }

    public function create(array $data, string $id): mixed
    {
        $userId = $this->user->getId($id);
        $userUniq = $this->user->count();
        $nouniq = $this->certificate->countById($data['certificate_categori_id']) + 1;
        $nomorUnik = str_pad($nouniq, 4, '0', STR_PAD_LEFT);
        $nomorKategori = str_pad($userUniq, 4, '0', STR_PAD_LEFT);
        $bulan = date('m', strtotime($data['tanggal']));
        $hari = date('d', strtotime($data['tanggal']));
        $tahun = date('Y', strtotime($data['tanggal']));
        $nomorSertifikat = 'Ser' . '/' . $nomorUnik . '/' . $nomorKategori . '/' . $hari . $bulan . '/' . $tahun;
        $certificate = [
            'user_id' => $userId->id,
            'certificate_categori_id' => $data['certificate_categori_id'],
            'nomor' => $nomorSertifikat,
            'tanggal' => $data['tanggal'],
            'bidang' => $data['bidang'],
            'sub_bidang' => $data['sub_bidang'],
        ];
        $certificateId = $this->certificate->store($certificate);
        $this->generateCertificate($certificateId);
        return $certificate;
    }

    public function update(array $dataRequest): mixed
    {
        $data = [
            'predikat' => $dataRequest['predikat'],
        ];
        return $data;
    }


    public function generateCertificate(string $id)
    {
        $certificate = $this->certificate->getId($id);
        $category = $certificate->category->id;
        $type = $this->getTypeCertificate($category);
        $certificateFileName = $certificate->id . '.pdf';

        // Simpan sertifikat dalam direktori storage
        $pdf = Pdf::loadView('certificate.' . $type, ['certificate' => $certificate]);
        $pdf->save(storage_path('app/public/sertifikat/' . $certificateFileName));
    }

    public function createExists(array $dataRequest): mixed
    {

        $uniq = $this->peserta->count() + 1;
        $userId = $this->user->getId($dataRequest['user_id']);
        $nomorUnik = str_pad($uniq, 4, '0', STR_PAD_LEFT);
        $nomorKategori = str_pad($dataRequest['certificate_categori_id'], 2, '0', STR_PAD_LEFT);
        $bulan = date('m', strtotime($dataRequest['tanggal']));
        $hari = date('d', strtotime($dataRequest['tanggal']));
        $tahun = date('Y', strtotime($dataRequest['tanggal']));
        $nomorSertifikat = 'Ser' . '/' . $nomorUnik . '/' . $nomorKategori . '/' . $hari . $bulan . '/' . $tahun;
        $certificate = [
            'user_id' => $userId->id,
            'certificate_categori_id' => $dataRequest['certificate_categori_id'],
            'nomor' => $nomorSertifikat,
            'tanggal' => $dataRequest['tanggal'],
            'bidang' => $dataRequest['bidang'],
            'sub_bidang' => $dataRequest['sub_bidang'],

        ];
        $certificateId = $this->certificate->store($certificate);
        $this->generateCertificate($certificateId);
        return $certificate;
    }


    public function searchCertificates(array $dataRequest)
    {

        $query = $this->certificate->getAllDataSpecific();


        if (isset($dataRequest['q'])) {
            $search = $dataRequest['q'];

            $query->where(function ($query) use ($search) {
                $query->where('nomor', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('user', function (Builder $userQuery) use ($search) {
                        $userQuery->where('name', 'LIKE', '%' . $search . '%');

                    });
            });

        }
        if (isset($dataRequest['ct'])) {
            $kategori = $dataRequest['ct'];
            $query->where('certificate_categori_id', $kategori);
        }

        if (isset($dataRequest['page'])) {
            $page = $dataRequest['page'];
            $perPage = 15;
            $offset = ($page - 1) * $perPage;
            $query->skip($offset)->take($perPage);
        }
        $data = $query->get();

        return $data;
    }

    public function printCertificate($certificate)
    {
        $category = $certificate->category->id;
        $type = $this->getTypeCertificate($category);
        return view('certificate.' . $type, compact('certificate'));
    }
    public function printAllCertificate(array $dataRequest)
    {
        $query = $this->certificate->getAllDataSpecific();
        if (isset($dataRequest['ct'])) {
            $kategori = $dataRequest['ct'];
            $query->where('certificate_categori_id', $kategori);
        }

        if (isset($dataRequest['page'])) {
            $page = $dataRequest['page'];
            $perPage = 15;
            $offset = ($page - 1) * $perPage;
            $query->skip($offset)->take($perPage);
        }
        $certificates = $query->get();
        $type = $this->getTypeCertificate($dataRequest['ct']);
        return view('admin.certificate.print-all.' . $type, compact('certificates'));
    }

    public function getTypeCertificate(int $category): string
    {
        $categoryName = $this->categories->getCategoryCertificate($category)->name;
        return strtolower($categoryName);
    }
}
