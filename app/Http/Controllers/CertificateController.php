<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function getCertificate(int $id){
        $certificate = Certificate::where('id', $id)->first();
        return view('certificate.kelulusan');
    }
}
