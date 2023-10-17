<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Services\PesertaService;
use App\Models\CertificateCategori;
use App\Services\CertificateService;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Contracts\Repositories\CertificateRepository;
use App\Contracts\Repositories\DaftarPesertaRepository;
use App\Contracts\Repositories\CertificateCategoriRepositori;

class PesertaController extends Controller
{
    private $user;
    private $certificate;
    private $serviceCertificate;
    private CertificateCategoriRepositori $categori;
    private PesertaService $peserta;

    public function __construct(DaftarPesertaRepository $user,CertificateRepository $certificate, CertificateService $serviceCertificate,CertificateCategoriRepositori $categori, PesertaService $peserta)
    {
        $this->user = $user;
        $this->certificate = $certificate;
        $this->certificateService = $serviceCertificate;
        $this->categories = $categori;
        $this->peserta = $peserta;
    }

    public function index(){
        return view('admin.certificate.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = $this->categories->get();
        return view('admin.certificate.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
       $uniq = User::count() +1;
       $data = $request->all();
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
}
