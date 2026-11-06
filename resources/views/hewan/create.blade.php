<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
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
            margin-bottom: 28px;
        }

        .page-header h1 {
            font-size: 27px;
            font-weight: 800;
            color: #49372a;
            letter-spacing: -0.8px;
        }

        .page-header p {
            color: #94877c;
            font-size: 13px;
            margin-top: 7px;
        }

        .btn-back {
            border: 1px solid #e5ddd2;
            color: #725b48;
            background: #fff;
            padding: 10px 19px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .btn-back:hover {
            background: #eee7dd;
            color: #49372a;
        }

        .card-form {
            background: #fff;
            border: 1px solid #eee9e2;
            border-radius: 18px;
            padding: 32px;
            box-shadow: 0 8px 30px rgba(68, 49, 32, .045);
        }

        .section-heading {
            font-size: 15px;
            font-weight: 800;
            color: #49372a;
            margin-bottom: 22px;
            padding-bottom: 14px;
            border-bottom: 1px solid #f0ece6;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #514437;
            margin-bottom: 9px;
        }

        .form-control,
        .form-select {
            min-height: 48px;
            border: 1px solid #e8e1d8;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 13px;
            color: #49372a;
            background-color: #fdfcfb;
            transition: .2s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #a77c59;
            box-shadow: 0 0 0 3px rgba(167, 124, 89, .12);
            background: #fff;
        }

        .form-control::placeholder {
            color: #b5aaa0;
            font-size: 12px;
        }

        .deskripsi-hewan {
            min-height: 145px;
            resize: vertical;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-text {
            font-size: 11px;
            color: #a69a8f;
            margin-top: 7px;
        }

        .upload-area {
            border: 1px dashed #d8c8b7;
            border-radius: 12px;
            background: #fdfbf8;
            padding: 10px;
        }

        .upload-area:focus-within {
            border-color: #a77c59;
        }

        .btn-simpan {
            min-width: 190px;
            min-height: 47px;
            border-radius: 10px;
            background: #79583e;
            border: none;
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-simpan:hover {
            background: #5e422e;
            color: #fff;
            transform: translateY(-1px);
        }

        .form-footer {
            border-top: 1px solid #f0ece6;
            padding-top: 22px;
            margin-top: 30px;
        }

        .alert {
            border-radius: 12px;
            font-size: 13px;
        }

        @media (max-width: 576px) {
            body {
                padding: 25px 0;
            }

            .card-form {
                padding: 21px;
            }

            .page-header h1 {
                font-size: 21px;
            }

            .btn-simpan {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <main class="container" style="max-width: 1050px;">
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h1>Tambah Data Hewan</h1>
                <p>Lengkapi informasi hewan yang akan ditambahkan ke PetNest.</p>
            </div>
            <a href="{{ route('hewan.index') }}" class="btn btn-back">← Kembali</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <p class="mb-1 fw-semibold">Data belum dapat disimpan:</p>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('hewan.store') }}" method="POST" enctype="multipart/form-data" class="card-form">
            @csrf

            <div class="form-section">
                <h6 class="section-heading">Informasi Dasar Hewan</h6>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Hewan</label>
                        <input id="nama" type="text" name="nama" class="form-control" placeholder="Masukkan nama hewan"
                            value="{{ old('nama') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="kategori_id" class="form-label">Kategori Hewan</label>
                        <select id="kategori_id" name="kategori_id" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->id_kategori }}" {{ old('kategori_id') == $kat->id_kategori ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="ras" class="form-label">Ras</label>
                        <input id="ras" type="text" name="ras" class="form-control" placeholder="Contoh: Persia, Poodle"
                            value="{{ old('ras') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="umur" class="form-label">Umur (tahun)</label>
                        <input id="umur" type="number" name="umur" min="0" class="form-control"
                            placeholder="Masukkan umur hewan" value="{{ old('umur') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                            <option value="jantan" {{ old('jenis_kelamin') == 'jantan' ? 'selected' : '' }}>Jantan
                            </option>
                            <option value="betina" {{ old('jenis_kelamin') == 'betina' ? 'selected' : '' }}>Betina
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="berat" class="form-label">Berat (kg)</label>
                        <input id="berat" type="number" step="0.01" min="0" name="berat" class="form-control"
                            placeholder="Masukkan berat hewan" value="{{ old('berat') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="harga" class="form-label">Harga Adopsi (Rp)</label>
                        <input id="harga" type="number" name="harga" min="0" class="form-control"
                            placeholder="Contoh: 150000" value="{{ old('harga') }}" required>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h6 class="section-heading">Kondisi dan Status Hewan</h6>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="status" class="form-label">Status Adopsi</label>
                        <select id="status" name="status" class="form-select" required>
                            <option value="tersedia" {{ old('status', 'tersedia') == 'tersedia' ? 'selected' : '' }}>
                                Tersedia</option>
                            <option value="diproses" {{ old('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="diadopsi" {{ old('status') == 'diadopsi' ? 'selected' : '' }}>Diadopsi</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="kondisi_kesehatan" class="form-label">Status Kesehatan</label>
                        <input id="kondisi_kesehatan" type="text" name="kondisi_kesehatan" class="form-control"
                            placeholder="Contoh: Sehat, dalam perawatan" value="{{ old('kondisi_kesehatan') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="sertifikat" class="form-label">Sertifikat Hewan</label>
                        <select id="sertifikat" name="sertifikat" class="form-select" required>
                            <option value="">-- Pilih Keterangan --</option>
                            <option value="ada" {{ old('sertifikat') == 'ada' ? 'selected' : '' }}>Ada</option>
                            <option value="tidak_ada" {{ old('sertifikat') == 'tidak_ada' ? 'selected' : '' }}>Tidak Ada
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h6 class="section-heading">Deskripsi dan Foto Hewan</h6>

                <div class="row g-4">
                    <div class="col-12">
                        <label for="deskripsi" class="form-label">Deskripsi Hewan</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control deskripsi-hewan"
                            placeholder="Tuliskan deskripsi hewan, karakteristik, sifat, kebiasaan, dan informasi lainnya..."
                            rows="5">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="gambar" class="form-label">Foto Hewan</label>
                        <div class="upload-area">
                            <input id="gambar" type="file" name="gambar" accept="image/*" class="form-control">
                        </div>
                        <div class="form-text">Pilih foto hewan dengan format gambar yang didukung.</div>
                    </div>
                </div>
            </div>

            <div class="form-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-simpan">Simpan Data →</button>
            </div>
        </form>
    </main>
</body>

</html>