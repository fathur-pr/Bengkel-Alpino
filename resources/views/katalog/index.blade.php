<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Sparepart - Alpino Jakarta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f6f9; }
        .navbar { background: #2c3e50; }
        .card { transition: transform 0.2s; border: none; border-radius: 12px; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .price-tag { color: #e74c3c; font-weight: bold; font-size: 1.1rem; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark py-3 mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/dashboard') }}">
                <i class="fas fa-wrench me-2"></i> Alpino Jakarta
            </a>
            <div class="d-flex">
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Katalog Alpino Jakarta</h2>
            <p class="text-muted">Pilih produk terbaik untuk mobil kesayangan Anda</p>
        </div>
        
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            @forelse($products as $product)
            <div class="col">
                <a href="{{ route('katalog.detail', $product->id) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/'. $product->gambar) }}" class="card-img-top" alt="{{ $product->nama_produk }}" style="height: 200px; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                        
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-1">{{ $product->nama_produk }}</h5>
                            <p class="price-tag mb-0">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <button class="btn btn-primary w-100 btn-sm rounded-pill">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i> Belum ada produk di katalog. Silakan input database dulu.
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
