<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\DetailCertificateRepository;
use Illuminate\Http\Request;
use App\Http\Requests\DetailCertificateStoreRequest;

class detailCertificateController extends Controller
{
    private DetailCertificateRepository $certificate;
    public function __construct(DetailCertificateRepository $certificate)
    {
        $this->detailCertificate = $certificate;
    }

    public function store(DetailCertificateStoreRequest $request, $id)
    {
       $data = $request->all();
       $this->certificate->store($data, $id);
        return redirect()->back();
    }
}
