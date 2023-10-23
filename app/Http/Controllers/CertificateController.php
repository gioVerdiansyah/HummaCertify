<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Mail\SendCertificate;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetailCertificate;
use App\Models\CertificateCategori;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\DetailCertificateStoreRequest;


class CertificateController extends Controller
{

    public function getCertificate(string $id)
    {
        $certificate = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
        $category = $certificate->category->id;
        $type = $this->getTypeCertificate($category);
        return view('certificate.' . $type, compact('certificate','category','type'));
    }

    public function getTypeCertificate(int $category)
    {
        $categoryName = $this->getCategoryCertificate($category)->name;
        return strtolower($categoryName);
    }

    public function getCategoryCertificate(int $id)
    {
        $categoryname = CertificateCategori::where('id', $id)->first();
        return $categoryname;
    }

    public function printAllCertificate(int $ct)
    {
        $dataRequest['ct'] = $ct;
        return $this->printAllCertificates($dataRequest);
    }

    public function printAllCertificates(array $dataRequest)
    {
        $query = Certificate::with('user');
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

    public function sendCertificate(string $id)
    {
        $certificate = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
        $email = $certificate->user->email;
        Mail::to($email)->send(new SendCertificate($certificate));
        return redirect()->back();
    }
    public function showDetail($id)
    {
        $certificate = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
        $detailCertificate = DetailCertificate::where('certificate_id', $id)->first();
        return view('admin.certificate.detail', compact('certificate','detailCertificate'));
    }

    public function storeDetail(DetailCertificateStoreRequest $request, $id)
    {

        $dataRequest = $request->all();
        $certificateId = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
        $detailCertificates = [];

        foreach ($dataRequest['category-group'] as $category) {
            $detailCertificate = [
                'certificate_id' => $certificateId->id,
                'materi' => $category['materi'],
                'jp' => $category['jam_pelajaran'],
            ];
            $detailCertificates[] = $detailCertificate;
        }
        foreach ($detailCertificates as $data) {
            DetailCertificate::create($data);
        }

        $certificate = [
            'predikat' => $dataRequest['predikat'],
            'instruktur' => $dataRequest['instruktur'],
        ];
        $cerId = Certificate::findOrFail($id);
        $cerId->update($certificate);

        $username = $certificateId->user->name;
        $this->generateCertificate($id);
        return redirect()->route('certificate.index')->with('message', [
            'title' => "Berhasil!",
            'text' => "Berhasil menambah detail pada sertifikat {$username}"
        ]);
    }


    public function generateCertificate(string $id)
    {
        $certificate = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
        $category = $certificate->category->id;
        $type = $this->getTypeCertificate($category);
        $certificateFileName = $certificate->id . '.pdf';
        $pdf = PDF::setPaper('A4','landscape')->loadView('certificate.generate.' . $type, ['certificate' => $certificate]);
        $pdf->save(storage_path('app/public/sertifikat/' . $certificateFileName));
    }

    public function createCertificateExists(Request $request)
    {
        $dataRequest = $request->all();
        $data = $this->createExists($dataRequest);
        return redirect()->back();
    }

    public function createExists(array $dataRequest)
    {

        $uniq = User::count() + 1;
        $userId = User::findOrFail($dataRequest['user_id']);

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
        $certificateId = Certificate::create($certificate);
        return $certificate;
    }

}
