<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Panel Guru</title>

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    {{-- ADMINLTE --}}
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    {{-- GOOGLE FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- CUSTOM CSS --}}
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        {{-- NAVBAR --}}
        @include('layouts.guru.navbar')

     {{-- Ubah ini --}}
@include('layouts.guru.sidebar')

{{-- Menjadi ini --}}
@include('layouts.admin.sidebar')
        {{-- CONTENT --}}
        <div class="content-wrapper">

            {{-- HEADER --}}
            <div class="content-header">

                <div class="container-fluid">

                    <h4 class="m-0">
                        @yield('title')
                    </h4>

                </div>

            </div>

            {{-- CONTENT --}}
            <section class="content">

                <div class="container-fluid">

                    @yield('content')

                </div>

            </section>

        </div>

        {{-- FOOTER --}}
        @include('layouts.guru.footer')

    </div>

    {{-- JS --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>