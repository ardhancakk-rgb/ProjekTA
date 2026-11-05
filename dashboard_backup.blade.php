<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - PetNest</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
            font-size: 20px;
        }

        body {
            margin: 0;
            background: #29221c;
            color: #30251d;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
            padding: 4px 4px 4px 9px;
            gap: 0;
        }

        /* SIDEBAR */

        .sidebar {
            width: 250px;
            min-width: 250px;
            background: #503b2a;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 25px 16px 16px;
        }

        .sidebar-title {
            font-size: 30px;
            font-weight: 700;
            margin: 0 0 25px 4px;
            color: #fff;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .sidebar-menu a {
            text-decoration: none;
            color: #eee7df;
            font-size: 15px;
            padding: 12px 10px;
            border-radius: 6px;
            transition: .2s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #70543d;
            color: white;
        }

        .sidebar-menu i {
            width: 24px;
            margin-right: 5px;
        }

        .sidebar-profile {
            margin-top: auto;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 4px 2px;
        }

        .sidebar-avatar {
            width: 43px;
            height: 43px;
            border-radius: 50%;
            background: #755b45;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            color: white;
            flex-shrink: 0;
        }

        .sidebar-profile-name {
            font-size: 15px;
            font-weight: 600;
        }

        .sidebar-profile-email {
            font-size: 10px;
            color: #d8cabe;
            word-break: break-all;
        }

        /* MAIN CONTENT */

        .main-content {
            flex: 1;
            min-width: 0;
            background: #fff;
            padding: 30px;
        }

        /* ADMIN PROFILE */

        .admin-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 30px;
        }

        .admin-avatar {
            width: 88px;
            height: 88px;
            border-radius: 50%;
            background: #514b49;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 39px;
            flex-shrink: 0;
        }

        .admin-info h1 {
            font-size: 39px;
            font-weight: 500;
            margin: 0;
            color: #171717;
        }

        .admin-info p {
            font-size: 15px;
            color: #555;
            margin: -3px 0 0;
        }

        .edit-profile {
            display: inline-block;
            margin-top: 11px;
            padding: 7px 16px;
            border-radius: 20px;
            background: #dedede;
            color: #242424;
            text-decoration: none;
            font-size: 12px;
            transition: .2s;
        }

        .edit-profile:hover {
            background: #503b2a;
            color: white;
        }

        /* PET SECTION */

        .pet-section {
            margin-top: 28px;
        }

        .pet-section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .pet-section-header h5 {
            font-size: 17px;
            font-weight: 700;
            margin: 0;
        }

        .see-all {
            font-size: 12px;
            text-decoration: none;
            color: #79573a;
            font-weight: 600;
        }

        .pet-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .pet-card {
            border: 1px solid #e8e2dc;
            border-radius: 11px;
            overflow: hidden;
            background: white;
            transition: .2s;
        }

        .pet-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .09);
        }

        .pet-image {
            width: 100%;
            height: 145px;
            object-fit: cover;
            background: #b39b85;
            display: block;
        }

        .pet-placeholder {
            height: 145px;
            background: #e6ddd3;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9d8771;
            font-size: 35px;
        }

        .pet-info {
            padding: 12px;
        }

        .pet-name {
            font-size: 15px;
            font-weight: 700;
            color: #392a1f;
            margin-bottom: 4px;
        }

        .pet-category {
            font-size: 11px;
            color: #8b7969;
            margin-bottom: 8px;
        }

        .pet-status {
            font-size: 10px;
            font-weight: 600;
            display: inline-block;
            padding: 4px 9px;
            border-radius: 20px;
            background: #eee8df;
            color: #755638;
        }

        .pet-status.available {
            background: #e5f1e5;
            color: #47744a;
        }

        .pet-status.adopted {
            background: #e9e5f1;
            color: #67518a;
        }

        .empty-pets {
            grid-column: 1 / -1;
            padding: 45px 15px;
            text-align: center;
            background: #f7f4f0;
            border-radius: 10px;
            color: #8b7969;
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {
            .sidebar {
                width: 210px;
                min-width: 210px;
            }

            .pet-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .main-content {
                padding: 25px 20px;
            }
        }

        @media (max-width: 600px) {
            .dashboard {
                padding: 0;
            }

            .sidebar {
                width: 65px;
                min-width: 65px;
                padding: 20px 8px;
            }

            .sidebar-title {
                font-size: 0;
                margin: 0 0 25px;
            }

            .sidebar-title::after {
                content: 'PN';
                font-size: 18px;
            }

            .sidebar-menu a {
                font-size: 0;
                text-align: center;
                padding: 12px 5px;
            }

            .sidebar-menu i {
                font-size: 19px;
                margin: 0;
                width: auto;
            }

            .sidebar-profile {
                justify-content: center;
            }

            .sidebar-profile>div:last-child {
                display: none;
            }

            .sidebar-avatar {
                width: 38px;
                height: 38px;
            }

            .main-content {
                padding: 25px 14px;
            }

            .admin-avatar {
                width: 65px;
                height: 65px;
                font-size: 29px;
            }

            .admin-info h1 {
                font-size: 27px;
            }

            .admin-info p {
                font-size: 12px;
            }

            .pet-grid {
                grid-template-columns: 1fr;
                gap: 13px;
            }

            .pet-image,
            .pet-placeholder {
                height: 170px;
            }
        }
    </style>
</head>

<body>

    <div class="dashboard">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <h2 class="sidebar-title">Menu</h2>

            <nav class="sidebar-menu">

                <a href="{{ url('/admindash') }}" class="active">
                    <i class="bi bi-house-door-fill"></i>
                    Dashboard
                </a>

                <a href="{{ url('/admin/hewan') }}">
                    <i class="bi bi-paw-fill"></i>
                    Kelola Hewan
                </a>

                <a href="{{ url('/admin/kategori') }}">
                    <i class="bi bi-grid-fill"></i>
                    Kelola Kategori
                </a>

                <a href="{{ url('/admin/users') }}">
                    <i class="bi bi-people-fill"></i>
                    Kelola User
                </a>

                <a href="{{ url('/admin/pengajuan-adopsi') }}">
                    <i class="bi bi-clipboard-check-fill"></i>
                    Verifikasi Pengajuan
                </a>

            </nav>

            <!-- ADMIN PROFILE SIDEBAR -->
            <div class="sidebar-profile">

                <div class="sidebar-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>

                <div>
                    <div class="sidebar-profile-name">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </div>

                    <div class="sidebar-profile-email">
                        {{ auth()->user()->email ?? 'admin@gmail.com' }}
                    </div>
                </div>

            </div>
        </aside>
        <main class="main-content">
            <section class="admin-header">
                <div class="admin-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="admin-info">
                    <h1>{{ auth()->user()->name ?? 'Admin' }}</h1>
                    <p>{{ auth()->user()->email ?? 'admin@gmail.com' }}</p>
                    <a href="{{ url('/admin/profile') }}" class="edit-profile">
                        Edit Profile
                    </a>
                </div>
            </section>
            <section class="pet-section">
                <div class="pet-section-header">
                    <h5>Data Hewan</h5>
                    <a href="{{ url('/admin/hewan') }}" class="see-all">
                        Lihat Semua →
                    </a>
                </div>
                <div class="pet-grid">
                    @forelse ($hewans as $hewan)
                        <div class="pet-card">
                            @if ($hewan->foto)
                                <img src="{{ asset('storage/' . $hewan->foto) }}" alt="{{ $hewan->nama_hewan }}"
                                    class="pet-image"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                                <div class="pet-placeholder" style="display:none;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @else
                                <div class="pet-placeholder">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                            <div class="pet-info">

                                <div class="pet-name">
                                    {{ $hewan->nama_hewan }}
                                </div>

                                <div class="pet-category">
                                    {{ $hewan->jenis ?? $hewan->ras ?? 'Hewan peliharaan' }}
                                </div>

                                @if ($hewan->status_adopsi == 'tersedia')
                                    <span class="pet-status available">
                                        Tersedia
                                    </span>
                                @elseif ($hewan->status_adopsi == 'diadopsi')
                                    <span class="pet-status adopted">
                                        Diadopsi
                                    </span>
                                @else
                                    <span class="pet-status">
                                        {{ $hewan->status_adopsi ?? 'Belum ditentukan' }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="empty-pets">
                            <i class="bi bi-image" style="font-size: 30px;"></i>
                            <p class="mt-2 mb-1 fw-semibold">
                                Belum ada data hewan
                            </p>
                            <small>
                                Data hewan yang ditambahkan akan muncul di sini.
                            </small>
                        </div>
                    @endforelse
                </div>
            </section>
        </main>
    </div>
</body>
</html>