<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan Adopsi - Admin PetNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <h2 class="mb-4">Pengajuan Adopsi</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                Periksa kembali data yang dikirim.
            </div>
        @endif

        <div class="table-responsive bg-white rounded shadow-sm">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>User</th>
                        <th>Hewan</th>
                        <th>Kontak dan Alamat</th>
                        <th>Alasan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Keputusan Admin</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengajuan as $item)
                        <tr>
                            <td>
                                {{ $item->user->name ?? 'User tidak tersedia' }}
                            </td>
                            <td>
                                {{ $item->hewan->nama_hewan ?? 'Hewan tidak tersedia' }}
                            </td>
                            <td>
                                <div>{{ $item->telepon_pemohon }}</div>
                                <small>{{ $item->alamat_pemohon }}</small>
                            </td>
                            <td>{{ $item->alasan_adopsi }}</td>
                            <td>{{ $item->tanggal_pengajuan }}</td>
                            <td>{{ ucfirst($item->status_pengajuan) }}</td>
                            <td>
                                @if ($item->status_pengajuan === 'pending')
                                    <form action="{{ route('admin.pengajuan.update', $item->id_pengajuan) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <textarea name="catatan_admin" class="form-control mb-2" rows="2"
                                            placeholder="Catatan admin (opsional)">{{ old('catatan_admin') }}</textarea>

                                        <button type="submit" name="status_pengajuan" value="disetujui"
                                            class="btn btn-success btn-sm mb-1">
                                            Setujui
                                        </button>

                                        <button type="submit" name="status_pengajuan" value="ditolak"
                                            class="btn btn-danger btn-sm mb-1"
                                            onclick="return confirm('Yakin ingin menolak pengajuan ini?')">
                                            Tolak
                                        </button>
                                    </form>
                                @else
                                    <div>{{ $item->catatan_admin ?: '-' }}</div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                Belum ada pengajuan adopsi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>