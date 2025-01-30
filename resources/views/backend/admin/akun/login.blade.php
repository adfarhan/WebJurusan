<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Web Jurusan</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: #f9f9f9;
            height: 100vh; /* Pastikan tinggi viewport penuh */
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
            background: #fff;
            padding: 40px;
            max-width: 420px;
            width: 100%;
            margin: 0 15px; /* Tambahkan margin untuk ruang di sisi kiri dan kanan */
        }
        .login-card h1 {
            font-size: 32px;
            font-weight: bold;
            color: #333;
        }
        .login-card img {
            max-width: 80px;
            margin-bottom: 20px;
        }
        .form-control {
            height: 50px;
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #2759fd;
            border: none;
            font-size: 15px;
            font-weight: bold;
            padding: 12px;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background-color: #1544e0;
        }
        a {
            color: #6e8efb;
            text-decoration: none;
        }
        a:hover {
            color: #5a7be7;
        }
        .input-group-text {
            cursor: pointer;
            background: #fff;
        }

    
        /* Tambahkan media query untuk memperbaiki padding di layar kecil */
        @media (max-width: 576px) {
            .login-card {
                padding: 20px; /* Kurangi padding untuk tampilan lebih kecil */
                margin: 0 10px; /* Tambahkan margin sisi kiri dan kanan */
            }
        }
    </style>
    
</head>
<body>
    @if(session('error'))
    <script>
        Swal.fire({
            title: "Login Gagal!",
            text: "{{ session('error') }}",
            icon: "error",
            confirmButtonColor: "#d33",
            confirmButtonText: "Coba Lagi"
        });
    </script>
    @endif
    <div class="login-card">
        <div class="text-center mt-4">
            <img src="assets/img/logo.png" alt="Logo RPL SMKN 1 Kawali" class="img-fluid">
        </div>
        <form action="#" method="POST" class="loginFrom mt-4">
            @csrf
            <!-- Email -->
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" required>
                </div>
            </div>
            <!-- Password -->
            <div class="mb-5">
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    <span class="input-group-text" id="toggle-password">
                        <i class="bi bi-eye-slash"></i>
                    </span>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="d-grid mt-5">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
    
    

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle password visibility
        document.getElementById('toggle-password').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            }
        });
    </script>
</body>
</html>
