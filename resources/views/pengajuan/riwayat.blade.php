<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Adopsi - PetNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* RESET */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f4ef;
            color: #3d3028;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        /* NAVBAR */
        .navbar {
            min-height: 82px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 7%;
            border-bottom: 1px solid #eee5dc;
            gap: 25px;
        }

        .logo {
            font-size: 32px;
            font-weight: bold;
            color: #5b3c2e;
            white-space: nowrap;
        }

        .logo span {
            color: #b27a4a;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 35px;
        }

        .nav-menu a {
            color: #776a61;
            font-size: 16px;
            transition: 0.2s;
            white-space: nowrap;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #a86f40;
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 16px;
            font-weight: 600;
            min-width: 0;
        }

        .nav-user span {
            overflow-wrap: anywhere;
        }

        .user-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #c89668;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 19px;
            flex-shrink: 0;
        }

        /* KONTEN UTAMA */
        .container {
            width: 88%;
            max-width: 1280px;
            margin: 60px auto;
        }

        .page-title {
            margin-bottom: 32px;
        }

        .small-title {
            color: #b07849;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 2.5px;
            margin-bottom: 10px;
        }

        .page-title h1 {
            font-size: 42px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .page-title p {
            color: #8b7d73;
            font-size: 16px;
            line-height: 1.7;
        }

        /* NOTIFIKASI */
        .alert-success {
            padding: 18px 22px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 16px;
            line-height: 1.6;
            background: #e7f5e9;
            color: #347742;
            border: 1px solid #c7e8cd;
        }

        /* KARTU RIWAYAT */
        .history-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(60, 40, 25, 0.09);
        }

        .history-header {
            padding: 30px 35px;
            border-bottom: 1px solid #eee5dc;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .history-header h3 {
            font-size: 25px;
            color: #44362e;
            margin-bottom: 8px;
        }

        .history-header p {
            font-size: 15px;
            color: #91847b;
            line-height: 1.7;
        }

        .history-count {
            background: #f0e3d5;
            color: #79543b;
            padding: 10px 16px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: bold;
            white-space: nowrap;
        }

        /* TABEL */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .history-table {
            width: 100%;
            min-width: 700px;
            border-collapse: collapse;
            background: white;
            margin: 0;
        }

        .history-table thead {
            background: #faf8f5;
        }

        .history-table th {
            padding: 22px 25px;
            color: #8b7769;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 0.7px;
            text-align: left;
            text-transform: uppercase;
            border-bottom: 1px solid #eee5dc;
            white-space: nowrap;
        }

        .history-table td {
            padding: 23px 25px;
            font-size: 15px;
            color: #514239;
            border-bottom: 1px solid #f0e9e2;
            vertical-align: middle;
        }

        .history-table tbody tr {
            transition: background 0.2s;
        }

        .history-table tbody tr:hover {
            background: #fdfbf8;
        }

        .history-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* NAMA HEWAN */
        .pet-name {
            display: flex;
            align-items: center;
            gap: 13px;
            min-width: 160px;
            font-size: 16px;
            font-weight: bold;
            color: #44362e;
        }

        .pet-icon {
            width: 46px;
            height: 46px;
            background: #f0e3d5;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            flex-shrink: 0;
        }

        /* TANGGAL */
        .date-text {
            color: #776a61;
            white-space: nowrap;
        }

        /* STATUS PENGAJUAN */
        .status-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 9px 15px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status-pending {
            color: #936500;
            background: #fff1c9;
        }

        .status-approved {
            color: #347742;
            background: #e2f5e5;
        }

        .status-rejected {
            color: #a33c2c;
            background: #fff0ed;
        }

        /* CATATAN ADMIN */
        .admin-note {
            min-width: 150px;
            max-width: 280px;
            color: #776a61;
            font-size: 14px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        /* KONDISI KOSONG */
        .empty-state {
            padding: 65px 30px;
            text-align: center;
        }

        .empty-icon {
            width: 100px;
            height: 100px;
            background: #f0e3d5;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            margin: 0 auto 25px;
        }

        .empty-state h3 {
            font-size: 27px;
            color: #44362e;
            margin-bottom: 12px;
        }

        .empty-state p {
            color: #91847b;
            font-size: 16px;
            line-height: 1.8;
            max-width: 450px;
            margin: 0 auto 25px;
        }

        .btn-petnest {
            display: inline-block;
            background: #5d4235;
            color: white;
            padding: 14px 24px;
            border-radius: 9px;
            font-size: 15px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-petnest:hover {
            background: #84604a;
            color: white;
            transform: translateY(-2px);
        }

        /* FOOTER */
        .footer {
            text-align: center;
            padding: 25px 15px;
            color: #91847b;
            font-size: 14px;
        }

        /* RESPONSIVE TABLET */
        @media (max-width: 900px) {
            .navbar {
                padding: 15px 5%;
                gap: 18px;
            }

            .nav-menu {
                gap: 20px;
            }

            .container {
                width: 92%;
                margin: 40px auto;
            }

            .history-header {
                padding: 25px;
            }

            .history-table th,
            .history-table td {
                padding: 20px;
            }
        }

        /* RESPONSIVE HP */
        @media (max-width: 700px) {
            .navbar {
                flex-wrap: wrap;
                padding: 15px 5%;
            }

            .logo {
                font-size: 28px;
            }

            .nav-menu {
                order: 3;
                width: 100%;
                justify-content: center;
                gap: 22px;
                padding-top: 10px;
                flex-wrap: wrap;
            }

            .nav-menu a {
                font-size: 14px;
            }

            .nav-user {
                font-size: 14px;
                gap: 8px;
            }

            .user-avatar {
                width: 38px;
                height: 38px;
                font-size: 16px;
            }

            .container {
                width: 92%;
                margin: 30px auto;
            }

            .page-title h1 {
                font-size: 32px;
            }

            .page-title p {
                font-size: 14px;
            }

            .history-card {
                border-radius: 15px;
            }

            .history-header {
                padding: 22px 20px;
                align-items: flex-start;
                flex-direction: column;
                gap: 13px;
            }

            .history-header h3 {
                font-size: 22px;
            }

            .history-header p {
                font-size: 14px;
            }

            .history-count {
                font-size: 12px;
            }

            .history-table {
                min-width: 650px;
            }

            .history-table th {
                padding: 17px;
                font-size: 12px;
            }

            .history-table td {
                padding: 17px;
                font-size: 14px;
            }

            .pet-name {
                font-size: 14px;
                gap: 10px;
            }

            .pet-icon {
                width: 40px;
                height: 40px;
                font-size: 20px;
            }

            .status-badge {
                padding: 8px 12px;
                font-size: 12px;
            }

            .admin-note {
                font-size: 13px;
            }

            .empty-state {
                padding: 45px 20px;
            }

            .empty-icon {
                width: 80px;
                height: 80px;
                font-size: 40px;
            }

            .empty-state h3 {
                font-size: 23px;
            }

            .empty-state p {
                font-size: 14px;
            }
        }

        /* HP KECIL */
        @media (max-width: 380px) {
            .nav-menu {
                gap: 14px;
            }

            .nav-menu a {
                font-size: 13px;
            }

            .nav-user {
                font-size: 12px;
            }

            .page-title h1 {
                font-size: 28px;
            }

            .history-header {
                padding: 18px;
            }
        }
    </style>
</head>

<nav class="navbar">
    <a href="{{ url('/') }}" class="logo">
        <span>Pet</span>Nest
    </a>

    <div class="nav-menu">
        <a href="{{ url('/') }}">Beranda</a>

        <a href="{{ route('pengajuan.riwayat') }}" class="active">
            Riwayat Adopsi
        </a>

        <a href="{{ route('profile.index') }}">
            Profile
        </a>
    </div>

    <div class="nav-user">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
        </div>

        <span>{{ auth()->user()->name ?? 'User' }}</span>
    </div>
</nav>

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