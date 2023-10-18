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

    public function getId($id): mixed
    {
        return $this->model->with('user')->where('id', $id)->first();
    }

    public function get():mixed
    {
        return $this->model->get();
    }

    public function getRelationship($relationship):mixed{
        return $this->model->query()->with($relationship)->get();
    }
    public function store(array $certificate): mixed
    {

        $this->swal("Berhasil!", "Berhasil menambah peserta!");
        return $this->model->query()->create($certificate);

    }

    public function update($id, $data): mixed
    {
        $data = $this->model->findOrFail($id);
        return $data->update($data);
    }


}
