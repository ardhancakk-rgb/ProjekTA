<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Georgia, 'Times New Roman', serif;
            background: #D8D6C8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: left;
        }

        .login-container {
            width: 400px;
            background: #D8D6C8;
            padding: 40px;
            border-radius: 0;
            box-shadow: none;
            text-align: left;
        }

        .logo {
            text-align: left;
            margin-bottom: 35px;
        }

        .logo h1 {
            color: #452817;
            font-size: 46px;
            font-weight: bold;
        }

        .logo p {
            color: #222222;
            margin-top: 8px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #111111;
            font-size: 24px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            height: 50px;
            padding: 12px 16px;
            border: none;
            border-radius: 15px;
            background: #FFFFFF;
            font-size: 16px;
            font-family: Georgia, 'Times New Roman', serif;
        }

        .form-group input:focus {
            outline: 2px solid #704A2E;
        }

        .error {
            color: #B3261E;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .btn-login {
            width: 145px;
            padding: 9px 20px;
            background: #704A2E;
            color: #FFFFFF;
            border: none;
            border-radius: 25px;
            font-size: 20px;
            font-family: Georgia, 'Times New Roman', serif;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #5A3923;
        }

        .register {
            text-align: center;
            margin-top: 40px;
            color: #111111;
            font-size: 17px;
        }

        .register a {
            color: #17627A;
            text-decoration: underline;
            font-weight: normal;
        }

        .register a:hover {
            color: #0E4657;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <h1>PetNest</h1>
            <p>Your Pet Adoption Platform</p>
        </div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="error">{{ $error }}</div>
            @endforeach
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="register">
            Belum punya akun? <a href="/register">Daftar sekarang</a>
        </div>
    </div>
</body>
</html>