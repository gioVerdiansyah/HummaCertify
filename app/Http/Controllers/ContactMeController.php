<?php

namespace App\Http\Controllers;

use App\Models\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactMeController extends Controller
{
    public function sending(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:30',
            'email' => 'required|email',
            'message' => 'required|max:2000'
        ]);

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
        return response()->json(['message' => "Notifikasi telah di hapus"]);
    }
}
