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
            <section class="mata-admin" id="mata-admin">
                <div class="container text-center py-4">
                    <h2 class="fw-bold">Data Mata Pelajaran</h2>
                    <p class="text-muted">Berikut adalah daftar Mata Pelajaran terkini yang dipelajari di jurusan RPL.</p>
                    <div class="underline mx-auto"></div>
                </div>
                
                <div class="card shadow-lg rounded-3 border-secondary">
                    <div class="card-header text-center bg-dark text-light rounded-top">
                        <h5 class="fw-bold mb-0">Data Mata Pelajaran <span class="text-warning">RPL</span></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-rounded shadow-sm">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="bg-secondary text-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Mapel</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($mapel as $key => $pelajaran)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pelajaran->nama_mapel }}</td>
                                        <td>{{ $pelajaran->deskripsi }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('matapelajaran.edit', $pelajaran->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('matapelajaran.destroy', $pelajaran->id) }}" method="POST" class="d-inline">
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
                        <a href="{{ route('matapelajaran.create') }}" class="btn btn-primary btn-sm">
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
