<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Projek</title>
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
            <div class="card-header">Tambah Projek</div>
            <div class="card-body">
                <form action="{{ route('projek.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Judul Proyek -->
                    <div class="mb-3">
                        <label for="judul_projek" class="form-label fw-bold">Judul Proyek</label>
                        <input type="text" name="judul_projek" id="judul_projek" class="form-control" placeholder="Masukkan judul proyek" required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Masukkan deskripsi proyek" required></textarea>
                    </div>

                    <!-- Sample Projek -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label fw-bold">Sample (Projek)</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" onchange="previewImage(event)">
                        <small class="text-muted">Unggah Sample dalam format .jpg, .png, atau .jpeg.</small>
                        <img id="image-preview" class="image-preview mt-3" src="#" alt="Preview Gambar">
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kegiatanAdmin') }}" class="btn btn-danger px-4">
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
            const imagePreview = document.getElementById('image-preview');
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
