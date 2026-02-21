<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $about->judul }} | Alpino Jakarta</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f1f5f9; color: #1e293b; margin: 0; padding: 40px 20px; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .btn-back { display: inline-flex; align-items: center; gap: 8px; color: #ff8e53; text-decoration: none; font-weight: 600; margin-bottom: 30px; transition: 0.3s; padding: 10px 20px; background: #fff7ed; border-radius: 50px; }
        .btn-back:hover { transform: translateX(-5px); background: #ffedda; }
        .article-title { font-size: 36px; font-weight: 800; margin-bottom: 25px; line-height: 1.3; }
        .article-img { width: 100%; max-height: 450px; object-fit: cover; border-radius: 15px; margin-bottom: 35px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
        .article-text { line-height: 1.9; color: #4b5563; font-size: 16px; text-align: justify; }
    </style>
</head>
<body>
    <div class="container">
        <a href="/#tentang" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
        
        <h1 class="article-title">{{ $about->judul }}</h1>
        
        @if($about->gambar)
            <img src="{{ asset('storage/'.$about->gambar) }}" class="article-img" alt="{{ $about->judul }}">
        @endif
        
        <div class="article-text">
            {{-- Mengubah enter di database menjadi garis baru (<br>) di web --}}
            {!! nl2br(e($about->deskripsi)) !!}
        </div>
    </div>
</body>
</html>