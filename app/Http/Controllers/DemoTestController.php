<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
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


        return view('certificate.demo', compact('qrCodeDataUrl', 'url'));
    }
}
