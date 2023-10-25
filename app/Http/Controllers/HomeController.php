<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\CertificateCategori;
use App\Contracts\Repositories\DaftarPesertaRepository;

class HomeController extends Controller
{
    private DaftarPesertaRepository $userRepository;
    public function __construct(DaftarPesertaRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
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
        return view('welcome');
    }

    public function adminIndex(){

        $users = $this->userRepository->get();
        $category = CertificateCategori::all();
        return view('admin.dashboard', compact('users','category'));
    }
}
