<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Berita</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .judul h3 {
            font-size: 1.75rem;
            font-weight: bold;
            text-align: center;
            margin: 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
        }
        .card-body img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body p {
            font-size: 1rem;
            line-height: 1.6;
            text-align: justify;
        }
        .text-muted {
            font-style: italic;
            font-size: 0.9rem;
        }
        .btn-secondary {
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #505050;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="card shadow-lg border-0" style="border-radius: 20px;">
            
            <!-- Body -->
            <div class="card-body bg-white p-4" style="border-radius: 20px;">
                <!-- Gambar Berita -->
                @if($beritum->image)
                    <div class="text-center">
                        <img src="{{ asset('storage/' . $beritum->image) }}" alt="Gambar Berita">
                    </div>
                @endif
                
                <div class="judul">
                    <h3>{{ $beritum->title }}</h3>
                </div>
                <!-- Konten Berita -->
                <div class="mt-4">
                    <p>{!! nl2br(e($beritum->content)) !!}</p>
                </div>
                
                <!-- Tanggal Publikasi -->
                <div class="mt-4 text-muted">
                    Dipublikasikan pada: <strong>{{ \Carbon\Carbon::parse($beritum->publish_date)->format('d M Y') }}</strong>
                </div>
                
                <!-- Tombol Kembali -->
                <div class="mt-4 d-flex justify-content-center">
                    <a href="{{ route('berandaAdmin') }}" class="btn btn-secondary px-4 py-2">Kembali ke Daftar Berita</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
