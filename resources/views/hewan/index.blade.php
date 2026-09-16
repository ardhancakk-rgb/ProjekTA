<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>🐾 Data Hewan</h2>
        <a href="{{ route('hewan.create') }}" class="btn btn-primary">+ Tambah Hewan</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Ras</th>
                    <th>Umur</th>
                    <th>Gender</th>
                    <th>Status Kesehatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hewan as $item)
                    <tr>
                        <td>
                            @if ($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" width="60" height="60" class="rounded object-fit-cover">
                            @else
                                <span class="text-muted">No foto</span>
                            @endif
                        </td>
                        <td><strong>{{ $item->nama }}</strong></td>
                        <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ $item->ras ?? '-' }}</td>
                        <td>{{ $item->umur }} th/bln</td>
                        <td>{{ ucfirst($item->jenis_kelamin) }}</td>
                        <td>{{ $item->kondisi_kesehatan ?? '-' }}</td>
                        <td>
                            <span class="badge {{ $item->status == 'tersedia' ? 'bg-success' : ($item->status == 'diproses' ? 'bg-warning' : 'bg-secondary') }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('hewan.edit', $item->id_hewan) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('hewan.destroy', $item->id_hewan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Belum ada data hewan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>