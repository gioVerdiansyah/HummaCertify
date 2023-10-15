<?php
namespace App\Contracts\Repositories;

use App\Models\User;
use App\Contracts\Interfaces\DaftarPesertaInterface;

class DaftarPesertaRepository extends BaseRepository implements DaftarPesertaInterface
{
    public function __construct(User $User)
    {
        $this->model = $User;
    }

    public function store(array $User): mixed
    {
        $User = $this->model->create($User);
        return $User;
    }


}
