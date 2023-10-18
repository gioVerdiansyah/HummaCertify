<?php
namespace App\Contracts\Repositories;

use App\Models\DetailCertificate;
use App\Contracts\Repositories\BaseRepository;
use App\Contracts\Interfaces\DetailCertificateInterface;

class DetailCertificateRepository extends BaseRepository implements DetailCertificateInterface
{
    public function __construct(DetailCertificate $User)
    {
        $this->model = $User;
    }

    public function store(array $detailCertificate): mixed
    {
        return $this->model->create($detailCertificate);
    }
}
