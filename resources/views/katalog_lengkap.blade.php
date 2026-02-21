<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Lengkap | Alpino Jakarta</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Fav.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- FONT & ICON --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * { box-sizing: border-box; scroll-behavior: smooth; }
        body { 
            font-family: 'Poppins', sans-serif; 
            background: #f1f5f9; 
            margin: 0; 
            color: #1e293b;
        }

        :root {
            --primary: #ff8e53;
            --dark: #1e293b;
        }

        .container { max-width: 1200px; margin: 0 auto; padding: 40px 20px; }

        /* ================= HEADER ================= */
        .header { 
            text-align: center; 
            margin-bottom: 60px; 
            padding: 40px 20px;
            background: var(--dark);
            border-radius: 30px;
            color: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .header h1 { font-size: 36px; font-weight: 800; text-transform: uppercase; margin: 0; letter-spacing: 2px; }
        .header p { opacity: 0.8; margin-top: 10px; }

        .btn-back { 
            text-decoration: none; 
            color: var(--primary); 
            font-weight: 700; 
            display: inline-flex; 
            align-items: center; 
            gap: 10px;
            margin-bottom: 25px;
            transition: 0.3s;
        }
        .btn-back:hover { transform: translateX(-5px); }

        /* ================= SECTION TITLE ================= */
        .section-separator {
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 50px 0 30px;
        }
        .section-separator h2 { 
            font-size: 24px; 
            font-weight: 800; 
            text-transform: uppercase; 
            margin: 0;
            white-space: nowrap;
        }
        .line { flex: 1; height: 3px; background: #cbd5e1; border-radius: 10px; }
        .engine-icon { 
            background: var(--primary); 
            color: white; 
            width: 45px; height: 45px; 
            border-radius: 12px; 
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
        }

        /* ================= GRID & CARD ================= */
        .grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); 
            gap: 30px; 
        }

        .card { 
            background: white; 
            border-radius: 20px; 
            overflow: hidden; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.05); 
            transition: 0.4s;
            border: 1px solid rgba(0,0,0,0.03);
            text-decoration: none;
            color: inherit;
        }
        .card:hover { transform: translateY(-10px); box-shadow: 0 15px 35px rgba(0,0,0,0.1); }

        .card-img-box {
            width: 100%;
            height: 230px;
            background: #f8fafc;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card img { width: 100%; height: 100%; object-fit: contain; }

        .card-body { padding: 25px; }

        /* TIPE KOMPONEN (FRONTPIPE, DLL) */
        .badge { 
            display: inline-block;
            background: #f1f5f9; 
            color: #64748b; 
            padding: 5px 15px; 
            border-radius: 50px; 
            font-size: 11px; 
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 12px;
            letter-spacing: 1px;
        }

        .card-body h3 { margin: 0 0 10px 0; font-size: 19px; font-weight: 700; color: var(--dark); line-height: 1.4; }
        .price { color: var(--primary); font-weight: 800; font-size: 22px; margin: 0; }

        /* EMPTY STATE */
        .empty-box { 
            grid-column: 1/-1; 
            text-align: center; 
            padding: 50px; 
            background: white; 
            border-radius: 20px; 
            border: 2px dashed #cbd5e1;
            color: #94a3b8;
        }

        @media(max-width: 768px) {
            .header h1 { font-size: 26px; }
            .grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="/" class="btn-back"><i class="fa-solid fa-arrow-left"></i> KEMBALI KE BERANDA</a>
        
        <div class="header">
            <h1>GARASI ALPINO JAKARTA</h1>
            <p>Koleksi Lengkap Komponen Exhaust Berperforma Tinggi</p>
        </div>

        {{-- SECTION MOBIL BENSIN --}}
        <div class="section-separator">
            <div class="engine-icon"><i class="fas fa-gas-pump"></i></div>
            <h2>Mobil Bensin</h2>
            <div class="line"></div>
        </div>

        <div class="grid">
            @forelse($products->where('engine_type', 'bensin') as $product)
                <a href="{{ route('katalog.detail', $product->id) }}" class="card">
                    <div class="card-img-box">
                        <img src="{{ asset('storage/'.$product->gambar) }}" alt="{{ $product->nama_produk }}">
                    </div>
                    <div class="card-body">
                        <span class="badge">{{ $product->component_type ?? 'Komponen' }}</span>
                        <h3>{{ $product->nama_produk }}</h3>
                        <p class="price">Rp {{ number_format($product->harga,0,',','.') }}</p>
                    </div>
                </a>
            @empty
                <div class="empty-box">
                    <i class="fas fa-box-open" style="font-size: 40px; margin-bottom: 15px;"></i>
                    <p>Produk bensin belum diinput oleh admin.</p>
                </div>
            @endforelse
        </div>

        {{-- SECTION MOBIL DIESEL --}}
        <div class="section-separator" style="margin-top: 80px;">
            <div class="engine-icon" style="background: #1e293b;"><i class="fas fa-truck-monster"></i></div>
            <h2>Mobil Diesel</h2>
            <div class="line"></div>
        </div>

        <div class="grid">
            @forelse($products->where('engine_type', 'diesel') as $product)
                <a href="{{ route('katalog.detail', $product->id) }}" class="card">
                    <div class="card-img-box">
                        <img src="{{ asset('storage/'.$product->gambar) }}" alt="{{ $product->nama_produk }}">
                    </div>
                    <div class="card-body">
                        <span class="badge">{{ $product->component_type ?? 'Komponen' }}</span>
                        <h3>{{ $product->nama_produk }}</h3>
                        <p class="price">Rp {{ number_format($product->harga,0,',','.') }}</p>
                    </div>
                </a>
            @empty
                <div class="empty-box">
                    <i class="fas fa-box-open" style="font-size: 40px; margin-bottom: 15px;"></i>
                    <p>Produk diesel belum diinput oleh admin.</p>
                </div>
            @endforelse
        </div>

        {{-- FOOTER SIMPEL --}}
        <div style="text-align: center; margin-top: 100px; padding-bottom: 50px; color: #94a3b8; font-size: 14px; border-top: 1px solid #e2e8f0; padding-top: 30px;">
            &copy; 2026 Alpino Jakarta. Menghadirkan Suara dan Performa Terbaik.
        </div>
    </div>

</body>
</html>