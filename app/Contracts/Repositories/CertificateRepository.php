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

    public function getRelationship($relationship):mixed{
        return $this->model->query()->with($relationship)->get();
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
