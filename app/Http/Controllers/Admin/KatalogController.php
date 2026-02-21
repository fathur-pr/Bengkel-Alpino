<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KatalogController extends Controller
{
    public function index()
    {
        // Menggunakan pagination agar sinkron dengan halaman depan
        $products = Product::latest()->paginate(10);
        return view('admin.katalog.index', compact('products'));
    }

    public function create()
    {
        return view('admin.katalog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk'    => 'required|string|max:255',
            'harga'          => 'required|numeric',
            'engine_type'    => 'required|in:bensin,diesel',
            'component_type' => 'required|string',
            'deskripsi'      => 'nullable|string', // <-- TAMBAHAN JALUR DESKRIPSI
            'gambar'         => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Simpan Gambar
        $path = $request->file('gambar')->store('products', 'public');

        // Simpan Data ke Database
        Product::create([
            'nama_produk'    => $request->nama_produk,
            'harga'          => $request->harga,
            'engine_type'    => $request->engine_type,
            'component_type' => $request->component_type,
            'deskripsi'      => $request->deskripsi, // <-- TAMBAHAN SIMPAN DESKRIPSI
            'gambar'         => $path,
        ]);

        return redirect()->route('admin.katalog.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $katalog) 
    {
        $product = $katalog;
        return view('admin.katalog.edit', compact('product'));
    }

    public function update(Request $request, Product $katalog)
    {
        $request->validate([
            'nama_produk'    => 'required|string|max:255',
            'harga'          => 'required|numeric',
            'engine_type'    => 'required|in:bensin,diesel',
            'component_type' => 'required|string',
            'deskripsi'      => 'nullable|string', // <-- TAMBAHAN JALUR DESKRIPSI
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = [
            'nama_produk'    => $request->nama_produk,
            'harga'          => $request->harga,
            'engine_type'    => $request->engine_type,
            'component_type' => $request->component_type,
            'deskripsi'      => $request->deskripsi, // <-- TAMBAHAN SIMPAN DESKRIPSI
        ];

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama agar tidak menumpuk
            if ($katalog->gambar) {
                Storage::disk('public')->delete($katalog->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('products', 'public');
        }

        $katalog->update($data);

        return redirect()->route('admin.katalog.index')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(Product $katalog)
    {
        // Hapus file gambar dari storage sebelum data di DB dihapus
        if ($katalog->gambar) {
            Storage::disk('public')->delete($katalog->gambar);
        }

        $katalog->delete();

        return redirect()->route('admin.katalog.index')->with('success', 'Produk berhasil dihapus');
    }
}