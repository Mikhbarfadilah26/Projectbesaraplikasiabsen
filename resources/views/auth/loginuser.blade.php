<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login User</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
</head>

<body class="hold-transition login-page bg-light">

<div class="login-box">

    <div class="login-logo">
        <b>LOGIN USER</b>
    </div>

    <div class="card shadow">

        <div class="card-body login-card-body">

            <p class="login-box-msg">Masuk sebagai Admin / Guru / Petugas</p>

            <form action="{{ route('login.user.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-success btn-block">
                    Login
                </button>

            </form>

        </div>
    </div>

</div>

</body>
</html>