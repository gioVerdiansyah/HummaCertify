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

    public function countById(int $id): mixed
    {
      return $this->model->where('certificate_categori_id', $id)
        ->count();
    }

    public function getId($id): mixed
    {
        return $this->model->with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
    }

    public function get():mixed
    {
        return $this->model->with('user')->get();
    }

    public function getAllDataSpecific(): mixed
    {
       return $query = $this->model->with('user');
    }

    public function store(array $data): mixed
    {
        $this->swal("Berhasil!", "Berhasil menambah peserta!");
        $certificate = $this->model->query()->create($data);
        return $certificate->id;
    }

    public function update($id, $certificate): mixed
    {
        $data = $this->model->findOrFail($id);
        return $data->update($certificate);
    }


}
