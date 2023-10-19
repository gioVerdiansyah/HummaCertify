<?php

namespace App\Services;

use App\Contracts\Repositories\CertificateRepository;
use App\Contracts\Repositories\DetailCertificateRepository;

class DetailCertificateService
{
    private DetailCertificateRepository $detailCertificate;
    private CertificateRepository $certificate;
    public function __construct(DetailCertificateRepository $detailCertificate, CertificateRepository $certificate)
    {
        $this->certificate = $certificate;
        $this->detailCertificate = $detailCertificate;
    }

    public function store(array $data, string $id): mixed
    {
        $certificateId = $this->certificate->getId($id);

        $detailCertificate = [
            'certificate_id' => $certificateId,
            'materi' => $data['materi'],
            'jp' => $data['jam_pelajaran'],
        ];

        return $this->detailCertificate->store($detailCertificate);
    }
}
