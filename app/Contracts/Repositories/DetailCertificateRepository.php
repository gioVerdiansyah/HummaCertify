<?php
namespace App\Contracts\Repositories;

use App\Models\DetailCertificate;
use App\Contracts\Repositories\BaseRepository;
use App\Contracts\Interfaces\DetailCertificateInterface;

class DetailCertificateRepository extends BaseRepository implements DetailCertificateInterface
{
    private CertificateRepository $certificate;
    public function __construct(DetailCertificate $user, CertificateRepository $certificate)
    {
        $this->model = $user;
        $this->certificate = $certificate;
    }

    public function store(array $data, string $uuid): mixed
    {
        $certificateId = $this->certificate->getId($uuid)->id;
        $detailCertificate = [
            'certificate_id' => $certificateId,
            'materi' => $data['materi'],
            'jp' => $data['jam_pelajaran'],
        ];
        return $this->model->create($detailCertificate);
    }
}
