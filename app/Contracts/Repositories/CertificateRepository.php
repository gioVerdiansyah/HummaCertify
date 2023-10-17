<?php
namespace App\Contracts\Repositories;

use App\Models\Certificate;
use App\Contracts\Repositories\BaseRepository;
use App\Contracts\Interfaces\CertificateInterface;

class CertificateRepository extends BaseRepository implements CertificateInterface
{
    public function __construct(Certificate $Certificate)
    {
        $this->model = $Certificate;
    }

    public function get():mixed
    {
        return $this->model->get();
    }

    public function getRelationship($relationship):mixed{
        return $this->model->query()->with($relationship)->get();
    }
    public function store(array $Certificate): mixed
    {
        $this->swal("Berhasil!", "Berhasil menambah peserta!");
        return $this->model->query()->create($Certificate);

    }

    public function update($id, $data): mixed
    {
        $data = $this->model->findOrFail($id);
        return $data->update($data);
    }


}
