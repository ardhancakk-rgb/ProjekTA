<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - PetNest</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 30px 15px;
            background: #f7f4ef;
            color: #44362e;
            font-family: Arial, sans-serif;
        }

        .card {
            max-width: 650px;
            margin: 20px auto;
            padding: 30px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(60,40,25,.08);
        }

        h1 { color: #5d4235; }

        .field { margin-bottom: 18px; }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd0c4;
            border-radius: 8px;
            font: inherit;
        }

        textarea { resize: vertical; }

        .error {
            color: #b42318;
            font-size: 13px;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .save {
            background: #5d4235;
            color: white;
        }

        .cancel {
            background: #eee5dc;
            color: #44362e;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Edit Profil</h1>
        <p>Perbarui informasi akun PetNest kamu.</p>

        @if ($errors->any())
            <div class="error">
                Periksa kembali data yang kamu masukkan.
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="name">Nama Lengkap</label>
                <input id="name" name="name" type="text"
                    value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="username">Username</label>
                <input id="username" name="username" type="text"
                    value="{{ old('username', $user->username) }}" required>
                @error('username')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email"
                    value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="no_hp">Nomor Telepon</label>
                <input id="no_hp" name="no_hp" type="tel"
                    value="{{ old('no_hp', $user->no_hp) }}">
                @error('no_hp')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" rows="4">{{ old('alamat', $user->alamat) }}</textarea>
                @error('alamat')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="actions">
                <button type="submit" class="btn save">
                    Simpan Perubahan
                </button>

                <a href="{{ route('profile.index') }}"
                   class="btn cancel">
                    Batal
                </a>
            </div>
        </form>
    </div>
</body>
</html>