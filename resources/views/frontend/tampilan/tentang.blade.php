<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <div class="profil-jurusan">
            <header class="header mt-5">
                <h2>PROFIL <span class="highlight">JURUSAN</span></h2>
                <p class="subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </header>
            <section class="content">
                <div class="image">
                    <img src="assets/img/gedungrpl.jpg" alt="Illustration">
                </div>
                <div class="text">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quia facilis sunt, voluptate incidunt at nesciunt alias distinctio sapiente ut consectetur facere beatae atque porro earum voluptatum provident, labore magni? Debitis dignissimos repellendus consequatur alias nulla voluptatum sunt ipsum molestiae accusamus, expedita officia? Esse ducimus in aliquid rerum qui minus hic accusamus assumenda dolor consectetur repellendus quod autem, obcaecati iure facilis vel saepe corrupti porro facere et incidunt deleniti similique earum eum. Fuga ratione cum sint alias cupiditate non excepturi, iste harum officia ducimus, similique obcaecati molestias quos maxime maiores eaque optio, doloremque atque ipsum delectus molestiae consequatur repellendus. Ea!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, iste, ipsum accusamus quod, ipsa facilis illo provident veritatis corporis distinctio tenetur est porro cumque exercitationem magni voluptate ipsam quasi! Veniam, ex aliquam nostrum hic provident quas quidem. Praesentium, sequi quia?</p>
                </div>
            </section>
            <section class="mt-5">
                <div class="sejarah-filosofi-section">
                    <div class="container">
                        <div class="row">
                            <div class="column sejarah">
                                <h2 class="section-sejarah">Sejarah</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                                <p>Nunc ut porta massa. Mauris mattis tempus dolor...</p>
                            </div>
                            <div class="divider"></div>
                            <div class="column filosofi">
                                <h2 class="section-sejarah">Filosofi</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                                <p>Sed orci sem, sollicitudin ac interdum id, viverra sed est...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        

        
        <section class="pengajar-jurusan-rpl">
            <h2>Staf Pengajar RPL</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem fugiat facere veniam quo est soluta cupiditate doloribus inventore architecto labore.</p>
            <div class="slider-container">
                <!-- Wrapper Slider -->
                <div class="pengajar-slider">
                    <div class="pengajar-track">
                        <div class="pengajar-card">
                            <img src="assets/img/gedungrpl.jpg" alt="Guru 1">
                            <h3>Jajat Sudrajat</h3>
                            <p>Matematika Komputer</p>
                        </div>
                        <div class="pengajar-card">
                            <img src="https://via.placeholder.com/300" alt="Guru 2">
                            <h3>Yanto</h3>
                            <p>Algoritma & Pemrograman</p>
                        </div>
                        <div class="pengajar-card">
                            <img src="https://via.placeholder.com/300" alt="Guru 3">
                            <h3>Gilang</h3>
                            <p>Basis Data</p>
                        </div>
                        <div class="pengajar-card">
                            <img src="https://via.placeholder.com/300" alt="Guru 4">
                            <h3>Ade Popon</h3>
                            <p>Jaringan Komputer</p>
                        </div>
                        <div class="pengajar-card">
                            <img src="https://via.placeholder.com/300" alt="Guru 5">
                            <h3>Guru 5</h3>
                            <p>Pemrograman Web</p>
                        </div>
                        <div class="pengajar-card">
                            <img src="https://via.placeholder.com/300" alt="Guru 6">
                            <h3>Guru 6</h3>
                            <p>Sistem Operasi</p>
                        </div>
                    </div>
                </div>
        
                <!-- Tombol Navigasi -->
                <button class="slider-btn left-btn"><i class="fas fa-chevron-left"></i></button>
                <button class="slider-btn right-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>
        
        
        
        
        <section class="fasilitas mt-5">
            <div class="container">
                <h1 class="fw-bold fs-2">FASILITAS</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="grid">
                    <div class="grid-item" data-caption="Gedung RPL yang Modern">
                        <img src="assets/img/gedungrpl.jpg" alt="Coding on a laptop">
                    </div>
                    <div class="grid-item" data-caption="Laboratorium Komputer">
                        <img src="assets/img/gedungrpl.jpg" alt="Code on a monitor">
                    </div>
                    <div class="grid-item" data-caption="Kelas Interaktif dengan Teknologi">
                        <img src="assets/img/gedungrpl.jpg" alt="Team coding in class">
                    </div>
                    <div class="grid-item" data-caption="Fasilitas Keyboard dan Perangkat Modern">
                        <img src="assets/img/gedungrpl.jpg" alt="Typing on a keyboard">
                    </div>
                    <div class="grid-item" data-caption="Proyek Pemrograman Kolaboratif">
                        <img src="assets/img/gedungrpl.jpg" alt="Programming in progress">
                    </div>
                    <div class="grid-item" data-caption="Lab dengan Koneksi Internet Cepat">
                        <img src="assets/img/gedungrpl.jpg" alt="Students in a computer lab">
                    </div>
                    <div class="grid-item" data-caption="Laptop dan Software Terbaru">
                        <img src="assets/img/gedungrpl.jpg" alt="Code editor on a laptop">
                    </div>
                </div>
            </div>
        </section>
        
        

    </div>
    <script>
        const track = document.querySelector(".pengajar-track");
        const slides = Array.from(track.children);
        const leftButton = document.querySelector(".left-btn");
        const rightButton = document.querySelector(".right-btn");

        let currentIndex = 0;

        // Fungsi untuk memindahkan slide
        function moveToSlide(index) {
            const slideWidth = slides[0].getBoundingClientRect().width;
            track.style.transform = `translateX(-${index * slideWidth}px)`;
            currentIndex = index;
        }

        // Tombol Next
        rightButton.addEventListener("click", () => {
            const nextIndex = (currentIndex + 1) % slides.length;
            moveToSlide(nextIndex);
        });

        // Tombol Previous
        leftButton.addEventListener("click", () => {
            const prevIndex = (currentIndex - 1 + slides.length) % slides.length;
            moveToSlide(prevIndex);
        });


    </script>
</x-layout>
