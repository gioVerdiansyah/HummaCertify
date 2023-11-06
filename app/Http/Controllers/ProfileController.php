<?php

namespace App\Http\Controllers;

use App\Models\User;
use DragonCode\Contracts\Cashier\Auth\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $user = User::with('certificates')->where('id', auth()->user()->id)->first();
        $certificate = $user->certificates[0];
        return view('user.profile', compact('user', 'certificate'));
    }

    public function updateEmail(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email'
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Masukkan email anda',
            'email.unique' => 'Email ini telah di genakan',
        ]);

        if ($request->email === auth()->user()->email) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Email yang anda masukkan tidak ada perubahan!']);
        }

        User::findOrFail(auth()->user()->id)->update([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('message', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Berhasil Memperbarui Email Anda!']);
    }
}
