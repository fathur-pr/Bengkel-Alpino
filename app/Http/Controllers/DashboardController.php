<?php

namespace App\Http\Controllers;

use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua produk untuk katalog publik
        $products = Product::latest()->get();

        return view('dashboard', compact('products'));
    }
}
