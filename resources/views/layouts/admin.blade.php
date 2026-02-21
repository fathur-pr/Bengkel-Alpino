<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Alpino Jakarta</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}?v=2" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=2" type="image/x-icon">

<link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}?v=2">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root { --primary: #ff8e53; --sidebar-bg: #1e293b; --text-main: #1e293b; --text-muted: #64748b; }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #f8fafc; color: var(--text-main); display: flex; min-height: 100vh; overflow-x: hidden; }

        /* SIDEBAR KIRI */
        .sidebar { width: 280px; background: var(--sidebar-bg); color: white; display: flex; flex-direction: column; position: fixed; height: 100vh; z-index: 1000; }
        .sidebar-header { padding: 30px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .sidebar-header h2 { font-size: 20px; font-weight: 700; color: var(--primary); display: flex; align-items: center; justify-content: center; gap: 10px; }
        .nav-menu { padding: 20px; flex-grow: 1; }
        .nav-item { list-style: none; margin-bottom: 8px; }
        .nav-link { display: flex; align-items: center; padding: 12px 20px; color: rgba(255,255,255,0.7); text-decoration: none; border-radius: 12px; transition: 0.3s; font-weight: 500; }
        .nav-link i { width: 25px; font-size: 18px; }
        .nav-link:hover, .nav-link.active { background: var(--primary); color: white; box-shadow: 0 10px 20px rgba(255, 142, 83, 0.3); }

        /* AREA KONTEN KANAN */
        .main-content { margin-left: 280px; flex-grow: 1; width: calc(100% - 280px); }

        /* TOMBOL LOGOUT */
        .logout-container { padding: 20px; }
        .btn-logout { width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: none; color: #ff4d4d; border-radius: 10px; cursor: pointer; font-weight: 600; display: flex; align-items: center; justify-content: center; gap: 10px; transition: 0.3s; }
        .btn-logout:hover { background: #ff4d4d; color: white; }
    </style>
</head>
<body>

    {{-- 1. BAGIAN SIDEBAR KIRI --}}
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-wrench"></i> <span>Alpino Admin</span></h2>
        </div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.katalog.index') }}" class="nav-link {{ request()->routeIs('admin.katalog.*') ? 'active' : '' }}">
                    <i class="fas fa-box"></i> <span>Katalog Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.about.index') }}" class="nav-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                    <i class="fas fa-info-circle"></i> <span>Tentang Alpino</span>
                </a>
            </li>
        </ul>
        <div class="logout-container">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- 2. BAGIAN KONTEN TENGAH/KANAN (Tempat view lain disuntikkan) --}}
    <main class="main-content">
        @yield('content')
    </main>

</body>
</html>