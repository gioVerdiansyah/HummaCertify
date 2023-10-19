<?php

namespace App\Services;

use App\Models\User;
use App\Contracts\Repositories\DaftarPesertaRepository;

class PesertaService
{
    private DaftarPesertaRepository $peserta;

    public function __construct(DaftarPesertaRepository $peserta)
    {
        $this->peserta = $peserta;
    }

    public function store(array $data): mixed
    {
        $dataUser = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['nomor_induk'],
            'ttl' => $data['ttl'],
            'institusi' => $data['institusi']
        ];
        return $this->peserta->store($dataUser);
    }
}
