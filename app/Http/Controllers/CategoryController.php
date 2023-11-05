<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CertificateCategori;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'namaKategori' => 'required|string|max:255',
            'depan' => 'required|image|mimes:jpeg,png,jpg,gif',
            'belakang' => 'required|image|mimes:jpeg,png,jpg,gif',
            'tataletak' => 'required|string|max:255',
        ]);

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
        $category = CertificateCategori::findOrFail($id);


        if ($category->background_depan) {
            if (File::exists($category->background_depan)) {
                File::delete($category->background_depan);
            }
        }

        if ($category->background_belakang) {
            if (File::exists($category->background_belakang)) {
                File::delete($category->background_belakang);
            }
        }

        $name = $category->name;
        $category->delete();

        return back()->with('message', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Berhasil menghapus category ' . $name
        ]);
    }

    // Bukan CRUD
    public function preview(Request $request, string $ct)
    {
        $categoryTataLetak = strtolower($ct);
        return view('admin.certificate.preview.' . $categoryTataLetak);
    }
}
