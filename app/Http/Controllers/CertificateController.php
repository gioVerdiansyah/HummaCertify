<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailCertificateStoreRequest;
use App\Models\Certificate;
use App\Models\DetailCertificate;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Contracts\Repositories\CertificateRepository;

class CertificateController extends Controller
{
    private CertificateRepository $certificate;
    public function __construct(CertificateRepository $certificate)
    {
        $this->certificate = $certificate;
    }
    public function getCertificate(int $id){
        $certificate = $this->certificate->getId($id);
        return view('certificate.guru');
    }



    public function storeDetailSertifikat(DetailCertificateStoreRequest $request, $id) {
        try {
            $certificate = Certificate::with('user')->where('id', $id)->firstOrFail();

            $detailCert = new DetailCertificate;
            $detailCert->certificate_id = $certificate->id; // Ubah ke $certificate->id
            $detailCert->materi = $request->materi;
            $detailCert->jp = $request->jam_pelajaran;
            $detailCert->save();

            return response()->json(['message' => "Berhasil menambahkan detail sertifikat pada sertifikat {$certificate->user->name}"]);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Gagal menyimpan detail sertifikat. Terjadi kesalahan database.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

}
