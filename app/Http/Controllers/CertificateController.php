<?php

namespace App\Http\Controllers;

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
    public function getCertificate(int $id){
        $certificate = $this->certificate->getId($id);
        return view('certificate.kelulusan');
    }
}
