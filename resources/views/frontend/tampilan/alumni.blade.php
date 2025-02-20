<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
        <!-- Profil Alumni -->
        <section class="profil-alumni mt-5" id="profil">
            <h2 class="text-center fs-3"><b>Apa Kata Lulusan RPL?</b></h2>
            <p class="text-muted mb-5">Ini ada beberapa pendapat dari alumni</p>
            <div class="pendapat-alumni container mb-5">
                @foreach($profil as $pro)
                <div class="item position-relative">
                    <!-- Badge -->
                    <span class="badge-alumni">{{ $pro->pekerjaan }}</span>
                    <div class="image-alumni">
                        <img src="{{ asset('storage/' . $pro->foto) }}" alt="{{ $pro->nama }}">
                    </div>
                    <h4 class="alumni-name">{{ $pro->nama }}</h4>
                    <h5 class="alumni-pekerjaan" style="font-size: 12px; font-weight: bold;">{{ $pro->angkatan }}</h5>
                    <p class="alumni-testimoni">"{{ $pro->cerita_sukses }}"</p>
                </div>
                @endforeach
            </div>
            <div class="d-flex flex-column align-items-center mt-4">
                <div class="pagination-info mb-2">
                    Menampilkan {{ $profil->firstItem() }} sampai {{ $profil->lastItem() }} dari {{ $profil->total() }} hasil
                </div>
                <div class="pagination-container">
                    {{ $profil->appends(['profil_page' => request('profil_page')])->fragment('Profil')->links('pagination::bootstrap-4') }}
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
        </section>
    
            
            
            
            <!-- Jejaring Alumni -->
            <section class="jejaring-alumni" style="margin-bottom: 50px;">
                <div class="container" style="background: #fff">
                    <div class="container text-center my-5">
                        <h2 class="fw-bold" style="color: #323232; font-size: 1.8rem; margin-bottom: 10px;">
                            Data Siswa Alumni RPL
                        </h2>
                        <p class="text-muted" style="font-size: 1rem; line-height: 1.6;">
                            Informasi 3 tahun kebelakang tentang data siswa jurusan RPL yang BMW (Bekerja, Melanjutkan pendidikan, atau Wirausaha)
                        </p>
                    </div>
                    <div class="cards">
                        <!-- Angkatan -->
                        @foreach($alumnibmw as $bmw) 
                        <div class="card-wrapper" style="margin-bottom: 20px;">
                            <button class="card-toggle" data-target="detail-{{ $bmw->id }}">
                                <i class="fas fa-users"></i> Angkatan {{ $bmw->angkatan }}
                            </button>
                            <div id="detail-{{ $bmw->id }}" class="detail-content">
                                <h3>
                                    <i class="fas fa-info-circle"></i> Detail Angkatan {{ $bmw->angkatan }}
                                </h3>
                                <ul>
                                    <li>
                                        <i class="fas fa-briefcase"></i>
                                        Bekerja: <span>{{ $bmw->bekerja }} siswa</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-graduation-cap"></i>
                                        Melanjutkan: <span>{{ $bmw->melanjutkan }} siswa</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-laptop-code"></i>
                                        Wirausaha: <span>{{ $bmw->wirausaha }} siswa</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-users"></i>
                                        Total Siswa BMW: <span>{{ $bmw->total }} siswa</span> 
                                    </li>
                                </ul>
                            </div>                                               
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            
            
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                const buttons = document.querySelectorAll(".card-toggle");

                buttons.forEach(button => {
                    button.addEventListener("click", function() {
                        const target = this.getAttribute("data-target");
                        const detail = document.getElementById(target);

                        // Tutup semua detail kecuali yang sedang diklik
                        document.querySelectorAll('.detail-content').forEach(content => {
                            if (content !== detail) {
                                content.classList.remove("show");
                            }
                        });

                        // Toggle display detail dengan animasi
                        if (detail.classList.contains("show")) {
                            detail.classList.remove("show");
                        } else {
                            detail.classList.add("show");
                        }
                    });
                });
            });

            </script>
        <style>
            .cards {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 50px;
            }
        
            .card-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                padding: 15px;
                border: none;
                background: linear-gradient(145deg, #e2e8f0, #cbd5e1);
                cursor: pointer;
                border-radius: 12px;
                box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s, box-shadow 0.3s;
                font-size: 1rem;
                font-weight: 700;
                color: #333;
            }
        
            .card-toggle i {
                margin-right: 8px;
                font-size: 1.5rem;
                color: #007bff;
            }
        
            .card-toggle:hover {
                transform: translateY(-5px);
                box-shadow: 6px 6px 12px rgba(0, 0, 0, 0.2);
            }
        
            .card-toggle:active {
                transform: translateY(2px);
                box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.15);
            }
            .detail-content {
                display: none;
                background: #ffffff;
                padding: 20px;
                border-radius: 12px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
                margin-top: 15px;
                transition: transform 0.3s ease, opacity 0.3s ease;
                transform: scale(0.95);
                opacity: 0;
            }

            .detail-content.show {
                display: block;
                transform: scale(1);
                opacity: 1;
            }

            .detail-content h3 {
                font-size: 1.2rem;
                color: #2c3e50;
                border-bottom: 3px solid #3498db;
                padding-bottom: 10px;
                text-align: center;
                margin-bottom: 15px;
            }

            .detail-content ul {
                list-style: none;
                padding-left: 0;
            }

            .detail-content li {
                display: flex;
                align-items: center;
                margin-bottom: 12px;
                font-size: 1.1rem;
                color: #444;
                background: #f4f6f8;
                padding: 10px;
                border-radius: 8px;
                box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
            }

            .detail-content li i {
                color: #3498db;
                margin-right: 12px;
                font-size: 1.4rem;
            }
            .detail-content span{
                font-weight: 700;
            }

        
        </style>
        
                

</x-layout>