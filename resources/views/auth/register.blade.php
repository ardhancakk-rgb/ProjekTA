<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Halaman Registrasi</h1>

    <form action="/register" method="POST">
        @csrf
        
        <input type="text" name="name" placeholder="Nama" required><br><br>

        <input type="email" name="email" placeholder="Email" required><br><br>

        <input type="password" name="password" placeholder="Password" required><br><br>

        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required><br><br>
        
        <button type="submit">Register</button>
</body>
</html>