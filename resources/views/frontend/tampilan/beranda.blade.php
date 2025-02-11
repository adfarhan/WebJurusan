<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
        @endif

        <section class="awalan-beranda mb-5">
            <div>
                <div class="image-container">
                    <img src="assets/img/gedungrpl.jpg" alt="Deskripsi Gambar" class="img-fluid w-100">
                    <div class="overlay"></div>
                </div>
        
                <div class="teks-beranda text-center  text-white position-absolute top-50 start-50 translate-middle">
                    <h1 class="display-3 fw-bold animate__animated animate__fadeIn">
                        Selamat datang di Jurusan <span style="color: #fde616; font-style: italic;">RPL</span>!
                    </h1>
                    <p class="lead animate__animated animate__fadeIn animate__delay-1s">
                        Mari bergabung untuk mengembangkan teknologi dan kreativitas di bidang Rekayasa Perangkat Lunak!
                    </p>
                    <a href="#tentang-rpl" class="btn btn-light btn-lg mt-3 animate__animated animate__fadeIn animate__delay-2s">
                        Apa si Jurusan RPL itu?
                    </a>
                </div>
            </div>
        </section>
    
    
        

        <section id="tentang-rpl">
            <!-- Card untuk Tentang RPL -->
            <div class="container mb-5">
                <div class="card shadow-lg border-0 mb-3 p-5" style="border-radius: 16px;">
                    <div class="row g-0 align-items-center">
                        <!-- Gambar Kiri -->
                        <div class="col-md-6 d-flex justify-content-center">
                            <img src="assets/img/gambar1.jpg" alt="Gambar RPL" class="img-fluid gambar animated-element" style="width: 76%; height: auto;">
                        </div>
            
                        <!-- Penjelasan RPL di Dalam Card -->
                        <div class="col-md-6">
                            <div class="card-body teks animated-element">
                                <div class="text-content">
                                    <h1 class="gradient-text mb-3 animated-element">
                                        <i class="bi bi-code-slash"></i> Rekayasa Perangkat Lunak
                                    </h1>
                                    <p>
                                        Rekayasa Perangkat Lunak (RPL) adalah disiplin ilmu yang berfokus pada pengembangan perangkat lunak berkualitas tinggi. Metode dan prosesnya dirancang untuk memastikan perangkat lunak yang efisien dan memenuhi kebutuhan pengguna.
                                    </p>
                                    <p>
                                        Dalam RPL, pemahaman siklus hidup perangkat lunak sangat penting. Siklus ini mencakup analisis kebutuhan, desain, pengkodean, pengujian, hingga pemeliharaan perangkat lunak.
                                    </p>
                                    <a href="{{ route('tentang') }}" class="btn-rpl mt-3">
                                        <i class="bi bi-lightbulb"></i> Pelajari Lebih Lanjut
                                    </a>                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        
        <section class="visi-misi py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Visi Section -->
                    <div class="col-lg-6 mb-4">
                        <div class="card visi-card">
                            <div class="card-body">
                                <h2 class="section-title">Visi</h2>
                                <p class="teks-visi">
                                    Menjadi program studi yang unggul dalam bidang Rekayasa Perangkat Lunak, berdaya saing tinggi, serta mampu memberikan kontribusi dalam dunia industri dan masyarakat.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Misi Section -->
                    <div class="col-lg-6">
                        <div class="card misi-card">
                            <div class="card-body">
                                <h2 class="section-title">Misi</h2>
                                <ul class="misi-list">
                                    <li>Memproduksi lulusan yang siap berkompetisi di dunia industri.</li>
                                    <li>Mendalami teknologi terbaru dalam pengembangan perangkat lunak.</li>
                                    <li>Berinovasi untuk memberikan solusi berbasis teknologi kepada masyarakat.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        
        

                

        <section class="keunggulan-jurusan py-5">
            <!-- Judul Section -->
            <div class="text-center mb-5">
                <h2 class="fw-bold">Keunggulan Jurusan RPL</h2>
                <p class="text-muted">Berikut adalah keunggulan yang membuat jurusan Rekayasa Perangkat Lunak unggul dan diminati.</p>
            </div>
        
            <!-- Grid Keunggulan -->
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Keunggulan 1 -->
                    <div class="col animated-element">
                        <div class="card h-100 text-center shadow-lg">
                            <div class="card-body">
                                <div class="icon mb-3">
                                    <i class="fas fa-laptop-code fa-3x text-primary"></i>
                                </div>
                                <h5 class="card-title fw-bold">Teknologi Terbaru</h5>
                                <p class="card-text">
                                    Pembelajaran menggunakan teknologi terkini untuk memastikan siswa selalu up-to-date dengan tren industri.
                                </p>
                            </div>
                        </div>
                    </div>
        
                    <!-- Keunggulan 2 -->
                    <div class="col animated-element">
                        <div class="card h-100 text-center shadow-lg">
                            <div class="card-body">
                                <div class="icon mb-3">
                                    <i class="fas fa-tools fa-3x text-warning"></i>
                                </div>
                                <h5 class="card-title fw-bold">Fasilitas Lengkap</h5>
                                <p class="card-text">
                                    Laboratorium komputer modern dengan perangkat dan software terbaru mendukung pembelajaran praktis.
                                </p>
                            </div>
                        </div>
                    </div>
        
                    <!-- Keunggulan 3 -->
                    <div class="col animated-element">
                        <div class="card h-100 text-center shadow-lg">
                            <div class="card-body">
                                <div class="icon mb-3">
                                    <i class="fas fa-handshake fa-3x text-success"></i>
                                </div>
                                <h5 class="card-title fw-bold">Kerjasama Industri</h5>
                                <p class="card-text">
                                    Kemitraan dengan perusahaan besar untuk program magang dan peluang kerja setelah lulus.
                                </p>
                            </div>
                        </div>
                    </div>
        
                    <!-- Keunggulan 4 -->
                    <div class="col animated-element">
                        <div class="card h-100 text-center shadow-lg">
                            <div class="card-body">
                                <div class="icon mb-3">
                                    <i class="fas fa-lightbulb fa-3x text-info"></i>
                                </div>
                                <h5 class="card-title fw-bold">Inovasi dan Kreativitas</h5>
                                <p class="card-text">
                                    Mendorong siswa untuk mengembangkan ide-ide kreatif dalam membangun aplikasi yang inovatif.
                                </p>
                            </div>
                        </div>
                    </div>
        
                    <!-- Keunggulan 5 -->
                    <div class="col animated-element">
                        <div class="card h-100 text-center shadow-lg">
                            <div class="card-body">
                                <div class="icon mb-3">
                                    <i class="fas fa-trophy fa-3x text-danger"></i>
                                </div>
                                <h5 class="card-title fw-bold">Kompetisi Nasional</h5>
                                <p class="card-text">
                                    Kesempatan mengikuti kompetisi tingkat nasional untuk mengasah kemampuan dan pengalaman siswa.
                                </p>
                            </div>
                        </div>
                    </div>
        
                    <!-- Keunggulan 6 -->
                    <div class="col animated-element">
                        <div class="card h-100 text-center shadow-lg">
                            <div class="card-body">
                                <div class="icon mb-3">
                                    <i class="fas fa-briefcase fa-3x text-dark"></i>
                                </div>
                                <h5 class="card-title fw-bold">Lulusan Siap Kerja</h5>
                                <p class="card-text">
                                    Mempersiapkan siswa untuk menjadi lulusan yang siap kerja dengan kemampuan teknis dan soft skill.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        


        {{-- <section class="perusahaan-kerjasama py-5">
            <div class="container">
                <!-- Judul Section -->
                <div class="mb-5">
                    <h2 class="fw-bold fs-3 text-center">Rekan Perusahaan Jurusan <span style="color: #fde616; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">RPL</span></h2>
                    <p class="text-muted text-start">
                        Kami bangga dapat menjalin kerja sama dengan berbagai perusahaan ternama untuk memberikan peluang terbaik bagi siswa jurusan Rekayasa Perangkat Lunak (RPL) kami.
                    </p>
                </div>
            </div>
                
            <!-- Logo Perusahaan -->
            <div class="container">
                <div class="row row-cols-2 row-cols-md-4 g-4">
                    <!-- Logo Perusahaan 1 -->
                    <div class="col text-center">
                        <img src="assets/img/logo.png" alt="Logo Perusahaan 1" class="img-fluid company-logo">
                    </div>
                    <!-- Logo Perusahaan 2 -->
                    <div class="col text-center">
                        <img src="assets/img/logo.png" alt="Logo Perusahaan 2" class="img-fluid company-logo">
                    </div>
                    <!-- Logo Perusahaan 3 -->
                    <div class="col text-center">
                        <img src="assets/img/logo.png" alt="Logo Perusahaan 3" class="img-fluid company-logo">
                    </div>
                    <!-- Logo Perusahaan 4 -->
                    <div class="col text-center">
                        <img src="assets/img/logo.png" alt="Logo Perusahaan 4" class="img-fluid company-logo">
                    </div>
                    <!-- Logo Perusahaan 5 -->
                    <div class="col text-center">
                        <img src="assets/img/logo.png" alt="Logo Perusahaan 5" class="img-fluid company-logo">
                    </div>
                    <!-- Logo Perusahaan 6 -->
                    <div class="col text-center">
                        <img src="assets/img/logo.png" alt="Logo Perusahaan 6" class="img-fluid company-logo">
                    </div>
                </div>
            </div>
        </section> --}}


        <section class="perusahaan-kerjasama py-5">
            <div class="container">
                <!-- Judul Section -->
                <div class="mb-5">
                    <h2 class="fw-bold fs-3 text-center">Rekan Perusahaan Jurusan <span style="color: #fde616; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">RPL</span></h2>
                    <p class="text-muted text-start">
                        Kami bangga dapat menjalin kerja sama dengan berbagai perusahaan ternama untuk memberikan peluang terbaik bagi siswa jurusan Rekayasa Perangkat Lunak (RPL) kami.
                    </p>
                </div>
            </div>

            <!-- Slider Logo Perusahaan -->
            <div class="container">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <!-- Ulangi untuk setiap logo -->
                        <div class="swiper-slide text-center">
                            <div class="logo-container">
                                <img src="assets/img/logo.png" alt="Perusahaan 1" class="img-fluid company-logo">
                                <div class="logo-overlay">Perusahaan 1</div>
                            </div>
                        </div>
                        <div class="swiper-slide text-center">
                            <div class="logo-container">
                                <img src="assets/img/card.jpg" alt="Perusahaan 2" class="img-fluid company-logo">
                                <div class="logo-overlay">Perusahaan 2</div>
                            </div>
                        </div>
                        <div class="swiper-slide text-center">
                            <div class="logo-container">
                                <img src="assets/img/gambar1.jpg" alt="Perusahaan 3" class="img-fluid company-logo">
                                <div class="logo-overlay">Perusahaan 3</div>
                            </div>
                        </div>
                        <div class="swiper-slide text-center">
                            <div class="logo-container">
                                <img src="assets/img/gedungrpl.jpg" alt="Perusahaan 4" class="img-fluid company-logo">
                                <div class="logo-overlay">Perusahaan 4</div>
                            </div>
                        </div>
                        <div class="swiper-slide text-center">
                            <div class="logo-container">
                                <img src="assets/img/logo.png" alt="Perusahaan 5" class="img-fluid company-logo">
                                <div class="logo-overlay">SMKN 1 KAWALI</div>
                            </div>
                        </div>
                        <div class="swiper-slide text-center">
                            <div class="logo-container">
                                <img src="assets/img/logo.png" alt="Perusahaan 6" class="img-fluid company-logo">
                                <div class="logo-overlay">Perusahaan 4</div>
                            </div>
                        </div>
                    </div>
                    <!-- Navigasi Swiper -->
                    {{-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div> --}}
                </div>
            </div>
        </section>

        <!-- Tambahkan Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    768: { slidesPerView: 3 },
                    1024: { slidesPerView: 4 }
                }
            });
        </script>

        
        
        


        <section class="berita py-5" id="berita">
            <div class="container">
                <!-- Judul Section -->
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Berita Terbaru</h2>
                    <p class="text-muted">Berita dan informasi terkini dari jurusan Rekayasa Perangkat Lunak.</p>
                </div>
        
                {{-- <div class="row g-4">
                    @foreach ($berita as $beritas)
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm berita-card">
                                <!-- Menampilkan Gambar -->
                                <img src="{{ asset('storage/' . $beritas->image) }}" class="card-img-top" alt="{{ $beritas->title }}">
                                <div class="card-body">
                                    <!-- Menampilkan Judul -->
                                    <h5 class="card-title">{{ $beritas->title }}</h5>
                                    <!-- Menampilkan Konten (deskripsi) -->
                                    <p class="card-text">{{ Str::limit($beritas->content, 80) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Link Baca Selengkapnya -->
                                        <a href="{{ route('berita.show', $beritas->id) }}" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                                        <!-- Menampilkan Tanggal Publikasi -->
                                        <span class="text-muted small">{{ \Carbon\Carbon::parse($beritas->publish_date)->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                <style>
                    .modal-content {
                        border-radius: 15px;
                        overflow: hidden;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
                    }

                    .modal-body img {
                        border-radius: 10px;
                    }
                </style>

                <div class="row g-4 mt-3">
                    @foreach ($berita as $beritas)
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm berita-card">
                                <!-- Menampilkan Gambar -->
                                <img src="{{ asset('storage/' . $beritas->image) }}" class="card-img-top" alt="{{ $beritas->title }}">
                                <div class="card-body">
                                    <!-- Menampilkan Judul -->
                                    <h5 class="card-title">{{ $beritas->title }}</h5>
                                    <!-- Menampilkan Konten (deskripsi) -->
                                    <p class="card-text">{{ Str::limit($beritas->content, 80) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Tombol untuk membuka Modal -->
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalBerita{{ $beritas->id }}">
                                            Baca Selengkapnya
                                        </button>
                                        <!-- Menampilkan Tanggal Publikasi -->
                                        <span class="text-muted small">{{ \Carbon\Carbon::parse($beritas->publish_date)->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <!-- Modal untuk Baca Selengkapnya -->
                        <div class="modal fade" id="modalBerita{{ $beritas->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $beritas->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $beritas->id }}">{{ $beritas->title }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Menampilkan Gambar Besar -->
                                        <img src="{{ asset('storage/' . $beritas->image) }}" class="img-fluid mb-3" alt="{{ $beritas->title }}">
                                        <!-- Menampilkan Konten Lengkap -->
                                        <p>{{ $beritas->content }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center mt-4">
                        <div class="pagination-container">
                            {{ $berita->appends(['berita_page' => request('berita_page')])->fragment('berita')->links('pagination::bootstrap-4') }}
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
        
        
        
        <section class="testimoni py-5" id="testimoni">
            <div class="container">
                <!-- Judul Section -->
                <div class="text-center mb-5">
                    <h2 class="fw-bold ">Cerita Inspiratif Alumni</h2>
                    <p class="text-muted">Lihat bagaimana jurusan Rekayasa Perangkat Lunak membantu mereka meraih sukses.</p>
                </div>
        
                <!-- Testimoni Grid -->
                <div class="row g-4 mt-3">
                    <!-- Testimoni 1 -->
                    @foreach($testimonis as $testi)
                        <div class="col-md-6">
                            <div class="card testimonial-card p-4 border-0 shadow-lg h-100">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $testi->image_alumni) }}" alt="{{ $testi->nama }}"  class="rounded-circle testimonial-img me-3">
                                    <div>
                                        <h5 class="fw-bold mb-0">{{ $testi->nama }}</h5>
                                        <p class="text-muted" style="font-style: italic;">Angkatan {{ $testi->angkatan }}</p>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <p class="text-muted">
                                    {{ $testi->testimoni_alumni }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center mt-4">
                        <div class="pagination-container">
                            {{ $testimonis->appends(['testimoni_page' => request('testimoni_page')])->fragment('testimoni')->links('pagination::bootstrap-4') }}
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

        
        
        
        <section class="pemberian-testimoni py-5" id="testi">
            <!-- Teks Deskripsi sebelum Tombol -->
            <div class="text-center mb-4">
                <h2 class="testi-title fw-bold">Berikan Testimoni Anda, Alumni RPL</h2>
                <p class="text-muted">
                    Kami ingin mendengar pengalaman dan pandangan Anda sebagai alumni jurusan Rekayasa Perangkat Lunak. Testimoni Anda sangat berarti bagi kami dan calon siswa yang ingin bergabung.
                </p>
            </div>
        
            <!-- Button untuk menampilkan form -->
            <div class="text-center mb-4">
                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#testimoniModal">Berikan Testimoni</a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="testimoniModal" tabindex="-1" aria-labelledby="testimoniModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="testimoniModalLabel">Form Testimoni</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('testimoniUser.store') }}" method="POST" enctype="multipart/form-data" id="testimoniForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="angkatan" class="form-label">Angkatan Lulus</label>
                                    <input type="number" class="form-control" id="angkatan" name="angkatan" required>
                                    <p class="text-muted" style="font-size: 15px;">Pekerjaan anda sekarang.</p>
                                </div>
                                <div class="mb-3">
                                    <label for="testimoni_alumni" class="form-label">Testimoni</label>
                                    <textarea class="form-control" id="testimoni_alumni" name="testimoni_alumni" rows="4" required></textarea>
                                    <p class="text-muted" style="font-size: 15px;">Berikan testimoni anda selama sekolah di smkn 1 kawali di jurusan rpl.</p>
                                </div>
                                <div class="mb-3">
                                    <label for="image_alumni" class="form-label">Foto (Opsional)</label>
                                    <input type="file" class="form-control" id="image_alumni" name="image_alumni">
                                    <p class="text-muted" style="font-size: 15px;">Poto anda bebas asalkan sopan.</p>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        
        </section>
        
        
        

</x-layout>
