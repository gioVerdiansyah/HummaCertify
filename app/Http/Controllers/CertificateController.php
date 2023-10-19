<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Services\CertificateService;
use Illuminate\Http\Request;
use App\Services\DetailCertificateService;
use App\Http\Requests\DetailCertificateStoreRequest;
use App\Contracts\Repositories\CertificateRepository;
use App\Contracts\Repositories\DetailCertificateRepository;

class CertificateController extends Controller
{
    private CertificateRepository $certificate;
    private DetailCertificateService $detailCertificate;
    private CertificateService $certificateService;
    private DetailCertificateRepository $detail;
    public function __construct(CertificateRepository $certificate, DetailCertificateService $detailCertificate,DetailCertificateRepository $detail, CertificateService $certificateService)
    {
        $this->certificate = $certificate;
        $this->detail = $detail;
        $this->detailCertificate = $detailCertificate;
        $this->certificateService = $certificateService;
    }
    public function getCertificate(string $id){
        $certificate = $this->certificate->getId($id);
        return view('certificate.kelulusan', compact('certificate'));
    }

    public function printAllCertificate(int $ct){
        $dataRequest['ct'] = $ct;
        return $this->certificateService->printAllCertificate($dataRequest);
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
