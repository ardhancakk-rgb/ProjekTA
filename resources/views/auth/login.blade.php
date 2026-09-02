<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - PetNest</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family:sans-serif;
            background-image:linear-gradient(rgba(0, 0, 0, 0.56), rgba(0, 0, 0, 0.75)),url('{{ asset('images/login-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 320px;
            min-height: 500px;
            background: rgba(0, 0, 0, 0.46);
            border-radius: 15px;
            padding: 28px 24px;
            color: white;
            box-shadow: 0 8px 30px rgba(45, 92, 44, 0.73);
        }

        .login-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-title h1 {
            font-size: 40px;
            font-weight: bold;
            font-weight: normal;
        }

        .login-subtitle {
            text-align: center;
            font-size: 10px;
            margin-bottom: 25px;
            color: #eeeeee;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-size: 25px;
            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;
            height: 31px;
            border: none;
            border-radius: 9px;
            padding: 6px 10px;
            background: #eeeeee;
            font-family: sans-serif;
            font-size: 13px;
        }

        .form-group input:focus {
            outline: 2px solid #704A2E;
        }

        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;=
            margin-top: 7px;
            margin-bottom: 16px;
            font-size: 10px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 15px;
        }

        .remember:hover {
            cursor: pointer;
            color: #c9a06b;
        }

        .remember input {
            width: 11px;
            height: 11px;
        }

        .forgot-password {
            color: white;
            text-decoration: underline;
            font-size: 13px;
        }

        .forgot-password:hover {
            color: #c9a06b;
        }

        .btn-login {
            width: 100px;
            height: 30px;
            border: none;
            border-radius: 10px;
            background: #704A2E;
            color: white;
            font-family: sans-serif;
            font-size: 20px;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #8a5b35;
        }

        .register {
            text-align: center;

            margin-top: 22px;

            font-size: 11px;
        }

        .register a {
            color: #36b9e8;
            text-decoration: underline;
        }

        .register a:hover {
            color: #7ddcff;
        }

        .error {
            color: #ff8f8f;
            font-size: 11px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-title">
            <h1>Login</h1>
        </div>
        <div class="login-subtitle">
            Access your account to explore and manage your orders
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="error">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >
            </div>
            <div class="login-options">
                <label class="remember">
                    <input type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>
            <button type="submit" class="btn-login">
                Sign in
            </button>
        </form>
        <div class="register">
            Don't have an account??
            <a href="{{ route('register') }}">Sign Up</a>
        </div>
    </div>
</body>
</html>