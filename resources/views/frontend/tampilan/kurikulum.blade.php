<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
        <section class="mata-pelajaran mt-5">
            <h2 class="title-mata">Mata Pelajaran</h2>
            <p class="definisi-mata">Materi yang akan ditempuh dan dipelajari selama menjadi pelajar di jurusan Rekayasa Perangkat Lunak.</p>
            <div class="carousel-wrapper">
                <button class="carousel-button prev">&#8249;</button>
                <div class="carousel">
                    <div class="carousel-item active">
                        <div class="card card-mata">
                            <h3>Front End</h3>
                            <p>Belajar dasar-dasar HTML, CSS, dan JavaScript untuk membangun website interaktif.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card card-mata">
                            <h3>Back End</h3>
                            <p>Belajar pemrograman server-side menggunakan Node.js dan database.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card card-mata">
                            <h3>UI/UX Design</h3>
                            <p>Mempelajari desain antarmuka yang menarik dan pengalaman pengguna yang optimal.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card card-mata">
                            <h3>Pengembangan Gim</h3>
                            <p>Mempelajari proses desain, pengembangan, dan pengujian gim interaktif, mulai dari konsep awal hingga implementasi final..</p>
                        </div>
                    </div>
                    
                </div>
                <button class="carousel-button next">&#8250;</button>
            </div>  
            <div class="carousel-dots">
                <span class="dot" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
                <span class="dot" data-slide="2"></span>
                <span class="dot" data-slide="3"></span>
            </div>         
        </section>


        <section class="kurikulum-struktur">
            <h2 class="struktur-title">Struktur Kurikulum</h2>
            <p class="struktur-deskripsi">Struktur kurikulum ini dirancang untuk memberikan pemahaman yang mendalam tentang pemrograman dan desain grafis, mulai dari dasar hingga tingkat lanjut.</p>
            <div class="struktur-cards">
                <div class="struktur-card">
                    <h3>X RPL</h3>
                    <ul>
                        <li>Memahami dasar pemrograman</li>
                        <li>Mempelajari Dasar Desain Grafis</li>
                    </ul>
                </div>
                <div class="struktur-card">
                    <h3>XI RPL</h3>
                    <ul>
                        <li>Mempelajari pemrograman berbasis web</li>
                    </ul>
                </div>
                <div class="struktur-card">
                    <h3>XII RPL</h3>
                    <ul>
                        <li>Mempelajari pemrograman berbasis mobile</li>
                    </ul>
                </div>
            </div>
        </section>
        
        <section class="program-section">
            <div class="program-container container">
                <div class="program-text">
                    <h2 class="program-title">Program Keahlian</h2>
                    <p>Jurusan Rekayasa Perangkat Lunak merupakan program pendidikan yang fokus pada pembelajaran pengembangan dan pembuatan perangkat lunak (software) dengan tujuan menghasilkan lulusan yang siap bekerja di bidang teknologi informasi. Jurusan ini mengajarkan siswa untuk menguasai keterampilan teknis dalam merancang, mengembangkan, dan memelihara aplikasi komputer, baik untuk perangkat mobile, desktop, maupun web.</p>
                </div>
                <div class="program-image">
                    <img src="{{ asset('assets/img/gedungrpl.jpg') }}" alt="Program Keahlian">
                </div>
            </div>
        </section>

        <section class="bidang-rpl">
            <div class="container">
                <div class="title-bidangrpl">
                    <h2>Prospek Kerja</h2>
                    <p class="section-definition">Bidang Rekayasa Perangkat Lunak menawarkan peluang kerja yang luas dan menjanjikan seiring dengan pesatnya perkembangan teknologi digital di berbagai sektor. Berikut adalah beberapa prospek kerja utama di bidang ini:</p>
                    <div class="prospek-wrapper">
                        <div class="prospek">
                            <div>
                                <h3>Software Developer/Engineer</h3>
                                <p>Merancang, mengembangkan, dan memelihara perangkat lunak.</p>
                            </div>
                            <div>
                                <h3>Web Developer</h3>
                                <p>Mengembangkan dan memelihara aplikasi berbasis web.</p>
                            </div>
                            <div>
                                <h3>Mobile App Developer</h3>
                                <p>Mengembangkan aplikasi untuk perangkat Android atau iOS.</p>
                            </div>
                            <div>
                                <h3>UI/UX Designer</h3>
                                <p>Fokus pada desain antarmuka pengguna dan pengalaman pengguna untuk memastikan produk perangkat lunak mudah digunakan dan menarik.</p>
                            </div>
                            <div>
                                <h3>Data Analyst/Scientist</h3>
                                <p>Menganalisis data untuk memberikan wawasan strategis, memanfaatkan keahlian dalam pengelolaan data dan pembuatan algoritma.</p>
                            </div>
                            <div>
                                <h3>Game Developer</h3>
                                <p>Mengembangkan gim interaktif untuk berbagai platform, termasuk PC, konsol, dan perangkat mobile.</p>
                            </div>
                        </div>
                        <div class="indicators mt-5"></div>
                    </div>
                </div>
                
            </dv>
        </section>
        
        
</x-layout>

