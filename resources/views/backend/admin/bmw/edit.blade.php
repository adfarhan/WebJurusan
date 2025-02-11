<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Alumni BMW</title>
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
    </style>
  </head>
  <body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4">
            <div class="card-header">Edit Data Alumni BMW</div>
            <div class="card-body">
                <form action="{{ route('alumni.update', $alumnibmw->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="angkatan" class="form-label fw-bold">Angkatan</label>
                        <input type="number" name="angkatan" class="form-control" value="{{ old('angkatan', $alumnibmw->angkatan) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="bekerja" class="form-label fw-bold">Jumlah Alumni yang Bekerja</label>
                        <input type="number" name="bekerja" class="form-control" value="{{ old('bekerja', $alumnibmw->bekerja) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="melanjutkan" class="form-label fw-bold">Jumlah Alumni yang Melanjutkan Pendidikan</label>
                        <input type="number" name="melanjutkan" class="form-control" value="{{ old('melanjutkan', $alumnibmw->melanjutkan) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="wirausaha" class="form-label fw-bold">Jumlah Alumni yang Wirausaha</label>
                        <input type="number" name="wirausaha" class="form-control" value="{{ old('wirausaha', $alumnibmw->wirausaha) }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('alumniAdmin') }}" class="btn btn-danger px-4">
                            <i class="bi bi-arrow-left"></i> Kembali
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