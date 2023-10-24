<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateStoreRequest;
use App\Http\Requests\UserExistStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\Certificate;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Mail\SendCertificate;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetailCertificate;
use App\Models\CertificateCategori;
use Illuminate\Support\Facades\Mail;


class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $certificates = Certificate::paginate(15);
        $categories = CertificateCategori::select('id', 'name')->get();

        if ($request->all()) {
            $certificates = $this->searchCertificates($request->all());
        }

        return view('admin.certificate.index', compact('certificates', 'categories'));
    }
    // Filter search
    public function searchCertificates(array $dataRequest)
    {

        $query = Certificate::with('user');


        if (isset($dataRequest['q'])) {
            $search = $dataRequest['q'];

            $query->where(function ($query) use ($search) {
                $query->where('nomor', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('user', function (Builder $userQuery) use ($search) {
                        $userQuery->where('name', 'LIKE', '%' . $search . '%');

                    });
            });

        }
        if (isset($dataRequest['ct'])) {
            $kategori = $dataRequest['ct'];
            $query->where('certificate_categori_id', $kategori);
        }

        if (isset($dataRequest['page'])) {
            $page = $dataRequest['page'];
            $perPage = 15;
            $offset = ($page - 1) * $perPage;
            $query->skip($offset)->take($perPage);
        }
        $data = $query->get();

        return $data;
    }

    public function create()
    {
        $categories = CertificateCategori::select('id', 'name')->get();
        return view('admin.certificate.create', compact('categories'));
    }
    public function store(CertificateStoreRequest $request)
    {
        $data = $request->validated();

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

        // Generate nomor sertifikat
        $userUniq = User::count();
        $certificateCategoryId = Certificate::where('certificate_categori_id', $data['certificate_categori_id'])->count() + 1;
        $nomorSertifikat = $this->generateCertificateNumber($userUniq, $certificateCategoryId, $data['tanggal']);

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
        if (isset($data['category-group'][0]['materi']) && isset($data['category-group'][0]['jam_pelajaran'])) {
            $this->storeDetail($request, $certificate->id);
        }

        // generate PDF
        $this->generateCertificate($certificate->id);

        return redirect()->back()->with('message', [
            'icon' => "success",
            'title' => "Berhasil!",
            'text' => "Berhasil menambah sertifikat {$user->name}"
        ]);
    }
    public function storeDetail($request, $id)
    {
        $certificateId = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();

        foreach ($request['category-group'] as $category) {
            $detailCertificate = [
                'certificate_id' => $certificateId->id,
                'materi' => $category['materi'],
                'jp' => $category['jam_pelajaran'],
            ];
            DetailCertificate::create($detailCertificate);
        }

        $certificate = [
            'predikat' => $request['predikat'],
            'instruktur' => $request['instruktur'],
        ];
        $cerId = Certificate::findOrFail($id);
        $cerId->update($certificate);

        $username = $certificateId->user->name;
        return redirect()->route('certificate.index')->with('message', [
            'title' => "Berhasil!",
            'text' => "Berhasil menambah detail pada sertifikat {$username}"
        ]);
    }

    public function createExist()
    {
        $categories = CertificateCategori::select('id', 'name')->get();
        $peserta = User::whereNotIn('name', ['HummaCertify', 'User'])->select('id', 'name')->get();

        return view('admin.certificate.createExist', compact('categories', 'peserta'));

    }
    public function storeExists(UserExistStoreRequest $request)
    {
        $dataRequest = $request->all();
        $user = User::findOrFail($dataRequest['user_id']);

        $uniq = User::count() + 1;
        $nomorSertifikat = $this->generateCertificateNumber($uniq, $dataRequest['certificate_categori_id'], $dataRequest['tanggal']);

        $certificate = Certificate::create([
            'user_id' => $user->id,
            'certificate_categori_id' => $dataRequest['certificate_categori_id'],
            'nomor' => $nomorSertifikat,
            'tanggal' => $dataRequest['tanggal'],
            'bidang' => $dataRequest['bidang'],
            'sub_bidang' => $dataRequest['sub_bidang'],

        ]);

        // Create Detail jika ada
        if (isset($dataRequest['category-group'][0]['materi']) && isset($dataRequest['category-group'][0]['jam_pelajaran'])) {
            $this->storeDetail($dataRequest, $certificate->id);
        }

        $this->generateCertificate($certificate->id);
        return redirect()->back()->with('message', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => "Berhasil menambah sertifikat {$user->name}"
        ]);
    }

    public function edit(string $id)
    {
        $certificate = Certificate::with('user', 'category', 'detailCertificates')->where('id', $id)->firstOrFail();
        $categories = CertificateCategori::select('id', 'name')->get();
        return view('admin.certificate.edit', compact('categories', 'certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }

    // FUNCTIONAL
    public function generateCertificateNumber($userUniq, $certificateCategoryId, $tanggal)
    {
        $nomorUnik = str_pad($userUniq, 4, '0', STR_PAD_LEFT);
        $nomorKategori = str_pad($certificateCategoryId, 4, '0', STR_PAD_LEFT);
        $bulan = date('m', strtotime($tanggal));
        $hari = date('d', strtotime($tanggal));
        $tahun = date('Y', strtotime($tanggal));

        $nomorSertifikat = 'Ser' . '/' . $nomorUnik . '/' . $nomorKategori . '/' . $hari . $bulan . '/' . $tahun;


        return $nomorSertifikat;
    }
    public function generateCertificate(string $id)
    {
            $certificate = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
            $category = $certificate->category->id;
            $type = $this->getTypeCertificate($category);
            $certificateFileName = $certificate->id . '.pdf';
            $pdf = PDF::setPaper('A4', 'landscape')->loadView('certificate.generate.' . $type, ['certificate' => $certificate]);
            $pdf->save(storage_path('app/public/sertifikat/' . $certificateFileName));
    }
    public function getCertificate(string $id)
    {
        $certificate = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
        $category = $certificate->category->id;
        $type = $this->getTypeCertificate($category);
        return view('certificate.' . $type, compact('certificate', 'category', 'type'));
    }

    public function getTypeCertificate(int $category)
    {
        $categoryName = $this->getCategoryCertificate($category)->name;
        return strtolower($categoryName);
    }

    public function getCategoryCertificate(int $id)
    {
        $categoryname = CertificateCategori::where('id', $id)->first();
        return $categoryname;
    }

    public function printAllCertificate(int $ct)
    {
        $dataRequest['ct'] = $ct;

        $query = Certificate::with('user');
        if (isset($dataRequest['ct'])) {
            $kategori = $dataRequest['ct'];
            $query->where('certificate_categori_id', $kategori);
        }

        if (isset($dataRequest['page'])) {
            $page = $dataRequest['page'];
            $perPage = 15;
            $offset = ($page - 1) * $perPage;
            $query->skip($offset)->take($perPage);
        }
        $certificates = $query->get();
        $type = $this->getTypeCertificate($dataRequest['ct']);
        return view('admin.certificate.print-all.' . $type, compact('certificates'));
    }

    public function sendCertificate(string $id)
    {
        $certificate = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
        $email = $certificate->user->email;
        Mail::to($email)->send(new SendCertificate($certificate));
        return redirect()->back();
    }
}
