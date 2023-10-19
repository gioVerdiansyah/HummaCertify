<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Services\DetailCertificateService;
use App\Http\Requests\DetailCertificateStoreRequest;
use App\Contracts\Repositories\CertificateRepository;
use App\Contracts\Repositories\DetailCertificateRepository;

class CertificateController extends Controller
{
    private CertificateRepository $certificate;
    private DetailCertificateService $detailCertificate;
    private DetailCertificateRepository $detail;
    public function __construct(CertificateRepository $certificate, DetailCertificateService $detailCertificate,DetailCertificateRepository $detail)
    {
        $this->certificate = $certificate;
        $this->detail = $detail;
        $this->detailCertificate = $detailCertificate;
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

      $dataRequest = $request->all();
      $datas = $this->detailCertificate->store($dataRequest, $id);
      foreach ($datas as $data) {
          $this->detail->store($data);
      }
      return redirect()->route('certificate.index');
    }
}
