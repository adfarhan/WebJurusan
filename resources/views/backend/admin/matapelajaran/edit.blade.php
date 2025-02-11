<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mata Pelajaran</title>
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
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4">
            <div class="card-header">Edit Mata Pelajaran</div>
            <div class="card-body">
                <form action="{{ route('matapelajaran.update', $matapelajaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_mapel" class="form-label fw-bold">Nama Mata Pelajaran</label>
                        <input type="text" name="nama_mapel" id="nama_mapel" class="form-control" value="{{ $matapelajaran->nama_mapel }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required>{{ $matapelajaran->deskripsi }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kurikulumAdmin') }}" class="btn btn-danger px-4">
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
</body>
</html>
