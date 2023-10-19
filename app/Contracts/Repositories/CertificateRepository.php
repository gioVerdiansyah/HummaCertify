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
        return $this->model->with('user')->get();
    }

    public function getAllDataSpecific($dataRequest): mixed
    {
        $query = $this->model->with('user');

        if (isset($dataRequest['q'])) {
            $search = $dataRequest['q'];

            $query->where('nomor','LIKE', '%' . $search . '%')
              ->orWhere(function ($subquery) use ($search) {
                  $subquery->whereHas('user', function ($userQuery) use ($search) {
                      $userQuery->where('name', 'LIKE', '%' . $search . '%');
                  });
              });
        }
        // Cek apakah ada kategori yang diberikan
        if (isset($dataRequest['ct'])) {
            $kategori = $dataRequest['ct'];

            $query->where('certificate_categori_id', $kategori);
        }

        // Cek apakah ada halaman yang diberikan
        if (isset($dataRequest['page'])) {
            $page = $dataRequest['page'];

            $perPage = 15;

            $offset = ($page - 1) * $perPage;
            $query->skip($offset)->take($perPage);
        }
        $data = $query->get();

        return $data;
    }

    public function store(array $data): mixed
    {
        $this->swal("Berhasil!", "Berhasil menambah peserta!");
        return $this->model->query()->create($data);

    }

    public function update($id, $data): mixed
    {
        $data = $this->model->findOrFail($id);
        return $data->update($data);
    }


}
