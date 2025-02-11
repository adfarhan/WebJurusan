<x-layBack>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="content main" id="main">
        <div class="pagetitle">
            <h1 style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">
                <span style="color:#fde616;">R</span>ekayasa 
                <span style="color:#fde616;">P</span>erangkat 
                <span style="color:#fde616;">L</span>unak
            </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Konfirmasi Data</li>
                    <li class="breadcrumb-item"><a href="{{ route('tentangAdmin') }}">Data Testimoni</a></li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
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

        <div class="card shadow-lg rounded-4 border-0">
            <div class="card-header bg-dark text-light text-center rounded-top-4 p-3">
                <h5 class="mb-0">Konfirmasi Data Testimoni Siswa <span class="text-warning">RPL</span></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive rounded-3 shadow-sm">
                    <table class="table table-hover align-middle text-center">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Angkatan</th>
                                <th>Testimoni</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #fff; color: #000;">
                            @if ($pendingTestimoni->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Belum ada data Testimoni yang harus dikonfirmasi.</td>
                                </tr>
                            @else
                                @foreach ($pendingTestimoni as $key => $testimoni)
                                    <tr>
                                        <td>{{ $pendingTestimoni->firstItem() + $key }}</td>
                                        <td>{{ $testimoni->nama }}</td>
                                        <td>{{ $testimoni->angkatan }}</td>
                                        <td class="text-start">{{ $testimoni->testimoni_alumni }}</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal{{ $testimoni->id }}">
                                                <img src="{{ asset('storage/' . $testimoni->image_alumni) }}" 
                                                    class="img-thumbnail" 
                                                    alt="{{ $testimoni->nama }}" 
                                                    style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
                                            </a>
                        
                                            <!-- Modal -->
                                            <div class="modal fade" id="imageModal{{ $testimoni->id }}" tabindex="-1" 
                                                aria-labelledby="imageModalLabel{{ $testimoni->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="imageModalLabel{{ $testimoni->id }}">Foto Alumni</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <img src="{{ asset('storage/' . $testimoni->image_alumni) }}"  
                                                                class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-glass">{{ $testimoni->status }}</span>
                                        </td>                                                                               
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <form action="{{ route('testimoni.updateStatus', [$testimoni, 'diterima']) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm" style="border-radius: 8px;">
                                                        <i class="bi bi-check-circle"></i> Terima
                                                    </button>
                                                </form>
                                                <form action="{{ route('testimoni.updateStatus', [$testimoni, 'ditolak']) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm" style="border-radius: 8px;">
                                                        <i class="bi bi-x-circle"></i> Tolak
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer border-0 text-center" style="border-radius: 12px; background:#fff;">
                <div class="pagination-container">
                    {{ $pendingTestimoni->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

        </div>
    </div>
    <style>
    .badge-glass {
        background: #f9e428; /* Warna dengan transparansi */
        color: #000;
        font-weight: bold;
        padding: 8px 14px;
        border-radius: 12px;
        text-transform: uppercase;
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 193, 7, 0.6);
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    </style>
</x-layBack>
