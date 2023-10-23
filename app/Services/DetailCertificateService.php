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
        $detailCertificates = [];

        foreach ($data['category-group'] as $category) {
            $detailCertificate = [
                'certificate_id' => $certificateId->id,
                'materi' => $category['materi'],
                'jp' => $category['jam_pelajaran'],
            ];
            $detailCertificates[] = $detailCertificate;
        }
        return $detailCertificates;
    }

}
