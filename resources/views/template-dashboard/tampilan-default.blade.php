<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/img/ts.png') }}" type="image/x-icon">

    {{-- Bootstrap 5 --}}
    {{-- <link href="{{ asset('assets/bootstrap5/css/bootstrap.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('assets/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    {{-- Desain Template --}}
    <link href="{{ asset('assets/template-css/styles.css') }}" rel="stylesheet" />
    {{-- Font Awesome --}}
    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet" />
    {{-- Alert animasi --}}
    <link href="{{ asset('assets/costum-style/css-costum.css') }}" rel="stylesheet" />
    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset('assets/sweetalert/sweetalert2.min.css') }}">

</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark border-bottom border-3">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ url('/') }}">Wasakom</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="bg-white" id="layoutSidenav">

        {{-- Sidebar --}}
        @include('template-dashboard.komponen.sidebar')
        {{-- End Sidebar --}}

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid p-3">

                    {{-- Pesan sukses --}}
                    @include('template-dashboard.komponen.alert')

                    {{-- Content --}}
                    @yield('content')
                    {{-- End Content --}}

                </div>
            </main>

            {{-- Footer --}}
            @include('template-dashboard.komponen.footer')
            {{-- End Footer --}}

        </div>
    </div>

    {{-- Jquery --}}
    <script src="{{ asset('assets/jquery/jquery-3.7.1.min.js') }}"></script>

    {{-- JS Costum --}}
    <script src="{{ asset('assets/template-js/scripts.js') }}"></script>

    {{-- Bootstrap 5 --}}
    {{-- <script src="{{ asset('assets/bootstrap5/js/bootstrap.js') }}"></script> --}}
    <script src="{{ asset('assets/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap5/js/popper.min.js') }}"></script>

    {{-- SweetAlert --}}
    <script src="{{ asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script>
    
    {{-- Script Costum --}}
    <script src="{{ asset('assets/template-js/script-costum.js') }}"></script>
    
</body>

</html>
