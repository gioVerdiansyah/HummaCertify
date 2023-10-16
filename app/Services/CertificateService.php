<?php

namespace App\Services;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Contracts\Interfaces\CertificateInterface;
use App\Contracts\Repositories\CertificateRepository;


class CertificateService
{
    private CertificateRepository $Certificate;

    public function __construct(CertificateRepository $Certificate)
    {
        $this->certificate = $Certificate;
    }

    public function create(array $data): mixed
    {
       
        $user = User::where('name', $data['name'])->first();
        return $certificate = [
           'user_id' => $user->id,
           'certificate_categori_id' => $data['certificate_categori_id'],
           'tanggal' => $data['tanggal'],
           'divisions' => $data['divisions'],
         ];

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
        return $this->certificate->update($id, $certificate);
    }
}
