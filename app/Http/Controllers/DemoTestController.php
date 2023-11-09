<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use App\Models\Certificate;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;

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

        return view('certificate.generate.pelatihan', compact('certificate'));
    }

    public function repeater()
    {
        return view('form-repeater');
    }

    public function copy()
    {
        $oldViewPath = resource_path('views/certificate/kelulusan.blade.php');
        $newViewPath = resource_path('views/certificate/kelulusan_copy.blade.php');

        File::copy($oldViewPath, $newViewPath);

        $newViewContent = file_get_contents($newViewPath);

        // Ganti URL gambar latar belakang dalam CSS
        $newViewContent = str_replace(
            'background-image: url("https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/certificate-bg.png");',
            'background-image: url("/image/certificate-guru-2.png");',
            $newViewContent
        );

        file_put_contents($newViewPath, $newViewContent);
        $certificate = Certificate::latest()->first();
        return view('certificate.kelulusan_copy', compact('certificate'));
    }

    public function recaptcha(){
        return view('recaptcha');
    }
}
