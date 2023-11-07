<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CertificateCategori;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CertificateCategori::paginate(9);
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
    public function store(CategoryStoreRequest $request)
    {
        $depan = $request->file('depan');
        $belakang = $request->file('belakang');

        $bgDepanName = $depan->hashName();
        $bgBelakangName = $belakang->hashName();

        CertificateCategori::create([
            'name' => ucfirst($request->namaKategori),
            'background_depan' => 'storage/bgdepan/' . $bgDepanName,
            'background_belakang' => 'storage/bgbelakang/' . $bgBelakangName,
            'tata_letak' => $request->tataletak,
        ]);

        $depan->storeAs('bgdepan', $bgDepanName);
        $belakang->storeAs('bgbelakang', $bgBelakangName);

        return redirect()->route('category.index')->with('message', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Berhasil menambahkan kategori ' . ucfirst($request->namaKategori)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = CertificateCategori::all();
        $category = CertificateCategori::where('id', $id)->firstOrFail();
        return view('admin.certificate.category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $category = CertificateCategori::where('id', $id)->firstOrFail();

        $data = [
            'name' => ucfirst($request->namaKategori),
            'tata_letak' => $request->tataletak,
        ];

        if ($request->hasFile('depan')) {
            $depan = $request->file('depan');
            $existingDepan = public_path($category->background_depan);
            if (file_exists($existingDepan)) {
                unlink($existingDepan);
            }
            $bgDepanName = $depan->hashName();
            $depanPath = 'storage/bgdepan/' . $bgDepanName;
            $depan->storeAs('bgdepan/', $bgDepanName);
            $data['background_depan'] = $depanPath;
        }

        if ($request->hasFile('belakang')) {
            $belakang = $request->file('belakang');
            $existingBelakang = public_path($category->background_belakang);
            if (file_exists($existingBelakang)) {
                unlink($existingBelakang);
            }
            $bgBelakangName = $belakang->hashName();
            $belakangPath = 'storage/bgbelakang/' . $bgBelakangName;
            $belakang->storeAs('bgbelakang/', $bgBelakangName);
            $data['background_belakang'] = $belakangPath;
        }

        // proses update
        $category->update($data);

        return redirect()->route('category.index')->with('message', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Berhasil mengubah kategori'
        ]);
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
