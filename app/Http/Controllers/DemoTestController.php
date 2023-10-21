<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DemoTestController extends Controller
{

    public function sendMail()
    {
        $data = [
            "title" => "Mail dari HummaCertify",
            "body" => "Ini adalah testing email"
        ];
        Mail::to('anakquoteser123@gmail.com')->send(new DemoMail($data));
    }

    public function showCertificate()
    {
        // Generate QR code
        $url = 'https://www.example.com';
        $qrCode = QrCode::size(200)->generate($url);

        // Encode QR code sebagai data URL
        $qrCodeDataUrl = 'data:image/png;base64,' . base64_encode($qrCode);

        $certificate = Certificate::orderBy('created_at', 'desc')->first();

        return view('certificate.generate.kelulusan', compact('certificate'));
    }

    public function repeater(){
        return view('form-repeater');
    }
}
