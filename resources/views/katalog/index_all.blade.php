@extends('layouts.app') {{-- Pastikan mimin punya layout induk, atau copas navbar/footer manual --}}

@section('content')
<div style="padding: 120px 50px 80px; background: #f1f5f9; min-height: 100vh;">
    <div style="text-align: center; margin-bottom: 50px;">
        <h1 style="font-weight: 800; color: #1e293b; text-transform: uppercase;">Katalog Lengkap Alpino</h1>
        <p style="color: #64748b;">Temukan komponen exhaust terbaik untuk performa kendaraan Anda</p>
    </div>

    {{-- GRUP MOBIL BENSIN --}}
    <div style="margin-bottom: 80px;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px; border-left: 5px solid #ff8e53; padding-left: 15px;">
            <h2 style="margin: 0; font-size: 24px;">Koleksi Mobil Bensin</h2>
            <span style="background: #ff8e53; color: white; padding: 2px 12px; border-radius: 50px; font-size: 12px;">Gasoline</span>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px;">
            @foreach($products->where('engine_type', 'bensin') as $product)
            <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.05);">
                <a href="{{ route('katalog.detail', $product->id) }}" style="text-decoration: none; color: inherit;">
                    <img src="{{ asset('storage/'.$product->gambar) }}" style="width: 100%; height: 220px; object-fit: contain; padding: 15px; background: #f8fafc;">
                    <div style="padding: 20px;">
                        {{-- MENAMPILKAN TIPE KOMPONEN SESUAI PERMINTAAN --}}
                        <span style="font-size: 11px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px;">{{ $product->component_type ?? 'Komponen' }}</span>
                        <h3 style="margin: 5px 0 10px 0; font-size: 18px; color: #1e293b;">{{ $product->nama_produk }}</h3>
                        <p style="color: #ff8e53; font-weight: 800; font-size: 19px; margin: 0;">Rp {{ number_format($product->harga,0,',','.') }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <hr style="border: 0; border-top: 2px dashed #cbd5e1; margin: 50px 0;">

    {{-- GRUP MOBIL DIESEL --}}
    <div>
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px; border-left: 5px solid #1e293b; padding-left: 15px;">
            <h2 style="margin: 0; font-size: 24px;">Koleksi Mobil Diesel</h2>
            <span style="background: #1e293b; color: white; padding: 2px 12px; border-radius: 50px; font-size: 12px;">Diesel Power</span>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px;">
            @foreach($products->where('engine_type', 'diesel') as $product)
            <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.05);">
                <a href="{{ route('katalog.detail', $product->id) }}" style="text-decoration: none; color: inherit;">
                    <img src="{{ asset('storage/'.$product->gambar) }}" style="width: 100%; height: 220px; object-fit: contain; padding: 15px; background: #f8fafc;">
                    <div style="padding: 20px;">
                        {{-- MENAMPILKAN TIPE KOMPONEN --}}
                        <span style="font-size: 11px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px;">{{ $product->component_type ?? 'Komponen' }}</span>
                        <h3 style="margin: 5px 0 10px 0; font-size: 18px; color: #1e293b;">{{ $product->nama_produk }}</h3>
                        <p style="color: #ff8e53; font-weight: 800; font-size: 19px; margin: 0;">Rp {{ number_format($product->harga,0,',','.') }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection