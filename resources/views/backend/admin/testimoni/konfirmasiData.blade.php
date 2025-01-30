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

            <div class="card" style="border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); background:#fff; border: 3px solid #5f5f58; ">
                <div>
                    <div class="card-header text-center p-3 border-0" style="border-radius: 12px;">
                        <p class="text-dark fw-bold">Konfirmasi Data Testimoni siswa  <span style="color: #fde616; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">RPL</span></p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="border-radius: 12px; border: 5px solid #939090; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">
                        <table class="table table-bordered table-hover table-sm" style="margin: 0; color:">
                            <thead style="background: #5f5f58 ; color: #000; font-weight: bold;">
                                <tr style="border-bottom: 2px solid #5f5f58; text-align:center;">
                                    <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">No</th>
                                    <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Nama</th>
                                    <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Angkatan</th>
                                    <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Testimoni</th>
                                    <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Poto</th>
                                    <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Status</th>
                                    <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Aksi</th>
                                </tr>
                            </thead>
                            @if ($pendingTestimoni->isEmpty())
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center" style="padding: 12px; color: #5f5f58; font-size: 13px;">Belum ada data Testimoni siswa yang harus dikonfirmasi.</td>
                                </tr>
                            </tbody>
                            @else
                            @foreach ($pendingTestimoni as $key => $testimoni)
                            <tbody style="background-color: #f8f9fa; text-align: center;">
                                <tr>
                                    <td style="padding: 12px;">{{ $pendingTestimoni->firstItem() + $key }}.</td>
                                    <td style="padding: 12px; ">{{ $testimoni->nama }}</td>
                                    <td style="padding: 12px; ">{{ $testimoni->angkatan }}</td>
                                    <td style="text-align: justify;">{{ $testimoni->testimoni_alumni }}</td>
                                    <td style="padding: 12px; ">
                                        <span class="badge bg-warning text-dark" style="font-size: 14px; padding: 5px 10px; border-radius: 8px;">{{ $testimoni->status }}</span>
                                    </td>
                                    <td style="padding: 12px;">
                                        <img src="{{ asset('storage/' . $testimoni->image_alumni) }}" 
                                                alt="{{ $testimoni->nama }}" 
                                                width="100" 
                                                height="100" 
                                                style="border-radius: 50%; object-fit: cover;">
                                    </td>
                                    <td style="padding: 12px; ">
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
                                <tfoot class="text-center" style="background: #5f5f58; color: #fff;">
                                    <tr>
                                        <td colspan="7" style="padding: 12px; font-weight: bold; font-size: 12px;">Konfirmasi Data Testimoni siswa <span style="color: #fde616;">RPL</span></td>
                                    </tr>
                                </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer border-0" style="border-radius: 12px; background:#fff;">
                    <div class="d-flex justify-content-center">
                        <div class="pagination-container">
                            {{ $pendingTestimoni->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    <style>
                        .pagination-container {
                            margin-top: 20px;
                            margin-bottom: 20px;
                        }
                        .pagination {
                            justify-content: center;
                        }
                        .pagination .page-item .page-link {
                            color: #000;
                            border-radius: 5px;
                            margin: 0 5px;
                        }
                        .pagination .page-item.active .page-link {
                            background-color: #fde616;
                            color: white;
                            border-color: #fde616;
                        }
                        .pagination .page-item .page-link:hover {
                            background-color: #e5d00e;
                            color: white;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
</x-layBack>
