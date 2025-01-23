<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Prestasi</title>
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
        .card-header h2 {
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
            border-color: #fde616;
            box-shadow: 0 0 0 0.25rem rgba(185, 185, 20, 0.25);
        }
    </style>
  </head>
  <body>

    <div class="container mb-5 mt-5">
        <div class="card shadow-lg">
            <div class="card-header border-0" style="background: #f7e015">
                <h2 class="mb-0" style="color: #fff; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);">Edit Prestasi</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama_siswa" class="form-label fw-bold">Nama</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $prestasi->nama_siswa }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="kelas" class="form-label fw-bold">Kelas</label>
                        <select name="kelas" id="kelas" class="form-select" required>
                            <option value="" disabled>Pilih kelas</option>
                            <option value="10" {{ $prestasi->kelas == '10' ? 'selected' : '' }}>Kelas 10</option>
                            <option value="11" {{ $prestasi->kelas == '11' ? 'selected' : '' }}>Kelas 11</option>
                            <option value="12" {{ $prestasi->kelas == '12' ? 'selected' : '' }}>Kelas 12</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $prestasi->tanggal }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label fw-bold">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" onchange="previewImage(event)">
                        <small class="text-muted">Unggah foto dalam format .jpg, .png, atau .jpeg.</small>
                        <p>
                            <img id="foto-preview" src="{{ asset('storage/' . $prestasi->gambar) }}" alt="Preview Gambar" class="mt-3" style="max-width: 20%; height: auto; border-radius: 8px;">
                        </p>
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required>{{ $prestasi->deskripsi }}</textarea>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kegiatanAdmin') }}" class="btn btn-danger">
                            <i class="bi bi-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Perbarui
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('foto-preview');
            const file = event.target.files[0];
            if (file) {
                imagePreview.src = URL.createObjectURL(file);
            } else {
                imagePreview.src = '{{ asset('storage/' . $prestasi->gambar) }}';
            }
        }
    </script>
  </body>
</html>
