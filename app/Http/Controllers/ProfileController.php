<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmailUpdateRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::with('certificates')->where('id', auth()->user()->id)->first();
        $certificate = $user->certificates[0];
        return view('user.profile', compact('user', 'certificate'));
    }

    public function updateEmail(EmailUpdateRequest $request)
    {
        $email = User::where('id', auth()->user()->id)->first();
        $email->email = $request->email;

        if ($email->isDirty('email')) {
            $email->save();

            return redirect()->back()->with(
                'message',
                [
                    'icon' => 'success',
                    'title' => 'Berhasil!',
                    'text' => 'Berhasil Memperbarui Email Anda!'
                ]
            );
        } else {
            return back()->with(
                'message',
                [
                    'icon' => 'warning',
                    'title' => "Tidak ada perubahan!",
                    'text' => "Anda tidak melakukan perubahan pada email!"
                ]
            );
        }
    }


    protected function changePassword(Request $change) {
        $change->validate([
            'confirmPassword' => 'required|same:newPassword',
            'newPassword' => 'required|min:8|regex:/^[0-9,a-z]+$/',
            'g-recaptcha-response' => ['required', new Recaptcha()],
        ],[
            'confirmPassword.required' => 'Konfimasi password harus di isi',
            'confirmPassword.same' => 'Konfirmasi Password harus sama dengan Password Baru',
            'newPassword.required' => 'Password baru harus di isi',
            'newPassword.min' => 'Password baru minimal harus berisi :min huruf',
            'newPassword.regex' => 'Password baru harus valid ',
        ]);
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        if (Hash::check($change->oldPassword,  $user->password))
        {
            try {
                $user = User::findOrFail($id);

                $hashedPassword = Hash::make($change->newPassword);
                $user->password = $hashedPassword;

                $user->save();
                return back()->with(
                    'message',
                    [
                        'icon' => 'success',
                        'title' => "Berhasil mengubah password ",
                        'text' => "Anda bisa memakai password baru"
                    ]
                );
            } catch (\Exception $e) {
                return back()->with(
                    'message',
                    [
                        'icon' => 'warning',
                        'title' => "Ada kesalahan",
                        'text' => "Tidak bisa mengubah password karena ada kesalahan data"
                    ]
                );
            }
        }else{
            return back()->with(
                'message',
                [
                    'icon' => 'error',
                    'title' => "Ada kesalahan",
                    'text' => "Password lama tidak cocok"
                ]
            );
        }

    }
}
