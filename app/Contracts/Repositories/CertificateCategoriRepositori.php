<?php
namespace App\Contracts\Repositories;

use App\Models\CertificateCategori;
use App\Models\UserCategoriCertificate;
use App\Contracts\Repositories\BaseRepository;
use App\Contracts\Interfaces\userCategoriInterface;
use App\Contracts\Interfaces\CertificateCategoriInterface;

class CertificateCategoriRepositori extends BaseRepository implements CertificateCategoriInterface
{
    public function __construct(CertificateCategori $categori)
    {
        $this->model = $categori;
    }
    public function get(): mixed
    {
        return $this->model->get();
    }
    public function getCategoryCertificate(int $id): mixed
    {
        return $this->model->query()->where("id", $id)->first();
    }
}
