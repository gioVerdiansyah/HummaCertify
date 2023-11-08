<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CertificateCategori;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = CertificateCategori::paginate(9);
        $certificate = Certificate::all();
        $exist = [];

        foreach ($certificate as $c) {
            $exist[] = $c->certificate_categori_id;
        }

        $query = CertificateCategori::query(); // Start a query builder instance

        if (!isset($request['restore'])) {
            $query->whereNull('deleted_at'); // Filter categories where deleted_at is null
        } elseif (isset($request['restore'])) {
            $restore = $request['restore'];
            $query->whereNotNull('deleted_at'); // Filter categories where deleted_at is not null (restored categories)
        }

        $categories = $query->paginate(9); // Execute the query and paginate the results

        return view('admin.certificate.category.index', compact("categories", "exist"));
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

        if ($category) {
            return redirect()->route('category.index')->with('message', [
                'icon' => "success",
                'title' => 'Berhasil!',
                'text' => "Berhasil mengubah kategori {$category->name}"
            ]);
        } else {
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CertificateCategori::findOrFail($id);

        try {
            DB::beginTransaction();
            $name = $category->name;
            $bgDepan = $category->background_depan;
            $bgBelakang = $category->background_belakang;
            $category->delete();

            if ($bgDepan) {
                if (File::exists($bgDepan)) {
                    File::delete($bgDepan);
                }
            }

            if ($bgBelakang) {
                if (File::exists($bgBelakang)) {
                    File::delete($bgBelakang);
                }
            }
            DB::commit();
        } catch (Exception $c) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Kategori ' . $name . ' sedang di gunakan'
            ]);
        }

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
