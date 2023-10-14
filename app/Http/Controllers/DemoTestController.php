<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DemoTestController extends Controller
{
    public function sendMail(){
        $data = [
            "title" => "Mail dari HummaCertify",
            "body" => "Ini adalah testing email"
        ];
        Mail::to('anakquoteser123@gmail.com')->send(new DemoMail($data));
    }
}
