<nav class="main-header navbar navbar-expand">

    {{-- LEFT --}}
    <ul class="navbar-nav">

        <li class="nav-item">

            <a class="nav-link"
                data-widget="pushmenu"
                href="#">

                <i class="fas fa-bars text-primary"></i>

            </a>

        </li>

    </ul>

    {{-- RIGHT --}}
    <ul class="navbar-nav ml-auto align-items-center">

        {{-- USER --}}
        <li class="nav-item mr-3">

            <span class="navbar-user">

                <i class="fas fa-user-circle mr-1"></i>

                {{ auth()->user()->nama }}

            </span>

        </li>


        {{-- LOGOUT --}}
        <li class="nav-item">

            <form action="{{ route('logout') }}"
                method="POST">

                @csrf

                <button type="submit"
                    class="btn btn-sm btn-danger rounded-pill px-3">

                    <i class="fas fa-sign-out-alt mr-1"></i>

                    Logout

                </button>

            </form>

        </li>

    </ul>

</nav>