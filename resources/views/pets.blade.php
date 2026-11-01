<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hewan Peliharaan - PetNest</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            font-family: 'Outfit', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: sans-serif;
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.56), rgba(0, 0, 0, 0.75)),
                url('{{ asset('images/dashh bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: block;
        }

        .content {
            position: relative;
            width: min(1100px, calc(100% - 40px));
            margin: 110px auto 40px;
            color: #fff;
            text-align: center;
        }

        .content h1 {
            font-size: clamp(2rem, 5vw, 3.5rem);
        }

        .pet-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
            margin-top: 30px;
            text-align: left;
        }

        .pet-card {
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.95);
            color: #3f3028;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .pet-photo,
        .pet-photo-placeholder {
            display: block;
            width: 100%;
            height: 190px;
            object-fit: cover;
        }

        .pet-photo-placeholder {
            display: grid;
            place-items: center;
            background: #e9e1d9;
            color: #76675d;
        }

        .pet-details {
            padding: 18px;
        }

        .pet-details h2 {
            margin-bottom: 10px;
            font-size: 1.3rem;
        }

        .pet-details p {
            margin: 5px 0;
        }

        .pet-status {
            display: inline-block;
            margin: 10px 0;
            padding: 5px 10px;
            border-radius: 999px;
            background: #eee6dc;
            font-size: 0.85rem;
        }

        .pet-action {
            display: inline-block;
            margin-top: 8px;
            padding: 9px 14px;
            border: 0;
            border-radius: 8px;
            background: #61402d;
            color: white;
            font: inherit;
            text-decoration: none;
        }

        .pet-action:disabled {
            background: #8d8178;
            cursor: not-allowed;
        }

        .empty-state {
            margin-top: 30px;
            padding: 30px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.95);
            color: #3f3028;
        }

        .logo {
            display: flex;
            flex-direction: column;
            line-height: 0.9;
        }

        .logo span:first-child {
            color: #e2702f;
            font-weight: bold;
            font-size: 30px;
        }

        .logo span:last-child {
            color: #fff7f7;
            font-weight: bold;
            font-size: 30px;
        }

        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 50px;
            box-sizing: border-box;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 35px;
        }

        .nav-menu a {
            color: #fff7f7;
            text-decoration: none;
            font-size: 30px;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #e2702f;
        }


        .nav-auth {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-auth a {
            color: #fff7f7;
            text-decoration: none;
            font-size: 30px;
        }

        .nav-auth a:hover {
            color: #faf9f9;
        }

        .nav-auth .login {
            font-weight: bold;
        }

        .nav-auth .login:hover {
            color: #c9a06b;
        }

        .nav-auth .register {
            background-color: #452817;
            color: white;
            padding: 8px 18px;
            border-radius: 6px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
            transition: 0.3s;
        }

        .nav-auth .register:hover {
            background-color: #5a3520;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            transform: translateY(-10px);
        }

        header.navbar .nav-right {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            flex-shrink: 0;
        }

        header.navbar .nav-right a.btn-login {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            padding: 9px 16px !important;
            border: 1px solid rgba(255, 247, 247, 0.5) !important;
            border-radius: 8px !important;
            background: rgba(255, 255, 255, 0.1) !important;
            color: #fff7f7 !important;
            font-family: "Outfit", sans-serif !important;
            font-size: 30px !important;
            font-weight: 700 !important;
            text-decoration: none !important;
            white-space: nowrap;
        }

        header.navbar .nav-right a.btn-login:hover {
            color: #e2702f !important;
            border-color: #e2702f !important;
        }

        header.navbar .nav-right form {
            display: inline-flex !important;
            margin: 0 !important;
        }

        header.navbar .nav-right button.btn-register {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            padding: 8px 15px !important;
            border: 1px solid #452817 !important;
            border-radius: 8px !important;
            background: #452817 !important;
            color: #fff !important;
            font-family: "Outfit", sans-serif !important;
            font-size: 30px !important;
            font-weight: 700 !important;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: background 0.2s ease;
        }

        header.navbar .nav-right button.btn-register:hover {
            background: #70482f !important;
            border-color: #70482f !important;
        }

    </style>
</head>
<header class="navbar">
        <div class="logo">
            <span>Pet</span><br>
            <span>Nest</span>
        </div>
        <nav class="nav-menu">
            <a href="/">Home</a>
            <a href="/pets"class="active">Pets</a>
            <a href="/profile">Profile</a>
            <a href="/contact">Contact</a>
            <a href="{{ route('submission.index') }}">Submission</a>
        </nav>
        <div class="nav-right">
            @auth
                <a href="{{ route('profile.index') }}" class="btn-login">
                    {{ auth()->user()->username ?? auth()->user()->name }}
                </a>

                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-register">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-login">
                    Login
                </a>
                <a href="{{ route('register') }}" class="btn-register">
                    Daftar
                </a>
            @endauth
        </div>
    </header>
<body>
    <main class="content">
        <h1>Daftar Hewan Peliharaan</h1>
        @if (session('error'))
            <p class="empty-state" role="alert">{{ session('error') }}</p>
        @endif

        @if ($hewan->isEmpty())
            <p class="empty-state">Belum ada hewan yang terdaftar.</p>
        @else
            <section class="pet-grid" aria-label="Daftar hewan">
                @foreach ($hewan as $item)
                    <article class="pet-card">
                        @if ($item->foto)
                            <img class="pet-photo" src="{{ asset('storage/' . $item->foto) }}"
                                alt="{{ $item->nama_hewan }}">
                        @else
                            <div class="pet-photo-placeholder">Foto belum tersedia</div>
                        @endif

                        <div class="pet-details">
                            <h2>{{ $item->nama_hewan }}</h2>
                            <p>Kategori: {{ $item->kategori?->nama_kategori ?? '-' }}</p>
                            <p>Ras: {{ $item->ras ?? '-' }}</p>
                            <p>Umur: {{ $item->umur }} tahun</p>
                            <p>Jenis kelamin: {{ ucfirst($item->jenis_kelamin) }}</p>
                            <span class="pet-status">{{ ucfirst($item->status_adopsi) }}</span>

                            @if ($item->status_adopsi === 'tersedia')
                                <div>
                                    <a class="pet-action" href="{{ route('adopsi.create', $item->id_hewan) }}">
                                        Ajukan Adopsi
                                    </a>
                                </div>
                            @elseif ($item->status_adopsi === 'diproses')
                                <div><button class="pet-action" type="button" disabled>Sedang Diproses</button></div>
                            @else
                                <div><button class="pet-action" type="button" disabled>Sudah Diadopsi</button></div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </section>
        @endif
    </main>
    <header class="nav">
        @auth
            <a href="{{ route('dashboard') }}" aria-label="Dashboard"><i class="fa-solid fa-house"></i></a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" aria-label="Logout"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Daftar</a>
        @endauth
    </header>
</body>

</html>