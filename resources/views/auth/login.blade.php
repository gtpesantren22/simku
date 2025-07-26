<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIMKU</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            background-image: linear-gradient(135deg, #1a1a1a 0%, #121212 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-container {
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
            padding: 40px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .login-header i {
            font-size: 60px;
            color: #4e73df;
            margin-bottom: 15px;
        }

        .login-header h2 {
            color: #4e73df;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .login-header p {
            color: #6c757d;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-control {
            height: 45px;
            border-radius: 4px;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .input-group-text {
            background-color: #f8f9fa;
            color: #495057;
        }

        .btn-login {
            width: 100%;
            background-color: #4e73df;
            border: none;
            padding: 12px;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background-color: #3a5bc7;
            transform: translateY(-2px);
        }

        .form-check-label {
            color: #495057;
        }

        a {
            color: #4e73df;
            font-weight: 500;
        }

        a:hover {
            color: #3a5bc7;
            text-decoration: none;
        }

        .footer-text {
            color: #6c757d;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                {{-- <i class="fas fa-user-shield"></i> --}}
                <h2>SIMKU</h2>
                <p>Sistem Manajemen Keuangan Terpadu</p>
            </div>

            <form method="POST" action="/login">
                @csrf
                <div class="form-group">
                    <label for="username" class="font-weight-bold">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="email" class="form-control" id="username"
                            placeholder="Masukkan username" required value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="font-weight-bold">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Masukkan password" required>
                    </div>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-primary btn-login mb-4">
                    <i class="fas fa-sign-in-alt mr-2"></i> MASUK
                </button>

                <div class="text-center">
                    <a href="#" class="d-block mb-2"><i class="fas fa-key mr-1"></i> Lupa password?</a>
                    <p class="footer-text mt-3">© 2023 SIMKU - Versi 1.0.0</p>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 4 JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
