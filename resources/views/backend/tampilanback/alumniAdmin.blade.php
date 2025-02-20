<x-layBack>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="content main" id="main">
        <div class="pagetitle">
            <h1 style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);"><span style="color:#fde616;">R</span>ekayasa <span style="color:#fde616;">P</span>erangkat <span style="color:#fde616;">L</span>unak</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Tampilan</li>
                    <li class="breadcrumb-item"><a href="{{ route('tentangAdmin') }}">Alumni</a></li>
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

            <section class="profile-admin" id="profile-admin">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Profile Alumni</h2>
                    <p class="text-muted">Berikut adalah daftar Profile Alumni yang tersedia.</p>
                    <div class="underline mx-auto"></div>
                </div>

                <div class="card shadow-lg rounded-4 border-0">

                    <div class="card-header bg-light text-dark rounded-top-4 p-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Profile Alumni<span class="text-warning fw-bold">RPL</span></h5>
                        <a href="{{ route('profil.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus"></i> 
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded-3 shadow-sm">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Angkatan</th>
                                        <th>Pekerjaan</th>
                                        <th style="min-width: 200px;">Cerita Karir</th>
                                        <th style="min-width: 100px;">Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($profile as $key => $pro)
                                    <tr class="bg-light">
                                        <td>{{ $profile->firstItem() + $key }}</td>
                                        <td>{{ $pro->nama }}</td>
                                        <td>{{ $pro->angkatan }}</td>
                                        <td style="vertical-align: middle; white-space: nowrap;">
                                            <span style="
                                                display: inline-flex;
                                                align-items: center;
                                                gap: 5px;
                                                padding: 5px 12px;
                                                background: #FFB300;
                                                color: white;
                                                border-radius: 20px;
                                                font-size: 12px;
                                                font-weight: bold;
                                                box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
                                                transition: transform 0.2s ease;
                                                cursor: pointer;
                                            " onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';">
                                                <i class="fas fa-briefcase"></i> <!-- Ikon Pekerjaan -->
                                                {{ $pro->pekerjaan }}
                                            </span>
                                        </td>
                                        
                                        
                                        <td class="text-start">
                                            <div class="testimoni-text" style="max-height: 100px; overflow-y: auto; word-break: break-word; font-size: 13px;">
                                                {{ $pro->cerita_sukses }}
                                            </div>
                                        </td>

                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal1{{ $pro->id }}">
                                                <img src="{{ asset('storage/' . $pro->foto) }}" class="img-thumbnail" style="width: 80px; height: 60px;">
                                            </a>
                                            <div class="modal fade" id="imageModal1{{ $pro->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $pro->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="imageModalLabel{{ $pro->id }}">Foto Frofil</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <img src="{{ asset('storage/' . $pro->foto) }}"  class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('profil.edit', $pro->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('profil.destroy', $pro->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $pro->id }})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Belum ada data Profile Alumni tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center rounded-bottom-4">
                        <div class="d-flex flex-column align-items-center mt-4">
                            <div class="pagination-info mb-2">
                                Menampilkan {{ $profile->firstItem() }} sampai {{ $profile->lastItem() }} dari {{ $profile->total() }} hasil
                            </div>
                            <div class="pagination-container">
                                {{ $profile->appends(['profil_page' => request('profil_page')])->fragment('profile-admin')->links('pagination::bootstrap-4') }}
                            </div>
                        </div>                    
                        <style>
                            .pagination-container {
                                margin-top: 5px;
                                margin-bottom: 5px;
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
            </section>

            <section class="bmw-admin" id="bmw-admin">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Alumni BMW</h2>
                    <p class="text-muted">Berikut adalah daftar Alumni BMW yang tersedia.</p>
                    <div class="underline mx-auto"></div>
                </div>
            
                
                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-header bg-light text-dark rounded-top-4 p-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Alumni BMW<span class="text-warning fw-bold">RPL</span></h5>
                        <a href="{{ route('alumni.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus"></i> 
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded-3 shadow-sm">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="bg-secondary text-light">
                                    <tr>
                                        <th style="vertical-align: middle; white-space: nowrap;">No</th>
                                        <th style="vertical-align: middle; white-space: nowrap;">Angkatan</th>
                                        <th style="vertical-align: middle; white-space: nowrap;">Bekerja</th>
                                        <th style="vertical-align: middle; white-space: nowrap;">Melanjutkan Kuliah</th>
                                        <th style="vertical-align: middle; white-space: nowrap;">Wirausaha</th>
                                        <th style="vertical-align: middle; white-space: nowrap;">Total Siswa</th>
                                        <th style="vertical-align: middle; white-space: nowrap;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($alumnibmw as $key => $bmw)
                                        <tr>
                                            <td>{{ $alumnibmw->firstItem() + $key }}</td>
                                            <td>{{ $bmw->angkatan }}</td>
                                            <td style="min-width: 100px;">{{ $bmw->bekerja }} siswa</td>
                                            <td>{{ $bmw->melanjutkan }} siswa</td>
                                            <td>{{ $bmw->wirausaha }} siswa</td>
                                            <td>{{ $bmw->total }} siswa</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('alumni.edit', $bmw->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <form id="delete-form-{{ $bmw->id }}" action="{{ route('alumni.destroy', $bmw->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $bmw->id }})">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-muted">Belum ada data alumni BMW tersedia.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center rounded-bottom-4">
                        <div class="d-flex flex-column align-items-center mt-4">
                            <div class="pagination-info mb-2">
                                Menampilkan {{ $alumnibmw->firstItem() }} sampai {{ $alumnibmw->lastItem() }} dari {{ $alumnibmw->total() }} hasil
                            </div>
                            <div class="pagination-container">
                                {{  $alumnibmw->appends(['bmw_page' => request('bmw_page')])->fragment('bmw-admin')->links('pagination::bootstrap-4') }}
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