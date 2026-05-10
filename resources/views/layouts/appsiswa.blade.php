<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard Siswa')</title>

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    {{-- ADMINLTE --}}
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    {{-- CUSTOM CSS --}}
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        {{-- NAVBAR --}}
        @include('layouts.siswa.navbar')

        {{-- SIDEBAR --}}
        @include('layouts.siswa.sidebar')

        {{-- CONTENT --}}
        <div class="content-wrapper">

            <section class="content p-3">

                @yield('content')

            </section>

        </div>

        {{-- FOOTER --}}
        @include('layouts.siswa.footer')

    </div>

    {{-- JS --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>