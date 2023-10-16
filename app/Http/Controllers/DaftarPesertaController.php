<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Certificate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\CertificateCategori;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCategoriCertificate;
use App\Contracts\Repositories\CertificateRepository;
use App\Contracts\Repositories\userCategoriRepositori;
use App\Contracts\Repositories\DaftarPesertaRepository;

class DaftarPesertaController extends Controller
{
    private DaftarPesertaRepository $User;
    private CertificateRepository $Certificate;

    public function __construct(DaftarPesertaRepository $User,CertificateRepository $Certificate)
    {
        $this->User = $User;
        $this->certificate = $Certificate;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $User = $this->User->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user_id = Auth::id();
        $User = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'certificate_categori_id' => $request->certificate_categori_id,
            'tanggal' => $request->tanggal,
            'divisions' => $request->divisions,

        ];
        $this->User->store($User);
        $user = User::where('name', $request->name)->first();
        if ($user) {
            $certificate = [
                'user_id' => $user->id,
                'certificate_categori_id' => $request->certificate_categori_id,
                'tanggal' => $request->tanggal,
                'divisions' => $request->divisions,
            ];
            $this->certificate->store($certificate);
        } else {
            dd("Pengguna tidak ditemukan");
        }
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
    public function update( string $id)
    {
        $user = [
            'name' => 'mantap',
        ];
        $User = $this->User->update($id,$user);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $User = $this->User->delete($id);
        return redirect()->back();
    }
}
