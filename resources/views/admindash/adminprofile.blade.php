<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Admin - PetNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: #f7f5f0;
            color: #302820;
            min-height: 100vh;
            padding: 45px 0;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 27px;
            font-weight: 800;
            color: #49372a;
            letter-spacing: -.8px;
        }

        .page-header p {
            font-size: 13px;
            color: #94877c;
            margin-top: 7px;
        }

        .btn-back {
            border: 1px solid #e5ddd2;
            color: #725b48;
            background: #fff;
            padding: 11px 19px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #eee7dd;
            color: #49372a;
        }

        .profile-card {
            background: #fff;
            border: 1px solid #eee9e2;
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 8px 30px rgba(68, 49, 32, .045);
        }

        .profile-heading {
            font-size: 16px;
            font-weight: 800;
            color: #49372a;
            padding-bottom: 18px;
            border-bottom: 1px solid #f0ece6;
            margin-bottom: 28px;
        }

        .profile-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .admin-avatar-large {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #eee5da;
            color: #79583e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            border: 5px solid #f8f5f0;
        }

        .admin-details h2 {
            font-size: 21px;
            font-weight: 800;
            color: #49372a;
            margin-bottom: 8px;
        }

        .admin-details p {
            font-size: 13px;
            color: #94877c;
            margin-bottom: 10px;
        }

        .admin-role {
            display: inline-block;
            background: #f3ece3;
            color: #79583e;
            padding: 6px 13px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .btn-edit {
            background: #79583e;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-edit:hover {
            background: #5e422e;
            color: #fff;
            transform: translateY(-1px);
        }

        .profile-divider {
            border: none;
            border-top: 1px solid #f0ece6;
            margin: 30px 0;
        }

        .info-title {
            font-size: 15px;
            font-weight: 800;
            color: #49372a;
            margin-bottom: 20px;
        }

        .info-box {
            background: #fdfbf8;
            border: 1px solid #eee9e2;
            border-radius: 12px;
            padding: 17px 19px;
            height: 100%;
        }

        .info-label {
            font-size: 11px;
            font-weight: 700;
            color: #a09285;
            margin-bottom: 8px;
        }

        .info-value {
            font-size: 13px;
            font-weight: 700;
            color: #49372a;
            margin-bottom: 0;
        }

        @media (max-width: 576px) {
            body {
                padding: 25px 0;
            }

            .profile-card {
                padding: 22px;
            }

            .profile-section {
                align-items: flex-start;
                flex-direction: column;
            }

            .profile-info {
                gap: 15px;
            }

            .admin-avatar-large {
                width: 75px;
                height: 75px;
                font-size: 28px;
            }

            .admin-details h2 {
                font-size: 17px;
            }

            .btn-edit {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <main class="container" style="max-width: 1000px;">
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h1>Profile Admin</h1>
                <p>Informasi akun administrator PetNest.</p>
            </div>
            <a href="{{ route('admindash.dashboard') }}" class="btn-back">
                <i class="fa-solid fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <div class="profile-card">
            <h5 class="profile-heading">Informasi Profil</h5>

            <section class="profile-section">
                <div class="profile-info">
                    <div class="admin-avatar-large">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div class="admin-details">
                        <h2>{{ auth()->user()->name ?? auth()->user()->username }}</h2>
                        <p>
                            <i class="fa-regular fa-envelope me-2"></i>
                            {{ auth()->user()->email }}
                        </p>
                        <span class="admin-role">
                            <i class="fa-solid fa-shield-halved me-1"></i>
                            {{ ucfirst(auth()->user()->role) }}
                        </span>
                    </div>
                </div>

                <button type="button" class="btn btn-edit">
                    <i class="fa-solid fa-pen me-2"></i>Edit Profil
                </button>
            </section>

            <hr class="profile-divider">

            <h5 class="info-title">Detail Akun</h5>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="info-box">
                        <p class="info-label">Nama Pengguna</p>
                        <p class="info-value">
                            {{ auth()->user()->name ?? auth()->user()->username }}
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-box">
                        <p class="info-label">Email</p>
                        <p class="info-value">
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-box">
                        <p class="info-label">Jenis Akun</p>
                        <p class="info-value">
                            {{ ucfirst(auth()->user()->role) }}
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-box">
                        <p class="info-label">Status Akun</p>
                        <p class="info-value">
                            {{ ucfirst(auth()->user()->status ?? 'Aktif') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
