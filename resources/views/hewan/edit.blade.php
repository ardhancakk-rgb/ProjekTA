<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <h3>Edit Data Hewan: {{ $hewan->nama }}</h3>
    <a href="{{ route('hewan.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('hewan.update', $hewan->id_hewan) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama Hewan</label>
                <input type="text" name="nama_hewan" class="form-control" value="{{ old('nama_hewan', $hewan->nama) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Kategori Hewan</label>
                <select name="id_kategori" class="form-select" required>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->id }}" {{ old('id_kategori', $hewan->kategori_id) == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Ras</label>
                <input type="text" name="ras" class="form-control" value="{{ old('ras', $hewan->ras) }}">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Umur</label>
                <input type="number" name="umur" class="form-control" value="{{ old('umur', $hewan->umur) }}" required>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="jantan" {{ old('jenis_kelamin', $hewan->jenis_kelamin) == 'jantan' ? 'selected' : '' }}>Jantan</option>
                    <option value="betina" {{ old('jenis_kelamin', $hewan->jenis_kelamin) == 'betina' ? 'selected' : '' }}>Betina</option>
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Berat (kg)</label>
                <input type="number" step="0.01" name="berat" class="form-control" value="{{ old('berat', $hewan->berat) }}">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Status Adopsi</label>
                <select name="status_adopsi" class="form-select" required>
                    <option value="tersedia" {{ old('status_adopsi', $hewan->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="diproses" {{ old('status_adopsi', $hewan->status) == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="diadopsi" {{ old('status_adopsi', $hewan->status) == 'diadopsi' ? 'selected' : '' }}>Diadopsi</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Status Vaksin</label>
                <input type="text" name="status_vaksin" class="form-control" value="{{ old('status_vaksin', $hewan->status_vaksin) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Status Kesehatan</label>
                <input type="text" name="status_kesehatan" class="form-control" value="{{ old('status_kesehatan', $hewan->kondisi_kesehatan) }}">
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label">Ganti Foto (opsional)</label>
                <input type="file" name="foto" class="form-control mb-2">
                @if ($hewan->gambar)
                    <img src="{{ asset('storage/' . $hewan->gambar) }}" width="100" class="rounded">
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui Data</button>
    </form>

</body>
</html>