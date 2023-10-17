<?php

namespace App\Services;

use to;
use App\Models\User;
use Illuminate\Support\Str;
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
        $namaUnik =  'malang';
        $nomorUnik = str_pad($userId->nomerUniq, 4, '0', STR_PAD_LEFT);
        $nomorKategori = str_pad($data['certificate_categori_id'], 2, '0', STR_PAD_LEFT);
        $tahun = date('Y', strtotime($data['tanggal']));
        $nomorSertifikat = 'Ser'. '/'. $nomorUnik . '/' . $nomorKategori. '/'. $namaUnik. '/'. $tahun;
    
        $certificate = [
            'user_id' => $userId->id,
            'certificate_categori_id' => $data['certificate_categori_id'],
            'tanggal' => $data['tanggal'],
            'divisions' => $data['divisions'],
            'nomer' => $nomorSertifikat,
        ];

        return $this->certificate->store($certificate);
    }


}
