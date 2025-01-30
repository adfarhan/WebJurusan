<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <section class="contact-section mb-5">
            <h2 class="contact-title fs-3">KONTAK</h2>
            <div class="contact-container">
                <!-- Contact Info -->
                <div class="contact-info">
                    <div class="card">
                        <a href="https://www.google.com/maps?q=JL+Talagasari,+No.+35,+Kawalimukti,+Kawali,+Kabupaten+Ciamis,+Jawa+Barat+46253" target="_blank">
                            <div class="info-item">
                                <span class="icon"><i class="bi bi-geo-alt"></i></span>
                                <div class="info-text">
                                    <h4>Alamat</h4>
                                    <p>Jl.Talagasari, No.35 Kawalimukti, Kawali, Kabupaten Ciamis Jawa Barat</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card">
                        <a href="tel:(0265) 791 727">
                            <div class="info-item">
                                <span class="icon"><i class="bi bi-telephone"></i></span>
                                <div class="info-text">
                                    <h4>Telepon</h4>
                                    <p>(0265) 791 727</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card">
                        <a href="mailto:smkn1kawali@gmail.com">
                            <div class="info-item">
                                <span class="icon"><i class="bi bi-envelope"></i></span>
                                <div class="info-text">
                                    <h4>Email</h4>
                                    <p>smkn1kawali@gmail.com</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.478299019351!2d108.35967747411073!3d-7.186135570527614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f43087e24f9d3%3A0x34cfd3589f2615d0!2sSMK%20Negeri%201%20Kawali!5e0!3m2!1sid!2sid!4v1736866359900!5m2!1sid!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="contact-form">
                    <form action="{{ route('kirim.pesan') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subjek</label>
                            <input type="text" id="subject" name="subject" placeholder="Masukkan Subjek" required>
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea id="pesan" name="pesan" rows="5" placeholder="Tulis Pesan Anda" required></textarea>
                        </div>
                        <button type="submit">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-layout>