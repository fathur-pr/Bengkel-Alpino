<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KatalogController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AboutController;

// --- HALAMAN PUBLIK ---
Route::get('/', function () {
    \App\Models\Visitor::firstOrCreate(['ip_address' => request()->ip()]);
    $products = \App\Models\Product::latest()->paginate(8);
    $abouts = \App\Models\About::latest()->get(); 
    return view('welcome', compact('products', 'abouts'));
})->name('welcome');

Route::get('/katalog-lengkap', [ProductController::class, 'index'])->name('katalog.all');
Route::get('/katalog/{id}', [ProductController::class, 'show'])->name('katalog.detail');
Route::get('/tentang/{id}', [App\Http\Controllers\ProductController::class, 'aboutDetail'])->name('about.detail');

// --- LOGIN ADMIN ---
Route::get('/masok/alpino', [AdminLoginController::class, 'showLogin'])->name('admin.login');
Route::post('/masok/alpino', [AdminLoginController::class, 'login'])->name('admin.login.post');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

// --- AREA ADMIN ---
Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Redirect /admin ke /admin/dashboard agar tidak 404
    Route::get('/', function () { return redirect()->route('admin.dashboard'); });
    
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('katalog', KatalogController::class)->names('admin.katalog');
    Route::resource('about', AboutController::class)->names('admin.about');
});