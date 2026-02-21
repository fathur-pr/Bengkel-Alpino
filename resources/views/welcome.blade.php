<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Alpino Jakarta | Bengkel Muffler Profesional</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Fav.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- FONT & ICON --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- AOS & SWIPER --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <style>
        * { box-sizing: border-box; scroll-behavior: smooth; }
        body { margin: 0; font-family: 'Poppins', sans-serif; background: #f1f5f9; color: #333; overflow-x: hidden; }
        :root { --primary: #ff8e53; --dark: #1e293b; }

        /* ================= NAVBAR ================= */
        nav {
            position: fixed; top: 0; width: 100%; background: var(--dark);
            padding: 15px 50px; display: flex; justify-content: space-between;
            align-items: center; z-index: 1001; box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }
        .brand-text {
            font-size: 22px; font-weight: 800; color: var(--primary);
            text-decoration: none; letter-spacing: 1px; display: flex; align-items: center; gap: 10px;
            text-transform: uppercase;
        }
        .nav-links a { color: white; text-decoration: none; margin-left: 30px; font-weight: 500; transition: 0.3s; }
        .nav-links a:hover { color: var(--primary); }

        /* MENU HP */
        .menu-toggle { display: none; color: white; font-size: 24px; cursor: pointer; }
        .sidebar { position: fixed; top: 0; right: -100%; width: 280px; height: 100vh; background: var(--dark); z-index: 1002; padding: 80px 30px; transition: 0.4s; }
        .sidebar.active { right: 0; }
        .sidebar a { display: block; color: white; text-decoration: none; font-size: 18px; margin-bottom: 25px; border-bottom: 1px solid #334155; padding-bottom: 10px; }
        .overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.6); display: none; z-index: 1001; }
        .overlay.active { display: block; }

        /* ================= HERO SLIDESHOW ================= */
        .swiper { height: 100vh; width: 100%; }
        .swiper-slide { background-size: cover; background-position: center; position: relative; }
        .hero-overlay {
            position: absolute; inset: 0; background: rgba(0,0,0,0.55);
            display: flex; flex-direction: column; justify-content: center; align-items: center;
            text-align: center; color: white; padding: 20px;
        }
        .hero-overlay h1 { font-size: 56px; font-weight: 800; text-transform: uppercase; margin: 0; }
        .btn-cta { margin-top: 25px; background: var(--primary); color: white; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: bold; transition: 0.3s; box-shadow: 0 10px 20px rgba(255,142,83,0.3); }

        /* ================= LAYANAN (3 CARD) ================= */
        .feature-container { display: flex; justify-content: center; gap: 25px; flex-wrap: wrap; margin-top: -60px; position: relative; z-index: 10; padding: 0 20px; }
        .feature-card { background: white; padding: 35px 25px; border-radius: 20px; width: 340px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); text-align: center; transition: 0.3s; }
        .feature-card i { font-size: 45px; color: var(--primary); margin-bottom: 20px; display: block; }

        /* ================= KATALOG & TAB ================= */
        .section { padding: 100px 50px; text-align: center; }
        .tab-container { display: flex; justify-content: center; gap: 15px; margin: 40px 0; }
        .tab-btn { padding: 12px 30px; border: 2px solid var(--primary); border-radius: 10px; background: transparent; color: var(--primary); cursor: pointer; font-weight: 700; transition: 0.3s; }
        .tab-btn.active { background: var(--primary); color: white; box-shadow: 0 5px 15px rgba(255, 142, 83, 0.3); }
        
        .product-content { display: none; }
        .product-content.active { display: block; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto; }
        .product-card { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.05); transition: 0.4s; text-decoration: none; color: inherit; }
        .product-card:hover { transform: translateY(-10px); box-shadow: 0 15px 35px rgba(0,0,0,0.1); }
        .product-card img { width: 100%; height: 230px; object-fit: contain; background: #f8fafc; padding: 15px; }

        /* BADGE TIPE KOMPONEN (SESUAI REQUEST) */
        .badge { 
            display: inline-block;
            background: #f1f5f9; 
            color: #64748b; 
            padding: 4px 12px; 
            border-radius: 50px; 
            font-size: 11px; 
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .btn-view-all { display: inline-block; margin-top: 50px; color: var(--dark); text-decoration: none; font-weight: 700; border-bottom: 2px solid var(--primary); transition: 0.3s; }

        /* ================= TENTANG ALPINO ================= */
        .about-box { display: flex; flex-wrap: wrap; gap: 40px; align-items: center; background: white; padding: 40px; border-radius: 25px; margin-bottom: 35px; text-align: left; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }

        /* ================= FOOTER ================= */
        footer { background: var(--dark); color: #cbd5e1; padding: 70px 50px 30px; border-top: 5px solid var(--primary); }
        .footer-grid { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; }
        .social-icons { display: flex; gap: 12px; margin-top: 20px; flex-wrap: wrap; }
        .social-icons a { width: 42px; height: 42px; background: #334155; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: 0.3s; }

        .wa-float { position: fixed; bottom: 30px; right: 30px; background: #25d366; color: white; padding: 15px 25px; border-radius: 50px; text-decoration: none; font-weight: 700; z-index: 1000; box-shadow: 0 10px 25px rgba(37, 211, 102, 0.4); display: flex; align-items: center; gap: 10px; }

        @media(max-width:768px) {
            nav { padding: 15px 20px; }
            .nav-links { display: none; }
            .menu-toggle { display: block; }
            .hero-overlay h1 { font-size: 32px; }
            .section { padding: 60px 20px; }
        }
    </style>
</head>
<body>

{{-- SIDEBAR HP --}}
<div class="overlay" id="overlay" onclick="toggleMenu()"></div>
<div class="sidebar" id="sidebar">
    <div style="text-align: right; padding: 20px; color: white; font-size: 30px; cursor: pointer;" onclick="toggleMenu()">&times;</div>
    <a href="/" onclick="toggleMenu()">Beranda</a>
    <a href="#katalog" onclick="toggleMenu()">Katalog</a>
    <a href="#layanan" onclick="toggleMenu()">Layanan</a>
    <a href="#tentang" onclick="toggleMenu()">Tentang</a>
</div>

{{-- NAVBAR --}}
<nav>
    <a href="/" class="brand-text">
        <i class="fa-solid fa-wrench"></i> ALPINO JAKARTA
    </a>
    <div class="nav-links">
        <a href="/">Beranda</a>
        <a href="#katalog">Katalog</a>
        <a href="#layanan">Layanan</a>
        <a href="#tentang">Tentang</a>
    </div>
    <div class="menu-toggle" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </div>
</nav>

{{-- HERO SLIDESHOW --}}
<div class="swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1487754180451-c456f719a1fc')">
            <div class="hero-overlay">
                <h1 data-aos="zoom-in">Expert Muffler Specialist</h1>
                <p>Knalpot berkualitas untuk performa maksimal kendaraan Anda.</p>
                <a href="#katalog" class="btn-cta">Lihat Produk</a>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7')">
            <div class="hero-overlay">
                <h1>Custom Exhaust System</h1>
                <p>Suara gahar, tarikan makin enteng dan bertenaga.</p>
                <a href="#katalog" class="btn-cta">Cek Katalog</a>
            </div>
        </div>
    </div>
</div>

{{-- LAYANAN CARD --}}
<div class="feature-container" id="layanan">
    <div class="feature-card" data-aos="fade-up">
        <i class="fas fa-clock"></i>
        <h3>Pengerjaan Cepat</h3>
        <p>Efisiensi waktu tanpa mengurangi kualitas presisi pemasangan.</p>
    </div>
    <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
        <i class="fas fa-user-cog"></i>
        <h3>Mekanik Profesional</h3>
        <p>Ditangani oleh tim ahli yang berpengalaman bertahun-tahun.</p>
    </div>
    <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
        <i class="fas fa-shield-alt"></i>
        <h3>Bergaransi</h3>
        <p>Jaminan kualitas produk dan kepuasan hasil pemasangan.</p>
    </div>
</div>

{{-- KATALOG DENGAN TAB FILTER --}}
<div class="section" id="katalog">
    <h2 class="section-title">Katalog Produk</h2>
    <div class="tab-container">
        <button class="tab-btn active" onclick="filterTab(event, 'bensin')">Mobil Bensin</button>
        <button class="tab-btn" onclick="filterTab(event, 'diesel')">Mobil Diesel</button>
    </div>

    <div id="bensin" class="product-content active">
        <div class="product-grid">
            @forelse($products->where('engine_type', 'bensin')->take(8) as $product)
            <a href="{{ route('katalog.detail', $product->id) }}" class="product-card" data-aos="fade-up">
                <img src="{{ asset('storage/'.$product->gambar) }}" alt="{{ $product->nama_produk }}">
                <div style="padding: 20px; text-align: left;">
                    {{-- LABEL TIPE KOMPONEN SESUAI PERMINTAAN --}}
                    <span class="badge">{{ $product->component_type ?? 'Knalpot' }}</span>
                    <h3 style="margin: 0; font-size: 18px;">{{ $product->nama_produk }}</h3>
                    <p style="color: var(--primary); font-weight: 700; font-size: 20px; margin-top: 10px;">Rp {{ number_format($product->harga,0,',','.') }}</p>
                </div>
            </a>
            @empty
                <p>Produk bensin belum tersedia.</p>
            @endforelse
        </div>
    </div>

    <div id="diesel" class="product-content">
        <div class="product-grid">
            @forelse($products->where('engine_type', 'diesel')->take(8) as $product)
            <a href="{{ route('katalog.detail', $product->id) }}" class="product-card" data-aos="fade-up">
                <img src="{{ asset('storage/'.$product->gambar) }}" alt="{{ $product->nama_produk }}">
                <div style="padding: 20px; text-align: left;">
                    {{-- LABEL TIPE KOMPONEN SESUAI PERMINTAAN --}}
                    <span class="badge">{{ $product->component_type ?? 'Knalpot' }}</span>
                    <h3 style="margin: 0; font-size: 18px;">{{ $product->nama_produk }}</h3>
                    <p style="color: var(--primary); font-weight: 700; font-size: 20px; margin-top: 10px;">Rp {{ number_format($product->harga,0,',','.') }}</p>
                </div>
            </a>
            @empty
                <p>Produk diesel belum tersedia.</p>
            @endforelse
        </div>
    </div>

    <a href="{{ route('katalog.all') }}" class="btn-view-all">Lihat Semua Produk <i class="fas fa-arrow-right"></i></a>
</div>

{{-- TENTANG ALPINO --}}
<div class="section" id="tentang" style="background: #fff;">
    <h2 class="section-title" style="margin-bottom: 50px;">Tentang Kami</h2>
    <div style="max-width: 1000px; margin: 0 auto;">
        @foreach($abouts as $about)
        <div class="about-box" data-aos="fade-up" style="display: flex; flex-wrap: wrap; gap: 40px; align-items: center; background: white; padding: 40px; border-radius: 25px; margin-bottom: 35px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #f1f5f9; text-align: left;">
            @if($about->gambar)
                <img src="{{ asset('storage/'.$about->gambar) }}" style="width: 320px; height: 220px; border-radius: 15px; object-fit: cover;">
            @endif
            <div style="flex: 1; min-width: 300px;">
                <h3 style="font-size: 24px; color: var(--dark); margin-bottom: 15px;">{{ $about->judul }}</h3>
                
                {{-- Memotong teks jadi 150 huruf saja di halaman depan --}}
                <p style="line-height: 1.8; color: #4b5563; margin-bottom: 20px;">
                    {{ \Illuminate\Support\Str::limit($about->deskripsi, 150, '...') }}
                </p>

                {{-- Tombol Klik ke Detail --}}
                <a href="{{ route('about.detail', $about->id) }}" style="background: var(--primary); color: white; padding: 10px 25px; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; transition: 0.3s; box-shadow: 0 4px 15px rgba(255,142,83,0.3);">
                    Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- FOOTER --}}
<footer>
    <div class="footer-grid">
        <div>
            <div style="font-size: 22px; font-weight: 800; color: white; margin-bottom: 20px;">
                <i class="fas fa-wrench" style="color: var(--primary);"></i> ALPINO JAKARTA
            </div>
            <p style="font-size: 14px; line-height: 1.6;">Bengkel spesialis muffler di Jakarta. Melayani custom exhaust dan pengerjaan secara profesional.</p>
        </div>
        
        <div>
            <h4 style="color: white; margin-bottom: 20px;">Jam Operasional</h4>
            <div style="color: #cbd5e1; font-size: 14px; margin-bottom: 10px; display: flex; align-items: flex-start; gap: 10px;">
                <i class="fas fa-clock" style="color: var(--primary); margin-top: 4px;"></i>
                <div>
                    <span style="display: block;">Senin - Minggu: 08.00 - 20.30 WIB</span>
                    <span style="display: block; color: #ef4444; font-weight: 600;">Jumat: Libur / Tutup</span>
                </div>
            </div>

            <h4 style="color: white; margin-bottom: 15px; margin-top: 25px;">Alamat Bengkel</h4>
            <div style="color: #cbd5e1; font-size: 14px; line-height: 1.6; display: flex; align-items: flex-start; gap: 10px;">
                <i class="fas fa-map-marker-alt" style="color: var(--primary); margin-top: 4px;"></i>
                <span>Jl. Raya Lenteng Agung Timur Rt 009 Rw 02 (Arah depok, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta )</span>
            </div>
        </div>

        <div>
            <h4 style="color: white; margin-bottom: 20px;">Ikuti Kami</h4>
            <div class="social-icons">
                <a href="https://www.instagram.com/alpino_exhaust_jakarta/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/6281219740677" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.tiktok.com/@alpino.ehxaust.jakarta" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a href="https://www.tokopedia.com/Alpino%20Exhaust%20Jakarta" target="_blank"><i class="fas fa-shopping-bag"></i></a>
                <a href="http://googleusercontent.com/maps.google.com/..." target="_blank"><i class="fas fa-map-marked-alt"></i></a>
            </div>
        </div>
    </div>
    <div style="text-align: center; border-top: 1px solid #334155; margin-top: 50px; padding-top: 25px; font-size: 13px;">
        &copy; 2026 Alpino Jakarta.
    </div>
</footer>

<a href="https://wa.me/6281219740677" class="wa-float">
    <i class="fab fa-whatsapp" style="font-size: 24px;"></i> Chat Admin
</a>

{{-- SCRIPTS --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });
    new Swiper('.swiper', { loop: true, autoplay: { delay: 5000 }, effect: 'fade' });
    function toggleMenu() {
        document.getElementById('sidebar').classList.toggle('active');
        document.getElementById('overlay').classList.toggle('active');
    }
    function filterTab(evt, engineType) {
        let i, content, tabs;
        content = document.getElementsByClassName("product-content");
        for (i = 0; i < content.length; i++) { content[i].classList.remove("active"); }
        tabs = document.getElementsByClassName("tab-btn");
        for (i = 0; i < tabs.length; i++) { tabs[i].classList.remove("active"); }
        document.getElementById(engineType).classList.add("active");
        evt.currentTarget.classList.add("active");
    }
</script>
</body>
</html>