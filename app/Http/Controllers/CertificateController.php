<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailCertificateStoreRequest;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Contracts\Repositories\CertificateRepository;

class CertificateController extends Controller
{
    private CertificateRepository $certificate;
    public function __construct(CertificateRepository $certificate)
    {
        $this->certificate = $certificate;
    }
    public function getCertificate(string $id){
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
       $this->certificate->store($data, $id);
        return redirect()->back();
    }
}
