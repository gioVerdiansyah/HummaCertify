<?php

namespace App\Http\Controllers;

use App\Models\ContactMe;
use App\Models\Certificate;
use Illuminate\Http\Request;
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
}
