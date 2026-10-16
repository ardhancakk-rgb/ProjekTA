<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .card-form {
            border: 1px solid #e5e7eb;
            border-radius: 16px;
        }

        .form-control,
        .form-select {
            min-height: 48px;
            border: 1px solid #d1d5db;
            border-radius: 12px;
        }

        .form-label {
            margin-bottom: 0.5rem;
            color: #1f2937;
            font-weight: 600;
        }

        .btn-simpan {
            min-width: 180px;
            border-radius: 12px;
        }
    </style>
</head>

<body class="py-4">
    <main class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 fw-semibold">Tambah Data Hewan</h1>
            <a href="{{ route('hewan.index') }}" class="btn btn-outline-secondary">Kembali</a>
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

        <form action="{{ route('hewan.store') }}" method="POST" enctype="multipart/form-data"
            class="card-form p-4 shadow-sm bg-white">
            @csrf

            <div class="row g-4">
                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama Hewan</label>
                    <input id="nama" type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
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
                    <input id="umur" type="number" name="umur" min="0" class="form-control" value="{{ old('umur') }}"
                        required>
                </div>

                <div class="col-md-6">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                        <option value="jantan" {{ old('jenis_kelamin') == 'jantan' ? 'selected' : '' }}>Jantan</option>
                        <option value="betina" {{ old('jenis_kelamin') == 'betina' ? 'selected' : '' }}>Betina</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="berat" class="form-label">Berat (kg)</label>
                    <input id="berat" type="number" step="0.01" min="0" name="berat" class="form-control"
                        value="{{ old('berat') }}">
                </div>

                <div class="col-md-6">
                    <label for="status" class="form-label">Status Adopsi</label>
                    <select id="status" name="status" class="form-select" required>
                        <option value="tersedia" {{ old('status', 'tersedia') == 'tersedia' ? 'selected' : '' }}>Tersedia
                        </option>
                        <option value="diproses" {{ old('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="diadopsi" {{ old('status') == 'diadopsi' ? 'selected' : '' }}>Diadopsi</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="status_vaksin" class="form-label">Status Vaksin</label>
                    <input id="status_vaksin" type="text" name="status_vaksin" class="form-control"
                        value="{{ old('status_vaksin') }}">
                </div>

                <div class="col-md-6">
                    <label for="kondisi_kesehatan" class="form-label">Status Kesehatan</label>
                    <input id="kondisi_kesehatan" type="text" name="kondisi_kesehatan" class="form-control"
                        value="{{ old('kondisi_kesehatan') }}">
                </div>

                <div class="col-12">
                    <label for="gambar" class="form-label">Foto Hewan</label>
                    <input id="gambar" type="file" name="gambar" accept="image/*" class="form-control">
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary btn-simpan">Simpan Data</button>
            </div>
        </form>
    </main>
</body>

</html>