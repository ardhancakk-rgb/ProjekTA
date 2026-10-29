<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Adopsi - PetNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <a href="{{ route('profile.index') }}" class="text-decoration-none">
            &larr; Kembali ke Profil
        </a>

        <h2 class="mt-3 mb-4">Riwayat Pengajuan Adopsi</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($pengajuan->isEmpty())
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <h5>Belum Ada Pengajuan</h5>
                    <p class="text-muted">Kamu belum pernah mengajukan adopsi hewan.</p>
                    <a href="{{ route('pets.index') }}" class="btn btn-dark">
                        Lihat Hewan
                    </a>
                </div>
            </div>
        @else
            <div class="table-responsive bg-white rounded shadow-sm">
                <table class="table table-bordered align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Hewan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Catatan Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan as $item)
                            <tr>
                                <td>
                                    {{ $item->hewan->nama_hewan ?? 'Hewan tidak tersedia' }}
                                </td>
                                <td>{{ $item->tanggal_pengajuan }}</td>
                                <td>
                                    @if ($item->status_pengajuan === 'pending')
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                    @elseif ($item->status_pengajuan === 'disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>{{ $item->catatan_admin ?: '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</body>

</html>