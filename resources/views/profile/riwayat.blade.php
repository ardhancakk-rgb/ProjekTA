<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan - PetNest</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 30px 15px;
            background: #f7f4ef;
            color: #44362e;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .card {
            margin-top: 25px;
            padding: 25px;
            background: white;
            border-radius: 14px;
            box-shadow: 0 8px 30px rgba(60,40,25,.06);
            overflow-x: auto;
        }

        a { color: #a86f40; }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #eee5dc;
        }

        th {
            background: #faf8f5;
            font-size: 13px;
        }

        .empty {
            padding: 25px;
            text-align: center;
            color: #8b7d73;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #f4eadc;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <main class="container">
        <a href="{{ route('profile.index') }}">← Kembali ke Profil</a>

        <h1>Riwayat Pengajuan Adopsi</h1>
        <p>Lihat perkembangan pengajuan adopsi hewan kamu.</p>

        <section class="card">
            @if ($riwayat->isEmpty())
                <div class="empty">
                    <h3>Belum Ada Pengajuan</h3>
                    <p>Pengajuan adopsi kamu akan muncul di sini.</p>
                    <a href="{{ url('/pets') }}">Lihat Hewan</a>
                </div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Hewan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Catatan Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_hewan ?? 'Hewan tidak tersedia' }}</td>
                                <td>{{ $item->tanggal_pengajuan
                                    ? \Illuminate\Support\Carbon::parse(
                                        $item->tanggal_pengajuan
                                    )->format('d-m-Y')
                                    : '-' }}</td>
                                <td>
                                    <span class="status">
                                        {{ ucfirst($item->status_pengajuan ?? 'Pending') }}
                                    </span>
                                </td>
                                <td>{{ $item->catatan_admin ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>
    </main>
</body>
</html>