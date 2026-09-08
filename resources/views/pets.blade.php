<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets</title>
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            font-family: 'Outfit', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: sans-serif;
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.56), rgba(0, 0, 0, 0.75)),
                url('{{ asset('images/dashh bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
        }

        .nav {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 50px;
            box-sizing: border-box;
        }

        .nav a {
            color: #fff;
            text-decoration: none;
            font-size: 30px;
            margin-right: 20px;
        }

        .nav a:hover {
            color: #aaa9a9;
        }
    </style>
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
    <header class="nav">
        <a href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i></a>
        <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
    </header>
</body>

</html>