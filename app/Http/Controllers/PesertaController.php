<?php

namespace App\Http\Controllers;


use App\Models\Certificate;
use App\Models\DetailCertificate;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\PesertaService;
use App\Services\CertificateService;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\DetailCertificateStoreRequest;
use App\Contracts\Repositories\CertificateRepository;
use App\Contracts\Repositories\DaftarPesertaRepository;
use App\Contracts\Repositories\CertificateCategoriRepositori;

class PesertaController extends Controller
{
    private $user;
    private $certificate;
    private CertificateService $serviceCertificate;
    private CertificateCategoriRepositori $categories;
    private PesertaService $peserta;


    public function __construct(DaftarPesertaRepository $user, CertificateRepository $certificate, CertificateService $serviceCertificate, CertificateCategoriRepositori $category, PesertaService $peserta)
    {
        $this->user = $user;
        $this->certificate = $certificate;
        $this->categories = $category;
        $this->certificateService = $serviceCertificate;
        $this->peserta = $peserta;
    }

    public function index(Request $request)
    {
        $certificates = $this->certificate->get();
        $categories = $this->categories->get();

        if ($request->all()) {
            $certificates = $this->certificateService->searchCertificates($request->all());
        }

        return view('admin.certificate.index', compact('certificates', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */





    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->all();
        // dd($data);

        // Create peserta
        $user = User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['nomor_induk'],
                'ttl' => $data['ttl'],
                'institusi' => $data['institusi']
            ]
        );
        $userUniq = $user->count();
        $nomorUnik = str_pad($userUniq, 4, '0', STR_PAD_LEFT);
        $nomorKategori = str_pad($data['certificate_categori_id'], 2, '0', STR_PAD_LEFT);
        $bulan = date('m', strtotime($data['tanggal']));
        $hari = date('d', strtotime($data['tanggal']));
        $tahun = date('Y', strtotime($data['tanggal']));
        $nomorSertifikat = 'Ser' . '/' . $nomorUnik . '/' . $nomorKategori . '/' . $hari . $bulan . '/' . $tahun;

        // Create Sertifikat
        $certificate = Certificate::create(
            [
                'user_id' => $user->id,
                'certificate_categori_id' => $data['certificate_categori_id'],
                'nomor' => $nomorSertifikat,
                'tanggal' => $data['tanggal'],
                'bidang' => $data['bidang'],
                'predikat' => $data['predikat'],
                'sub_bidang' => $data['sub_bidang'],
                'instruktur' => $data['instruktur']
            ]
        );

        // Create Detail jika ada
        if (isset($data['category-group']['materi']) && isset($data['category-group']['jam_pelajaran'])) {
            foreach ($data['category-group'] as $row) {
                DetailCertificate::create([
                    'certificate_id' => $certificate->id,
                    'materi' => $row['materi'],
                    'jp' => $row['jam_pelajaran']
                ]);
            }
        }

        return redirect()->back()->with('message', [
            'icon' => "success",
            'title' => "Berhasil!",
            'text' => "Berhasil menambah sertifikat {$user->name}"
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $user = $request->validated();
        $User = $this->user->update($id, $user);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $User = $this->user->delete($id);
        return redirect()->back();
    }


    public function CreateExists(DetailCertificateStoreRequest $request)
    {
        $data = $request->all();
        $this->certificateService->create($data);
        return redirect()->back();
    }
}
