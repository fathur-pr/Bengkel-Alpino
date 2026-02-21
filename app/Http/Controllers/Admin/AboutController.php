<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        // Mengambil semua data sejarah
        $abouts = About::latest()->get();
        return view('admin.about.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only(['judul', 'deskripsi']);
        
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('about', 'public');
        }

        About::create($data);
        return redirect()->route('admin.about.index')->with('success', 'Sejarah Alpino berhasil ditambahkan!');
    }

    // Menggunakan Route Model Binding (About $about) agar lebih profesional
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only(['judul', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama agar storage tidak penuh
            if ($about->gambar) {
                Storage::disk('public')->delete($about->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('about', 'public');
        }

        $about->update($data);
        return redirect()->route('admin.about.index')->with('success', 'Data sejarah berhasil diperbarui!');
    }
    
    public function destroy(About $about)
    {
        if ($about->gambar) {
            Storage::disk('public')->delete($about->gambar);
        }
        $about->delete();
        
        return redirect()->route('admin.about.index')->with('success', 'Data sejarah berhasil dihapus!');
    }
}