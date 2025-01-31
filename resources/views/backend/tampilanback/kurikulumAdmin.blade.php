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
            <section class="projek-admin" id="projek-admin">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Mata Pelajaran</h2>
                    <p class="text-muted">Berikut adalah daftar Mata Pelajaran terkini yang dipelajari di jurusan RPL.</p>
                    <div class="underline mx-auto"></div>
                </div>

                <div class="card" style="border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); background:#fff; border: 3px solid #5f5f58; ">
                    <div>
                        <div class="card-header text-center p-3 border-0" style="border-radius: 12px;">
                            <p class="text-dark fw-bold">Data-Data Mata Pelajaran  <span style="color: #fde616; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">RPL</span></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="border-radius: 12px; border: 5px solid #939090; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">
                            <table class="table table-bordered table-hover table-sm" style="margin: 0; color:">
                                <!-- Header -->
                                <thead style="background: #5f5f58 ; color: #000; font-weight: bold;">
                                    <tr style="border-bottom: 2px solid #5f5f58;">
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">No</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Nama Mapel</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Deskripsi</th>
                                        <th style="padding: 14px; text-transform: uppercase; font-size: 14px;">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Body -->
                                @if ($mapel->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="text-center" style="font-size: 13px; padding: 12px; color: #5f5f58;">Belum ada data Projek tersedia.</td>
                                        </tr>
                                    </tbody>
                                @else
                                @foreach($mapel as $pelajaran)
                                    <tbody style="background-color: #fff; color: #000;">
                                        <tr style="transition: all 0.3s ease; border-bottom: 1px solid #2f2e2e;">
                                            <td style="padding: 12px;">{{ $loop->iteration }}.</td>
                                            <td style="padding: 12px; font-size: 13px;">{{ $pelajaran->nama_mapel }}</td>
                                            <td style="padding: 12px; font-size: 12px;">{{ $pelajaran->deskripsi }}</td>
                                            <td style="padding: 12px;">
                                                <div class="d-flex gap-2">
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('matapelajaran.edit', $pelajaran->id) }}" class="btn btn-warning btn-sm" style="border: 3px solid #939090; border-radius: 10px; color:#fff"><i class="fas fa-edit"></i></a>
                                                    
                                                    <!-- Tombol Delete -->
                                                    <form id="delete-form-{{ $pelajaran->id }}" action="{{ route('matapelajaran.destroy', $pelajaran->id) }}" method="POST" style="margin: 0;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm" style="border: 3px solid #939090; border-radius: 10px;" onclick="confirmDelete({{ $pelajaran->id }})">
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
                                        <td colspan="6" style="padding: 12px; font-weight: bold; font-size: 12px;">Data Data Mata Pelajaran <span style="color: #fde616;">RPL</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer border-0" style="border-radius: 12px; background:#fff;">
                        <a href="{{ route('matapelajaran.create') }}" class="btn btn-primary btn-sm fw-bold" style="border-radius: 10px; border: 2px solid #5f5f58;"><i class="bi bi-plus"></i>
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
