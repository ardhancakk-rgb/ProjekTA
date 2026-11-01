<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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
            font-family: sans-serif;
            background-image: linear-gradient(rgba(0, 0, 0, 0.25),
                    rgba(0, 0, 0, 0.25)), url('{{ asset('images/Registrasi-bg.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 20px;
        }

        .register-box {
            width: 100%;
            max-width: 480px;
            padding: 45px 40px;
            background: rgba(10, 7, 4, 0.78);
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.45);
            color: white;
            backdrop-filter: blur(2px);
        }

        .register-box h1 {
            text-align: center;
            font-size: 44px;
            font-weight: normal;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .form-group input {
            width: 100%;
            height: 48px;
            border: none;
            outline: none;
            border-radius: 12px;
            padding: 0 15px;
            background: #eeeeee;
            font-size: 15px;
            font-family: sans-serif;
        }

        .form-group input:focus {
            background: white;
            box-shadow: 0 0 0 2px rgba(170, 135, 90, 0.7);
        }

        .btn-register {
            margin-top: 10px;
            padding: 13px 30px;
            border: none;
            border-radius: 20px;
            background: #452817;
            color: white;
            font-family: sans-serif;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
        }

        .btn-register:hover {
            background: #927154;
            transform: translateY(-1px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .button-wrapper {
            text-align: left;
        }

        .error {
            color: #ffb5b5;
            font-size: 13px;
            margin-top: 5px;
        }

        @media (max-width: 500px) {
            body {
                padding: 20px 16px;
                align-items: center;
            }

            .register-box {
                width: 100%;
                max-width: 480px;
                padding: 35px 25px;
                border-radius: 16px;
            }

            .register-box h1 {
                font-size: 38px;
            }

            .subtitle {
                font-size: 13px;
                margin-bottom: 25px;
            }

            .form-group {
                margin-bottom: 18px;
            }

            .form-group label {
                font-size: 16px;
            }

            .form-group input {
                height: 45px;
                font-size: 14px;
            }

            .btn-register {
                font-size: 16px;
                padding: 12px 26px;
            }
        }

        .form-group input:focus {
            background: white;
            box-shadow: 0 0 0 2px rgba(170, 135, 90, 0.7);
        }

        .btn-register {
            margin-top: 10px;
            padding: 13px 30px;
            border: 1px solid #452817;
            border-radius: 8px;
            background: #452817;
            color: white;
            font-family: "Outfit", sans-serif;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .btn-register:hover {
            background: #70482f;
        }
    </style>
</head>

<body>
    <div class="register-box">
        <h1>Sign Up</h1>

        <p class="subtitle">Create Your Account</p>

        <form action="{{ route('register') }}" method="POST" autocomplete="off">
            @csrf

            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Create Username"
                    autocomplete="off" required>

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                    autocomplete="off" required>

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    autocomplete="new-password" required>

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Confirm your password" autocomplete="new-password" required>
            </div>

            <div class="button-wrapper">
                <button type="submit" class="btn-register">
                    Sign Up
                </button>
            </div>
        </form>
    </div>
</body>

</html>