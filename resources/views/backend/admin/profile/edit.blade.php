<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profil Alumni</title>
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
            display: block;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4">
            <div class="card-header">Edit Profil Alumni</div>
            <div class="card-body">
                <form action="{{ route('profil.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $profile->nama }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="angkatan" class="form-label fw-bold">Angkatan</label>
                        <select class="form-select" id="angkatan" name="angkatan" required>
                            <option value="" disabled>Pilih Angkatan</option>
                            @for ($year = date('Y') - 19; $year <= date('Y'); $year++)
                                <option value="{{ $year }}" {{ $profile->angkatan == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label fw-bold">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $profile->pekerjaan }}">
                    </div>

                    <div class="mb-3">
                        <label for="cerita_sukses" class="form-label fw-bold">Cerita Sukses</label>
                        <textarea class="form-control" id="cerita_sukses" name="cerita_sukses" rows="4">{{ $profile->cerita_sukses }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label fw-bold">Gambar</label>
                        <input type="file" name="foto" id="foto" class="form-control" onchange="previewImage(event)">
                        <small class="text-muted">Unggah foto dalam format .jpg, .png, atau .jpeg.</small>
                        <img id="foto-preview" class="image-preview mt-3" src="{{ asset('storage/' . $profile->foto) }}" alt="Preview Gambar">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('alumniAdmin') }}" class="btn btn-danger px-4">
                            <i class="bi bi-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-save"></i> Perbarui
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
            } else {
                imagePreview.src = '{{ asset('storage/' . $profile->foto) }}';
            }
        }
    </script>
</body>
</html>
