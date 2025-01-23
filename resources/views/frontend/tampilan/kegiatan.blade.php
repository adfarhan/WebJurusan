<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="kegiatan-extra">
        <div class="container">
            <h1 class="title">Ekstrakurikuler</h1>
            <p class="subtitle">Berikut adalah beberapa ekstrakurikuler yang relevan dengan jurusan RPL:</p>
    
            <div class="card-container">
                <div class="card">
                    <div class="card-content">
                        <div class="card-text">
                            <h2>Ekstrakurikuler IT</h2>
                            <p style="text-align: justify;">
                                Tingkatkan keahlian Anda dalam teknologi informasi melalui kegiatan yang melibatkan coding, desain web, dan pemrograman.
                            </p>
                        </div>
                        <div class="card-image">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="Ekstrakurikuler IT Logo">
                        </div>
                    </div>
                </div>
    
                <div class="card">
                    <div class="card-content">
                        <div class="card-text">
                            <h2>English Club</h2>
                            <p style="text-align: justify;">
                                Perluas kemampuan bahasa Inggris Anda dengan aktivitas seru seperti debat, presentasi, dan diskusi dalam suasana yang mendukung.
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

                <!-- Item 1 -->
                @foreach($projek as $tugas)
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center">
                        <div class="card p-3" style="width: 28rem; transition: none; transform:none;">
                            <img src="{{ asset('storage/' . $tugas->gambar) }}" alt="{{ $tugas->nama_siswa }}"  class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tugas->judul_projek }}</h5>
                                <p class="card-text">
                                    {{ $tugas->deskripsi }}.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Item 2 -->
                
            </div>
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    

    <!-- Prestasi Section -->
    <section class="prestasi-siswa mt-5" id="prestasi" style="margin-bottom: 80px; ">
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
                <div class="card-image">
                    <img src="{{ asset('storage/' . $pres->gambar) }}" 
                                                            alt="{{ $pres->nama_siswa }}">
                </div>
                <div class="card-body">
                    <p class="prestasi-date">Tanggal: {{ $pres->tanggal }}</p>
                    <p class="prestasi-desc">{{ $pres->deskripsi }}.</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div class="pagination-container">
                {{ $prestasis->links('pagination::bootstrap-4') }}

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
            <div class="gallery-item" onclick="openModal(this)">
                <img src="assets/img/gedungrpl.jpg" alt="Kegiatan 1">
                <div class="gallery-caption">
                    <h3>Bersama dalam kebersamaan</h3>
                    <p>Momen spesial ketika belajar dan beraktivitas bersama.</p>
                </div>
            </div>
            <div class="gallery-item" onclick="openModal(this)">
                <img src="assets/img/gedungrpl.jpg" alt="Kegiatan 2">
                <div class="gallery-caption">
                    <h3>Semangat Pagi</h3>
                    <p>Awali hari dengan semangat dan energi positif.</p>
                </div>
            </div>
            <div class="gallery-item" onclick="openModal(this)">
                <img src="assets/img/gedungrpl.jpg" alt="Kegiatan 3">
                <div class="gallery-caption">
                    <h3>Kreativitas Tanpa Batas</h3>
                    <p>Berinovasi dan berkreasi dengan berbagai karya hebat.</p>
                </div>
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