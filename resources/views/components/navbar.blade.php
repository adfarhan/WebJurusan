<nav class="navbar navbar-expand-lg ultra-modern-navbar">
    <div class="container">
        <!-- Logo and Brand Text -->
        <a class="navbar-brand" href="#">
            <img src="assets/img/logo.png" alt="Logo" width="50" height="50" class="navbar-logo">
            <span class="brand-text">SMKN 1 KAWALI</span>
        </a>
        <!-- Toggler Button for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kurikulum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Alumni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
/* Ultra Modern Navbar with White Theme */
.ultra-modern-navbar {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: #ffffff; /* White background */
    color: #6c757d; /* Gray text */
    padding: 15px 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

/* Scrolled Navbar Effect */
.ultra-modern-navbar.scrolled {
    background: #f8f9fa; /* Light gray background when scrolled */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
}

/* Brand Text */
.ultra-modern-navbar .navbar-brand {
    font-size: 22px;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    color: #6c757d; /* Gray */
    display: flex;
    align-items: center;
    text-transform: uppercase;
}

.ultra-modern-navbar .navbar-logo {
    margin-right: 10px;
}

/* Navbar Links */
.ultra-modern-navbar .nav-link {
    font-weight: 500;
    color: #6c757d; /* Gray text */
    font-size: 15px;
    padding: 10px 15px;
    text-transform: capitalize;
    position: relative;
    transition: color 0.3s ease, transform 0.3s ease;
    font-family: 'Poppins', sans-serif;
}

.ultra-modern-navbar .nav-link::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    width: 0;
    height: 2px;
    background-color: #6c757d; /* Gray underline */
    transition: width 0.3s ease;
}

.ultra-modern-navbar .nav-link:hover::after {
    width: 100%; /* Underline effect on hover */
}

.ultra-modern-navbar .nav-link:hover {
    color: #000000; /* Black text on hover */
    transform: scale(1.1); /* Slight enlargement on hover */
}

/* Active Link */
.ultra-modern-navbar .nav-item.active .nav-link {
    color: #000000; /* Black for active link */
    font-weight: bold;
}

/* Add margin between nav items */
.ultra-modern-navbar .nav-item {
    margin-left: 20px; /* Add space between each navbar item */
}

/* Toggler Button */
.ultra-modern-navbar .navbar-toggler {
    border: none;
    outline: none;
}

.ultra-modern-navbar .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=UTF8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%236c757d' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%25283, 3, 3, 0.5%2529' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    width: 30px;
    height: 30px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .ultra-modern-navbar .navbar-brand {
        font-size: 18px;
    }

    .ultra-modern-navbar .nav-link {
        font-size: 14px;
        padding: 8px 10px;
    }

    .ultra-modern-navbar .nav-item {
        margin-left: 10px; /* Less space on smaller screens */
    }
}
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.querySelector(".ultra-modern-navbar");
        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    });
</script>
