@extends('layouts.admin')

@section('content')
<div style="padding: 40px; background: #f8fafc; min-height: 100vh;">
    
    {{-- HEADER SECTION --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px;">
        <div>
            <div style="display: flex; align-items: center; gap: 8px; font-size: 13px; color: #94a3b8; margin-bottom: 8px;">
                <a href="{{ route('admin.dashboard') }}" style="color: #94a3b8; text-decoration: none;">Dashboard</a>
                <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                <span style="color: #ff8e53; font-weight: 600;">Katalog Produk</span>
            </div>
            <h1 style="font-weight: 800; color: #1e293b; margin: 0; font-size: 28px;">Manajemen Katalog</h1>
            <p style="color: #64748b; margin-top: 5px;">Total {{ $products->total() }} produk terdaftar di sistem Alpino Jakarta.</p>
        </div>
        
        <a href="{{ route('admin.katalog.create') }}" style="background: #ff8e53; color: white; padding: 12px 25px; border-radius: 14px; text-decoration: none; font-weight: 700; display: flex; align-items: center; gap: 10px; box-shadow: 0 10px 20px rgba(255,142,83,0.3); transition: 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='none'">
            <i class="fas fa-plus"></i> Tambah Produk Baru
        </a>
    </div>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
    <div style="background: #dcfce7; color: #15803d; padding: 15px 25px; border-radius: 14px; margin-bottom: 30px; display: flex; align-items: center; gap: 12px; border: 1px solid #bbf7d0; animation: slideIn 0.5s ease-out;">
        <i class="fas fa-check-circle fa-lg"></i> 
        <span style="font-weight: 600;">{{ session('success') }}</span>
    </div>
    @endif

    {{-- TABLE CARD --}}
    <div style="background: white; border-radius: 24px; box-shadow: 0 10px 40px rgba(0,0,0,0.03); overflow: hidden; border: 1px solid #f1f5f9;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 1px solid #f1f5f9;">
                    <th style="padding: 22px 20px; color: #64748b; font-size: 12px; text-transform: uppercase; letter-spacing: 1.2px; font-weight: 700;">Gambar</th>
                    <th style="padding: 22px 20px; color: #64748b; font-size: 12px; text-transform: uppercase; letter-spacing: 1.2px; font-weight: 700;">Info Produk</th>
                    <th style="padding: 22px 20px; color: #64748b; font-size: 12px; text-transform: uppercase; letter-spacing: 1.2px; font-weight: 700;">Mesin</th>
                    <th style="padding: 22px 20px; color: #64748b; font-size: 12px; text-transform: uppercase; letter-spacing: 1.2px; font-weight: 700;">Harga Satuan</th>
                    <th style="padding: 22px 20px; color: #64748b; font-size: 12px; text-transform: uppercase; letter-spacing: 1.2px; font-weight: 700; text-align: center;">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr style="border-bottom: 1px solid #f8fafc; transition: 0.3s;" onmouseover="this.style.background='#fff9f6'" onmouseout="this.style.background='white'">
                    <td style="padding: 18px 20px;">
                        <img src="{{ asset('storage/'.$product->gambar) }}" style="width: 75px; height: 75px; border-radius: 16px; object-fit: cover; box-shadow: 0 5px 15px rgba(0,0,0,0.06); border: 2px solid #fff;">
                    </td>
                    <td style="padding: 18px 20px;">
                        <div style="font-weight: 700; color: #1e293b; font-size: 16px; margin-bottom: 4px;">{{ $product->nama_produk }}</div>
                        <div style="color: #94a3b8; font-size: 12px; display: flex; align-items: center; gap: 5px;">
                            <i class="fas fa-tag" style="font-size: 10px;"></i> {{ $product->component_type }}
                        </div>
                    </td>
                    <td style="padding: 18px 20px;">
                        <span style="display: inline-flex; align-items: center; gap: 6px; background: {{ $product->engine_type == 'bensin' ? '#fff7ed' : '#f1f5f9' }}; color: {{ $product->engine_type == 'bensin' ? '#f97316' : '#475569' }}; padding: 6px 16px; border-radius: 50px; font-size: 11px; font-weight: 800; text-transform: uppercase; border: 1px solid {{ $product->engine_type == 'bensin' ? '#ffedd5' : '#e2e8f0' }};">
                            <i class="fas {{ $product->engine_type == 'bensin' ? 'fa-gas-pump' : 'fa-truck-monster' }}" style="font-size: 10px;"></i>
                            {{ $product->engine_type }}
                        </span>
                    </td>
                    <td style="padding: 18px 20px;">
                        <div style="font-weight: 800; color: #1e293b; font-size: 17px;">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>
                    </td>
                    <td style="padding: 18px 20px;">
                        <div style="display: flex; gap: 12px; justify-content: center;">
                            <a href="{{ route('admin.katalog.edit', $product->id) }}" style="width: 42px; height: 42px; background: #eff6ff; color: #3b82f6; border-radius: 12px; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: 0.3s;" title="Edit Produk" onmouseover="this.style.background='#3b82f6'; this.style.color='#fff'" onmouseout="this.style.background='#eff6ff'; this.style.color='#3b82f6'">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.katalog.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus knalpot {{ $product->nama_produk }} ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" style="width: 42px; height: 42px; background: #fef2f2; color: #ef4444; border-radius: 12px; border: none; cursor: pointer; transition: 0.3s; display: flex; align-items: center; justify-content: center;" title="Hapus Produk" onmouseover="this.style.background='#ef4444'; this.style.color='#fff'" onmouseout="this.style.background='#fef2f2'; this.style.color='#ef4444'">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="padding: 60px 20px; text-align: center;">
                        <div style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
                            <i class="fas fa-box-open" style="font-size: 50px; color: #e2e8f0;"></i>
                            <div style="color: #94a3b8; font-weight: 500;">Belum ada produk yang ditambahkan.</div>
                            <a href="{{ route('admin.katalog.create') }}" style="color: #ff8e53; font-weight: 700; text-decoration: none; border-bottom: 2px solid #ff8e53; padding-bottom: 2px;">Mulai tambah produk pertama kamu &rarr;</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        {{-- PAGINATION --}}
        @if($products->hasPages())
        <div style="padding: 25px 20px; background: #f8fafc; border-top: 1px solid #f1f5f9;">
            {{ $products->links() }}
        </div>
        @endif
    </div>
</div>

<style>
    @keyframes slideIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection