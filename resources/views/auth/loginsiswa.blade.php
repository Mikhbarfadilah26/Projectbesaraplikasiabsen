<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Siswa</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
</head>

<body class="hold-transition login-page bg-light">

<div class="login-box">

    <div class="login-logo">
        <b>LOGIN SISWA</b>
    </div>

    <div class="card shadow">

        <div class="card-body login-card-body">

            <p class="login-box-msg">Masuk sebagai Siswa</p>

            <form action="{{ route('login.siswa.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control" placeholder="NIS" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-warning btn-block">
                    Login
                </button>

            </form>

        </div>
    </div>

</div>

</body>
</html>