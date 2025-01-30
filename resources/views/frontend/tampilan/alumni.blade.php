<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
        <!-- Profil Alumni -->
        <section class="profil-alumni mt-5">
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
                <div class="d-flex justify-content-center mt-4">
                    <div class="pagination-container">
                        {{ $profil->links('pagination::bootstrap-4') }}
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
        </section>
    
            
            
            
            <!-- Jejaring Alumni -->
            <section class="jejaring-alumni" style="margin-bottom: 50px;">
                <div class="container" style="background: #fff">
                    <div class="container text-center my-5">
                        <h2 class="fw-bold" style="color: #323232; font-size: 1.8rem; margin-bottom: 10px;">
                            Data Siswa Alumni RPL
                        </h2>
                        <p class="text-muted" style="font-size: 1rem; line-height: 1.6;">
                            Informasi tentang data siswa jurusan RPL yang BMW (Bekerja, Melanjutkan pendidikan, atau Wirausaha)
                        </p>
                    </div>
                    <div class="cards">
                        <!-- Angkatan -->
                        @foreach($alumnibmw as $bmw) 
                        <button class="card" data-target="detail-{{ $bmw->angkatan }}">Angkatan {{ $bmw->angkatan }}</button>
                        <div id="detail-{{ $bmw->angkatan }}" class="detail" style="display: none;">
                            <h3>Detail Angkatan {{ $bmw->angkatan }}</h3>
                            <ul>
                                <li>Bekerja: {{ $bmw->bekerja }} siswa</li>
                                <li>Melanjutkan pendidikan: {{ $bmw->melanjutkan }} siswa</li>
                                <li>Wirausaha: {{ $bmw->wirausaha }} siswa</li>
                                <li>Total Siswa BMW: {{ $bmw->total }} siswa</li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            
            
</x-layout>