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
    private DaftarPesertaRepository $user;
    public function __construct(CertificateRepository $certificate, DaftarPesertaRepository $user)
    {
        $this->certificate = $certificate;
        $this->user = $user;
    }

    public function create(array $data, string $id): mixed
    {
        $userId = $this->user->getId($id);
        $certificate = [
            'user_id' => $userId->id,
            'certificate_categori_id' => $data['certificate_categori_id'],
            'tanggal' => $data['tanggal'],
            'divisions' => $data['divisions'],
        ];
        return $this->certificate->store($certificate);
    }

}
