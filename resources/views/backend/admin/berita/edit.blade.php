<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Berita</title>
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
            <div class="card-header">Edit Data Berita</div>
            <div class="card-body">
                <form action="{{ route('berita.update', $beritum) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Judul</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $beritum->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold">Konten</label>
                        <textarea name="content" id="content" class="form-control" rows="5" required>{{ $beritum->content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label fw-bold">Gambar</label>
                        <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
                        <img id="image-preview" class="image-preview mt-3" src="#" alt="Preview Gambar">
                        @if($beritum->image)
                            <div class="mt-2">
                                <span>Gambar Lama:</span>
                                <img src="{{ asset('storage/'.$beritum->image) }}" alt="image" class="img-thumbnail" style="max-width: 100px; border-radius: 8px;">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="publish_date" class="form-label fw-bold">Tanggal Publikasi</label>
                        <input type="date" name="publish_date" id="publish_date" class="form-control" value="{{ $beritum->publish_date }}" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('berandaAdmin') }}" class="btn btn-danger px-4"><i class="bi bi-arrow-left"></i> Batal</a>
                        <button type="submit" class="btn btn-success px-4"><i class="bi bi-save"></i> Simpan</button>
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
