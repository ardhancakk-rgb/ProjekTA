<!DOCTYPE html>
<html>

<head class="bg-brown-500">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        * {
            font-family: sans-serif;
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

        h1 {
            text-align: center;
            margin-top: 50px;
            font-size: 50px;
            position: relative;
        }

        p {
            text-align: center;
            font-size: 80px;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #333;
            text-decoration: none;
        }

        .p {
            text-align: center;
            font-size: 70px;
            font-weight: bold;
            color: #fff;
        }
        .btn-logout {
            background-color: #452817;
            color: white;
            padding: 8px 30px;
            border-radius: 6px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .btn-logout:hover {
            background: #8a5b35;
        }
    </style>
</head>

<body class="navbar">
    <nav class="nav">
        <a href="{{ url('/contact') }}">Contact</a>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/pengajuan') }}">Submission</a>
        <a href="{{ url('/login') }}" class="btn-logout">Logout</a>
    </nav>
    <div class="content">
        <p class="p">Selamat datang, {{ Auth::user()->name }}!</p>
    </div>
</body>

</html>