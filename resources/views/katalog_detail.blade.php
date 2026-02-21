<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->nama_produk }} | Alpino Jakarta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { margin: 0; font-family: 'Poppins', sans-serif; background: #f8f9fa; color: #333; }
        nav { background: #1e293b; color: white; padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.3); }
        .brand { font-size: 22px; font-weight: 700; color: #ff8e53; text-decoration: none; display: flex; align-items: center; gap: 10px; }
        
        .detail-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; display: flex; gap: 40px; flex-wrap: wrap; }
        .image-box { flex: 1; min-width: 300px; background: white; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: center; }
        .image-box img { width: 100%; max-height: 400px; object-fit: contain; }
        
        .info-box { flex: 1; min-width: 300px; }
        .badge { background: #1e293b; color: white; padding: 6px 15px; border-radius: 50px; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 1px; }
        .title { font-size: 36px; font-weight: 800; color: #1e293b; margin: 15px 0; }
        .price { font-size: 28px; font-weight: 700; color: #ff8e53; margin-bottom: 25px; }
        
        .description-box { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.03); margin-bottom: 30px; }
        .description-box h4 { margin-top: 0; color: #1e293b; font-size: 18px; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px; }
        .description-box p { color: #475569; line-height: 1.8; white-space: pre-line; }

        .btn-wa { background: #25d366; color: white; padding: 15px 30px; border-radius: 50px; text-decoration: none; font-weight: 700; display: inline-flex; align-items: center; gap: 10px; font-size: 16px; transition: 0.3s; box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3); }
        .btn-wa:hover { transform: translateY(-5px); background: #20b858; }
        .btn-back { display: inline-block; margin-top: 20px; color: #64748b; text-decoration: none; font-weight: 600; }
        .btn-back:hover { color: #ff8e53; }
    </style>
</head>
<body>

<nav>
    <a href="/" class="brand"><i class="fa-solid fa-wrench"></i> ALPINO JAKARTA</a>
    <a href="/" style="color: white; text-decoration: none; font-weight: 600;">Kembali ke Beranda</a>
</nav>

<div class="detail-container">
    <div class="image-box">
        <img src="{{ asset('storage/'.$product->gambar) }}" alt="{{ $product->nama_produk }}">
    </div>

    <div class="info-box">
        <span class="badge">Mobil {{ ucfirst($product->engine_type ?? 'Umum') }}</span>
        <h1 class="title">{{ $product->nama_produk }}</h1>
        <div class="price">Rp {{ number_format($product->harga,0,',','.') }}</div>

        <div class="description-box">
            <h4>Deskripsi Produk</h4>
            <p>{{ $product->deskripsi ?? 'Belum ada deskripsi untuk produk ini. Silakan hubungi admin untuk informasi lebih lanjut.' }}</p>
        </div>

        <a href="https://wa.me/6281219740677?text=Halo%20Admin%20Alpino,%20saya%20tertarik%20dengan%20produk%20*{{ $product->nama_produk }}*%20(Rp%20{{ number_format($product->harga,0,',','.') }}).%20Apakah%20stoknya%20tersedia?" target="_blank" class="btn-wa">
            <i class="fab fa-whatsapp" style="font-size: 24px;"></i> Tanya Produk Ini
        </a>
        <br>
        <a href="/#katalog" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali ke Katalog Utama</a>
    </div>
</div>

</body>
</html>