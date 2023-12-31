<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\CertificateCategori;
use App\Models\ContactMe;

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
        $userCertificate = User::whereHas('certificates', function ($query) {
            $query->where('certificate_categori_id', 1)->orWhereHas('category', function ($categoryQuery) {
                $categoryQuery->where('tata_letak', 'Kelulusan');
            });
        })->latest()->get();

        return view('welcome', compact('userCertificate'));
    }

    public function adminIndex()
    {

        $users = User::all();
        $category = CertificateCategori::all();
        $certificateCategoryCount = CertificateCategori::count();

        $kelulusanCount = Certificate::where('certificate_categori_id', 1)->count();

        // data untuk chart line
        $certificateCount = Certificate::count();

        // data untuk chart doughnut
        $categories = CertificateCategori::all();
        $categoryData = [];

        foreach ($categories as $category) {
            $categoryId = $category->id;
            $categoryName = $category->name;
            $categoryCount = Certificate::where('certificate_categori_id', $categoryId)->count();

            $categoryData[] = [
                'id' => $categoryId,
                'name' => $categoryName,
                'count' => $categoryCount,
            ];
        }

        $certificateData = Certificate::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->get()->toArray();

        foreach ($certificateData as $i => $data) {
            $certificateData[$i]['year'] = (int)$data['year'];
            $certificateData[$i]['month'] = (int)$data['month'];
            $certificateData[$i]['count'] = (int)$data['count'];
        }

        return view('admin.dashboard', compact('users', 'category', 'certificateCategoryCount', 'certificateCount', 'certificateData', 'kelulusanCount', 'categoryData'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required',
        ], [
            'q.required' => 'Input tidak boleh kosong!',
        ]);

        $query = $request->input('q');
        $certificate = Certificate::with(['user', 'category', 'detailCertificates'])->where('nomor', $query)->first();

        if ($certificate === null) {
            return view('certificate.notFound');
        }

        return view('certificate.found', compact('certificate'));
    }

    public function sertifikatKu()
    {
        $user = User::with(['certificates', 'certificates.category', 'certificates.detailCertificates'])
            ->where('id', auth()->user()->id)
            ->first();

        $certificates = $user->certificates;
        // dd($certificates);
        return view('user.sertifikat', compact('certificates'));
    }
}
