<?php
namespace App\Contracts\Repositories;

use App\Models\Certificate;
use App\Models\UserCategoriCertificate;
use App\Contracts\Repositories\BaseRepository;
use App\Contracts\Interfaces\CertificateInterface;
use App\Contracts\Interfaces\userCategoriInterface;

class CertificateRepository extends BaseRepository implements CertificateInterface
{
    public function __construct(Certificate $Certificate)
    {
        $this->model = $Certificate;
    }

    public function store(array $certificate): mixed
    {
        return $this->model->query()
        ->create($certificate);
    }
}
