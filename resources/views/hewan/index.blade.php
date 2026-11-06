<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Hewan - PetNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: #f7f5f0;
            color: #302820;
            min-height: 100vh;
            padding: 45px 0;
        }

        .page-header {
            margin-bottom: 28px;
        }

        .page-header h1 {
            font-size: 27px;
            font-weight: 800;
            color: #49372a;
            letter-spacing: -.8px;
        }

        .page-header p {
            color: #94877c;
            font-size: 13px;
            margin-top: 7px;
        }

        .header-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-back {
            border: 1px solid #e5ddd2;
            color: #725b48;
            background: #fff;
            padding: 11px 19px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-back:hover {
            background: #eee7dd;
            color: #49372a;
        }

        .btn-add {
            background: #79583e;
            color: #fff;
            border: none;
            padding: 11px 19px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-add:hover {
            background: #5e422e;
            color: #fff;
            transform: translateY(-1px);
        }

        .table-card {
            background: #fff;
            border: 1px solid #eee9e2;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 8px 30px rgba(68, 49, 32, .045);
        }

        .table-title {
            font-size: 16px;
            font-weight: 800;
            color: #49372a;
            margin-bottom: 20px;
        }

        .table-responsive {
            border-radius: 12px;
        }

        .table {
            margin-bottom: 0;
            white-space: nowrap;
            vertical-align: middle;
        }

        .table thead th {
            background: #f8f5f0;
            color: #725b48;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .4px;
            padding: 16px 13px;
            border-bottom: 1px solid #eee7dd;
        }

        .table tbody td {
            padding: 14px 13px;
            font-size: 12px;
            color: #65584d;
            border-bottom: 1px solid #f1ede8;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background: #fdfbf8;
        }

        .animal-photo {
            width: 58px;
            height: 58px;
            object-fit: cover;
            border-radius: 11px;
            border: 1px solid #eee7dd;
        }

        .animal-name {
            font-weight: 700;
            color: #49372a;
        }

        .badge {
            padding: 7px 11px;
            border-radius: 7px;
            font-size: 10px;
            font-weight: 700;
        }

        .bg-success {
            background: #e5f3e9 !important;
            color: #34734a !important;
        }

        .bg-warning {
            background: #fff1d8 !important;
            color: #93621c !important;
        }

        .bg-secondary {
            background: #eeeae5 !important;
            color: #76695e !important;
        }

        .btn-edit {
            color: #79583e;
            border: 1px solid #d8c6b4;
            background: #fff;
            border-radius: 8px;
            padding: 7px 12px;
            font-size: 11px;
            font-weight: 700;
        }

        .btn-edit:hover {
            background: #79583e;
            color: #fff;
        }

        .btn-delete {
            color: #bd5353;
            border: 1px solid #edcccc;
            background: #fff;
            border-radius: 8px;
            padding: 7px 12px;
            font-size: 11px;
            font-weight: 700;
        }

        .btn-delete:hover {
            background: #bd5353;
            color: #fff;
        }

        .empty-data {
            padding: 35px !important;
            color: #a69a8f !important;
        }

        .alert {
            border-radius: 12px;
            font-size: 13px;
        }

        @media (max-width: 576px) {
            body {
                padding: 25px 0;
            }

            .page-header {
                align-items: flex-start !important;
                flex-direction: column;
                gap: 18px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .header-actions {
                width: 100%;
            }

            .header-actions a {
                flex: 1;
                text-align: center;
            }

            .table-card {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <main class="container" style="max-width: 1250px;">
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h1>Data Hewan</h1>
                <p>Kelola informasi dan data hewan yang terdaftar di PetNest.</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('admindash.dashboard') }}" class="btn btn-back">← Kembali</a>
                <a href="{{ route('hewan.create') }}" class="btn btn-add">+ Tambah Hewan</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="table-card">
            <h6 class="table-title">Daftar Hewan</h6>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
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
                                        <img
                                            src="{{ asset('storage/' . $item->foto) }}"
                                            alt="{{ $item->nama_hewan }}"
                                            class="animal-photo"
                                        >
                                    @else
                                        <span class="text-muted">No foto</span>
                                    @endif
                                </td>
                                <td><span class="animal-name">{{ $item->nama_hewan }}</span></td>
                                <td>{{ $item->kategori?->nama_kategori ?? '-' }}</td>
                                <td>{{ $item->ras ?? '-' }}</td>
                                <td>{{ $item->umur }} tahun</td>
                                <td>{{ ucfirst($item->jenis_kelamin) }}</td>
                                <td>{{ $item->status_kesehatan ?? '-' }}</td>
                                <td>
                                    <span class="badge {{ $item->status_adopsi === 'tersedia' ? 'bg-success' : ($item->status_adopsi === 'diproses' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                        {{ ucfirst($item->status_adopsi) }}
                                    </span>
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('hewan.edit', $item->id_hewan) }}" class="btn btn-edit">Edit</a>
                                    <form
                                        action="{{ route('hewan.destroy', $item->id_hewan) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center empty-data">
                                    Belum ada data hewan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
