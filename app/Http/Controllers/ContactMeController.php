<?php

namespace App\Http\Controllers;

use App\Models\ContactMe;
use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactMeController extends Controller
{
    public function sending(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:30|regex:/^[A-Za-z. \-]+$/',
            'email' => 'required|email:rfc,dns',
            'message' => ['required','min:5', 'max:2000'],
            'g-recaptcha-response' => ['required', new Recaptcha()],
        ]);


        if(strtolower(trim($request->name)) === "hummacertify"){
            return response()->json(['error' => ['name' => ['Jangan menggunakan nama kami!']]]);
        }

        if(strtolower(trim($request->email)) === "hummacertify@gmail.com"){
            return response()->json(['error' => ['email' => ['Jangan menggunakan email kami!']]]);
        }

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        ContactMe::create($request->only('name','email','message'));
        return response()->json(['success' => "Berhasil mengirim pesan"]);
    }

    public function delete(Request $request){
        $id = $request->id;
        $notif = ContactMe::where('id', $id)->first();
        if(!$notif){
            return response()->json(['error' => "Id yang dituju tidak ada!"]);
        }
        $notif->delete();
        return response()->json(['message' => "Notifikasi telah di hapus", 'count' => $notif->count()]);
    }
}
