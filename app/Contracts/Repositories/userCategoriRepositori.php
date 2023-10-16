<?php
namespace App\Contracts\Repositories;

use App\Models\UserCategoriCertificate;
use App\Contracts\Repositories\BaseRepository;
use App\Contracts\Interfaces\userCategoriInterface;

class userCategoriRepositori extends BaseRepository implements userCategoriInterface
{
    public function __construct(UserCategoriCertificate $categori)
    {
        $this->model = $categori;
    }

    public function store(array $categori): mixed
    {

        $categories = $this->model->create($categori);
        return $categories;
    }
}
