<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailCertificateStoreRequest;
use App\Models\Certificate;
use App\Models\DetailCertificate;
use App\Services\DetailCertificateService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Contracts\Repositories\CertificateRepository;

class CertificateController extends Controller
{
    private CertificateRepository $certificate;
    private DetailCertificateService $detailCertificate;
    public function __construct(CertificateRepository $certificate, DetailCertificateService $detailCertificate)
    {
        $this->certificate = $certificate;
        $this->detailCertificate = $detailCertificate;
    }
    public function getCertificate(int $id){
        $certificate = $this->certificate->getId($id);
        return view('certificate.kelulusan', compact('certificate'));
    }

    public function showDetail($id){
        $certificate = Certificate::with('detailCertificates')->where('id', $id)->first();
        return view('admin.certificate.detail', compact('certificate'));
        // dd($detailCertificate);
    }
    public function storeDetail(DetailCertificateStoreRequest $request, $id)
    {
        dd($request->all());
       $data = $request->all();
       $this->detailCertificate->store($data, $id);
        return redirect()->back();
    }
}
