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

    public function adminIndex()
    {

        $users = User::all();
        $category = CertificateCategori::all();
        $certificateCategoryCount = CertificateCategori::count();

        // data untuk chart line
        $certificateCount = Certificate::count();

        // mengambil count data dari table certificate untuk chart doughnut
        $kelulusanCount = Certificate::where('certificate_categori_id', 1)->count();
        $pelatihanCount = Certificate::where('certificate_categori_id', 2)->count();
        $kompetensiCount = Certificate::where('certificate_categori_id', 3)->count();

        // mengambil data berdasarkan tahun dan bulannya dari table certificate untuk chart line
        $certificateData = Certificate::selectRaw('YEAR(tanggal) as year, MONTH(tanggal) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->get();

        return view('admin.dashboard', compact('users', 'category', 'certificateCategoryCount', 'certificateCount', 'certificateData', 'kelulusanCount', 'pelatihanCount', 'kompetensiCount'));
    }
}
