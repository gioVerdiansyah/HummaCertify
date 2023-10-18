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

    public function count(): int
    {
        return $this->model->count() + 1;
    }

    public function get(): mixed
    {
        return $this->model->whereNot('email', 'hummacertify@gmail.com')->get();
    }

    public function getId($id): mixed
    {
      return $this->model->findOrFail($id);
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

    public function store(array $dataUser): string
    {
        $user = $this->model->query()
        ->create($dataUser);
        return $user->id;
    }


}
