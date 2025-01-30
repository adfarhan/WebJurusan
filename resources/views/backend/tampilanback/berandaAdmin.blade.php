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

                <div class="card" style="border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); background:#fff; border: 3px solid #5f5f58; ">
                    <div>
                        <div class="card-header text-center p-3 border-0" style="border-radius: 12px;">
                            <p class="text-dark fw-bold">Data-Data Berita  <span style="color: #fde616; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">RPL</span></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="border-radius: 12px; border: 5px solid #939090; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">
                            <table class="table table-bordered table-hover table-sm" style="margin: 0;">
                                <!-- Header -->
                                <thead style="background: #5f5f58 ; color: #fff; font-weight: bold;">
                                    <tr style="border-bottom: 2px solid #5f5f58; text-align:center;">
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">No</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Judul</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Deskripsi</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Tanggal</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Gambar</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Body -->
                                @if ($berita->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="text-center" style="padding: 12px; color: #5f5f58; font-size: 13px;">Belum ada data berita tersedia.</td>
                                        </tr>
                                    </tbody>
                                @else
                                @foreach ($berita as $beritas)
                                    <tbody style="background-color: #fff; color: #000;">
                                        <tr style="transition: all 0.3s ease; border-bottom: 1px solid #2f2e2e;">
                                            <td style="padding: 12px; ">{{ $loop->iteration }}.</td>
                                            <td style="padding: 12px; font-size: 13px;">{{ $beritas->title }}</td>
                                            <td style="padding: 12px; font-size: 12px; text-align:justify;">{{ $beritas->content }}</td>
                                            <td style="padding: 12px; font-size: 12px;">{{ $beritas->publish_date }}</td>
                                            <td style="padding: 12px;">
                                                <div style="width: 100px; height: 75px; overflow: hidden; border-radius: 8px; display: flex; align-items: center; justify-content: center; background: #f9f9f9; border: 1px solid #ccc;">
                                                <!-- Menampilkan Gambar -->
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal{{ $beritas->id }}">
                                                        <img src="{{ asset('storage/' . $beritas->image) }}" alt="Image" style="width: 100px; height: auto;">
                                                    </a>
                                                </div>
                                            </td>
                                            
                                            <!-- Modal untuk menampilkan gambar besar -->
                                            <div class="modal fade" id="imageModal{{ $beritas->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $beritas->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="imageModalLabel{{ $beritas->id }}">Gambar Berita</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ asset('storage/' . $beritas->image) }}" alt="Image" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            

                                            <td style="padding: 12px;">
                                                <div class="d-flex">
                                                    <!-- Lihat Button with Icon -->
                                                    <a href="{{ route('berita.show', $beritas) }}" class="btn btn-success btn-sm" style="border: 3px solid #939090; border-radius: 10px; margin-right: 8px;">
                                                        <i class="fas fa-eye"></i> <!-- Eye icon for "Lihat" -->
                                                    </a>
                                                    
                                                    <!-- Edit Button with Icon -->
                                                    <a href="{{ route('berita.edit', $beritas) }}" class="btn btn-warning btn-sm" style="border: 3px solid #939090; border-radius: 10px; color:#fff; margin-right: 8px;">
                                                        <i class="fas fa-edit"></i> <!-- Edit icon for "Edit" -->
                                                    </a>
                                                    
                                                    <!-- Delete Button with Icon -->
                                                    <form action="{{ route('berita.destroy', $beritas) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" style="border: 3px solid #939090; border-radius: 10px;">
                                                            <i class="fas fa-trash"></i> <!-- Trash icon for "Hapus" -->
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
                                        <td colspan="6" style="padding: 12px; font-weight: bold; font-size: 12px;">Data Data Berita <span style="color: #fde616;">RPL</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer border-0" style="border-radius: 12px; background:#fff;">
                        <div class="d-flex justify-content-between align-items-center">

                            <a href="{{ route('berita.create') }}" class="btn btn-primary btn-sm fw-bold" style="border-radius: 10px; border: 2px solid #5f5f58;"><i class="bi bi-plus"></i>
                                Tambah Data</a>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <div class="pagination-container">
                                {{ $berita->links('pagination::bootstrap-4') }}
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
            </section>

            
            
            <section class="alumni-admin" id="alumni-admin">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Alumni</h2>
                    <p class="text-muted">Berikut adalah daftar berita terkini yang tersedia.</p>
                    <div class="underline mx-auto"></div>
                </div>

                <div class="card" style="border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); background:#fff; border: 3px solid #5f5f58; ">
                    <div>
                        <div class="card-header text-center p-3 border-0" style="border-radius: 12px;">
                            <p class="text-dark fw-bold">Data-Data Alumni  <span style="color: #fde616; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">RPL</span></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="border-radius: 12px; border: 5px solid #939090; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">
                            <table class="table table-bordered table-hover table-sm" style="margin: 0; color:">
                                <!-- Header -->
                                <thead style="background: #5f5f58 ; color: #000; font-weight: bold; text-align:center;">
                                    <tr style="border-bottom: 2px solid #5f5f58;">
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">No</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Nama</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Angkatan</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Data Testimoni</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Poto Alumni</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Body -->
                                @if ($testimonis->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="text-center" style="font-size: 13px; padding: 12px; color: #5f5f58;">Belum ada data Alumni tersedia.</td>
                                        </tr>
                                    </tbody>
                                @else
                                @foreach($testimonis as $key => $testi)
                                    <tbody style="background-color: #fff; color: #000;">
                                        <tr style="transition: all 0.3s ease; border-bottom: 1px solid #2f2e2e;">
                                            <td style="padding: 12px; ">{{ $testimonis->firstItem() + $key }}.</td>
                                            <td style="padding: 12px; font-size: 13px;">{{ $testi->nama }}</td>
                                            <td style="padding: 12px; font-size: 12px;">{{ $testi->angkatan }}</td>
                                            <td style="padding: 12px; font-size: 12px; text-align: justify;">{{ $testi->testimoni_alumni }}</td>
                                            <td style="padding: 12px;">
                                                <img src="{{ asset('storage/' . $testi->image_alumni) }}" 
                                                        alt="{{ $testi->nama }}" 
                                                        width="100" 
                                                        height="100" 
                                                        style="border-radius: 50%; object-fit: cover;">
                                            </td>
                                            

                                            <td style="padding: 12px;">
                                                <div class="d-flex gap-2">
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('testimoni.edit', $testi->id) }}" class="btn btn-warning btn-sm" style="border: 3px solid #939090; border-radius: 10px; color:#fff;"><i class="fas fa-edit"></i></a>
                                                    
                                                    <!-- Tombol Delete -->
                                                    <form action="{{ route('testimoni.destroy', $testi->id) }}" method="POST" style="margin: 0;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border: 3px solid #939090; border-radius: 10px;"><i class="fas fa-trash"></i></button>
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
                                        <td colspan="6" style="padding: 12px; font-weight: bold; font-size: 12px;">Data Data Alumni <span style="color: #fde616;">RPL</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer border-0" style="border-radius: 12px; background:#fff;">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Tambah Data Button -->
                            <a href="{{ route('testimoni.create') }}" class="btn btn-primary btn-sm fw-bold" style="border-radius: 10px; border: 2px solid #5f5f58;">
                                <i class="bi bi-plus"></i> Tambah Data
                            </a>
                            
                        </div>
                            <!-- Pagination -->
                            <div class="d-flex justify-content-center mt-4">
                                <div class="pagination-container">
                                    {{ $testimonis->links('pagination::bootstrap-4') }}
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
            </section>


            
        </div>
    </div>
</x-layBack>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBxNwEX8pP6Gp9pO4cBvJcmKjc8dJg6R8KDgm9t0h7Ztq03A" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-KyZXEJCRGeIoa2kwxP6L04Ry8hw63T7ObIiC6tP9O3s09/vD2n5tX2h0U8yDJw73" crossorigin="anonymous"></script>