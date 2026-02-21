@extends('layouts.admin')

@section('content')
<div style="padding: 40px;">
    
    <div style="margin-bottom: 40px;">
        <h1 style="font-size: 28px; font-weight: 700; color: #1e293b;">Halo, Admin Alpino! 👋</h1>
        <p style="color: #64748b;">Ringkasan aktivitas pengelolaan katalog Alpino Jakarta hari ini.</p>
    </div>

    {{-- KOTAK STATISTIK --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; margin-bottom: 40px;">
        <div style="background: white; padding: 25px; border-radius: 20px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 10px 25px rgba(0,0,0,0.02); border-bottom: 4px solid #3b82f6;">
            <div>
                <h3 style="font-size: 14px; color: #64748b; text-transform: uppercase;">Total Katalog</h3>
                <p style="font-size: 32px; font-weight: 700; color: #1e293b; margin: 0;">{{ \App\Models\Product::count() }}</p>
            </div>
            <div style="font-size: 30px; color: #3b82f6;"><i class="fas fa-boxes-stacked"></i></div>
        </div>

        <div style="background: white; padding: 25px; border-radius: 20px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 10px 25px rgba(0,0,0,0.02); border-bottom: 4px solid #ff8e53;">
            <div>
                <h3 style="font-size: 14px; color: #64748b; text-transform: uppercase;">Total Pengunjung</h3>
                <p style="font-size: 32px; font-weight: 700; color: #1e293b; margin: 0;">{{ \App\Models\Visitor::count() }}</p>
            </div>
            <div style="font-size: 30px; color: #ff8e53;"><i class="fas fa-users"></i></div>
        </div>
    </div>

    {{-- LANGKAH CEPAT --}}
    <div style="background: white; padding: 35px; border-radius: 24px; box-shadow: 0 10px 40px rgba(0,0,0,0.03);">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 25px; border-bottom: 1px solid #f1f5f9; padding-bottom: 15px;">
            <i class="fas fa-rocket" style="color: #ff8e53; font-size: 20px;"></i>
            <h2 style="font-size: 20px; font-weight: 600; margin: 0;">Langkah Cepat</h2>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <a href="{{ route('admin.katalog.index') }}" style="padding: 20px; background: #f8fafc; border-radius: 15px; display: flex; align-items: center; gap: 15px; text-decoration: none; color: #1e293b; border: 1px solid transparent; transition: 0.3s;" onmouseover="this.style.background='white'; this.style.borderColor='#ff8e53'; this.style.boxShadow='0 5px 15px rgba(255,142,83,0.1)'" onmouseout="this.style.background='#f8fafc'; this.style.borderColor='transparent'; this.style.boxShadow='none'">
                <div style="width: 45px; height: 45px; background: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #ff8e53; box-shadow: 0 4px 10px rgba(0,0,0,0.05); font-size: 20px;">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <div>
                    <b style="display: block; font-size: 16px;">Kelola Katalog Produk</b>
                    <span style="font-size: 13px; color: #64748b;">Tambah foto & stok knalpot.</span>
                </div>
            </a>

            <a href="{{ route('admin.about.index') }}" style="padding: 20px; background: #f8fafc; border-radius: 15px; display: flex; align-items: center; gap: 15px; text-decoration: none; color: #1e293b; border: 1px solid transparent; transition: 0.3s;" onmouseover="this.style.background='white'; this.style.borderColor='#ff8e53'; this.style.boxShadow='0 5px 15px rgba(255,142,83,0.1)'" onmouseout="this.style.background='#f8fafc'; this.style.borderColor='transparent'; this.style.boxShadow='none'">
                <div style="width: 45px; height: 45px; background: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #ff8e53; box-shadow: 0 4px 10px rgba(0,0,0,0.05); font-size: 20px;">
                    <i class="fas fa-edit"></i>
                </div>
                <div>
                    <b style="display: block; font-size: 16px;">Update Sejarah Alpino</b>
                    <span style="font-size: 13px; color: #64748b;">Ubah profil & sejarah bengkel.</span>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection