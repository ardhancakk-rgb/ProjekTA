<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi Pengajuan Adopsi - Admin PetNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #f5eee5;
            font-family: 'Poppins', sans-serif;
            color: #493522;
            min-height: 100vh;
        }

        .container {
            max-width: 1450px;
        }

        .page-header {
            background: #fff;
            padding: 28px 32px;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(83, 57, 32, .06);
            border: 1px solid #eee3d6;
        }

        .page-header h2 {
            color: #593d25;
            font-size: 25px;
            font-weight: 700;
        }

        .page-header p {
            color: #9b8976 !important;
            font-size: 13px;
        }

        .btn-back {
            background: #f5eee5;
            color: #795638;
            border: 1px solid #e7d8c6;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 9px;
            transition: .2s;
        }

        .btn-back:hover {
            background: #795638;
            color: #fff;
            border-color: #795638;
        }

        .card-table {
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #eadfD2;
            background: #fff;
            box-shadow: 0 6px 25px rgba(83, 57, 32, .07);
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            margin-bottom: 0;
            min-width: 1150px;
        }

        .table thead th {
            background: #68482d;
            color: #fff;
            padding: 18px 15px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 17px 15px;
            vertical-align: middle;
            color: #68533e;
            font-size: 12px;
            border-color: #f0e9e0;
        }

        .table tbody tr {
            transition: background .2s;
        }

        .table tbody tr:hover {
            background: #fcf8f3;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table td small {
            display: inline-block;
            margin-top: 5px;
            line-height: 1.6;
            color: #a18f7c !important;
        }

        .badge {
            padding: 7px 12px;
            font-size: 10px;
            font-weight: 600;
            border-radius: 20px;
        }

        .badge.bg-warning {
            background: #fff0c9 !important;
            color: #986b17 !important;
        }

        .badge.bg-success {
            background: #dff2e5 !important;
            color: #32754a !important;
        }

        .badge.bg-danger {
            background: #fce2df !important;
            color: #b34c43 !important;
        }

        .badge.bg-secondary {
            background: #ece8e2 !important;
            color: #75695d !important;
        }

        .keputusan-form {
            min-width: 190px;
        }

        .form-label {
            color: #64472e;
            font-size: 11px;
            font-weight: 600 !important;
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            border: 1px solid #e7ddd1;
            background-color: #fdfbf8;
            color: #61482f;
            border-radius: 8px;
            font-size: 11px;
            padding: 9px 11px;
            box-shadow: none !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #a77b4e;
            background: #fff;
        }

        textarea.form-control {
            resize: vertical;
        }

        .btn-primary {
            background: #795638;
            border: none;
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 11px;
            font-weight: 600;
            transition: .2s;
        }

        .btn-primary:hover {
            background: #593d25;
        }

        .alert {
            border: none;
            border-radius: 10px;
            font-size: 13px;
            padding: 14px 18px;
        }

        .alert-success {
            background: #e4f3e7;
            color: #36764a;
        }

        .alert-danger {
            background: #fce8e5;
            color: #a8433a;
        }

        @media (max-width: 768px) {
            .container {
                padding-top: 25px !important;
            }

            .page-header {
                padding: 20px;
                align-items: flex-start !important;
                gap: 15px;
            }

            .page-header h2 {
                font-size: 19px;
            }

            .page-header p {
                font-size: 11px;
            }

            .btn-back {
                padding: 8px 12px;
                font-size: 11px;
            }
        }

        /* PERBESAR TAMPILAN DESKTOP */
        @media (min-width: 992px) {
            .container {
                max-width: 96% !important;
                width: 96%;
            }

            .page-header {
                padding: 32px 36px;
            }

            .page-header h2 {
                font-size: 30px;
            }

            .page-header p {
                font-size: 15px;
            }

            .table {
                min-width: 1250px;
            }

            .table thead th {
                font-size: 14px;
                padding: 20px 18px;
            }

            .table tbody td {
                font-size: 14px;
                padding: 22px 18px;
            }

            .table td small {
                font-size: 12px;
            }

            .badge {
                font-size: 12px;
                padding: 8px 14px;
            }

            .form-label {
                font-size: 13px;
            }

            .form-control,
            .form-select {
                font-size: 13px;
                padding: 11px 13px;
            }

            .btn-primary {
                font-size: 13px;
                padding: 11px 14px;
            }

            .btn-back {
                font-size: 14px;
                padding: 12px 22px;
            }
        }

        /* UKURAN FONT LEBIH BESAR */
        body {
            font-size: 16px;
        }

        .page-header h2 {
            font-size: 34px !important;
        }

        .page-header p {
            font-size: 16px !important;
        }

        .table thead th {
            font-size: 15px !important;
        }

        .table tbody td {
            font-size: 16px !important;
        }

        .table td small {
            font-size: 14px !important;
        }

        .badge {
            font-size: 13px !important;
            padding: 9px 15px;
        }

        .form-label {
            font-size: 15px !important;
        }

        .form-control,
        .form-select {
            font-size: 15px !important;
            padding: 12px 14px;
        }

        .btn-primary,
        .btn-back {
            font-size: 15px !important;
            padding: 12px 16px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="page-header d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Konfirmasi Pengajuan Adopsi</h2>
                <p class="mb-0">Kelola dan konfirmasi pengajuan adopsi hewan.</p>
            </div>
            <a href="{{ url('/admindash') }}" class="btn btn-back">Kembali</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
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
                                <td>{{ $item->user->name ?? 'User tidak tersedia' }}</td>
                                <td>{{ $item->hewan->nama_hewan ?? 'Hewan tidak tersedia' }}</td>
                                <td>
                                    <div>{{ $item->telepon_pemohon ?? '-' }}</div>
                                    <small class="text-muted">{{ $item->alamat_pemohon ?? '-' }}</small>
                                </td>
                                <td>{{ $item->alasan_adopsi ?? '-' }}</td>
                                <td>{{ $item->tanggal_pengajuan ?? '-' }}</td>
                                <td>
                                    @if ($item->status_pengajuan == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif ($item->status_pengajuan == 'disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif ($item->status_pengajuan == 'ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak diketahui</span>
                                    @endif
                                </td>
                                <td style="min-width: 210px;">
                                    <form action="{{ route('admin.pengajuan.update', $item->id_pengajuan) }}" method="POST"
                                        class="keputusan-form">
                                        @csrf
                                        @method('PATCH')
                                        <label class="form-label fw-semibold">Keputusan Admin</label>
                                        <select name="status_pengajuan" class="form-select form-select-sm mb-2" required>
                                            <option value="pending" {{ old('status_pengajuan', $item->status_pengajuan) == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="disetujui" {{ old('status_pengajuan', $item->status_pengajuan) == 'disetujui' ? 'selected' : '' }}>Disetujui
                                            </option>
                                            <option value="ditolak" {{ old('status_pengajuan', $item->status_pengajuan) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                        </select>
                                        <label class="form-label fw-semibold">Catatan Admin</label>
                                        <textarea name="catatan_admin" class="form-control form-control-sm mb-2" rows="3"
                                            placeholder="Masukkan catatan admin...">{{ old('catatan_admin', $item->catatan_admin) }}</textarea>
                                        <button type="submit" class="btn btn-primary btn-sm w-100"
                                            onclick="return confirm('Apakah kamu yakin ingin menyimpan keputusan ini?')">
                                            Simpan Keputusan
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">Belum ada pengajuan adopsi.</td>
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