<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Absensi SMK Ikhbar')</title>

    {{-- ADMINLTE --}}
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    {{-- CUSTOM CSS --}}
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
</head>

<body class="layout-top-nav">

    <div class="wrapper">

        {{-- NAVBAR --}}
        @include('layouts.landing.navbar')

        {{-- CONTENT --}}
        <div class="content-wrapper">

            <div class="content">

                <div class="container py-4">

                    @yield('content')

                </div>

            </div>

        </div>

        {{-- FOOTER --}}
        @include('layouts.landing.footer')

    </div>

    {{-- JS --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>