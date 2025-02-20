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
        <div class="container">
            <style>
                .alert-success {
                    background-color: #e6f9e6;
                    color: #155724;
                }
            
                .btn-close {
                    color: #155724;
                }
            
                .btn-close:hover {
                    color: #0b3d0b;
                }
            </style>
            

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert" style="margin-top: 10px; border: 2px solid #28a745; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">
                <i class="bi bi-check-circle-fill" style="font-size: 20px; margin-right: 10px; color: #28a745;"></i>
                <span class="flex-grow-1">{{ session('success') }}</span>
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


            <section class="berita-admin" id="berita-admin">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Berita</h2>
                    <p class="text-muted">Berikut adalah daftar berita terkini yang tersedia.</p>
                    <div class="underline mx-auto"></div>
                </div>

                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-header bg-light text-dark rounded-top-4 p-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Berita <span class="text-warning fw-bold">RPL</span></h5>
                        <a href="{{ route('berita.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus"></i>
                        </a>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive rounded-3 shadow-sm">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th style="min-width: 300px;">Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th style="min-width: 100px;">Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($berita as $key => $beritas)
                                        <tr class="bg-light">
                                            <td>{{ $berita->firstItem() + $key }}</td>
                                            <td>{{ $beritas->title }}</td>
                                            <td class="text-start">
                                                <div class="testimoni-text" style="max-height: 100px; overflow-y: auto; word-break: break-word; font-size: 13px;">
                                                    {{ $beritas->content }}
                                                </div>
                                            </td>
                                            <td class="text-muted" style="font-size: 14px;">{{ \Carbon\Carbon::parse($beritas->publish_date)->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#imageModalTable1_{{ $beritas->id }}">
                                                    <img src="{{ asset('storage/' . $beritas->image) }}" class="img-thumbnail" style="width: 80px; height: 60px;">
                                                </a>
                                                <div class="modal fade" id="imageModalTable1_{{ $beritas->id }}" tabindex="-1" aria-labelledby="imageModalLabelTable1_{{ $beritas->id }}" aria-hidden="true" data-bs-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="imageModalLabelTable1_{{ $beritas->id }}">Gambar Berita {{ $loop->iteration }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ asset('storage/' . $beritas->image) }}" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </td>
                                            
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('berita.show', $beritas) }}" class="btn btn-sm btn-success">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('berita.edit', $beritas) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $beritas->id }}" action="{{ route('berita.destroy', $beritas->id) }}" method="POST" class="d-inline">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $beritas->id }})">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">Belum ada data berita tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center rounded-bottom-4">
                        <div class="d-flex flex-column align-items-center mt-4">
                            <div class="pagination-info mb-2">
                                Menampilkan {{ $berita->firstItem() }} sampai {{ $berita->lastItem() }} dari {{ $berita->total() }} hasil
                            </div>
                            <div class="pagination-container">
                                {{  $berita->appends(['berita_page' => request('berita_page')])->fragment('berita-admin')->links('pagination::bootstrap-4') }}
                            </div>
                        </div>                    
                        <style>
                            .pagination-info {
                                font-size: 14px;
                                color: #555;
                            }
                            .pagination-container {
                                margin-top: 10px;
                                margin-bottom: 20px;
                            }
                            .pagination {
                                justify-content: center;
                            }
                            .pagination .page-item .page-link {
                                color: #000;
                                border-radius: 5px;
                                margin: 0 5px;
                                border: 1px solid #ddd;
                            }
                            .pagination .page-item.active .page-link {
                                background-color: #fde616;
                                color: #fff;
                                border-color: #fde616;
                            }
                            .pagination .page-item .page-link:hover {
                                background-color: #e5d00e;
                                color: #fff;
                            }
                        </style>
                    </div>

                </div>
            </section>

            <style>
                @media (max-width: 768px) {
                    .table-responsive {
                        overflow-x: auto;
                    }
                    .table td {
                        font-size: 14px;
                    }
                }
            </style>



            <style>
                @media (max-width: 768px) {
                    .table-responsive {
                        overflow-x: auto;
                    }
                    .table td {
                        font-size: 14px;
                    }
                }
                @media (max-width: 576px) {
                    .img-alumni {
                        width: 60px !important;
                        height: 60px !important;
                        aspect-ratio: 1 / 1 !important;
                    }
                }
                @media (max-width: 992px) {
                    .img-alumni {
                        width: 70px !important;
                        height: 70px !important;
                        aspect-ratio: 1 / 1 !important;
                    }
                }
            </style>


                        
                        
            <section class="alumni-admin" id="alumni-admin">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Alumni</h2>
                    <p class="text-muted">Berikut adalah daftar alumni terkini yang tersedia.</p>
                    <div class="underline mx-auto"></div>
                </div>

                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-header bg-light text-dark rounded-top-4 p-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Alumni <span class="text-warning fw-bold">RPL</span></h5>
                        <a href="{{ route('testimoni.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus"></i> 
                        </a>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive rounded-3 shadow-sm">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th style="vertical-align: middle; white-space: nowrap;">No</th>
                                        <th style="vertical-align: middle; white-space: nowrap;">Nama</th>
                                        <th style="vertical-align: middle; white-space: nowrap;">Angkatan</th>
                                        <th style="min-width: 300px; vertical-align: middle; white-space: nowrap;">Testimoni</th>
                                        <th style="min-width: 100px; vertical-align: middle; white-space: nowrap;">Foto Alumni</th>
                                        <th style="vertical-align: middle; white-space: nowrap;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($testimonis as $key => $testi)
                                        <tr class="bg-light">
                                            <td>{{ $testimonis->firstItem() + $key }}</td>
                                            <td style="font-size: 13px;">{{ $testi->nama }}</td>
                                            <td>{{ $testi->angkatan }}</td>
                                            <td class="text-start">
                                                <div class="testimoni-text" style="max-height: 100px; overflow-y: auto; word-break: break-word; font-size: 13px;">
                                                    {{ $testi->testimoni_alumni }}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#imageModalTable2_{{ $testi->id }}">
                                                    <img src="{{ asset('storage/' . $testi->image_alumni) }}" 
                                                         class="img-thumbnail rounded-circle img-alumni" 
                                                         style="width: 80px; height: 80px; object-fit: cover; aspect-ratio: 1 / 1 !important;">
                                                </a>
                                                <div class="modal fade" id="imageModalTable2_{{ $testi->id }}" tabindex="-1" aria-labelledby="imageModalLabelTable1_{{ $testi->id }}" aria-hidden="true" data-bs-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="imageModalLabelTable1_{{ $testi->id }}">Foto Alumni</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ asset('storage/' . $testi->image_alumni) }}" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('testimoni.edit', $testi->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $testi->id }}" action="{{ route('testimoni.destroy', $testi->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $testi->id }})">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">Belum ada data alumni tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center rounded-bottom-4">
                        <div class="d-flex flex-column align-items-center mt-4">
                            <div class="pagination-info mb-2">
                                Menampilkan {{ $testimonis->firstItem() }} sampai {{ $testimonis->lastItem() }} dari {{ $testimonis->total() }} hasil
                            </div>
                            <div class="pagination-container">
                                {{  $testimonis->appends(['testimoni_page' => request('testimoni_page')])->fragment('alumni-admin')->links('pagination::bootstrap-4') }}
                            </div>
                        </div>                    
                        <style>
                            .pagination-info {
                                font-size: 14px;
                                color: #555;
                            }
                            .pagination-container {
                                margin-top: 10px;
                                margin-bottom: 20px;
                            }
                            .pagination {
                                justify-content: center;
                            }
                            .pagination .page-item .page-link {
                                color: #000;
                                border-radius: 5px;
                                margin: 0 5px;
                                border: 1px solid #ddd;
                            }
                            .pagination .page-item.active .page-link {
                                background-color: #fde616;
                                color: #fff;
                                border-color: #fde616;
                            }
                            .pagination .page-item .page-link:hover {
                                background-color: #e5d00e;
                                color: #fff;
                            }
                        </style>
                    </div>

                </div>
            </section>


            
        </div>
    </div>
   
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
</x-layBack>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBxNwEX8pP6Gp9pO4cBvJcmKjc8dJg6R8KDgm9t0h7Ztq03A" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-KyZXEJCRGeIoa2kwxP6L04Ry8hw63T7ObIiC6tP9O3s09/vD2n5tX2h0U8yDJw73" crossorigin="anonymous"></script>