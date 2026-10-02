<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - PetNest</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f7f5f2;
            color: #3f3028;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 220px;
            height: 100vh;
            background: #4a3529;
            color: white;
            padding: 20px 12px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 10px 30px;
        }

        .logo i {
            font-size: 32px;
        }

        .logo-text h2 {
            font-size: 21px;
        }

        .logo-text p {
            font-size: 9px;
            opacity: 0.8;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin-bottom: 6px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 14px;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
        }

        .menu a:hover {
            background: #6a4d3c;
        }

        .menu .active {
            background: #bda083;
        }

        .menu i {
            width: 18px;
            text-align: center;
        }

        .menu-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.25);
            margin: 20px 10px;
        }

        .main {
            margin-left: 220px;
            min-height: 100vh;
        }

        .topbar {
            height: 55px;
            background: #4a3529;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
        }

        .hamburger {
            font-size: 22px;
        }

        .admin {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin i {
            font-size: 28px;
        }

        .content {
            padding: 35px 45px;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #5b4638;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .back:hover {
            color: #8b6a52;
        }

        .title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .title i {
            font-size: 30px;
            color: #634838;
        }

        .title h1 {
            font-size: 26px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 4px 15px rgba(70, 50, 40, 0.08);
            max-width: 100%;
        }

        .category-list {
            margin-top: 28px;
        }

        .category-list h2 {
            font-size: 20px;
            margin-bottom: 18px;
        }

        .category-table-wrap {
            overflow-x: auto;
        }

        .category-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .category-table th,
        .category-table td {
            padding: 13px 12px;
            border-bottom: 1px solid #eee8e3;
        }

        .category-table th {
            color: #5b4638;
            font-size: 13px;
        }

        .category-table td {
            font-size: 14px;
        }

        .btn-delete:disabled {
            background: #604636;
            color: white;
            opacity: 1;
            cursor: not-allowed;
        }

        .confirm-dialog {
            width: min(460px, calc(100% - 32px));
            padding: 0;
            border: 1px solid #ddd5cf;
            border-radius: 8px;
            color: #3f3028;
            box-shadow: 0 16px 48px rgba(30, 24, 20, 0.24);
        }

        .confirm-dialog::backdrop {
            background: rgba(25, 20, 17, 0.48);
        }

        .confirm-dialog-content {
            padding: 26px;
        }

        .confirm-dialog h2 {
            margin-bottom: 12px;
            font-size: 20px;
        }

        .confirm-dialog p {
            color: #65574f;
            font-size: 14px;
            line-height: 1.6;
        }

        .confirm-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 24px;
        }

        .notice {
            margin-bottom: 18px;
            padding: 12px 15px;
            border-radius: 7px;
            font-size: 14px;
        }

        .notice-success {
            background: #e8f3e9;
            color: #285c31;
        }

        .notice-error {
            background: #fbe9e7;
            color: #842d27;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #3e3028;
        }

        .required {
            color: #d9534f;
        }

        .form-control {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #ddd5cf;
            border-radius: 7px;
            outline: none;
            font-size: 14px;
            background: white;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #8b6a52;
            box-shadow: 0 0 0 3px rgba(139, 106, 82, 0.12);
        }

        textarea.form-control {
            min-height: 130px;
            resize: vertical;
        }

        .hint {
            font-size: 12px;
            color: #888;
            margin-top: 6px;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            border: none;
            padding: 12px 25px;
            border-radius: 7px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-cancel {
            background: white;
            color: #5b4638;
            border: 1px solid #cfc5bd;
        }

        .btn-cancel:hover {
            background: #f4f1ee;
        }

        .btn-save {
            background: #604636;
            color: white;
        }

        .btn-save:hover {
            background: #4b3529;
        }

        .paw {
            position: fixed;
            right: 25px;
            bottom: 20px;
            color: #dbcabb;
            font-size: 35px;
            opacity: 0.7;
        }

        @media (max-width: 768px) {

            .sidebar {
                width: 70px;
            }

            .logo-text,
            .menu span {
                display: none;
            }

            .logo {
                justify-content: center;
            }

            .menu a {
                justify-content: center;
            }

            .main {
                margin-left: 70px;
            }

            .content {
                padding: 25px 20px;
            }

            .card {
                padding: 22px;
            }

            .button-container {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
<section class="content">

    <a href="{{ route('admindash.dashboard') }}" class="back">
        <i class="fa-solid fa-arrow-left"></i>
        Kembali
    </a>


    <div class="title">

        <i class="fa-solid fa-paw"></i>

        <div>
            <h1>Tambah Kategori Hewan</h1>
        </div>

    </div>


    <div class="card">

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="form-group">

                <label>
                    Nama Kategori
                    <span class="required">*</span>
                </label>

                <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan nama kategori"
                    required>

            </div>


            <div class="button-container">

                <a href="#" class="btn btn-cancel">
                    <i class="fa-solid fa-xmark"></i>
                    Batal
                </a>

                <button type="submit" class="btn btn-save">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan
                </button>

            </div>

        </form>

    </div>

    @if (session('success'))
        <div class="notice notice-success" role="status">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="notice notice-error" role="alert">{{ session('error') }}</div>
    @endif

    <div class="card category-list">
        <h2>Kategori Tersimpan</h2>

        @if ($kategori->isEmpty())
            <p>Belum ada kategori.</p>
        @else
            <div class="category-table-wrap">
                <table class="category-table">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Jumlah Hewan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $item)
                            <tr>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>{{ $item->hewan_count }}</td>
                                <td>
                                    @if ($item->hewan_count > 0)
                                        <button type="button" class="btn btn-delete" disabled
                                            title="Kategori masih digunakan oleh hewan">
                                            Sedang Dipakai
                                        </button>
                                    @else
                                        <form action="{{ route('kategori.destroy', $item) }}" method="POST"
                                            class="delete-category-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-save">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</section>

</body>
</html>


<div class="paw">
    <i class="fa-solid fa-paw"></i>
</div>

<dialog class="confirm-dialog" id="delete-confirmation" aria-labelledby="delete-confirmation-title"
    aria-describedby="delete-confirmation-description">
    <div class="confirm-dialog-content">
        <h2 id="delete-confirmation-title">Konfirmasi Penghapusan</h2>
        <p id="delete-confirmation-description">
            Apakah Anda yakin ingin menghapus kategori ini? Tindakan ini tidak dapat dibatalkan.
        </p>
        <div class="confirm-actions">
            <button type="button" class="btn btn-cancel" id="cancel-delete">Batal</button>
            <button type="button" class="btn btn-save" id="confirm-delete">Hapus Kategori</button>
        </div>
    </div>
</dialog>

<script>
    const deleteConfirmation = document.getElementById('delete-confirmation');
    let pendingDeleteForm = null;

    document.querySelectorAll('.delete-category-form').forEach((form) => {
        form.addEventListener('submit', (event) => {
            if (form.dataset.confirmed === 'true') {
                return;
            }

            event.preventDefault();
            pendingDeleteForm = form;
            deleteConfirmation.showModal();
        });
    });

    document.getElementById('cancel-delete').addEventListener('click', () => {
        deleteConfirmation.close();
        pendingDeleteForm = null;
    });

    document.getElementById('confirm-delete').addEventListener('click', () => {
        if (pendingDeleteForm) {
            pendingDeleteForm.dataset.confirmed = 'true';
            pendingDeleteForm.requestSubmit();
        }
    });

    deleteConfirmation.addEventListener('click', (event) => {
        if (event.target === deleteConfirmation) {
            deleteConfirmation.close();
            pendingDeleteForm = null;
        }
    });

    deleteConfirmation.addEventListener('close', () => {
        pendingDeleteForm = null;
    });
</script>

</body>

</html>