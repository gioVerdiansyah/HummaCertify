<?php

namespace App\Http\Controllers;


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

    public function __construct(DaftarPesertaRepository $user,CertificateRepository $certificate, CertificateService $serviceCertificate,CertificateCategoriRepositori $category, PesertaService $peserta)
    {
        $this->user = $user;
        $this->certificate = $certificate;
        $this->categories = $category;
        $this->certificateService = $serviceCertificate;
        $this->peserta = $peserta;
    }

    public function index(Request $request){
        $certificates = $this->certificate->get();
        $categories = $this->categories->get();

        if($request->all()){
            $certificates = $this->certificateService->searchCertificates($request->all());
        }

        return view('admin.certificate.index', compact('certificates', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categories->get();
        return view('admin.certificate.create', compact('categories'));
    }
    public function createExist()
    {
        $categories = $this->categories->get();
        $peserta = $this->user->get();
        return view('admin.certificate.createExist', compact('categories', 'peserta'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->all();
        dd($data);
       $id = $this->peserta->store($data);
       $this->certificateService->create($data, $id);
       return redirect()->back();
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
        $User = $this->user->update($id,$user);
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
        dd($data);
        $this->certificateService->create($data);
        return redirect()->back();
    }
}
