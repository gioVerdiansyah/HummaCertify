<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateExistStoreRequest;
use App\Http\Requests\CertificateStoreRequest;
use App\Http\Requests\CertificateUpdateRequest;
use App\Models\User;
use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Mail\SendCertificate;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetailCertificate;
use App\Models\CertificateCategori;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class CertificateController extends Controller
{
    protected $perPage = 10, $exceptCategory;

    public function __construct()
    {
        $this->exceptCategory = config('hummacertify.tata_letak');
    }
    public function index(Request $request)
    {
        $certificates = Certificate::latest()->with('category')->where('status', 'nonPrint')->paginate($this->perPage);
        $categories = CertificateCategori::withTrashed()->select('id', 'name')->get();

        if ($request->all()) {
            $certificates = $this->searchCertificates($request->all());
        }
        return view('admin.certificate.index', compact('certificates', 'categories'));
    }
    // Filter search
    public function searchCertificates(array $dataRequest)
    {

        $query = Certificate::with('user')->latest();


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

        if (!isset($dataRequest['print'])) {
            $query->where('status', 'nonPrint');
        } elseif (isset($dataRequest['print'])) {
            $print = $dataRequest['print'];
            $query->where('status', $print);
        }

        if (isset($dataRequest['page'])) {
            $page = $dataRequest['page'];
            $perPage = $this->perPage;
            $offset = ($page - 1) * $perPage;
            $query->skip($offset)->take($perPage);
        }
        $data = $query->paginate($this->perPage);
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
                'password' => Hash::make($data['nomor_induk']),
                'nomor_induk' => $data['nomor_induk'],
                'ttl' => $data['ttl'],
                'institusi' => $data['institusi']
            ]
        );

        // Generate nomor sertifikat
        $userUniq = Certificate::count() + 1;
        $nomorKategori = Certificate::where('certificate_categori_id', $data['certificate_categori_id'])->count() + 1;
        $nomorSertifikat = $this->generateCertificateNumber($userUniq, $data['certificate_categori_id'], $nomorKategori, $data['tanggal']);

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

        return redirect()->route('certificate.index')->with('message', [
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
    public function storeExists(CertificateExistStoreRequest $request)
    {
        $dataRequest = $request->all();
        $user = User::with('certificates')->findOrFail($dataRequest['user_id']);

        $uniq = Certificate::count() + 1;
        $nomorKategori = Certificate::where('certificate_categori_id', $dataRequest['certificate_categori_id'])->count() + 1;
        $nomorSertifikat = $this->generateCertificateNumber($uniq, $dataRequest['certificate_categori_id'], $nomorKategori, $dataRequest['tanggal']);

        $certificate = Certificate::create([
            'user_id' => $user->id,
            'certificate_categori_id' => $dataRequest['certificate_categori_id'],
            'nomor' => $nomorSertifikat,
            'tanggal' => $dataRequest['tanggal'],
            'bidang' => $dataRequest['bidang'],
            'sub_bidang' => $dataRequest['sub_bidang'],

        ]);


        if (isset($dataRequest['category-group'][0]['materi']) && isset($dataRequest['category-group'][0]['jam_pelajaran'])) {
            $this->storeDetail($dataRequest, $certificate->id);
        }

        $this->generateCertificate($certificate->id);
        return redirect()->route('certificate.index')->with('message', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => "Berhasil menambah sertifikat {$user->name}"
        ]);
    }

    public function edit(string $id)
    {

        $certificate = Certificate::with('user', 'category', 'detailCertificates')->where('id', $id)->firstOrFail();
        $categories = CertificateCategori::select('id', 'name')->get();
        $details = DetailCertificate::where('certificate_id', $id)->get();

        return view('admin.certificate.edit', compact('categories', 'certificate', 'details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificateUpdateRequest $request, string $id)
    {
        $dataRequest = $request->all();
        $certificate = Certificate::findOrFail($id);
        $user = User::findOrFail($certificate->user_id);
        $name = $certificate->user->name;

        // Delete sertifikat
        Storage::delete('public/sertifikat/' . $certificate->id . '.pdf');

        $dataUser = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->nomor_induk),
            'nomor_induk' => $request->nomor_induk,
            'ttl' => $request->ttl,
            'institusi' => $request->institusi,
        ];
        $user->update($dataUser);

        $nomorSertifikat = $certificate->nomor;
        $parts = explode('/', $nomorSertifikat);

        if ($request->filled('certificate_categori_id')) {
            $parts[3] = str_pad($request->certificate_categori_id, 2, '0', STR_PAD_LEFT);
        }

        if ($request->filled('tanggal')) {
            $tanggal = Carbon::parse($request->tanggal)->format('dm');
            $parts[4] = $tanggal;
            $parts[5] = Carbon::parse($request->tanggal)->format('Y');
        }

        $nomorSertifikat = implode('/', $parts);

        $dataCertificate = [
            'certificate_categori_id' => $request->certificate_categori_id,
            'tanggal' => $request->tanggal,
            'bidang' => $request->bidang,
            'predikat' => $request->predikat,
            'sub_bidang' => $request->sub_bidang,
            'nomor' => $nomorSertifikat,
        ];
        $certificate->update($dataCertificate);


        DetailCertificate::where('certificate_id', $id)->delete();
        if (isset($dataRequest['category-group'][0]['materi']) && isset($dataRequest['category-group'][0]['jam_pelajaran'])) {
            $this->storeDetail($dataRequest, $certificate->id);
        }

        // Generate sertifikat kembali
        $this->generateCertificate($id);
        return to_route('certificate.index')->with('message', [
            'icon' => "success",
            'title' => "Berhasil!",
            'text' => "Berhasil meng-update sertifikat {$name}"
        ]);
    }

    // FUNCTIONAL
    public function generateCertificateNumber($userUniq, $certificateCategoryId, $categorycount, $tanggal)
    {
        $nomorUnik = str_pad($userUniq, 4, '0', STR_PAD_LEFT);
        $nomorKategori = str_pad($certificateCategoryId, 2, '0', STR_PAD_LEFT);
        $nomorKategoriSTR = str_pad($categorycount, 4, '0', STR_PAD_LEFT);
        $bulan = date('m', strtotime($tanggal));
        $hari = date('d', strtotime($tanggal));
        $tahun = date('Y', strtotime($tanggal));

        $nomorSertifikat = 'Ser' . '/' . $nomorUnik . '/' . $nomorKategoriSTR . '/' . $nomorKategori . '/' . $hari . $bulan . '/' . $tahun;
        return $nomorSertifikat;
    }


    public function generateCertificate(string $id)
    {
        $certificate = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
        $category = $certificate->category->id;
        $type = $this->getTypeCertificate($category);
        $background = $this->getBackground($category);
        $certificateFileName = $certificate->id . '.pdf';
        $pdf = PDF::setPaper('A4', 'landscape')->loadView('certificate.generate.' . $type, ['certificate' => $certificate, 'background' => $background]);
        $sertifikatPath = storage_path('app/public/sertifikat');
        if (!file_exists($sertifikatPath)) {
            mkdir($sertifikatPath, 0755, true);
        }
        $pdf->save(storage_path('app/public/sertifikat/' . $certificateFileName));
    }
    public function getCertificate(string $id)
    {
        $certificate = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
        $category = $certificate->category->id;
        // Perbarui status
        $certificate->status = 'hasPrint';
        $certificate->save();
        $type = $this->getTypeCertificate($category);
        $background = $this->getBackground($category);
        return view('certificate.' . $type, compact('certificate', 'category', 'type', 'background'));
    }

    public function getBackground(int $category)
    {
        $category = $this->getCategoryCertificate($category);
        $background = (object) [
            'depan' => $category->background_depan,
            'belakang' => $category->background_belakang,
        ];
        return $background;
    }

    public function getTypeCertificate(int $category)
    {
        $category = $this->getCategoryCertificate($category);
        if (!in_array($category->name, $this->exceptCategory)) {
            $categoryName = $category->tata_letak;
        } else {
            $categoryName = $category->name;
        }
        return strtolower($categoryName);
    }

    public function getCategoryCertificate(int $id)
    {
        $categoryname = CertificateCategori::where('id', $id)->withTrashed()->first();
        return $categoryname;
    }

    public function printAllCertificate(Request $request)
    {
        $dataRequest = $request->all();

        $query = Certificate::with('user')->where('status', 'nonPrint');
        // if($query->get()){}

        if (isset($dataRequest['ct'])) {
            $kategori = $dataRequest['ct'];
            $query->where('certificate_categori_id', $kategori);
        }

        if (isset($dataRequest['page'])) {
            $page = $dataRequest['page'];
            $perPage = $this->perPage;
            $offset = ($page - 1) * $perPage;
            $query->skip($offset)->take($perPage);
        }

        if ($query->get()->isEmpty()) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => "Gagal!",
                'text' => "Gagal print all karena sertifikat sudah di print!"
            ]);
        }

        $certificates = $query->get();
        $type = $this->getTypeCertificate($dataRequest['ct']);
        $background = $this->getBackground($dataRequest['ct']);
        foreach ($certificates as $certificate) {
            $certificate->status = 'hasPrint';
            $certificate->save();
        }
        return view('admin.certificate.print-all.' . $type, compact('certificates', 'background'));
    }

    public function sendCertificate(string $id)
    {
        $certificate = Certificate::with(['user', 'category', 'detailCertificates'])->where('id', $id)->first();
        $email = $certificate->user->email;
        $type = $this->getTypeCertificate($certificate->category->id);
        Mail::to($email)->send(new SendCertificate($certificate, $type));
        return redirect()->back()->with('message', [
            'icon' => "success",
            'title' => 'Berhasil!',
            'text' => "Berhasil mengirim sertifikat {$type} ke email {$email}"
        ]);
    }

    public function downloadCertificate(string $id)
    {
        $certificate = Certificate::find($id);

        if (!$certificate) {
            return redirect()->route('home')
                ->with('message', [
                    'icon' => 'error',
                    'title' => 'Tidak ditemukan!',
                    'text' => 'Sertifikat tidak ditemukan, hubungi developer untuk informasi lebih lanjut.'
                ]);
        }

        $pdfFileName = $certificate->id . '.pdf';
        $pdfPath = 'sertifikat/' . $pdfFileName;
        if (Storage::disk('public')->exists($pdfPath)) {
            return view('certificate.embed', ['pdfPath' => Storage::url($pdfPath)]);
        } else {
            return back();
        }
    }
}
