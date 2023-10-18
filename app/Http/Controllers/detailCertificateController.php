<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Services\DetailCertificateService;
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
       $this->detailCertificate->store($data, $id);
        return redirect()->back();
    }
}
