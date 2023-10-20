<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use to;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Requests\UserRequest;
use App\Contracts\Interfaces\CertificateInterface;
use App\Contracts\Repositories\CertificateRepository;
use App\Contracts\Repositories\DaftarPesertaRepository;
use Illuminate\Database\Eloquent\Builder;

class CertificateService
{
    private CertificateRepository $certificate;
    private DaftarPesertaRepository $user;
    private DaftarPesertaRepository $peserta;
    public function __construct(CertificateRepository $certificate, DaftarPesertaRepository $user, DaftarPesertaRepository $peserta)
    {
        $this->certificate = $certificate;
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
        return $certificate;
        // return $this->generateCertificate($certificate);
    }

    public function update(array $dataRequest): mixed
    {
        $data = [
            'predikat' => $dataRequest['predikat'],
        ];
        return $data;
    }


    // public function generateCertificate(string $id)
    // {
    //     $certificate = $this->certificate->getId($id);
    //     $certificateFileName = $certificate->id . '.pdf';

    //     // Simpan sertifikat dalam direktori storage
    //     $pdf = Pdf::loadView('certificate.kelulusan', ['certificate' => $certificate]);
    //     $pdf->save(storage_path('app/certificates/' . $certificateFileName));

    //     return $certificate;
    // }

    public function createExists(array $dataRequest): mixed
   {

    $uniq = $this->peserta->count() +1;
    $userId = $this->user->getId($dataRequest['user_id']);
    $nomorUnik = str_pad($uniq, 4, '0', STR_PAD_LEFT);
    $nomorKategori = str_pad($dataRequest['certificate_categori_id'], 2, '0', STR_PAD_LEFT);
    $bulan = date('m', strtotime($dataRequest['tanggal']));
    $hari = date('d', strtotime($dataRequest['tanggal']));
    $tahun = date('Y', strtotime($dataRequest['tanggal']));
    $nomorSertifikat = 'Ser'. '/'. $nomorUnik . '/' . $nomorKategori. '/'. $hari . $bulan. '/'. $tahun;
    $certificate = [
        'user_id' => $userId->id,
        'certificate_categori_id' => $dataRequest['certificate_categori_id'],
        'nomor' => $nomorSertifikat,
        'tanggal' => $dataRequest['tanggal'],
        'bidang' => $dataRequest['bidang'],
        'sub_bidang' => $dataRequest['sub_bidang'],

    ];
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

        switch ($dataRequest['ct']) {
            case 1:
                return view('admin.certificate.print-all.kelulusan', compact('certificates'));
        }
    }
}
