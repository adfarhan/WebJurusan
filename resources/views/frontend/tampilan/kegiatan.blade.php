<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="kegiatan-extra">
        <div class="container">
            <h1 class="title">Ekstrakurikuler</h1>
            <p class="subtitle">Berikut adalah beberapa ekstrakurikuler yang relevan dengan jurusan RPL:</p>
    
            <div class="card-container">
                <!-- <div class="card">
                    <div class="card-content">
                        <div class="card-text">
                            <h2>Ekstrakurikuler IT</h2>
                            <p>
                                Tingkatkan keahlian Anda dalam teknologi informasi melalui kegiatan yang melibatkan coding, desain web, dan pemrograman.
                            </p>
                        </div>
                        <div class="card-image">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="Ekstrakurikuler IT Logo">
                        </div>
                    </div>
                </div> -->
    
                <div class="card">
                    <div class="card-content">
                        <div class="card-text">
                            <h2>English Club</h2>
                            <p>
                                Perluas kemampuan bahasa Inggris Anda dengan aktivitas seru seperti debat, presentasi, dan diskusi dalam suasana mendukung.
                            </p>
                        </div>
                        <div class="card-image">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="English Club Logo">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-text">
                            <h2>Extrakulikuler IT</h2>
                            <p style="text-align: justify;">
                                Tingkatkan keahlian Anda dalam teknologi informasi melalui kegiatan yang melibatkan coding, desain web, dan pemrograman.
                            </p>
                        </div>
                        <div class="card-image">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="English Club Logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    


    <!-- Proyek Siswa Section -->
    <section class="proyek-siswa">
        <div class="title-proyek">Karya Proyek Siswa RPL</div>
        <p class="teks-proyek mb-5">Berikut adalah hasil karya website dari siswa dan siswi jurusan RPL yang kreatif dan inovatif:</p>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($projek as $tugas)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="d-flex justify-content-center">
                            <div class="card p-3" style="width: 28rem; transition: none; transform:none;">
                                <img src="{{ asset('storage/' . $tugas->gambar) }}" alt="{{ $tugas->judul_projek }}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $tugas->judul_projek }}</h5>
                                    <p class="card-text">{{ $tugas->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
<!-- 
            @if(count($projek) > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif -->
        </div>
    </section>


    

    <!-- Prestasi Section -->
    <section class="prestasi-siswa mt-5" id="prestasi">
        <div class="title-prestasi">Prestasi</div>
        <p class="text-muted text-center mb-5">
            Beragam pencapaian membanggakan yang diraih oleh siswa kami di berbagai bidang.
        </p>
        <div class="card-container container mb-5">
            @foreach($prestasis as $pres)
            <div class="card-prestasi">
                <div class="card-header">
                    <h5 class="student-name">{{ $pres->nama_siswa }}</h5>
                    <span class="class-info">Kelas: {{ $pres->kelas }}</span>
                </div>
                <div class="card-photo">
                    <img src="{{ asset('storage/' . $pres->gambar) }}" alt="{{ $pres->nama_siswa }}">
                </div>
                <div class="card-body">
                    <p class="prestasi-date">Tanggal: {{ $pres->tanggal }}</p>
                    <p class="prestasi-desc">{{ $pres->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex flex-column align-items-center mt-4">
            <div class="pagination-info mb-2">
                Menampilkan {{ $prestasis->firstItem() }} sampai {{ $prestasis->lastItem() }} dari {{ $prestasis->total() }} hasil
            </div>
            <div class="pagination-container">
                {{ $prestasis->appends(['berita_page' => request('prestasi_page')])->fragment('prestasi')->links('pagination::bootstrap-4') }}
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
        
            <script>
            document.addEventListener("DOMContentLoaded", function() {
                if (window.location.hash === '#prestasi') {
                    const target = document.getElementById('prestasi');
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            });
        </script>
    </section>

    <section class="kegiatan-container">
        <h2 class="title-kegiatan">Kebiasaan Posistif</h2>
        <p class="section-deskripsi">Berbagai momen luar biasa yang menunjukkan kebersamaan dan kreativitas siswa RPL.</p>
        <div class="gallery">
            @foreach($kebiasaan as $biasa)
            <div class="gallery-item" onclick="openModal(this)">
                <img src="{{ asset('storage/' . $biasa->gambar) }}" alt="{{ $biasa->judul }}">
                <div class="gallery-caption">
                    <h3>{{ $biasa->judul }}</h3>
                    <p style="font-size: 12px;">{{ $biasa->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
            <!-- Tambahkan lebih banyak elemen gallery-item -->
        </div>
    </section>
    
    <!-- Modal -->
    <div id="gallery-modal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img id="modal-img" class="modal-content">
        <div id="modal-caption" class="modal-caption"></div>
    </div>
    

</x-layout>
<script>
    var carouselElement = document.querySelector('#carouselExample');
    var carousel = new bootstrap.Carousel(carouselElement, {
        interval: 2000, // Waktu antara peralihan slide
        ride: 'carousel'
    });
</script>
<!-- JS Bootstrap (pastikan di bawah jQuery dan Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>