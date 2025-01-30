<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f9f9f9;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            background: #fff;
            padding: 40px;
            max-width: 420px;
            width: 100%;
            margin: 0 15px;
        }

        .login-card img {
            max-width: 100px;
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

        .btn-secondary {
            background: #f1f1f1;
            color: #000;
            border: none;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
        }

        .btn-secondary:hover {
            background: #d9d9d9;
            color: #000;
        }

        a {
            color: #6e8efb;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #5a7be7;
        }

        /* Pastikan ikon sejajar dengan input */
        .input-group-text {
            cursor: pointer;
            background: #fff;
            border-left: none;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 15px;
        }


        @media (max-width: 576px) {
            .login-card {
                padding: 20px;
                margin: 0 10px;
            }

            .login-card h1 {
                font-size: 28px;
                margin-bottom: 20px;
            }
        }
    </style>

</head>

<body>
    <div class="login-card">
        <div class="text-center mt-4">
            <img src="assets/img/logo.png" alt="Logo RPL SMKN 1 Kawali" class="img-fluid">
        </div>

        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.change') }}" class="mt-4">
            @csrf

            <!-- Password Lama -->
            <div class="mb-4">
                <div class="input-group">
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                        id="current_password" name="current_password" placeholder="Masukan Password Saat Ini" required>
                    <span class="input-group-text toggle-password" data-target="#current_password">
                        <i class="bi bi-eye-slash"></i>
                    </span>
                    @error('current_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Password Baru -->
            <div class="mb-4">
                <div class="input-group">
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                        id="new_password" name="new_password" placeholder="Masukan Password Baru" required>
                    <span class="input-group-text toggle-password" data-target="#new_password">
                        <i class="bi bi-eye-slash"></i>
                    </span>
                    @error('new_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Konfirmasi Password Baru -->
            <div class="mb-4">
                <div class="input-group">
                    <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                        id="new_password_confirmation" name="new_password_confirmation" placeholder="Konfirmasi Password Baru" required>
                    <span class="input-group-text toggle-password" data-target="#new_password_confirmation">
                        <i class="bi bi-eye-slash"></i>
                    </span>
                </div>
                @error('new_password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Ganti Password</button>
                <a href="{{ route('berandaAdminUtama') }}" class="btn btn-secondary">Kembali ke Halaman Sebelumnya</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Script untuk toggle password
        document.querySelectorAll('.toggle-password').forEach(function (element) {
            element.addEventListener('click', function () {
                const targetInput = document.querySelector(this.dataset.target);
                const icon = this.querySelector('i');
                if (targetInput.type === 'password') {
                    targetInput.type = 'text';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                } else {
                    targetInput.type = 'password';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                }
            });
        });
    </script>
</body>

</html>
