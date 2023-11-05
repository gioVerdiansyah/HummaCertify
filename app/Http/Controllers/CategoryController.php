<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContactMe;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\CertificateCategori;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CertificateCategori::all();
        return view('admin.certificate.category.index', compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CertificateCategori::all();

        return view('admin.certificate.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $depan = $request->file('depan');
        $belakang = $request->file('belakang');

        CertificateCategori::create([
            'name' => $request->namaKategori,
            'background_depan' => 'image/bgdepan/' . $depan->hashName(),
            'background_belakang' => 'image/bgbelakang/' . $belakang->hashName(),
            'tata_letak' => $request->tataletak,
        ]);

        $depan->move('image/bgdepan/', $depan->hashName());
        $belakang->move('image/bgbelakang', $belakang->hashName());

        return redirect()->route('category.index')->with('message', [
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
        $categories = CertificateCategori::all();
        $category = CertificateCategori::where('id', $id)->firstOrFail();
        return view('admin.certificate.category.edit', compact('categories','category'));
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
