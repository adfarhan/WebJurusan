<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>Tentang:</h3>
            <p>
                We are committed to delivering the best service to our
                customers. Learn more about our journey and goals.
            </p>
        </div>

        <div class="footer-section">
            <h3>Navigasi:</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Hubungi Kami:</h3>
            <p>Email: support@example.com</p>
            <p>Phone: +123 456 7890</p>
            <p>Address: 123, Main Street, Anytown</p>
        </div>

        <div class="footer-section">
            <h3>Media Sosial:</h3>
            <div class="social-ikon">
                <a href="#" class="ikon facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="ikon twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="ikon instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="ikon linkedin"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="ikon youtube"><i class="bi bi-youtube"></i></a>
                <a href="#" class="ikon whatsapp"><i class="bi bi-whatsapp"></i></a>
            </div>
        </div>
        
    </div>

    <div class="footer-bottom">
        <div>
            <p>&copy; 2025 YourCompany. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<style>
    .footer {
        background-color: #353532;
        color: #fff;
        font-weight: 500;
        padding: 40px 20px;
    }

    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 40px;
    }

    .footer-section {
        flex: 1;
        min-width: 200px;
    }

    .footer-section h3 {
        font-size: 18px;
        margin-bottom: 15px;
        color: #f0a500;
    }

    .footer-section p,
    .footer-section ul {
        font-size: 14px;
        line-height: 1.6;
    }

    .footer-section ul {
        list-style: none;
        padding: 0;
    }

    .footer-section ul li {
        margin-bottom: 10px;
    }

    .footer-section ul li a {
        color: #fff;
        text-decoration: none;
    }

    .footer-section ul li a:hover {
        text-decoration: underline;
    }

    .social-ikon {
    display: flex;
    gap: 10px;
}

    .ikon {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 20px;
    color: #ffffff;
    text-decoration: none;
    padding: 10px;
    border-radius: 50%; /* Mengubah menjadi bulat sempurna */
    background-color: #f0a500;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 40px; /* Menentukan ukuran lingkaran */
    height: 40px; /* Menentukan ukuran lingkaran */
}

    .ikon:hover {
    background-color: #ffcc00;
}


    .footer-bottom {
        margin-top: 20px;
        text-align: center;
        font-size: 14px;
        border-top: 1px solid #f0a500;
        /* padding-top: 10px; */
    }

    .footer-bottom p{
        margin-top: 30px;
        margin-bottom: -15px;
    }
</style>

<script>
    // Optional: Add dynamic year
    const footerBottom = document.querySelector(".footer-bottom p");
    footerBottom.innerHTML = `&copy; ${new Date().getFullYear()} YourCompany. All Rights Reserved.`;
</script>
