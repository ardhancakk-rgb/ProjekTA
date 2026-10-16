
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

        .navbar {
            height: 70px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            border-bottom: 1px solid #eee5dc;
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            color: #5b3c2e;
        }

        .logo span {
            color: #b27a4a;
        }

        .nav-menu {
            display: flex;
            gap: 30px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #776a61;
            font-size: 14px;
            transition: 0.2s;
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
            width: 36px;
            height: 36px;
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
            margin: 50px auto;
        }

        .page-title {
            margin-bottom: 25px;
        }

        .page-title .small-title {
            color: #b07849;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 7px;
        }

        .page-title h1 {
            font-size: 34px;
            margin-bottom: 7px;
        }

        .page-title p {
            color: #8b7d73;
            font-size: 14px;
        }

        .profile-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;

            box-shadow: 0 8px 30px rgba(60, 40, 25, 0.08);
        }

        .profile-header {
            background: linear-gradient(
                120deg,
                #5d4235,
                #84604a
            );

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

            border: 4px solid rgba(255,255,255,0.8);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 32px;
            font-weight: bold;

            flex-shrink: 0;
        }

        .profile-name {
            flex: 1;
        }

        .profile-name h2 {
            font-size: 25px;
            margin-bottom: 5px;
        }

        .profile-name p {
            color: #eadfd7;
            font-size: 14px;
        }

        .edit-btn {
            border: 1px solid rgba(255,255,255,0.6);

            background: rgba(255,255,255,0.12);

            color: white;

            padding: 10px 16px;

            border-radius: 8px;

            cursor: pointer;

            font-size: 13px;

            transition: 0.2s;
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
            margin-bottom: 5px;
        }

        .section-title p {
            color: #91847b;
            font-size: 13px;
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

            padding: 16px 18px;

            display: flex;
            flex-direction: column;

            gap: 7px;
        }

        .info-box.full {
            grid-column: 1 / -1;
        }

        .label {
            font-size: 11px;

            color: #998b81;

            text-transform: uppercase;

            letter-spacing: 0.5px;
        }

        .value {
            font-size: 14px;

            color: #44362e;

            font-weight: 500;
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
            padding: 16px 18px;

            background: #faf8f5;

            border-bottom: 1px solid #eee5dc;
        }

        .account-item:last-child {
            border-bottom: none;
        }

        .account-item > div {
            display: flex;

            align-items: center;

            justify-content: space-between;
        }

        .account-label {
            color: #74665d;

            font-size: 14px;

            font-weight: 500;
        }

        .status {
            background: #e7f5e9;

            color: #43834b;

            padding: 5px 12px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: bold;
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

            padding: 10px 16px;

            border-radius: 8px;

            cursor: pointer;

            font-size: 13px;

            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #a65743;
            color: white;
        }

        @media (max-width: 700px) {

            .navbar {
                padding: 0 5%;
            }

            .nav-menu {
                display: none;
            }

            .container {
                width: 92%;
                margin: 35px auto;
            }

            .page-title h1 {
                font-size: 28px;
            }

            .profile-header {
                padding: 25px;
                flex-wrap: wrap;
            }

            .edit-btn {
                width: 100%;
            }

            .profile-content {
                padding: 25px;
            }

            .info-grid {
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
        <div class="logo">
            <span>Pet</span>Nest
        </div>
        <div class="nav-menu">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="#">
                Hewan
            </a>
            <a href="{{ url('/profile') }}" class="active">
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
            <div class="small-title">
                AKUN SAYA
            </div>
            <h1>
                Profil Saya
            </h1>
            <p>
                Kelola informasi akun dan data pribadi kamu.
            </p>
        </div>
        <section class="profile-card">
            <div class="profile-header">
                <div class="profile-photo">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <div class="profile-name">
                    <h2>
                        {{ auth()->user()->name ?? 'User' }}
                    </h2>
                    <p>
                        Pengguna PetNest
                    </p>
                </div>
                <button
                    type="button"
                    class="edit-btn"
                    onclick="alert('Fitur edit profil akan segera tersedia.')">
                    ✎ Edit Profil
                </button>
            </div>
            <div class="profile-content">
                <div class="section-title">
                    <h3>
                        Informasi Pribadi
                    </h3>
                    <p>
                        Informasi akun yang terdaftar di PetNest.
                    </p>
                </div>
                <div class="info-grid">
                    <div class="info-box">
                        <span class="label">
                            Nama Lengkap
                        </span>
                        <span class="value">
                            {{ auth()->user()->name ?? '-' }}
                        </span>
                    </div>
                    <div class="info-box">
                        <span class="label">
                            Username
                        </span>
                        <span class="value">
                            {{ auth()->user()->username ?? '-' }}
                        </span>
                    </div>
                    <div class="info-box">
                        <span class="label">
                            Email
                        </span>
                        <span class="value">
                            {{ auth()->user()->email ?? '-' }}
                        </span>
                    </div>
                    <div class="info-box">
                        <span class="label">
                            Nomor Telepon
                        </span>
                        <span class="value">
                            {{ auth()->user()->no_hp ?? '-' }}
                        </span>
                    </div>
                    <div class="info-box full">
                        <span class="label">
                            Alamat
                        </span>
                        <span class="value">
                            {{ auth()->user()->alamat ?? '-' }}
                        </span>
                    </div>
                </div>
                <div class="account-section">
                    <div class="section-title">
                        <h3>
                            Informasi Akun
                        </h3>
                        <p>
                            Status akun kamu di PetNest.
                        </p>
                    </div>
                    <div class="account-list">
                        <div class="account-item">
                            <div>
                                <span class="account-label">
                                    Status Akun
                                </span>
                                <span class="status">
                                    {{ ucfirst(auth()->user()->status ?? 'Aktif') }}
                                </span>
                            </div>
                        </div>
                        <div class="account-item">
                            <div>
                                <span class="account-label">
                                    Bergabung Sejak
                                </span>
                                <span>
                                    {{ auth()->user()->created_at
                                        ? auth()->user()->created_at->format('d F Y')
                                        : '-' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logout-section">
                    <form
                        action="{{ route('logout') }}"
                        method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="logout-btn">
                            Keluar dari Akun
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>