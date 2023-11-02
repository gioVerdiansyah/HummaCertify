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

    public function tambahKategori() {
        $notification = ContactMe::all();
        $notificationCount = ContactMe::all()->count();
        return view('admin.certificate.tambahKategori',compact('notification' , 'notificationCount'));
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

    use Illuminate\Support\Facades\Storage;

    public function storeCategories(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'backgroundDepan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'backgroundBelakang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tataletak' => 'required|string|max:255',
        ]);


        $backgroundDepanPath = $request->file('backgroundDepan')->move('public/images/certificates');
        $backgroundBelakangPath = $request->file('backgroundBelakang')->move('public/images/certificates');


        $categoryCertificate = new CertificateCategori();
        $categoryCertificate->name = $request->name;
        $categoryCertificate->backgroundDepan = $backgroundDepanPath;
        $categoryCertificate->backgroundBelakang = $backgroundBelakangPath;
        $categoryCertificate->tataLetak = $request->tataletak;
        $categoryCertificate->save();

        return redirect()->back()->with('success', 'Category created successfully!');
    }

}
