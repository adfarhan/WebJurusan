<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Profil Alumni</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f9f9f9;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 0;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background: #fff;
            max-width: 600px;
            width: 100%;
        }
        .card-header {
            background: #ffcc00;
            color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .btn-success, .btn-danger {
            border-radius: 50px;
            font-weight: bold;
            transition: 0.3s;
        }
        .form-control:focus {
            border-color: #ffcc00;
            box-shadow: 0 0 10px rgba(255, 204, 0, 0.5);
        }
        .image-preview {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4">
            <div class="card-header">Tambah Profil Alumni</div>
            <div class="card-body">
                <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="mb-3">
                        <label for="angkatan" class="form-label fw-bold">Angkatan</label>
                        <input type="number" name="angkatan" id="angkatan" class="form-control" placeholder="Masukkan tahun angkatan" required>
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label fw-bold">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Masukkan pekerjaan" required>
                    </div>

                    <div class="mb-3">
                        <label for="cerita_sukses" class="form-label fw-bold">Cerita Sukses</label>
                        <textarea name="cerita_sukses" id="cerita_sukses" class="form-control" rows="4" placeholder="Masukkan cerita sukses" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label fw-bold">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" onchange="previewImage(event)" required>
                        <small class="text-muted">Unggah foto dalam format .jpg, .jpeg, atau .png.</small>
                        <img id="foto-preview" class="image-preview mt-3" src="#" alt="Preview Gambar">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('alumniAdmin') }}" class="btn btn-danger px-4">
                            <i class="bi bi-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('foto-preview');
            const file = event.target.files[0];
            if (file) {
                imagePreview.src = URL.createObjectURL(file);
                imagePreview.style.display = 'block';
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        }
    </script>
</body>
</html>
