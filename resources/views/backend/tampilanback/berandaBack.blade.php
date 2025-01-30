<x-layBack>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="content main" id="main">
        <div class="pagetitle">
            <h1 style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);"><span style="color:#fde616;">R</span>ekayasa <span style="color:#fde616;">P</span>erangkat <span style="color:#fde616;">L</span>unak</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Tampilan</li>
                    <li class="breadcrumb-item"><a href="{{ route('berandaAdmin') }}">Beranda</a></li>
                </ol>
            </nav>
        </div>
        <div class="container mt-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-3">
                    <!-- Ikon besar untuk konfirmasi -->
                    <i class="bi bi-check-circle-fill text-success display-1 mb-3"></i>
                    <h5 class="card-title fw-bold">Data yang Harus Dikonfirmasi</h5>
                    <!-- Angka data -->
                    <p class="display-4 text-dark fw-bold">{{ $dataCount }}</p>
                </div>
                <div class="card-footer text-center bg-light">
                    <a href="{{ route('testimoniKonfirAdmin') }}" class="btn btn-outline-success px-4 py-2 rounded-pill">
                        <i class="bi bi-eye"></i> Lihat Detail
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(() => {
            let alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.add('fade-out');
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000); // 3 detik
    </script>
    
    <style>
        .fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-out;
        }
    </style>
    
</x-layBack>