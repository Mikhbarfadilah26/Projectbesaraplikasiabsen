<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa | SMK Negeri 1 Karang Baru</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-box {
            width: 400px;
        }

        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05) !important;
            overflow: hidden;
        }

        .card-header {
            background: #ffffff;
            border-bottom: none;
            padding-top: 30px;
            text-align: center;
        }

        .login-logo b {
            font-weight: 600;
            letter-spacing: 1px;
            color: #333;
            font-size: 1.8rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            height: auto;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 8px rgba(255, 193, 7, 0.2);
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            color: #fff;
            transition: all 0.3s;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
            color: #fff;
        }

        .back-home {
            transition: all 0.3s;
            text-decoration: none !important;
        }

        .back-home:hover {
            color: #ffc107 !important;
        }
    </style>
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="card">
            <div class="card-header">
                <div class="login-logo">
                    <a href="#"><b>LOGIN</b> SISWA</a>
                </div>
            </div>

            <div class="card-body login-card-body">
                <p class="login-box-msg">Silakan masuk untuk mengakses panel siswa</p>

                <form action="{{ route('login.siswa.process') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label style="font-weight: 500; color: #555;"><i class="fas fa-user-graduate mr-1"></i> NIS</label>
                        <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS anda" required>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: 500; color: #555;"><i class="fas fa-lock mr-1"></i> Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>

                    <button type="submit" class="btn btn-warning btn-block mt-4">
                        MASUK <i class="fas fa-sign-in-alt ml-1"></i>
                    </button>
                </form>

                <div class="text-center mt-4">
                    <small class="text-muted d-block mb-2">&copy; 2026 SMK Negeri 1 Karang Baru</small>
                    <hr>
                    <a href="/" class="back-home text-secondary small">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>