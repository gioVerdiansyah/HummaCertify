<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailUpdateRequest;
use App\Models\User;
use DragonCode\Contracts\Cashier\Auth\Auth;
use Illuminate\Http\Request;

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
            'oldPassword' => 'required|same:password',
        ]);
    }
}
