<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login RPL SMKN 1 Kawali</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f9f9f9;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
            background: #fff;
            padding: 40px;
            width: 100%;
            max-width: 420px;
        }
        .login-card .form-control {
            height: 50px;
            border-radius: 8px;
        }
        .login-card h1 {
            font-size: 32px;
            font-weight: bold;
            color: #333;
        }
        .login-card p {
            font-size: 16px;
            color: #666;
        }
        .login-card img {
            max-width: 80px;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #6e8efb;
            border: none;
            font-size: 18px;
            font-weight: bold;
            padding: 12px;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background-color: #5a7be7;
        }
        a {
            color: #6e8efb;
            text-decoration: none;
        }
        a:hover {
            color: #5a7be7;
        }

        .password-lupa {
            color: #615d5d;
        }
        .password-lupa:hover {
            color: #6e8efb; /* Warna teks ketika di-hover */
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo-login text-center">
            <img src="assets/img/logo.png" alt="Logo RPL SMKN 1 Kawali" class="img-fluid">
        </div>

        <form action="#" method="POST">
            @csrf
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label"></label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" required>
                </div>
            </div>
            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label"></label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
            </div>
            <!-- Remember Me -->
            <div class="mb-3 text-end">
                <a href="" class="password-lupa fw-bold" style="font-style: italic; font-size: 14px;">Password Lupa?</a>
            </div>
            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
