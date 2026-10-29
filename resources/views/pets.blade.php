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

        .nav {
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

        .nav a {
            color: #fff;
            text-decoration: none;
            font-size: 30px;
            margin-right: 20px;
        }

        .nav a:hover {
            color: #aaa9a9;
        }

        .nav form {
            margin-right: 20px;
        }

        .nav button {
            padding: 0;
            border: 0;
            background: transparent;
            color: #fff;
            font-size: 30px;
            cursor: pointer;
        }

        .nav button:hover {
            color: #aaa9a9;
        }
    </style>
</head>

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