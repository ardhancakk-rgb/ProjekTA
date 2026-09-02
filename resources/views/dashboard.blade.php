<!DOCTYPE html>
<html>
<head class ="bg-brown-500">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ceccbf;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            font-size: 100px;
        }

        p {
            text-align: center;
            font-size: 18px;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #333;
            text-decoration: none;
        }
        button {
            display: flex !important;
            flex-direction: row !important;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 20px auto;
            width: 100px;
            height: 40px;
            border: none;
            border-radius: 20px;
            background: #704A2E;
            color: white;
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 14px;
            cursor: pointer;
        }

        button:hover {
            background: #8a5b35;
        }
        </style>
</head>
<body>

    <h1>Dashboard</h1>

    <p>Selamat datang, {{ Auth::user()->name }}!</p>
    <br>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <a href="{{ url('/') }}">
        <button type="button">Home</button>
       </a>

</body>
</html>