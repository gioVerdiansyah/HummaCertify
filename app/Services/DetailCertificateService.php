<?php

namespace App\Services;

use App\Contracts\Repositories\CertificateRepository;
use App\Contracts\Repositories\DetailCertificateRepository;

class DetailCertificateService
{
    private DetailCertificateRepository $detailCertificate;
    private CertificateRepository $certificateRepository;
    public function __construct(DetailCertificateRepository $detailCertificate, CertificateRepository $certificateRepository)
    {
        $this->certificate = $certificateRepository;
        $this->detailCertificate = $detailCertificate;
    }

    public function store(array $data, string $id): mixed
    {
        $certificateId = $this->certificate->getId($id);

        $detailCertificate = [
            'certificate_id' => $certificateId->id,
            'materi' => $data['materi'],
            'jp' => $data['jam_pelajaran'],
        ];
    
        return $this->detailCertificate->store($detailCertificate);
    }
}
