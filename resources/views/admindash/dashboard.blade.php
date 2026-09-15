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

        /* Mockup Profile Header */
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
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-logo">
        <span>Pet Nest</span>
    </div>
    <nav class="sidebar-menu">

        <a href="{{ url('/dashboard') }}"
           class="{{ request()->is('dashboard*') ? 'active' : '' }}">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ url('/hewan') }}"
           class="{{ request()->is('hewan*') || request()->is('pets*') ? 'active' : '' }}">
            <i class="fa-solid fa-paw"></i>
            <span>Data Hewan</span>
        </a>

        <a href="{{ url('/kategori') }}"
           class="{{ request()->is('kategori*') ? 'active' : '' }}">
            <i class="fa-solid fa-layer-group"></i>
            <span>Kategori</span>
        </a>

        <a href="{{ url('/pengajuan') }}"
           class="{{ request()->is('pengajuan*') ? 'active' : '' }}">
            <i class="fa-solid fa-file-lines"></i>
            <span>Pengajuan Adopsi</span>
        </a>

        <div class="sidebar-divider"></div>

        <a href="{{ url('/profil') }}"
           class="{{ request()->is('profil*') ? 'active' : '' }}">
            <i class="fa-solid fa-user"></i>
            <span>Profil</span>
        </a>
    </nav>
    <div class="sidebar-bottom">
        <a href="{{ url('/logout') }}">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>
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

        <div class="section-header">
            <h2>Ringkasan Data</h2>
            <div style="display: flex; gap: 10px;">
                <input type="text" class="search-bar" placeholder="Cari data...">
                <button class="btn"><i class="fa-solid fa-plus"></i> Tambah Data</button>
            </div>
        </div>

        <div class="cards-grid">
            <div class="card-item">
                <div class="card-image-placeholder">
                    <i class="fa-solid fa-image fa-2x"></i>
                </div>
                <div class="card-content">
                    <h3>Kucing Persi</h3>
                    <p>Kategori: Kucing</p>
                    <p>Status: Tersedia</p>
                </div>
                <div class="card-actions">
                    <button class="btn"><i class="fa-solid fa-eye"></i> Detail</button>
                    <button class="btn"><i class="fa-solid fa-pen"></i> Edit</button>
                    <button class="btn"><i class="fa-solid fa-trash"></i> Hapus</button>
                </div>
            </div>

            <div class="card-item">
                <div class="card-image-placeholder">
                    <i class="fa-solid fa-image fa-2x"></i>
                </div>
                <div class="card-content">
                    <h3>Anjing Golden</h3>
                    <p>Kategori: Anjing</p>
                    <p>Status: Teradopsi</p>
                </div>
                <div class="card-actions">
                    <button class="btn"><i class="fa-solid fa-eye"></i> Detail</button>
                    <button class="btn"><i class="fa-solid fa-pen"></i> Edit</button>
                    <button class="btn"><i class="fa-solid fa-trash"></i> Hapus</button>
                </div>
            </div>

            <div class="card-item">
                <div class="card-image-placeholder">
                    <i class="fa-solid fa-image fa-2x"></i>
                </div>
                <div class="card-content">
                    <h3>Kelinci Anggora</h3>
                    <p>Kategori: Kelinci</p>
                    <p>Status: Tersedia</p>
                </div>
                <div class="card-actions">
                    <button class="btn"><i class="fa-solid fa-eye"></i> Detail</button>
                    <button class="btn"><i class="fa-solid fa-pen"></i> Edit</button>
                    <button class="btn"><i class="fa-solid fa-trash"></i> Hapus</button>
                </div>
            </div>
        </div>
    @endif
</main>

</body>
</html>