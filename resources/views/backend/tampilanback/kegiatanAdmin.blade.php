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

                <div class="card" style="border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); background:#fff; border: 3px solid #5f5f58; ">
                    <div>
                        <div class="card-header text-center p-3 border-0" style="border-radius: 12px;">
                            <p class="text-dark fw-bold">Data-Data Projek  <span style="color: #fde616; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">RPL</span></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="border-radius: 12px; border: 5px solid #939090; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">
                            <table class="table table-bordered table-hover table-sm" style="margin: 0; color:">
                                <!-- Header -->
                                <thead style="background: #5f5f58 ; color: #000; font-weight: bold;">
                                    <tr style="border-bottom: 2px solid #5f5f58; text-align: center;">
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">No</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Judul Projek</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Deskripsi</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Poto</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Body -->
                                @if ($projek->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="text-center" style="font-size: 13px; padding: 12px; color: #5f5f58;">Belum ada data Projek tersedia.</td>
                                        </tr>
                                    </tbody>
                                @else
                                @foreach($projek as $tugas)
                                    <tbody style="background-color: #fff; color: #000;">
                                        <tr style="transition: all 0.3s ease; border-bottom: 1px solid #2f2e2e;">
                                            <td style="padding: 12px;">{{ $loop->iteration }}.</td>
                                            <td style="padding: 12px; font-size: 13px;">{{ $tugas->judul_projek }}</td>
                                            <td style="padding: 12px; font-size: 12px;">{{ $tugas->deskripsi }}</td>
                                            <td style="padding: 12px;">
                                                <div style="width: 100px; height: 75px; overflow: hidden; border-radius: 8px; display: flex; align-items: center; justify-content: center; background: #f9f9f9; border: 1px solid #ccc;">
                                                    <img src="{{ asset('storage/' . $tugas->gambar) }}" 
                                                            alt="{{ $tugas->nama_siswa }}" 
                                                            style="max-width: 100%; max-height: 100%; object-fit: cover;">
                                                </div>
                                            </td>
                                            <td style="padding: 12px;">
                                                <div class="d-flex gap-2">
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('projek.edit', $tugas->id) }}" class="btn btn-warning btn-sm" style="border: 3px solid #939090; border-radius: 10px; color:#fff"><i class="fas fa-edit"></i></a>
                                                    
                                                    <!-- Tombol Delete -->
                                                    <form id="delete-form-{{ $tugas->id }}" action="{{ route('projek.destroy', $tugas->id) }}" method="POST" style="margin: 0;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm" style="border: 3px solid #939090; border-radius: 10px;" onclick="confirmDelete({{ $tugas->id }})">
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
                                        <td colspan="6" style="padding: 12px; font-weight: bold; font-size: 12px;">Data Data Projek Siswa <span style="color: #fde616;">RPL</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer border-0" style="border-radius: 12px; background:#fff;">
                        <a href="{{ route('projek.create') }}" class="btn btn-primary btn-sm fw-bold" style="border-radius: 10px; border: 2px solid #5f5f58;"><i class="bi bi-plus"></i>
                            Tambah Data</a>
                    </div>
                </div>
            </section>

            <section class="prestasi-admin" id="prestasi-admin">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Prestasi</h2>
                    <p class="text-muted">Berikut adalah daftar Prestasi terkini yang tersedia.</p>
                    <div class="underline mx-auto"></div>
                </div>

                <div class="card" style="border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); background:#fff; border: 3px solid #5f5f58; ">
                    <div>
                        <div class="card-header text-center p-3 border-0" style="border-radius: 12px;">
                            <p class="text-dark fw-bold">Data-Data Prestasi  <span style="color: #fde616; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">RPL</span></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="border-radius: 12px; border: 5px solid #939090; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">
                            <table class="table table-bordered table-hover table-sm" style="margin: 0; color:">
                                <!-- Header -->
                                <thead style="background: #5f5f58 ; color: #000; font-weight: bold;">
                                    <tr style="border-bottom: 2px solid #5f5f58; text-align: center;">
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">No</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Nama</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Kelas</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Poto Siswa</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Tanggal</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Deskripsi</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Body -->
                                @if ($prestasis->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="text-center" style="font-size: 13px; padding: 12px; color: #5f5f58;">Belum ada data Prestasi tersedia.</td>
                                        </tr>
                                    </tbody>
                                @else
                                @foreach($prestasis as $pres)
                                    <tbody style="background-color: #fff; color: #000;">
                                        <tr style="transition: all 0.3s ease; border-bottom: 1px solid #2f2e2e;">
                                            <td style="padding: 12px;">{{ $loop->iteration }}.</td>
                                            <td style="padding: 12px; font-size: 13px;">{{ $pres->nama_siswa }}</td>
                                            <td style="padding: 12px; font-size: 12px;">{{ $pres->kelas }}</td>
                                            <td style="padding: 12px;">
                                                <div style="width: 100px; height: 75px; overflow: hidden; border-radius: 8px; display: flex; align-items: center; justify-content: center; background: #f9f9f9; border: 1px solid #ccc;">
                                                    <img src="{{ asset('storage/' . $pres->gambar) }}" 
                                                            alt="{{ $pres->nama_siswa }}" 
                                                            style="max-width: 100%; max-height: 100%; object-fit: cover;">
                                                </div>
                                            </td>
                                            <td style="padding: 12px; font-size: 12px;">{{ $pres->tanggal }}</td>
                                            <td style="padding: 12px; font-size: 12px;">{{ $pres->deskripsi }}</td>
                                            <td style="padding: 12px;">
                                                <div class="d-flex gap-2">
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('prestasi.edit', $pres->id) }}" class="btn btn-warning btn-sm"  style="border: 3px solid #939090; border-radius: 10px; color:#fff"><i class="fas fa-edit"></i></a>
                                                    
                                                    <!-- Tombol Delete -->
                                                    <form id="delete-form-{{ $pres->id }}" action="{{ route('prestasi.destroy', $pres->id) }}" method="POST" style="margin: 0;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm" style="border: 3px solid #939090; border-radius: 10px;" onclick="confirmDelete({{ $pres->id }})">
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
                                        <td colspan="6" style="padding: 12px; font-weight: bold; font-size: 12px;">Data Data Prestasi Siswa <span style="color: #fde616;">RPL</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer border-0" style="border-radius: 12px; background:#fff;">
                        <a href="{{ route('prestasi.create') }}" class="btn btn-primary btn-sm fw-bold" style="border-radius: 10px; border: 2px solid #5f5f58;"><i class="bi bi-plus"></i>
                            Tambah Data</a>
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