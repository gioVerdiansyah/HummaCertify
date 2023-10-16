<?php
namespace App\Contracts\Repositories;

use App\Models\User;
use App\Contracts\Repositories\BaseRepository;
use App\Contracts\Interfaces\DaftarPesertaInterface;

class DaftarPesertaRepository extends BaseRepository implements DaftarPesertaInterface
{
    public function __construct(User $User)
    {
        $this->model = $User;
    }
 
    public function update($id, $user): mixed
    {
        $User = $this->model->findOrFail($id);
        return $User->update($user);
    }

    public function delete(mixed $id): mixed
    {
        $User = $this->model->findOrFail($id);
        return $User->delete();

    }

    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
    }


}
