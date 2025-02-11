<x-layBack>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="content main" id="main">
        <div class="pagetitle">
            <h1 style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);"><span style="color:#fde616;">R</span>ekayasa <span style="color:#fde616;">P</span>erangkat <span style="color:#fde616;">L</span>unak</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Tampilan</li>
                    <li class="breadcrumb-item"><a href="{{ route('tentangAdmin') }}">Tentang</a></li>
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
            
            <section class="staf-pengajar" id="staf-pengajar">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Staf Pengajar</h2>
                    <p class="text-muted">Berikut adalah daftar staf pengajar terkini yang tersedia.</p>
                    <div class="underline mx-auto"></div>
                </div>
            
                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-header bg-dark text-light text-center rounded-top-4 p-3">
                        <h5 class="mb-0">Data Staf Pengajar <span class="text-warning">RPL</span></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rounded-3 shadow-sm">
                            <table class="table table-hover align-middle text-center">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Bidang</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pengajars as $key => $guru)
                                    <tr class="bg-light">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $guru->nama }}</td>
                                        <td>{{ $guru->jabatan }}</td>
                                        <td>{{ $guru->bidang }}</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal1{{ $guru->id }}">
                                                <img src="{{ asset('storage/' . $guru->foto) }}" class="img-thumbnail" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
                                            </a>
                                            <div class="modal fade" id="imageModal1{{ $guru->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $guru->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="imageModalLabel{{ $guru->id }}">Foto Staf</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <img src="{{ asset('storage/' . $guru->foto) }}"  class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td style="padding: 12px;">
                                                <div class="d-flex gap-2">
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('pengajars.edit', $guru->id) }}" class="btn btn-warning btn-sm" style="border: 3px solid #939090; border-radius: 10px; color:#fff"><i class="fas fa-edit"></i></a>
                                                    
                                                    <!-- Tombol Delete -->
                                                    <form action="{{ route('pengajars.destroy', $guru->id) }}" method="POST" class="delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm delete-btn" style="border: 3px solid #939090; border-radius: 10px;">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    
                                @endforeach
                                @endif
                                
                                <!-- Footer -->
                                <tfoot class="text-center" style="background: #5f5f58; color: #fff;">
                                    <tr>
                                        <td colspan="6" style="padding: 12px; font-weight: bold; font-size: 12px;">Data Data Staf Pengajar <span style="color: #fde616;">RPL</span></td>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('pengajars.edit', $guru->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('pengajars.destroy', $guru->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $guru->id }})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada data staf pengajar tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center rounded-bottom-4">
                        <a href="{{ route('pengajars.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus"></i> Tambah Data
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const deleteButtons = document.querySelectorAll(".delete-btn");

        deleteButtons.forEach((button) => {
            button.addEventListener("click", function () {
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest("form").submit();
                    }
                });
            });
        });
    });
</script>
</x-layBack>