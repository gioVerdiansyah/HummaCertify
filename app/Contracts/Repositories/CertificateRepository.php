<?php
namespace App\Contracts\Repositories;

use App\Models\Certificate;
use App\Contracts\Repositories\BaseRepository;
use App\Contracts\Interfaces\CertificateInterface;

class CertificateRepository extends BaseRepository implements CertificateInterface
{
    private DaftarPesertaRepository $peserta;
    private DaftarPesertaRepository $user;
    public function __construct(Certificate $Certificate, DaftarPesertaRepository $peserta, DaftarPesertaRepository $user)
    {
        $this->model = $Certificate;
        $this->peserta = $peserta;
        $this->user = $user;
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

    public function store(array $data, string $uuid): mixed
    {
        $uniq = $this->peserta->count();
        $userId = $this->user->getId($uuid);
        $nomorUnik = str_pad($uniq, 4, '0', STR_PAD_LEFT);
        $nomorKategori = str_pad($data['certificate_categori_id'], 2, '0', STR_PAD_LEFT);
        $bulan = date('m', strtotime($data['tanggal']));
        $hari = date('d', strtotime($data['tanggal']));
        $tahun = date('Y', strtotime($data['tanggal']));
        $nomorSertifikat = 'Ser'. '/'. $nomorUnik . '/' . $nomorKategori. '/'. $hari . $bulan. '/'. $tahun;


        $certificate = [
            'user_id' => $userId->id,
            'certificate_categori_id' => $data['certificate_categori_id'],
            'nomor' => $nomorSertifikat,
            'tanggal' => $data['tanggal'],
            'bidang' => $data['bidang'],
            'predikat' => $data['predikat'],
        ];
        $this->swal("Berhasil!", "Berhasil menambah peserta!");
        return $this->model->query()->create($certificate);

    }

    public function update($id, $data): mixed
    {
        $data = $this->model->findOrFail($id);
        return $data->update($data);
    }


}
