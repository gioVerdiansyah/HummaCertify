<?php

namespace App\Http\Controllers;

use App\Services\DetailCertificateService;
use Illuminate\Http\Request;
use App\Http\Requests\DetailCertificateStoreRequest;

class detailCertificateController extends Controller
{
    private DetailCertificateService $detailCertificate;
    public function __construct(DetailCertificateService $detailCertificate)
    {
        $this->detailCertificate = $detailCertificate;
    }

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
}
