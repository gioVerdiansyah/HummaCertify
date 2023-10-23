<?php

namespace App\Http\Controllers;

use App\Mail\SendCertificate;
use App\Models\Certificate;
use App\Services\CertificateService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
    public function __construct(CertificateRepository $certificate, DetailCertificateService $detailCertificate, DetailCertificateRepository $detail, CertificateService $certificateService)
    {
        $this->certificate = $certificate;
        $this->certificateService = $certificateService;
        $this->detail = $detail;
        $this->detailCertificate = $detailCertificate;
    }
    public function getCertificate(string $id)
    {
        $certificate = $this->certificate->getId($id);
        return $this->certificateService->printCertificate($certificate);
    }

    public function printAllCertificate(int $ct)
    {
        $dataRequest['ct'] = $ct;
        return $this->certificateService->printAllCertificate($dataRequest);
    }

    public function sendCertificate(string $id)
    {
        $certificate = $this->certificate->getId($id);
        $email = $certificate->user->email;
        Mail::to($email)->send(new SendCertificate($certificate));
        return redirect()->back();
    }
    public function showDetail($id)
    {
        $certificate = $this->certificate->getId($id);
        $detailCertificate = $this->detail->getId($id);
        return view('admin.certificate.detail', compact('certificate','detailCertificate'));

    }
    public function storeDetail(DetailCertificateStoreRequest $request, $id)
    {

        $dataRequest = $request->all();
        
        $datas = $this->detailCertificate->store($dataRequest, $id);
        foreach ($datas as $data) {
            $this->detail->store($data);
        }
        $certificate = $this->certificateService->update($dataRequest);
        $this->certificate->update($id, $certificate);
        $username = $this->certificate->getId($id)->user->name;
        $this->certificateService->generateCertificate($id);
        return redirect()->route('certificate.index')->with('message', [
            'title' => "Berhasil!",
            'text' => "Berhasil menambah detail pada sertifikat {$username}"
        ]);
    }
    public function createCertificateExists(Request $request)
    {
        $dataRequest = $request->all();
        $data = $this->certificateService->createExists($dataRequest);
        return redirect()->back();
    }

}
