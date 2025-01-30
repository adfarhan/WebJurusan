<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Staf Pengajar</title>
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
                <h2 class="mb-0" style="color: #fff; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);"> Edit Data Staf Pengajar</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('pengajars.update', $pengajar) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Input Judul -->
                    <div class="mb-4">
                        <label for="title" class="form-label fw-bold">Nama Pengajar</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ $pengajar->nama }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="form-label fw-bold">Divisi RPL</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ $pengajar->jabatan }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="form-label fw-bold">Status</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ $pengajar->bidang }}" required>
                    </div>

                    

                    <!-- Input Gambar -->
                    <div class="mb-4">
                        <label for="image" class="form-label fw-bold">Foto Formal</label>
                        <input type="file" id="image" name="image" class="form-control" onchange="previewImage(event)">
                        @if($pengajar->foto)
                            <div class="mt-2">
                                <span>Gambar Lama:</span>
                                <img src="{{ asset('storage/'.$pengajar->foto) }}" alt="image" class="img-thumbnail" style="max-width: 20%; border-radius: 8px;">
                            </div>
                        @endif
                    </div>



                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tentangAdmin') }}" class="btn btn-danger">
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
