<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets</title>
</head>
<body>
    <h1>Daftar Hewan Peliharaan</h1>
    
    @if($hewan->isEmpty())
        <p>Tidak ada hewan yang tersedia.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Usia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hewan as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kategori_id }}</td>
                        <td>{{ $item->usia ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>