<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Alumni</title>
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
            background: #f7e015;
        }
        .card-header h2 {
            font-size: 25px;
            text-align: center;
            font-style: italic;
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
        }
        .btn-primary {
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            color: #fff;
        }
        .btn-secondary:hover {
            background-color: #6c757d;
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
            <div class="card-header">
                <h2>Tambah Data Alumni</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('alumni.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="angkatan" class="form-label fw-bold">Angkatan</label>
                        <input 
                            type="number" 
                            name="angkatan" 
                            class="form-control @error('angkatan') is-invalid @enderror" 
                            placeholder="Masukkan angkatan, misal: 2020" 
                            value="{{ old('angkatan') }}" 
                            required
                        >
                        @error('angkatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="bekerja" class="form-label fw-bold">Jumlah Alumni yang Bekerja</label>
                        <input 
                            type="number" 
                            name="bekerja" 
                            class="form-control @error('bekerja') is-invalid @enderror" 
                            placeholder="Masukkan jumlah alumni yang bekerja" 
                            value="{{ old('bekerja') }}" 
                            required
                        >
                        @error('bekerja')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="melanjutkan" class="form-label fw-bold">Jumlah Alumni yang Melanjutkan Pendidikan</label>
                        <input 
                            type="number" 
                            name="melanjutkan" 
                            class="form-control @error('melanjutkan') is-invalid @enderror" 
                            placeholder="Masukkan jumlah alumni yang melanjutkan pendidikan" 
                            value="{{ old('melanjutkan') }}" 
                            required
                        >
                        @error('melanjutkan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="wirausaha" class="form-label fw-bold">Jumlah Alumni yang Wirausaha</label>
                        <input 
                            type="number" 
                            name="wirausaha" 
                            class="form-control @error('wirausaha') is-invalid @enderror" 
                            placeholder="Masukkan jumlah alumni yang wirausaha" 
                            value="{{ old('wirausaha') }}" 
                            required
                        >
                        @error('wirausaha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('alumniAdmin') }}" class="btn btn-danger">
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
  </body>
</html>
