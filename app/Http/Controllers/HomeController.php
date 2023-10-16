<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\CertificateCategori;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminIndex(){

        $users = User::whereNot('email', 'hummacertify@gmail.com')->with('certificates')->get();
        $category = CertificateCategori::all();
        return view('admin.dashboard', compact('users','category'));
    }
}
