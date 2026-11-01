<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <title>Login - PetNest</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            min-height: 100dvh;
            width: 100%;
            font-family: "Outfit", sans-serif;
            background-image: linear-gradient(rgba(0, 0, 0, 0.56),rgba(0, 0, 0, 0.75)),url('{{ asset('images/login-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .login-card {
            width: 100%;
            max-width: 480px;
            min-height: 560px;
            background: rgba(0, 0, 0, 0.46);
            border-radius: 20px;
            padding: 45px 40px;
            color: white;
            box-shadow: 0 8px 30px rgba(45, 92, 44, 0.73);
        }

        .login-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-title h1 {
            font-size: 48px;
            font-weight: normal;
        }

        .login-subtitle {
            text-align: center;
            font-size: 20px;
            line-height: 1.7;
            margin-bottom: 35px;
            color: #eeeeee;
        }

        .form-group {
            margin-bottom: 28px;
        }

        .form-group label {
            display: block;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .form-group input {
            width: 100%;
            height: 45px;
            border: none;
            border-radius: 9px;
            padding: 10px 13px;
            background: #eeeeee;
            font-family: sans-serif;
            font-size: 20px;
        }

        .form-group input:focus {
            outline: 2px solid #704A2E;
        }

        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 7px;
            margin-bottom: 25px;
            gap: 10px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
        }

        .remember:hover {
            cursor: pointer;
            color: #c9a06b;
        }

        .remember input {
            width: 15px;
            height: 15px;
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
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 130px;
            height: 42px;
            border: 1px solid #452817;
            border-radius: 8px;
            background: #452817;
            color: #fff;
            font-family: "Outfit", sans-serif;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .btn-login:hover {
            background: #70482f;
        }

        .register {
            text-align: center;
            margin-top: 30px;
            font-size: 20px;
        }

        .register a {
            color: #418aeb;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .register a:hover {
            color: #250f63;
            text-decoration: underline;
        }

        .error {
            color: #ff8f8f;
            font-size: 12px;
            margin-bottom: 10px;
        }

        @media (max-width: 480px) {
            body {
                padding: 20px 16px;
            }

            .login-card {
                min-height: auto;
                padding: 35px 25px;
                border-radius: 16px;
            }

            .login-title h1 {
                font-size: 40px;
            }

            .login-subtitle {
                margin-bottom: 28px;
            }

            .form-group label {
                font-size: 18px;
            }

            .login-options {
                flex-wrap: wrap;
            }
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
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" autocomplete="off" value="" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" autocomplete="new-password" value=""
                    placeholder="Enter your password">
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