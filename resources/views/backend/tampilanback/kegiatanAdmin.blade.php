<x-layBack>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="content main" id="main">
        <div class="pagetitle">
            <h1 style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);"><span style="color:#fde616;">R</span>ekayasa <span style="color:#fde616;">P</span>erangkat <span style="color:#fde616;">L</span>unak</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Tampilan</li>
                    <li class="breadcrumb-item"><a href="{{ route('kegiatanAdmin') }}">Kegiatan</a></li>
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
            
            <section class="projek-admin" id="projek-admin">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Projek</h2>
                    <p class="text-muted">Berikut adalah daftar Projek terkini yang tersedia.</p>
                    <div class="underline mx-auto"></div>
                </div>
            
                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-header bg-dark text-light text-center rounded-top-4 p-3">
                        <h5 class="mb-0">Data Projek <span class="text-warning">RPL</span></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded-3 shadow-sm">
                            <table class="table table-hover align-middle text-center">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Judul Projek</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($projek as $key => $tugas)
                                    <tr class="bg-light">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tugas->judul_projek }}</td>
                                        <td>{{ $tugas->deskripsi }}</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal1{{ $tugas->id }}">
                                                <img src="{{ asset('storage/' . $tugas->gambar) }}" class="img-thumbnail" style="width: 80px; height: 60px;">
                                            </a>
                                            <div class="modal fade" id="imageModal1{{ $tugas->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $tugas->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="imageModalLabel{{ $tugas->id }}">Foto Projek</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <img src="{{ asset('storage/' . $tugas->gambar) }}"  class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('projek.edit', $tugas->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('projek.destroy', $tugas->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $tugas->id }})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada data projek tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center rounded-bottom-4">
                        <a href="{{ route('projek.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus"></i> Tambah Data
                        </a>
                    </div>
                </div>
            </section>

            <section class="prestasi-admin" id="prestasi-admin">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Prestasi</h2>
                    <p class="text-muted">Berikut adalah daftar Prestasi terkini yang tersedia.</p>
                    <div class="underline mx-auto"></div>
                </div>
            
                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-header bg-dark text-light text-center rounded-top-4 p-3">
                        <h5 class="mb-0">Data Prestasi <span class="text-warning">RPL</span></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded-3 shadow-sm">
                            <table class="table table-hover align-middle text-center">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Foto Prestasi</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($prestasis as $key => $pres)
                                    <tr class="bg-light">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pres->nama_siswa }}</td>
                                        <td>{{ $pres->kelas }}</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal2{{ $pres->id }}">
                                                <img src="{{ asset('storage/' . $pres->gambar) }}" class="img-thumbnail" style="width: 80px; height: 60px;">
                                            </a>
                                            <div class="modal fade" id="imageModal2{{ $pres->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $pres->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="imageModalLabel{{ $pres->id }}">Foto Prestasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <img src="{{ asset('storage/' . $pres->gambar) }}"  class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $pres->tanggal }}</td>
                                        <td>{{ $pres->deskripsi }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('prestasi.edit', $pres->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('prestasi.destroy', $pres->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $pres->id }})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Belum ada data prestasi tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center rounded-bottom-4">
                        <a href="{{ route('prestasi.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus"></i> Tambah Data
                        </a>
                    </div>
                </div>
            </section>
            

            <section class="kebiasaan-admin" id="kebiasaan-admin">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Kebiasaan</h2>
                    <p class="text-muted">Berikut adalah daftar Kebiasaan terkini yang tersedia.</p>
                    <div class="underline mx-auto"></div>
                </div>
            
                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-header bg-dark text-light text-center rounded-top-4 p-3">
                        <h5 class="mb-0">Data Kebiasaan <span class="text-warning">RPL</span></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded-3 shadow-sm">
                            <table class="table table-hover align-middle text-center">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Judul Kebiasaan</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($kebiasaan as $key => $biasa)
                                    <tr class="bg-light">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $biasa->judul }}</td>
                                        <td>{{ $biasa->deskripsi }}</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal3{{ $biasa->id }}">
                                                <img src="{{ asset('storage/' . $biasa->gambar) }}" class="img-thumbnail" style="width: 80px; height: 60px;">
                                            </a>
                                            <div class="modal fade" id="imageModal3{{ $biasa->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $biasa->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="imageModalLabel{{ $biasa->id }}">Foto Kebiasaan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <img src="{{ asset('storage/' . $biasa->gambar) }}"  class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('kebiasaan.edit', $biasa->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('kebiasaan.destroy', $biasa->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $biasa->id }})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada data kebiasaan tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center rounded-bottom-4">
                        <a href="{{ route('kebiasaan.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus"></i> Tambah Data
                        </a>
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