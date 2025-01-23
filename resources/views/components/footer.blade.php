<footer class="footer">
    <div class="container">
        <div class="footer-section teks-footer">
            <h3>Tentang Kami</h3>
            <p>RPL SMKN 1 Kawali adalah program keahlian yang fokus pada pengembangan perangkat lunak berkualitas.</p>
        </div>
        <div class="footer-section">
            <h3>Kontak</h3>
            <ul>
                <li>Email: <a href="mailto:smkn1kawali@gmail.com">smkn1kawali@gmail.com</a></li>
                <li>No Telepon: <a href="tel:+622345678910">+62 234 567 8910</a></li>
                <li>Alamat: <a href=""> Jl. Pendidikan No.1, Kawali, Ciamis</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Sosial Media</h3>
            <ul class="social-links mt-3">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 <span style="color: #f1c40f;">RPL</span> SMKN 1 KAWALI. All Rights Reserved.</p>
    </div>
</footer>

<style>
    /* General Footer Styles */
.footer {
    background-color: #2c3e50; /* Warna latar belakang footer */
    color: #ecf0f1; /* Warna teks */
    padding: 40px 20px;
    text-align: center;
    box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2); /* Bayangan lembut untuk memisahkan footer dari konten lain */
}

.footer .container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px; /* Jarak antar kolom */
    max-width: 1200px;
    margin: auto;
    padding: 0 20px;
}

.footer-section {
    text-align: center; /* Pusatkan isi untuk estetika */
}

.footer-section h3 {
    font-size: 1.4em;
    margin-bottom: 15px;
    color: #f1c40f; /* Warna teks judul */
}

.teks-footer p{
    text-align: left; l
}

.footer-section p,
.footer-section ul {
    font-size: 1em;
    line-height: 1.8;
    margin: 0;
    padding: 0;
}

.footer-section ul {
    list-style: none;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #ecf0f1;
    text-decoration: none;
    font-weight: 500;
}

.footer-section ul li a:hover {
    color: #fff; /* Warna link saat hover */
}

/* Footer Bottom */
.footer-bottom {
    margin-top: 40px;
    border-top: 1px solid #3f3f3e;
    padding-top: 20px;
    font-size: 0.9em;
}

/* Social Links */
.social-links {
    display: flex;
    gap: 15px;
    justify-content: center;
    list-style: none;
    padding: 0;
    margin: 20px 0;
}

.social-links li {
    display: inline-block;
    background: #34495e; /* Warna card ikon */
    padding: 12px;
    border-radius: 50%; /* Card berbentuk lingkaran */
    transition: transform 0.3s ease, background-color 0.3s ease;
}

.social-links li a {
    font-size: 20px; /* Ukuran ikon */
    color: #ffffff; /* Warna ikon */
    display: flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
}

.social-links li:hover {
    transform: scale(1.1); /* Efek zoom pada hover */
    background: #f1c40f; /* Warna latar card saat hover */
}

/* Responsive Styles */
@media (max-width: 1024px) {
    .footer-section h3 {
        font-size: 1.3em;
    }

    .footer .container {
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .footer

</style>