<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan Adopsi - PetNest</title>
    <style>
        body {
            margin: 0;
            padding: 30px;
            background: #f7f5f2;
            color: #4a3529;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: auto;
            padding: 25px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px #00000012;
        }

        img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 8px;
        }

        button {
            width: 100%;
            margin-top: 15px;
            padding: 12px;
            border: 0;
            border-radius: 6px;
            background: #4a3529;
            color: white;
            cursor: pointer;
        }

        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <main class="container">
        <h1>Pengajuan Adopsi Hewan</h1>

        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        @if ($hewan->gambar)
            <img src="{{ asset('storage/' . $hewan->gambar) }}" alt="{{ $hewan->nama }}">
        @endif

        <h2>{{ $hewan->nama }}</h2>
        <p>Ras: {{ $hewan->ras ?? '-' }}</p>
        <p>Umur: {{ $hewan->umur }} tahun</p>
        <p>Jenis kelamin: {{ ucfirst($hewan->jenis_kelamin) }}</p>
        <p>Status: {{ ucfirst($hewan->status) }}</p>

        @if ($hewan->status === 'tersedia')
            <form action="{{ route('adopsi.store', $hewan->id_hewan) }}" method="POST">
                @csrf
                <p>
                    Dengan menekan tombol di bawah, kamu menyatakan berminat mengadopsi
                    hewan ini dan bersedia menunggu proses verifikasi admin.
                </p>
                <button type="submit">Kirim Pengajuan Adopsi</button>
            </form>
        @else
            <p>Maaf, hewan ini sudah tidak tersedia.</p>
        @endif
    </main>
</body>
</html>
