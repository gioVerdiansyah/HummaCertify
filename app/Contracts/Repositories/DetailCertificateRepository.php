<?php
namespace App\Contracts\Repositories;

use App\Models\DetailCertificate;
use App\Contracts\Repositories\BaseRepository;
use App\Contracts\Interfaces\DetailCertificateInterface;

class DetailCertificateRepository extends BaseRepository implements DetailCertificateInterface
{
    public function __construct(DetailCertificate $detailModel)
    {
        $this->model = $detailModel;
    }

    public function getId($id): mixed
    {
        return $this->model->where('certificate_id', $id)->first();
    }

    public function store(array $data): mixed
    {
        return $this->model->create($data);
    }
}
