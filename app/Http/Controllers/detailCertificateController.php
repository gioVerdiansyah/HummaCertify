<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContactMe;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\CertificateCategori;
use App\Http\Controllers\Controller;
use App\Services\DetailCertificateService;
use App\Http\Requests\DetailCertificateStoreRequest;

class detailCertificateController extends Controller
{


    public function store(DetailCertificateStoreRequest $request, $id)
    {
        $data = $request->all();
        $certificateId = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
        $detailCertificates = [];
        dd($data);
        foreach ($data['category-group'] as $category) {
            $detailCertificate = [
                'certificate_id' => $certificateId->id,
                'materi' => $category['materi'],
                'jp' => $category['jam_pelajaran'],
            ];
            $detailCertificates[] = $detailCertificate;
        }
        return redirect()->back();
    }

    public function tambahKategori()
    {
        $notification = ContactMe::all();
        $notificationCount = ContactMe::all()->count();
        return view('admin.certificate.tambahKategori', compact('notification', 'notificationCount'));
    }

    public function uploadBackground()
    {
        $users = User::all();
        $category = CertificateCategori::all();
        $certificateCategoryCount = CertificateCategori::count();
        $notification = ContactMe::orderBy('created_at', 'desc')->get();
        $notificationCount = ContactMe::count();

        return view('uploadTemplate', compact('notificationCount', 'notification'));
    }



    public function storeCategories(Request $request)
    {
        $request->validate([
            'namaKategori' => 'required|string|max:255',
            'depan' => 'required|image|mimes:jpeg,png,jpg,gif',
            'belakang' => 'required|image|mimes:jpeg,png,jpg,gif',
            'tataletak' => 'required|string|max:255',
        ]);

        $depan = $request->file('depan');
        $belakang = $request->file('belakang');

        $pass = CertificateCategori::create([
            'name' => $request->namaKategori,
            'backgroundDepan' => $depan->hashName(),
            'backgroundBelakang' => $belakang->hashName(),
            'tataLetak' => $request->tataletak,
        ]);

        $depan->move('public/depanBg/');
        $belakang->move('public/belakangBg/');

        return $pass;

        return redirect()->back()->with('message', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Berhasil menambahkan kategori'
        ]);
    }
}
