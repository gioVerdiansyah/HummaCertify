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
        $uniq = User::count() +1;
        $dataUser = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        return $this->peserta->store($dataUser);
    }
}
