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
        $uniq = $this->peserta->count();
        $dataUser = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'nomerUniq' => $uniq,
            'ttl' => $data['ttl'],
        ];
        return $this->peserta->store($dataUser);
    }
}
