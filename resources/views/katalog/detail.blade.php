<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Alpino Jakarta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f6f9; }
        .navbar { background: #1e293b; }
        .price-tag { color: #ff8e53; font-weight: bold; font-size: 2rem; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark py-3 mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold text-uppercase" href="/" style="color: #ff8e53; display: flex; align-items: center; gap: 10px; font-size: 22px; letter-spacing: 1px;">
    <i class="fas fa-wrench"></i> ALPINO JAKARTA
</a>
            <div class="d-flex">
                <a href="/#katalog" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Katalog
                </a>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="card shadow-lg border-0 overflow-hidden rounded-4">
            <div class="row g-0">
                <div class="col-md-6 bg-light p-4 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('storage/' . $product->gambar) }}" class="img-fluid rounded shadow-sm" alt="{{ $product->nama_produk }}" style="width: 100%; height: auto; object-fit: contain;">
                </div>
                
                <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
                    <h5 class="text-muted text-uppercase fw-bold mb-2">Mobil {{ ucfirst($product->engine_type ?? 'Umum') }}</h5>
                    <h1 class="fw-bold mb-3 display-6">{{ $product->nama_produk }}</h1>
                    
                    <h2 class="price-tag mb-4">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </h2>

                    <div class="mb-4">
                        <p class="text-muted" style="line-height: 1.8; white-space: pre-line;">
                            {{ $product->deskripsi ?? 'Deskripsi produk belum tersedia. Hubungi admin untuk detail lebih lanjut.' }}
                        </p>
                    </div>

                    <hr class="mb-4">

                    <div class="d-grid gap-3">
                        <a href="https://wa.me/6281219740677?text=Halo%20Admin%20Alpino,%20saya%20mau%20tanya-tanya%20dulu%20tentang%20produk%20*{{ $product->nama_produk }}*%20(Rp%20{{ number_format($product->harga,0,',','.') }}).%20Bisa%20dibantu?" target="_blank" class="btn btn-success btn-lg fw-bold py-3 rounded-pill shadow" style="background: #25d366; border: none;">
                            <i class="fab fa-whatsapp me-2"></i> Tanya Admin via WA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>