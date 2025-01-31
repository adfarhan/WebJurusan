<nav class="navbar navbar-expand-lg ultra-modern-navbar">
    <div class="container">
        <a class="navbar-brand" href="https://smkn1kawali.sch.id/">
            <img src="assets/img/logo.png" alt="Logo" width="50" height="50" class="navbar-logo">
            <span class="brand-text">SMKN 1 KAWALI</span>
        </a>
        <button class="navbar-toggler" type="button" id="navbarToggler" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('tentang') ? 'active' : '' }}" href="{{ route('tentang') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('kurikulum') ? 'active' : '' }}" href="{{ route('kurikulum') }}">Kurikulum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('kegiatan') ? 'active' : '' }}" href="{{ route('kegiatan') }}">Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('alumnis') ? 'active' : '' }}" href="{{ route('alumnis') }}">Alumni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
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
    background: #fff; /* White background */
    color: #6c757d; /* Gray text */
    padding: 10px 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

/* Scrolled Navbar Effect */
.ultra-modern-navbar.scrolled {
    background: #fff; /* Light gray background when scrolled */
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
    box-shadow: none;
}

.ultra-modern-navbar .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    
}
.ultra-modern-navbar .navbar-toggler-icon.x {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' d='M6 6L24 24M6 24L24 6'/%3E%3C/svg%3E");
    
}

/* Responsiveness Adjustments */
@media (max-width: 992px) {
    .ultra-modern-navbar .navbar-brand {
        font-size: 18px; /* Ukuran font lebih kecil */
    }

    .ultra-modern-navbar .nav-link {
        font-size: 14px; /* Ukuran font lebih kecil */
        padding: 8px 10px;
    }

    .ultra-modern-navbar .nav-item {
        margin-left: 10px; /* Kurangi margin antar item */
    }

    .ultra-modern-navbar .navbar-toggler-icon {
        width: 25px;
        height: 25px;
    }

    .ultra-modern-navbar .navbar-collapse {
        background: #ffffff; /* Warna latar belakang dropdown */
        border-radius: 8px;
        padding: 10px;
    }

    .ultra-modern-navbar .nav-item {
        text-align: center;
        width: 100%;
        margin: 5px 0;
    }
}

@media (max-width: 576px) {
    .ultra-modern-navbar .navbar-brand {
        font-size: 16px; /* Ukuran lebih kecil untuk layar sangat kecil */
    }

    .ultra-modern-navbar .nav-link {
        font-size: 12px; /* Kurangi ukuran font */
    }
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbarToggler = document.getElementById('navbarToggler');
        const navbarNav = document.getElementById('navbarNav');
        
        navbarToggler.addEventListener('click', function () {
            navbarNav.classList.toggle('collapse'); // Menambah atau menghapus kelas 'collapse' pada navbar
            navbarNav.classList.toggle('show'); // Menambahkan kelas 'show' untuk menampilkan navbar
            navbarToggler.querySelector('.navbar-toggler-icon').classList.toggle('x'); // Ganti ikon hamburger ke X
        
        });
    });
</script>


