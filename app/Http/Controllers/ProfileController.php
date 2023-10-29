<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $user = User::with('certificates')->where('id', auth('')->user()->id)->first();
        // dd($user);
        $certificate = $user->certificates[0];
        return view('user.profile', compact('user', 'certificate'));
    }
}
