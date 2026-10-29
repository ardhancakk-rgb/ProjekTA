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
        }

        a {
            text-decoration: none;
        }

        .navbar {
            min-height: 70px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 7%;
            border-bottom: 1px solid #eee5dc;
            gap: 20px;
        }

        .logo {
            font-size: 26px;
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
            gap: 25px;
        }

        .nav-menu a {
            color: #776a61;
            font-size: 14px;
            transition: .2s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #a86f40;
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 600;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #c89668;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 45px auto;
        }

        .page-title {
            margin-bottom: 25px;
        }

        .small-title {
            color: #b07849;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 7px;
        }

        .page-title h1 {
            font-size: 34px;
            margin-bottom: 8px;
        }

        .page-title p {
            color: #8b7d73;
            font-size: 14px;
            line-height: 1.6;
        }

        .alert-success {
            padding: 15px 18px;
            background: #e7f5e9;
            color: #347742;
            border: 1px solid #c7e8cd;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-error {
            padding: 15px 18px;
            background: #fff0ed;
            color: #a33c2c;
            border: 1px solid #f1c9c1;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .profile-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(60, 40, 25, .08);
        }

        .profile-header {
            background: linear-gradient(120deg, #5d4235, #84604a);
            padding: 32px 35px;
            display: flex;
            align-items: center;
            gap: 18px;
            color: white;
        }

        .profile-photo {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            background: #d5a06e;
            border: 4px solid rgba(255, 255, 255, .8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .profile-name {
            flex: 1;
            min-width: 0;
        }

        .profile-name h2 {
            font-size: 25px;
            margin-bottom: 7px;
            overflow-wrap: anywhere;
        }

        .profile-name p {
            color: #eadfd7;
            font-size: 14px;
        }

        .edit-btn {
            display: inline-block;
            border: 1px solid rgba(255, 255, 255, .6);
            background: rgba(255, 255, 255, .12);
            color: white;
            padding: 11px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            transition: .2s;
            white-space: nowrap;
        }

        .edit-btn:hover {
            background: white;
            color: #5d4235;
        }

        .profile-content {
            padding: 35px;
        }

        .section-title {
            margin-bottom: 18px;
        }

        .section-title h3 {
            font-size: 19px;
            margin-bottom: 7px;
        }

        .section-title p {
            color: #91847b;
            font-size: 13px;
            line-height: 1.6;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 35px;
        }

        .info-box {
            background: #faf8f5;
            border: 1px solid #eee5dc;
            border-radius: 9px;
            padding: 17px 18px;
            display: flex;
            flex-direction: column;
            gap: 9px;
            min-width: 0;
        }

        .info-box.full {
            grid-column: 1 / -1;
        }

        .label {
            font-size: 11px;
            color: #998b81;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .value {
            font-size: 14px;
            color: #44362e;
            font-weight: 500;
            overflow-wrap: anywhere;
            line-height: 1.6;
        }

        .account-section {
            border-top: 1px solid #eee7df;
            padding-top: 30px;
        }

        .account-list {
            border: 1px solid #eee5dc;
            border-radius: 9px;
            overflow: hidden;
        }

        .account-item {
            padding: 17px 18px;
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
            font-size: 14px;
            font-weight: 500;
        }

        .status {
            display: inline-block;
            background: #e7f5e9;
            color: #43834b;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .feature-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 30px;
        }

        .feature-card {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 22px;
            background: #faf8f5;
            border: 1px solid #eee5dc;
            border-radius: 12px;
            color: #44362e;
            transition: .2s;
        }

        .feature-card:hover {
            border-color: #c89668;
            transform: translateY(-2px);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            border-radius: 10px;
            background: #f0e3d5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
        }

        .feature-text h4 {
            font-size: 14px;
            margin-bottom: 7px;
        }

        .feature-text p {
            font-size: 12px;
            color: #91847b;
            line-height: 1.6;
        }

        .logout-section {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #eee7df;
            display: flex;
            justify-content: flex-end;
        }

        .logout-btn {
            border: 1px solid #d9b8a9;
            background: white;
            color: #a65743;
            padding: 11px 17px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            transition: .2s;
        }

        .logout-btn:hover {
            background: #a65743;
            color: white;
        }

        @media (max-width: 700px) {
            .navbar {
                flex-wrap: wrap;
                padding: 15px 5%;
            }

            .nav-menu {
                order: 3;
                width: 100%;
                justify-content: center;
                gap: 22px;
                padding-top: 10px;
            }

            .container {
                width: 92%;
                margin: 30px auto;
            }

            .page-title h1 {
                font-size: 28px;
            }

            .profile-header {
                padding: 25px;
                flex-wrap: wrap;
            }

            .profile-name h2 {
                font-size: 21px;
            }

            .edit-btn {
                width: 100%;
                text-align: center;
            }

            .profile-content {
                padding: 23px;
            }

            .info-grid,
            .feature-section {
                grid-template-columns: 1fr;
            }

            .info-box.full {
                grid-column: auto;
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
                                    {{ auth()->user()->created_at ? auth()->user()->created_at->format('d F Y'): '-' }}
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
```