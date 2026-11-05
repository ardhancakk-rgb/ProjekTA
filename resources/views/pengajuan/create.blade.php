<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submission - PetNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #ebe1d6;
            color: #443329;
            min-height: 100vh;
        }

        .page {
            max-width: 1150px;
            margin: auto;
            padding: 45px 25px;
        }

        .back-link {
            color: #805b40;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link:hover {
            color: #503724;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            margin-top: 22px;
            color: #39281e;
        }

        .page-subtitle {
            color: #887b70;
            margin-bottom: 28px;
        }

        .pet-card,
        .form-card {
            background: #fff;
            border: 1px solid #eee5dc;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 18px rgba(64, 44, 28, .06);
        }

        .pet-card {
            margin-bottom: 24px;
        }

        .pet-card .row {
            min-height: 320px;
        }

        .pet-card .col-md-5 {
            min-height: 320px;
        }

        .pet-image {
            display: block;
            width: 100%;
            height: 100%;
            min-height: 320px;
            object-fit: cover;
            border: 0;
            border-radius: 0;
        }

        .pet-info {
            padding: 35px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }

        .pet-info h3 {
            font-size: 29px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #493326;
        }

        .pet-detail {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .detail-label {
            width: 150px;
            flex-shrink: 0;
            color: #81746a;
        }

        .detail-value {
            font-weight: 600;
            color: #493326;
        }

        .pet-description {
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid #eee5dc;
        }

        .pet-description h5 {
            font-size: 16px;
            font-weight: 700;
            color: #493326;
            margin-bottom: 8px;
        }

        .pet-description p {
            font-size: 14px;
            line-height: 1.7;
            color: #81746a;
            margin-bottom: 0;
        }

        .status {
            display: inline-block;
            background: #e5f2e5;
            color: #397044;
            padding: 7px 14px;
            border-radius: 20px;
            font-size: 14px;
        }

        .form-card .card-body {
            padding: 30px;
        }

        .form-title {
            font-size: 23px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #493326;
        }

        .form-label {
            font-weight: 600;
            color: #574638;
            margin-bottom: 8px;
        }

        .form-control {
            border: 1px solid #e1d8cf;
            border-radius: 9px;
            padding: 12px 14px;
            background: #fff;
        }

        .form-control:focus {
            border-color: #a17b5c;
            box-shadow: 0 0 0 .2rem rgba(161, 123, 92, .13);
        }

        .form-control[readonly] {
            background: #f5f2ef;
            color: #766b62;
        }

        textarea.form-control {
            resize: vertical;
        }

        .form-check {
            margin-top: 8px;
            margin-bottom: 22px;
        }

        .form-check-input:checked {
            background-color: #805b40;
            border-color: #805b40;
        }

        .btn-submit {
            background: #80512f;
            color: white;
            border: 0;
            border-radius: 9px;
            padding: 12px 25px;
            font-weight: 600;
        }

        .btn-submit:hover {
            background: #654027;
            color: white;
        }

        .alert {
            border-radius: 10px;
        }

        @media (max-width: 767px) {
            .page {
                padding: 28px 16px;
            }

            .page-title {
                font-size: 26px;
            }

            .pet-card .row {
                min-height: auto;
            }

            .pet-card .col-md-5 {
                min-height: 250px;
            }

            .pet-image {
                height: 250px;
                min-height: 250px;
            }

            .pet-info {
                padding: 25px;
            }

            .pet-info h3 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .detail-label {
                width: 125px;
            }
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="mb-4">
            <a href="{{ route('pets.index') }}" class="back-link">&larr; Kembali ke Pets</a>
            <h2 class="page-title">Formulir Pengajuan Adopsi</h2>
            <p class="page-subtitle">Lengkapi data berikut untuk mengajukan adopsi.</p>
        </div>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="pet-card">
            <div class="row g-0">
                <div class="col-md-5">
                    @if ($hewan->foto)
                        <img src="{{ asset('storage/' . $hewan->foto) }}" class="pet-image" alt="{{ $hewan->nama_hewan }}">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-secondary-subtle h-100 p-5">
                            Foto tidak tersedia
                        </div>
                    @endif
                </div>
                <div class="col-md-7">
                    <div class="pet-info">
                        <h3>{{ $hewan->nama_hewan }}</h3>
                        <div class="pet-detail">
                            <span class="detail-label">Ras</span>
                            <span class="detail-value">{{ $hewan->ras }}</span>
                        </div>
                        <div class="pet-detail">
                            <span class="detail-label">Umur</span>
                            <span class="detail-value">{{ $hewan->umur }}</span>
                        </div>
                        <div class="pet-detail">
                            <span class="detail-label">Jenis kelamin</span>
                            <span class="detail-value">{{ $hewan->jenis_kelamin }}</span>
                        </div>
                        <div class="pet-detail mb-0">
                            <span class="detail-label">Status</span>
                            <span class="status">{{ ucfirst($hewan->status_adopsi) }}</span>
                        </div>
                        <div class="pet-description">
                            <h5>Deskripsi</h5>
                            <p>{{ $hewan->deskripsi ?: 'Belum ada deskripsi untuk hewan ini.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-card">
            <div class="card-body">
                <h4 class="form-title">Data Pengajuan Adopsi</h4>
                <form action="{{ route('adopsi.store', $hewan->id_hewan) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telepon_pemohon" class="form-label">Nomor Telepon</label>
                            <input type="tel" id="telepon_pemohon" name="telepon_pemohon" class="form-control"
                                value="{{ old('telepon_pemohon') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="alamat_pemohon" class="form-label">Alamat</label>
                            <textarea id="alamat_pemohon" name="alamat_pemohon" class="form-control" rows="4"
                                required>{{ old('alamat_pemohon') }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="alasan_adopsi" class="form-label">Alasan Mengadopsi</label>
                            <textarea id="alasan_adopsi" name="alasan_adopsi" class="form-control" rows="4"
                                required>{{ old('alasan_adopsi') }}</textarea>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="persetujuan" required>
                        <label class="form-check-label" for="persetujuan">Saya menyatakan bahwa data yang saya isi
                            benar.</label>
                    </div>
                    <button type="submit" class="btn btn-submit">Kirim Pengajuan</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>