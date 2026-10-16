<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan Adopsi</title>
    <style>
        body {
            margin: 0;
            padding: 32px;
            background: #f5f5f5;
            color: #1f2937;
            font-family: Arial, sans-serif;
        }

        main {
            max-width: 1100px;
            margin: 0 auto;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        h1 {
            margin: 0;
            font-size: 28px;
        }

        a {
            color: #1d4ed8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #d1d5db;
            text-align: left;
        }

        th {
            background: #f3f4f6;
        }
    </style>
</head>
<body>
    <main>
        <header>
            <h1>Pengajuan Adopsi</h1>
            <a href="{{ route('admindash.dashboard') }}">Kembali ke dashboard</a>
        </header>

        <table>
            <thead>
                <tr>
                    <th>Pemohon</th>
                    <th>Hewan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengajuan as $item)
                    <tr>
                        <td>{{ $item->user?->name ?? '-' }}</td>
                        <td>{{ $item->hewan?->nama_hewan ?? '-' }}</td>
                        <td>{{ $item->tanggal_pengajuan?->format('d/m/Y') ?? '-' }}</td>
                        <td>{{ ucfirst($item->status_pengajuan) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum ada pengajuan adopsi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
</body>
</html>