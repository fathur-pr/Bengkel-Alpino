<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Memanggil data produk
use App\Models\Visitor; // Memanggil data pengunjung

class AdminController extends Controller
{
    public function index()
    {
        // Hitung total data sungguhan dari database
        $totalKatalog = Product::count();
        $totalPengunjung = Visitor::count();

        // Kirim datanya ke halaman dashboard
        return view('admin.dashboard', compact('totalKatalog', 'totalPengunjung'));
    }
}