<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submission - PetNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-4">
    <main class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-1">Submission</h1>
                <p class="text-muted mb-0">Pilih hewan yang ingin kamu adopsi.</p>
            </div>
            <a href="{{ route('pets.index') }}" class="btn btn-outline-secondary">Kembali ke Pets</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="table-responsive p-3 p-md-4">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Foto</th>
                            <th>Nama Hewan</th>
                            <th>Kategori</th>
                            <th>Ras</th>
                            <th>Umur</th>
                            <th>Gender</th>
                            <th>Status Kesehatan</th>
                            <th>Status Adopsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hewan as $item)
                            <tr>
                                <td>
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_hewan }}"
                                            width="60" height="60" class="rounded object-fit-cover">
                                    @else
                                        <span class="text-muted">No foto</span>
                                    @endif
                                </td>
                                <td><strong>{{ $item->nama_hewan }}</strong></td>
                                <td>{{ $item->kategori?->nama_kategori ?? '-' }}</td>
                                <td>{{ $item->ras ?? '-' }}</td>
                                <td>{{ $item->umur }} tahun</td>
                                <td>{{ ucfirst($item->jenis_kelamin) }}</td>
                                <td>{{ $item->status_kesehatan ?? '-' }}</td>
                                <td>
                                    @if ($item->status_adopsi === 'tersedia')
                                        <span class="badge bg-success">Tersedia</span>
                                    @elseif ($item->status_adopsi === 'diproses')
                                        <span class="badge bg-warning text-dark">Diproses</span>
                                    @else
                                        <span class="badge bg-secondary">Diadopsi</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status_adopsi === 'tersedia')
                                        <a href="{{ route('adopsi.create', $item->id_hewan) }}"
                                            class="btn btn-sm btn-dark">Ajukan Adopsi</a>
                                    @elseif ($item->status_adopsi === 'diproses')
                                        <button class="btn btn-sm btn-warning" disabled>Sedang Diproses</button>
                                    @else
                                        <button class="btn btn-sm btn-secondary" disabled>Sudah Diadopsi</button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4">Belum ada data hewan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>
