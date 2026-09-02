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
            font-family: Georgia, "Times New Roman", serif;

            background-image:
                linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)),
                url('images/Registrasi-bg.jpeg');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            display: flex;
            justify-content: center;
            ` align-items: center;
        }

        .register-box {
            width: 365px;
            padding: 35px 30px 40px;

            background: rgba(10, 7, 4, 0.78);

            border-radius: 15px;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.45);

            color: white;

            backdrop-filter: blur(2px);
        }

        .register-box h1 {
            text-align: center;
            font-size: 32px;
            font-weight: normal;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            font-size: 11px;
            margin-bottom: 22px;
        }

        .form-group {
            margin-bottom: 13px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            height: 40px;

            border: none;
            outline: none;

            border-radius: 12px;

            padding: 0 15px;

            background: #eeeeee;

            font-size: 14px;
        }

        .form-group input:focus {
            background: white;
            box-shadow: 0 0 0 2px rgba(170, 135, 90, 0.7);
        }

        .btn-register {
            margin-top: 10px;

            padding: 10px 24px;

            border: none;
            border-radius: 20px;

            background: #76573f;
            color: white;

            font-family: Georgia, "Times New Roman", serif;
            font-size: 15px;

            cursor: pointer;

            transition: 0.3s;
        }

        .btn-register:hover {
            background: #927154;
            transform: translateY(-1px);
        }

        .button-wrapper {
            text-align: left;
        }

        .error {
            color: #ffb5b5;
            font-size: 12px;
            margin-top: 4px;
        }

        @media (max-width: 500px) {
            body {
                padding: 20px;
            }

            .register-box {
                width: 100%;
                max-width: 365px;
            }
        }
    </style>
</head>

<body>

    <div class="register-box">

        <h1>Sign Up</h1>

        <p class="subtitle">
            Create Your Account
        </p>

        <form action="{{ route('register') }}" method="POST">

            @csrf

            <div class="form-group">

                <label>Username</label>

                <input type="text" name="name" value="{{ old('name') }}" required>

                @error('name')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label>Email</label>

                <input type="email" name="email" value="{{ old('email') }}" required>

                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label>Password</label>

                <input type="password" name="password" required>

                @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label>Confirm Password</label>

                <input type="password" name="password_confirmation" required>

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