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
        return view('certificate.kelulusan', compact('certificate'));
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
    }
    public function showDetail($id)
    {
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
        $certificate = $this->certificateService->update($dataRequest);
        $this->certificate->update($id, $certificate);
        $username = $this->certificate->getId($id)->user->name;
        return redirect()->route('certificate.index')->with('message', [
            'title' => "Berhasil!",
            'text' => "Berhasil menambah detail pada sertifikat {$username}"
        ]);
    }
    public function createCertificateExists(Request $request)
    {
        $dataRequest = $request->all();
        $data = $this->certificateService->createExists($dataRequest);
        $this->certificate->store($data);
        return redirect()->back();
    }

}
