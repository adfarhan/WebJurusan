<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Berita</title>
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
        .btn-primary:hover {
            background-color: #096d16;
            color: #fff;
        }
        small.text-muted {
            font-size: 0.9rem;
            color: #6c757d;
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
                <h2 class="mb-0" style="color: #fff; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);"> Edit Data Berita</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('berita.update', $beritum) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Input Judul -->
                    <div class="mb-4">
                        <label for="title" class="form-label fw-bold">Judul</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ $beritum->title }}" required>
                        <small class="text-muted">Judul harus singkat dan menarik.</small>
                    </div>

                    <!-- Input Konten -->
                    <div class="mb-4">
                        <label for="content" class="form-label fw-bold">Konten</label>
                        <textarea id="content" name="content" class="form-control" rows="6" required>{{ $beritum->content }}</textarea>
                    </div>

                    <!-- Input Gambar -->
                    <div class="mb-4">
                        <label for="image" class="form-label fw-bold">Gambar Berita</label>
                        <input type="file" id="image" name="image" class="form-control" onchange="previewImage(event)">
                        @if($beritum->image)
                            <div class="mt-2">
                                <span>Gambar Lama:</span>
                                <img src="{{ asset('storage/'.$beritum->image) }}" alt="image" class="img-thumbnail" style="max-width: 20%; border-radius: 8px;">
                            </div>
                        @endif
                    </div>

                    <!-- Input Tanggal Publish -->
                    <div class="mb-4">
                        <label for="publish_date" class="form-label fw-bold">Tanggal Publish</label>
                        <input type="date" id="publish_date" name="publish_date" class="form-control" value="{{ $beritum->publish_date }}" required>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('berandaAdmin') }}" class="btn btn-danger">
                            <i class="bi bi-arrow-left"></i> Kembali
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
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
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
