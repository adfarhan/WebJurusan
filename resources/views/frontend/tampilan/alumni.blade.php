<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- Profil Alumni -->
            <section class="profil-alumni mt-5">
            <h2 class="text-center fs-3"><b>Apa Kata Lulusan RPL?</b></h2>
            <p class="text-muted mb-5">Ini ada beberapa pendapat dari alumni</p>
                <div class="pendapat-alumni container mb-5">
                    @foreach($profil as $pro)
                    <div class="item">
                        <div class="image-alumni">
                            <img src="{{ asset('storage/' . $pro->foto) }}" alt="{{ $pro->nama }}">
                        </div>
                        <h4 class="alumni-name">{{ $pro->nama }}</h4>
                        <h5 class="alumni-pekerjaan" style="font-size: 17px; font-weight: bold;">{{ $pro->pekerjaan }}</h5>
                        <p class="alumni-testimoni">"{{ $pro->cerita_sukses }}"</p>
                    </div>
                    @endforeach
                </div>
            </section>
            
            
            
            <!-- Jejaring Alumni -->
            <section class="jejaring-alumni" style="margin-bottom: 50px;">
                <div class="container" style="background: #fff">
                    <div class="container text-center my-5">
                        <h2 class="fw-bold" style="color: #323232; font-size: 2rem; margin-bottom: 10px;">
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
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            
            
</x-layout>