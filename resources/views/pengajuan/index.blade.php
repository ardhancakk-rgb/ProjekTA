
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi Pengajuan Adopsi - Admin PetNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #aa8151;
        }

        .card-table {
            border-radius: 14px;
            overflow: hidden;
            border: none;
        }

        .table th {
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .btn {
            border-radius: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
        }

        .keputusan-form {
            min-width: 190px;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Konfirmasi Pengajuan Adopsi</h2>
                <p class="text-muted mb-0">
                    Kelola dan konfirmasi pengajuan adopsi hewan.
                </p>
            </div>

            <a href="{{ url('/admindash') }}" class="btn btn-outline-secondary">
                Kembali
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card card-table shadow-sm">
            <div class="table-responsive">

                <table class="table table-bordered align-middle mb-0">

                    <thead class="table-dark">
                        <tr>
                            <th>User</th>
                            <th>Hewan</th>
                            <th>Kontak dan Alamat</th>
                            <th>Alasan Adopsi</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status Pengajuan</th>
                            <th>Konfirmasi Admin</th>
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
                                    <div>
                                        {{ $item->telepon_pemohon ?? '-' }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $item->alamat_pemohon ?? '-' }}
                                    </small>
                                </td>

                                <td>
                                    {{ $item->alasan_adopsi ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->tanggal_pengajuan ?? '-' }}
                                </td>

                                <td>
                                    @if ($item->status_pengajuan == 'pending')
                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>

                                    @elseif ($item->status_pengajuan == 'disetujui')
                                        <span class="badge bg-success">
                                            Disetujui
                                        </span>

                                    @elseif ($item->status_pengajuan == 'ditolak')
                                        <span class="badge bg-danger">
                                            Ditolak
                                        </span>

                                    @else
                                        <span class="badge bg-secondary">
                                            Tidak diketahui
                                        </span>
                                    @endif
                                </td>

                                <td style="min-width: 210px;">

                                    <form
                                        action="{{ route('admin.pengajuan.update', $item->id_pengajuan) }}"
                                        method="POST"
                                        class="keputusan-form">

                                        @csrf
                                        @method('PATCH')

                                        <label class="form-label fw-semibold">
                                            Keputusan Admin
                                        </label>

                                        <select
                                            name="status_pengajuan"
                                            class="form-select form-select-sm mb-2"
                                            required>

                                            <option value="pending"
                                                {{ old('status_pengajuan', $item->status_pengajuan) == 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>

                                            <option value="disetujui"
                                                {{ old('status_pengajuan', $item->status_pengajuan) == 'disetujui' ? 'selected' : '' }}>
                                                Disetujui
                                            </option>

                                            <option value="ditolak"
                                                {{ old('status_pengajuan', $item->status_pengajuan) == 'ditolak' ? 'selected' : '' }}>
                                                Ditolak
                                            </option>

                                        </select>

                                        <label class="form-label fw-semibold">
                                            Catatan Admin
                                        </label>

                                        <textarea
                                            name="catatan_admin"
                                            class="form-control form-control-sm mb-2"
                                            rows="3"
                                            placeholder="Masukkan catatan admin...">{{ old('catatan_admin', $item->catatan_admin) }}</textarea>

                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-sm w-100"
                                            onclick="return confirm('Apakah kamu yakin ingin menyimpan keputusan ini?')">

                                            Simpan Keputusan

                                        </button>

                                    </form>

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

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
