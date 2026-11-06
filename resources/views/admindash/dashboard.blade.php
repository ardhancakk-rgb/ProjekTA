<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Pet Nest</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            color: #333333;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            padding: 25px 15px;
            z-index: 1000;
        }

        .sidebar-logo {
            padding: 10px 15px 35px;
            font-size: 22px;
            font-weight: 700;
            color: #2563eb;
        }

        .sidebar-logo span {
            color: #111827;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 15px;
            color: #6b7280;
            text-decoration: none;
            border-radius: 10px;
            font-size: 15px;
            transition: 0.2s;
        }

        .sidebar-menu a i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar-menu a:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .sidebar-menu a.active {
            background: #2563eb;
            color: #ffffff;
        }

        .sidebar-divider {
            height: 1px;
            background: #e5e7eb;
            margin: 20px 5px;
        }

        .sidebar-bottom {
            margin-top: auto;
        }

        .sidebar-bottom a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 15px;
            color: red;
            text-decoration: none;
            border-radius: 10px;
            transition: 0.2s;
        }

        .sidebar-bottom button {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 13px 15px;
            border: 0;
            background: transparent;
            color: red;
            text-align: left;
            cursor: pointer;
            border-radius: 10px;
            transition: 0.2s;
            font: inherit;
        }

        .sidebar-bottom a:hover {
            background: #fef2f2;
        }

        .sidebar-bottom button:hover {
            background: #fef2f2;
        }

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            padding: 30px;
        }

        @media (max-width: 768px) {

            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                width: 250px;
                height: 100vh;
                background: #ffffff;
                border-right: 1px solid #e5e7eb;
                display: flex;
                flex-direction: column;
                padding: 25px 15px;
                z-index: 1000;
            }

            .sidebar-logo {
                padding: 10px 15px 35px;
                font-size: 22px;
                font-weight: 700;
                color: #111827;
            }

            .sidebar-menu {
                display: flex;
                flex-direction: column;
                gap: 6px;
            }

            .sidebar-menu a {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 13px 15px;
                color: #6b7280;
                text-decoration: none;
                border-radius: 10px;
                font-size: 15px;
                transition: 0.2s;
            }

            .sidebar-menu a i {
                width: 20px;
                text-align: center;
                font-size: 16px;
            }

            .sidebar-menu a:hover {
                background: #f0f0f0;
                color: #111827;
            }

            .sidebar-menu a.active {
                background: #333333;
                color: #ffffff;
            }

            .sidebar-divider {
                height: 1px;
                background: #e5e7eb;
                margin: 20px 5px;
            }

            .sidebar-bottom {
                margin-top: auto;
            }

            .sidebar-bottom a {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 13px 15px;
                color: #333333;
                text-decoration: none;
                border-radius: 10px;
                transition: 0.2s;
            }

            .sidebar-bottom a:hover {
                background: #e5e5e5;
            }

            .main-content {
                margin-left: 250px;
                min-height: 100vh;
                padding: 30px;
            }

            .hero {
                margin-left: 210px;
                width: calc(100% - 210px);
                padding: 40px;
                box-sizing: border-box;
            }
        }

        .profile-section {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-avatar-large {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: #666666;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: #ffffff;
        }

        .admin-details h1 {
            font-size: 22px;
            margin-bottom: 4px;
        }

        .admin-details p {
            font-size: 14px;
            color: #666666;
        }

        .btn {
            padding: 8px 16px;
            background-color: #e0e0e0;
            border: 1px solid #cccccc;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn:hover {
            background-color: #d0d0d0;
        }

        /* Grid Mockup untuk Halaman Utama / Dashboard */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-bar {
            padding: 8px 12px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            width: 220px;
            font-size: 14px;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card-item {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .card-image-placeholder {
            width: 100%;
            height: 110px;
            background-color: #e5e5e5;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888888;
        }

        .card-content h3 {
            font-size: 16px;
            margin-bottom: 4px;
        }

        .card-content p {
            font-size: 13px;
            color: #666666;
        }

        .card-actions {
            display: flex;
            gap: 8px;
            margin-top: auto;
        }

        .card-actions .btn {
            flex: 1;
            font-size: 12px;
            padding: 6px;
            text-align: center;
        }

        @media (max-width: 992px) {
            .cards-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 75px;
                padding: 20px 10px;
            }

            .sidebar-logo {
                text-align: center;
                font-size: 18px;
                padding: 10px 0 30px;
            }

            .sidebar-logo span {
                display: none;
            }

            .sidebar-menu a,
            .sidebar-bottom a {
                justify-content: center;
                padding: 13px;
            }

            .sidebar-menu a span,
            .sidebar-bottom a span {
                display: none;
            }

            .main-content {
                margin-left: 75px;
                padding: 20px;
            }

            .cards-grid {
                grid-template-columns: 1fr;
            }

            .profile-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }

        /* PETNEST ADMIN DASHBOARD REDESIGN */
        body {
            font-family: Arial, sans-serif;
            background: #f5eee5;
            color: #493522;
            font-size: 16px;
        }

        .sidebar {
            background: #68482d;
            border-right: none;
            padding: 28px 16px;
            box-shadow: 4px 0 18px rgba(60, 38, 20, .08);
        }

        .sidebar-logo {
            color: #fff;
            font-size: 27px;
            padding: 12px 15px 40px;
            letter-spacing: .5px;
        }

        .sidebar-logo span {
            color: #fff;
        }

        .sidebar-menu {
            gap: 9px;
        }

        .sidebar-menu a {
            color: #e8d9c8;
            font-size: 16px;
            padding: 15px;
            border-radius: 10px;
        }

        .sidebar-menu a i {
            font-size: 18px;
        }

        .sidebar-menu a:hover {
            background: #856344;
            color: #fff;
        }

        .sidebar-menu a.active {
            background: #f5eee5;
            color: #68482d;
            font-weight: 700;
        }

        .sidebar-divider {
            background: rgba(255, 255, 255, .2);
        }

        .sidebar-bottom button {
            color: #ffe1d9;
            font-size: 16px;
            padding: 15px;
        }

        .sidebar-bottom button:hover {
            background: #856344;
            color: #fff;
        }

        .main-content {
            padding: 35px;
            background: #f5eee5;
        }

        .profile-section {
            background: #fff;
            border: 1px solid #eadfd2;
            border-radius: 16px;
            padding: 28px 32px;
            margin-bottom: 32px;
            box-shadow: 0 5px 20px rgba(83, 57, 32, .06);
        }

        .admin-avatar-large {
            width: 82px;
            height: 82px;
            background: #795638;
            font-size: 32px;
        }

        .admin-details h1 {
            color: #593d25;
            font-size: 27px;
            font-weight: 700;
        }

        .admin-details p {
            color: #9b8976;
            font-size: 16px;
        }

        .btn {
            background: #795638;
            color: #fff;
            border: none;
            border-radius: 9px;
            padding: 12px 19px;
            font-size: 15px;
            font-weight: 600;
        }

        .btn:hover {
            background: #593d25;
            color: #fff;
        }

        .section-header {
            margin-bottom: 25px;
        }

        .section-header h2 {
            font-size: 26px;
            color: #593d25;
            font-weight: 700;
        }

        .search-bar {
            width: 250px;
            padding: 12px 15px;
            border: 1px solid #e7d8c6;
            border-radius: 9px;
            font-size: 15px;
            background: #fff;
        }

        .cards-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 25px;
        }

        .card-item {
            background: #fff;
            border: 1px solid #eadfd2;
            border-radius: 15px;
            padding: 15px;
            gap: 14px;
            box-shadow: 0 5px 18px rgba(83, 57, 32, .06);
            transition: .25s;
        }

        .card-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(83, 57, 32, .12);
        }

        .card-image-placeholder {
            height: 220px;
            background: #f1e8dc;
            border-radius: 11px;
            overflow: hidden;
        }

        .card-image-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-content h3 {
            font-size: 19px;
            color: #593d25;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .card-content p {
            font-size: 15px;
            color: #8b7864;
            margin-bottom: 6px;
        }

        .card-actions {
            gap: 8px;
        }

        .card-actions .btn {
            font-size: 13px;
            padding: 10px 6px;
        }

        @media (max-width: 992px) {
            .cards-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 75px;
                padding: 20px 10px;
            }

            .main-content {
                margin-left: 75px;
                padding: 20px;
            }

            .cards-grid {
                grid-template-columns: 1fr;
            }

            .profile-section {
                align-items: flex-start;
            }

            .section-header {
                flex-wrap: wrap;
                gap: 15px;
            }

            .search-bar {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-logo">
            <span>Pet Nest</span>
        </div>
        <nav class="sidebar-menu">
            <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard*') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ url('/hewan') }}" class="{{ request()->is('pets*') ? 'active' : '' }}">
                <i class="fa-solid fa-paw"></i>
                <span>Data Hewan</span>
            </a>
            <a href="{{ url('/kategori') }}" class="{{ request()->is('kategori*') ? 'active' : '' }}">
                <i class="fa-solid fa-layer-group"></i>
                <span>Kategori</span>
            </a>
            <a href="{{ route('admin.pengajuan.index') }}" class="sidebar-link">
                <i class="fas fa-clipboard-list"></i>
                <span>Pengajuan Adopsi</span>
            </a>
            <div class="sidebar-divider"></div>
            <a href="{{ url('/admin/profile') }}" class="{{ request()->is('profile*') ? 'active' : '' }}">
                <i class="fa-solid fa-user"></i>
                <span>Profil</span>
            </a>
        </nav>
        <div class="sidebar-bottom">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>
    <main class="main-content">
        @hasSection('content')
            @yield('content')
        @else
            <section class="profile-section">
                <div class="profile-info">
                    <div class="admin-avatar-large">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="admin-details">
                        <h1>Admin Pet Nest</h1>
                        <p>admin@gmail.com</p>
                    </div>
                </div>
                <button class="btn"><i class="fa-solid fa-pen"></i> Edit Profil</button>
            </section>
            @php
                $hewans = \App\Models\Hewan::orderByDesc('updated_at')
                    ->take(3)
                    ->get();
            @endphp
            <div class="section-header">
                <h2>Hewan Terbaru</h2>
                <div style="display:flex;gap:10px;flex-wrap:wrap;">
                    <input type="text" class="search-bar" placeholder="Cari hewan...">
                    <a href="{{ url('/hewan') }}" class="btn" style="text-decoration:none;">
                        <i class="fa-solid fa-paw"></i> Kelola Hewan
                    </a>
                </div>
            </div>
            <div class="cards-grid">
                @forelse ($hewans as $hewan)
                    <div class="card-item">
                        <div class="card-image-placeholder">
                            @if ($hewan->foto)
                                <img src="{{ asset('storage/' . $hewan->foto) }}" alt="{{ $hewan->nama_hewan }}">
                            @else
                                <i class="fa-solid fa-image fa-2x"></i>
                            @endif
                        </div>
                        <div class="card-content">
                            <h3>{{ $hewan->nama_hewan }}</h3>
                            <p>
                                Status:
                                {{ ucfirst($hewan->status_adopsi ?? 'Belum tersedia') }}
                            </p>
                            <p>
                                <i class="fa-regular fa-clock"></i>
                                Diperbarui:
                                {{ $hewan->updated_at ? $hewan->updated_at->format('d M Y') : '-' }}
                            </p>
                        </div>

                        <div class="card-actions">
                            <a href="{{ url('/hewan') }}" class="btn" style="text-decoration:none;">
                                <i class="fa-solid fa-eye"></i> Lihat
                            </a>
                            <a href="{{ url('/hewan') }}" class="btn" style="text-decoration:none;">
                                <i class="fa-solid fa-gear"></i> Kelola
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="card-item">
                        <p>Belum ada data hewan.</p>
                    </div>
                @endforelse
            </div>
        @endif
    </main>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all
.min.css">

</body>

</html>