<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>

    <!-- ADMINLTE -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            width: 420px;
        }

        .card {
            border-radius: 20px;
            padding: 25px 15px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .login-title {
            text-align: center;
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .login-subtitle {
            text-align: center;
            font-size: 14px;
            color: #888;
            margin-bottom: 25px;
        }

        .form-group label {
            font-weight: 500;
            color: #555;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
            background: #eef1f5;
            border: 1px solid #ddd;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.2);
        }

        .btn-login {
            border-radius: 12px;
            font-weight: 600;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: white;
            padding: 12px;
            transition: 0.3s;
            border: none;
        }

        .btn-login:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }

        .back-link {
            text-align: center;
            margin-top: 15px;
        }

        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-box">

        <div class="card shadow-lg">

            <div class="card-body">

                <div class="login-title">LOGIN USER</div>
                <div class="login-subtitle">Silakan masuk untuk mengakses panel admin</div>

                <form action="{{ route('login.user.process') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label><i class="fas fa-user"></i> Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-lock"></i> Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-login btn-block mt-3">
                        MASUK <i class="fas fa-sign-in-alt"></i>
                    </button>

                </form>

                <div class="footer-text">
                    © {{ date('Y') }} SMK Negeri 1 Karang Baru
                </div>

                <div class="back-link">
                    <a href="/"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
                </div>

            </div>
        </div>

    </div>

</body>

</html>