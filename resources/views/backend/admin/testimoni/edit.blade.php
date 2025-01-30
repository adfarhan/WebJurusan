<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Testimoni Alumni</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 12px;
        }
        .card-header {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            background-color: #f7e015;
        }
        .card-header h2 {
            font-size: 25px;
            text-align: center;
            font-style: italic;
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
        }
        .btn-success, .btn-secondary {
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            background-color: #096d16;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #bc1919;
            color: #fff;
        }
        small.text-muted {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .form-control:focus {
            border-color: #fde616; /* Warna hijau */
            box-shadow: 0 0 0 0.25rem rgba(185, 185, 20, 0.25);
        }
    </style>
</head>
<body>
    <div class="container mb-5 mt-5">
        <div class="card shadow-lg">
            <div class="card-header border-0">
                <h2 class="mb-0">Edit Testimoni Alumni</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('testimoni.update', $testimoni->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="nama" class="form-label fw-bold">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $testimoni->nama) }}" required>
                    </div>

                    <!-- angkatan -->
                    <div class="mb-4">
                        <label for="angkatan" class="form-label fw-bold">Angkatan</label>
                        <input type="number" name="angkatan" id="angkatan" class="form-control" value="{{ old('angkatan', $testimoni->angkatan) }}" required>
                    </div>
                    
                    <!-- Testimoni -->
                    <div class="mb-4">
                        <label for="testimoni_alumni" class="form-label fw-bold">Testimoni</label>
                        <textarea name="testimoni_alumni" id="testimoni_alumni" class="form-control" rows="4" placeholder="Masukkan testimoni" required>{{ old('testimoni_alumni', $testimoni->testimoni_alumni) }}</textarea>
                    </div>

                    <!-- Gambar -->
                    <div class="mb-4">
                        <label for="image_alumni" class="form-label fw-bold">Foto</label>
                        <input type="file" name="image_alumni" id="image_alumni" class="form-control">
                        <small class="form-text text-muted">Unggah foto dengan format .jpg, .jpeg, atau .png</small>

                        @if ($testimoni->image_alumni)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $testimoni->image_alumni) }}" alt="Foto Testimoni" style="max-width: 100px; border-radius: 8px;">
                            </div>
                        @endif
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('berandaAdmin') }}" class="btn btn-danger">
                            <i class="bi bi-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
