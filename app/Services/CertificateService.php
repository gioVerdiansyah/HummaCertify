<?php

namespace App\Services;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Contracts\Interfaces\CertificateInterface;
use App\Contracts\Repositories\CertificateRepository;
use App\Contracts\Repositories\DaftarPesertaRepository;

class CertificateService
{
    private CertificateRepository $certificate;
    public function __construct(CertificateRepository $certificate)
    {
        $this->certificate = $certificate;
    }

    public function create(array $data): mixed
    {
        $user = User::where('name', $data['name'])->first();
         $certificate = [
           'user_id' => $user->id,
           'certificate_categori_id' => $data['certificate_categori_id'],
           'tanggal' => $data['tanggal'],
           'divisions' => $data['divisions'],
         ];

        return $this->certificate->store($certificate);


    }

    public function update(array $request, $id)
    {
        $user = User::where('name', $request['name'])->first();
        $certificate = [
            'user_id' => $user->id,
            'certificate_categori_id' => $request['certificate_categori_id'],
            'tanggal' => $request['tanggal'],
            'divisions' => $request['divisions'],
        ];


    }
}
