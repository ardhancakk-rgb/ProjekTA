<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Saya - PetNest</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f4ef;
            color: #3d3028;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        /* NAVBAR */
        .navbar {
            min-height: 82px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 7%;
            border-bottom: 1px solid #eee5dc;
            gap: 25px;
        }

        .logo {
            font-size: 32px;
            font-weight: bold;
            color: #5b3c2e;
            white-space: nowrap;
        }

        .logo span {
            color: #b27a4a;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 35px;
        }

        .nav-menu a {
            color: #776a61;
            font-size: 16px;
            transition: 0.2s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #a86f40;
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 16px;
            font-weight: 600;
        }

        .user-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #c89668;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 19px;
            flex-shrink: 0;
        }

        /* KONTEN UTAMA */
        .container {
            width: 88%;
            max-width: 1280px;
            margin: 60px auto;
        }

        .page-title {
            margin-bottom: 32px;
        }

        .small-title {
            color: #b07849;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 2.5px;
            margin-bottom: 10px;
        }

        .page-title h1 {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .page-title p {
            color: #8b7d73;
            font-size: 16px;
            line-height: 1.7;
        }

        .alert-success,
        .alert-error {
            padding: 18px 22px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 16px;
            line-height: 1.6;
        }

        .alert-success {
            background: #e7f5e9;
            color: #347742;
            border: 1px solid #c7e8cd;
        }

        .alert-error {
            background: #fff0ed;
            color: #a33c2c;
            border: 1px solid #f1c9c1;
        }

        /* KARTU PROFIL */
        .profile-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(60, 40, 25, 0.09);
        }

        .profile-header {
            background: linear-gradient(120deg, #5d4235, #84604a);
            padding: 42px 45px;
            display: flex;
            align-items: center;
            gap: 25px;
            color: white;
        }

        .profile-photo {
            width: 105px;
            height: 105px;
            border-radius: 50%;
            background: #d5a06e;
            border: 4px solid rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .profile-name {
            flex: 1;
            min-width: 0;
        }

        .profile-name h2 {
            font-size: 30px;
            margin-bottom: 8px;
            overflow-wrap: anywhere;
        }

        .profile-name p {
            color: #eadfd7;
            font-size: 16px;
        }

        .edit-btn {
            display: inline-block;
            border: 1px solid rgba(255, 255, 255, 0.6);
            background: rgba(255, 255, 255, 0.12);
            color: white;
            padding: 13px 20px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 15px;
            transition: 0.2s;
            white-space: nowrap;
        }

        .edit-btn:hover {
            background: white;
            color: #5d4235;
        }

        .profile-content {
            padding: 45px;
        }

        .section-title {
            margin-bottom: 24px;
        }

        .section-title h3 {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .section-title p {
            color: #91847b;
            font-size: 15px;
            line-height: 1.7;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 42px;
        }

        .info-box {
            background: #faf8f5;
            border: 1px solid #eee5dc;
            border-radius: 12px;
            padding: 23px 25px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            min-width: 0;
        }

        .info-box.full {
            grid-column: 1 / -1;
        }

        .label {
            font-size: 13px;
            color: #998b81;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .value {
            font-size: 17px;
            color: #44362e;
            font-weight: 500;
            overflow-wrap: anywhere;
            line-height: 1.7;
        }

        .account-section {
            border-top: 1px solid #eee7df;
            padding-top: 38px;
        }

        .account-list {
            border: 1px solid #eee5dc;
            border-radius: 12px;
            overflow: hidden;
        }

        .account-item {
            padding: 22px 25px;
            background: #faf8f5;
            border-bottom: 1px solid #eee5dc;
        }

        .account-item:last-child {
            border-bottom: none;
        }

        .account-item>div {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .account-label {
            color: #74665d;
            font-size: 16px;
            font-weight: 500;
        }

        .status {
            display: inline-block;
            background: #e7f5e9;
            color: #43834b;
            padding: 7px 15px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        /* KARTU FITUR */
        .feature-section {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-top: 35px;
        }

        .feature-card {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 27px;
            background: #faf8f5;
            border: 1px solid #eee5dc;
            border-radius: 14px;
            color: #44362e;
            transition: 0.2s;
            min-width: 0;
        }

        .feature-card:hover {
            border-color: #c89668;
            transform: translateY(-2px);
        }

        .feature-icon {
            width: 58px;
            height: 58px;
            flex-shrink: 0;
            border-radius: 12px;
            background: #f0e3d5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
        }

        .feature-text h4 {
            font-size: 17px;
            margin-bottom: 8px;
        }

        .feature-text p {
            font-size: 14px;
            color: #91847b;
            line-height: 1.7;
        }

        /* LOGOUT */
        .logout-section {
            margin-top: 38px;
            padding-top: 30px;
            border-top: 1px solid #eee7df;
            display: flex;
            justify-content: flex-end;
        }

        .logout-btn {
            border: 1px solid #d9b8a9;
            background: white;
            color: #a65743;
            padding: 13px 20px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 15px;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #a65743;
            color: white;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .navbar {
                padding: 15px 5%;
                gap: 18px;
            }

            .nav-menu {
                gap: 20px;
            }

            .container {
                width: 92%;
                margin: 40px auto;
            }

            .profile-header {
                padding: 32px;
            }

            .profile-content {
                padding: 32px;
            }
        }

        @media (max-width: 700px) {
            .navbar {
                flex-wrap: wrap;
                padding: 15px 5%;
            }

            .logo {
                font-size: 28px;
            }

            .nav-menu {
                order: 3;
                width: 100%;
                justify-content: center;
                gap: 22px;
                padding-top: 10px;
                flex-wrap: wrap;
            }

            .nav-menu a {
                font-size: 14px;
            }

            .nav-user {
                font-size: 14px;
            }

            .user-avatar {
                width: 38px;
                height: 38px;
                font-size: 16px;
            }

            .container {
                width: 92%;
                margin: 30px auto;
            }

            .page-title h1 {
                font-size: 32px;
            }

            .page-title p {
                font-size: 14px;
            }

            .profile-header {
                padding: 25px 22px;
                flex-wrap: wrap;
                gap: 18px;
            }

            .profile-photo {
                width: 82px;
                height: 82px;
                font-size: 31px;
            }

            .profile-name h2 {
                font-size: 23px;
            }

            .profile-name p {
                font-size: 14px;
            }

            .edit-btn {
                width: 100%;
                text-align: center;
            }

            .profile-content {
                padding: 25px 20px;
            }

            .section-title h3 {
                font-size: 22px;
            }

            .section-title p {
                font-size: 14px;
            }

            .info-grid,
            .feature-section {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .info-box,
            .info-box.full {
                grid-column: auto;
                padding: 19px;
            }

            .label {
                font-size: 12px;
            }

            .value {
                font-size: 15px;
            }

            .account-item {
                padding: 18px;
            }

            .account-label {
                font-size: 14px;
            }

            .status {
                font-size: 11px;
            }

            .feature-card {
                padding: 22px;
            }

            .feature-icon {
                width: 48px;
                height: 48px;
                font-size: 23px;
            }

            .feature-text h4 {
                font-size: 16px;
            }

            .feature-text p {
                font-size: 13px;
            }

            .logout-btn {
                width: 100%;
            }
        }

        @media (max-width: 380px) {
            .nav-menu {
                gap: 14px;
            }

            .nav-menu a {
                font-size: 13px;
            }

            .profile-content {
                padding: 20px 15px;
            }

            .profile-name h2 {
                font-size: 20px;
            }

            .account-item>div {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <a href="{{ url('/') }}" class="logo">
            <span>Pet</span>Nest
        </a>

        <div class="nav-menu">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ route('pengajuan.riwayat') }}" class="btn btn-dark">
                Riwayat Adopsi
            </a>
            <a href="{{ route('profile.index') }}" class="active">
                Profil
            </a>
        </div>

        <div class="nav-user">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
            </div>

            <span>
                {{ auth()->user()->name ?? 'User' }}
            </span>
        </div>
    </nav>

    <main class="container">

        <div class="page-title">
            <div class="small-title">AKUN SAYA</div>
            <h1>Profil Saya</h1>
            <p>
                Kelola informasi akun PetNest kamu.
            </p>
        </div>

        @if (session('success'))
            <div class="alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert-error">
                Ada data yang belum valid. Silakan periksa kembali.
            </div>
        @endif

        <section class="profile-card">

            <div class="profile-header">

                <div class="profile-photo">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>

                <div class="profile-name">
                    <h2>
                        {{ auth()->user()->name ?? 'User' }}
                    </h2>

                    <p>Pengguna PetNest</p>
                </div>

                <a href="{{ route('profile.edit') }}" class="edit-btn">
                    ✎ Edit Profil
                </a>

            </div>

            <div class="profile-content">

                <div class="section-title">
                    <h3>Informasi Pribadi</h3>
                    <p>
                        Pastikan data kamu selalu benar dan terbaru.
                    </p>
                </div>

                <div class="info-grid">

                    <div class="info-box">
                        <span class="label">Nama Lengkap</span>
                        <span class="value">
                            {{ auth()->user()->name ?? '-' }}
                        </span>
                    </div>

                    <div class="info-box">
                        <span class="label">Username</span>
                        <span class="value">
                            {{ auth()->user()->username ?? '-' }}
                        </span>
                    </div>

                    <div class="info-box">
                        <span class="label">Email</span>
                        <span class="value">
                            {{ auth()->user()->email ?? '-' }}
                        </span>
                    </div>

                    <div class="info-box">
                        <span class="label">Nomor Telepon</span>
                        <span class="value">
                            {{ auth()->user()->no_hp ?: '-' }}
                        </span>
                    </div>

                    <div class="info-box full">
                        <span class="label">Alamat</span>
                        <span class="value">
                            {{ auth()->user()->alamat ?: 'Alamat belum diisi.' }}
                        </span>
                    </div>

                </div>

                <div class="account-section">

                    <div class="section-title">
                        <h3>Informasi Akun</h3>
                        <p>Status dan informasi akun kamu di PetNest.</p>
                    </div>

                    <div class="account-list">

                        <div class="account-item">
                            <div>
                                <span class="account-label">Status Akun</span>

                                <span class="status">
                                    {{ ucfirst(auth()->user()->status ?? 'Aktif') }}
                                </span>
                            </div>
                        </div>

                        <div class="account-item">
                            <div>
                                <span class="account-label">Bergabung Sejak</span>

                                <span>
                                    {{ auth()->user()->created_at ? auth()->user()->created_at->format('d F Y') : '-' }}
                                </span>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="feature-section">

                    <a href="{{ route('profile.edit') }}" class="feature-card">

                        <div class="feature-icon">✎</div>

                        <div class="feature-text">
                            <h4>Edit Profil</h4>
                            <p>
                                Perbarui nama, email, nomor telepon,
                                dan alamat kamu.
                            </p>
                        </div>

                    </a>

                </div>

                <div class="logout-section">

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="logout-btn">
                            Keluar dari Akun
                        </button>
                    </form>

                </div>

            </div>
        </section>
    </main>

</body>

</html>