<x-layBack>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="content main" id="main">
        <div class="pagetitle">
            <h1 style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);"><span style="color:#fde616;">R</span>ekayasa <span style="color:#fde616;">P</span>erangkat <span style="color:#fde616;">L</span>unak</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Tampilan</li>
                    <li class="breadcrumb-item"><a href="{{ route('kurikulumAdmin') }}">Kurikulum</a></li>
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

            <section class="mata-admin" id="mata-admin">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Mata Pelajaran</h2>
                    <p class="text-muted">Berikut adalah daftar Mata Pelajaran terkini yang dipelajari di jurusan RPL.</p>
                    <div class="underline mx-auto"></div>
                </div>
                
                
                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-header bg-light text-dark rounded-top-4 p-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Mata Pelajaran <span class="text-warning fw-bold">RPL</span></h5>
                        <a href="{{ route('matapelajaran.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus"></i> 
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded-3 shadow-sm">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="bg-secondary text-light">
                                    <tr>
                                        <th>No</th>
                                        <th style="vertical-align: middle; white-space: nowrap;">Nama Mapel</th>
                                        <th style="min-width: 300px;">Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($mapel as $key => $pelajaran)
                                    <tr>
                                        <td>{{ $mapel->firstItem() + $key }}</td>
                                        <td>{{ $pelajaran->nama_mapel }}</td>
                                        <td class="text-start">
                                            <div class="testimoni-text" style="max-height: 100px; overflow-y: auto; word-break: break-word; font-size: 13px;">
                                                {{ $pelajaran->deskripsi }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('matapelajaran.edit', $pelajaran->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form id="delete-form-{{ $pelajaran->id }}" action="{{ route('matapelajaran.destroy', $pelajaran->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $pelajaran->id }})">
                                                        <i class="fas fa-trash"></i> 
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Belum ada data mata pelajaran tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center rounded-bottom-4">
                        <div class="d-flex flex-column align-items-center mt-4">
                            <div class="pagination-info mb-2">
                                Menampilkan {{ $mapel->firstItem() }} sampai {{ $mapel->lastItem() }} dari {{ $mapel->total() }} hasil
                            </div>
                                {{  $mapel->appends(['mapel_page' => request('mapel_page')])->fragment('mata-admin')->links('pagination::bootstrap-4') }}
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
