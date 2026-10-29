<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submission - PetNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="mb-4">
            <a href="{{ route('pets.index') }}" class="text-decoration-none">
                &larr; Kembali ke Pets
            </a>
            <h2 class="mt-3">Formulir Pengajuan Adopsi</h2>
            <p class="text-muted">Lengkapi data berikut untuk mengajukan adopsi.</p>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-sm mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                    @if ($hewan->foto)
                        <img src="{{ asset('storage/' . $hewan->foto) }}" class="img-fluid rounded-start w-100 h-100"
                            style="object-fit: cover; min-height: 220px;" alt="{{ $hewan->nama_hewan }}">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-secondary-subtle h-100 p-5">
                            Foto tidak tersedia
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body p-4">
                        <h4>{{ $hewan->nama_hewan }}</h4>
                        <p class="mb-1">Ras: {{ $hewan->ras }}</p>
                        <p class="mb-1">Umur: {{ $hewan->umur }}</p>
                        <p class="mb-1">Jenis kelamin: {{ $hewan->jenis_kelamin }}</p>
                        <p class="mb-0">Status: {{ ucfirst($hewan->status_adopsi) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('adopsi.store', $hewan->id_hewan) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="telepon_pemohon" class="form-label">Nomor Telepon</label>
                        <input type="tel" id="telepon_pemohon" name="telepon_pemohon" class="form-control"
                            value="{{ old('telepon_pemohon') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_pemohon" class="form-label">Alamat</label>
                        <textarea id="alamat_pemohon" name="alamat_pemohon" class="form-control" rows="3"
                            required>{{ old('alamat_pemohon') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="alasan_adopsi" class="form-label">Alasan Mengadopsi</label>
                        <textarea id="alasan_adopsi" name="alasan_adopsi" class="form-control" rows="4"
                            required>{{ old('alasan_adopsi') }}</textarea>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="persetujuan" required>
                        <label class="form-check-label" for="persetujuan">
                            Saya menyatakan bahwa data yang saya isi benar.
                        </label>
                    </div>

                    <button type="submit" class="btn btn-dark">
                        Kirim Pengajuan
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>