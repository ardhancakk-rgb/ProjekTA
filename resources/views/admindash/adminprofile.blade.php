<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('admin.profile') }}">Profile</a>
    <section class="profile-section">
                <div class="profile-info">
                    <div class="admin-avatar-large">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="admin-details">
                        <h1>Admin Pet Nest</h1>
                        <p>admin@gmail.com</p>
                    </div>
                </div>
                <button class="btn"><i class="fa-solid fa-pen"></i> Edit Profil</button>
            </section>

</body>
</html>