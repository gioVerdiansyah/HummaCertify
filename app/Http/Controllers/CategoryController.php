<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContactMe;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\CertificateCategori;
use App\Http\Controllers\Controller;
use App\Services\DetailCertificateService;
use App\Http\Requests\DetailCertificateStoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.certificate.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $category = CertificateCategori::all();
        $certificateCategoryCount = CertificateCategori::count();

        return view('admin.certificate.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'namaKategori' => 'required|string|max:255',
        //     'depan' => 'required|image|mimes:jpeg,png,jpg,gif',
        //     'belakang' => 'required|image|mimes:jpeg,png,jpg,gif',
        //     'tataletak' => 'required|string|max:255',
        // ]);

        $depan = $request->file('depan');
        $belakang = $request->file('belakang');

        $nameBgDepan = $depan->hashName();
        $nameBgBelakang = $belakang->hashName();

        $pass = CertificateCategori::create([
            'name' => $request->namaKategori,
            'backgroundDepan' => $nameBgDepan,
            'backgroundBelakang' => $nameBgBelakang,
            'tataLetak' => $request->tataletak,
        ]);

        $depan->move('public/depanBg/', $nameBgDepan);
        $belakang->move('public/belakangBg/', $nameBgBelakang);

        return redirect()->back()->with('message', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Berhasil menambahkan kategori'
        ]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    // Bukan CRUD
    public function preview(Request $request, string $ct){
        $categoryTataLetak = strtolower($ct);
        return view('admin.certificate.preview.' . $categoryTataLetak);
    }
}
