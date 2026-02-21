<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\About; // <-- WAJIB: Import model About agar tidak error Undefined variable
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * 1. Tampilan Katalog Lengkap (Dashboard Publik)
     * Fungsi ini untuk menampilkan SEMUA produk yang dipisah Bensin & Diesel
     */
    public function index()
    {
        // Ambil semua produk tanpa batas (get) agar bisa dipisah di view
        $products = Product::latest()->get();

        // Ambil data 'Tentang Alpino' agar bagian sejarah di bawah tidak error
        $abouts = About::latest()->get(); 

        // Return ke view katalog_lengkap yang sudah kita buat tadi
        return view('katalog_lengkap', compact('products', 'abouts'));
    }

    /**
     * 2. Tampilan Detail Produk
     * Fungsi ini untuk melihat spesifikasi satu produk saja
     */
    public function show($id)
    {
        // Mencari produk berdasarkan ID, jika tidak ada akan otomatis 404
        $product = Product::findOrFail($id); 
        
        return view('katalog.detail', compact('product'));
    }

    // Fungsi untuk menampilkan full artikel Tentang Alpino
    public function aboutDetail($id)
    {
        $about = \App\Models\About::findOrFail($id);
        return view('tentang_detail', compact('about'));
    }
}