<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>404 - Halaman Tidak Ditemukan</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/plugins/fontawesome-free/css/all.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <section class="content">
        <div class="error-page text-center" style="margin-top:100px;">
            <h2 class="headline text-warning">404</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Halaman tidak ditemukan.</h3>

                <p>
                    Maaf, halaman yang kamu cari tidak tersedia.<br>
                    Mungkin link salah atau sudah dihapus.
                </p>

                <a href="/" class="btn btn-primary mt-3">
                    <i class="fas fa-home"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>

</div>
</body>
</html>