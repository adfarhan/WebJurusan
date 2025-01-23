<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Profil Alumni</title>
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
        }
        .card-header h2{
            font-size: 25px;
            text-align: center;
            font-style: italic;
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
        .form-control:focus {
            border-color: #fde616; /* Warna hijau */
            box-shadow: 0 0 0 0.25rem rgba(185, 185, 20, 0.25);
        }
    </style>
  </head>
  <body>


    <div class="container mb-5 mt-5">
        <div class="card shadow-lg">
            <div class="card-header border-0" style="background: #f7e015">
                <h2 class="mb-0" style="color: #fff ; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);"> Tambah Profil Alumni</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="form-label fw-bold">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-4">
                        <label for="angkatan" class="form-label fw-bold">Angkatan</label>
                        <select class="form-select" id="angkatan" name="angkatan" required>
                            <option value="" disabled selected>Pilih Angkatan</option>
                            @for ($year = date('Y') - 19; $year <= date('Y'); $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="pekerjaan" class="form-label fw-bold">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                    </div>

                    <div class="mb-4">
                        <label for="cerita_sukses" class="form-label fw-bold">Cerita Sukses</label>
                        <textarea class="form-control" id="cerita_sukses" name="cerita_sukses" rows="4" required></textarea>
                    </div>

                    <!-- Gambar -->
                    <div class="mb-4">
                        <label for="foto" class="form-label fw-bold fw-bold">Gambar</label>
                        <input type="file" name="foto" id="foto" class="form-control" onchange="previewImage(event)" required>
                        <small class="text-muted">Unggah foto dalam format .jpg, .png, atau .jpeg.</small>
                        <p><img id="foto-preview" src="#" alt="Preview Gambar" class="mt-3 d-none" style="max-width: 20%; height: auto; border-radius: 8px;"></p>
                    </div>


                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('alumniAdmin') }}" class="btn btn-danger">
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
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('foto-preview');
            const file = event.target.files[0];
            if (file) {
                imagePreview.src = URL.createObjectURL(file);
                imagePreview.classList.remove('d-none');
            } else {
                imagePreview.src = '#';
                imagePreview.classList.add('d-none');
            }
        }
    </script>
  </body>
</html>
