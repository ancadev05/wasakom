@php
    $user = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="Aplikasi untuk mengelola data laptop" name="description">
    <meta content="teknisi, laptop, teknisi laptop, teknisi_ku, biner, biner komputer, biner_komputer" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo-biner.png') }}" rel="icon">
    <link href="{{ asset('assets/img/logo-biner.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('niceadmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('niceadmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('niceadmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('niceadmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('niceadmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('niceadmin/assets/css/style.css') }}" rel="stylesheet">

    {{-- datatables --}}
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/Buttons-2.4.2/css/buttons.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/Buttons-2.4.2/css/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/DataTables-1.13.8/css/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/Responsive-2.5.0/css/responsive.bootstrap5.css') }}">

    {{-- select2 --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2-4.1.0/css/select2.min.css') }}" rel="stylesheet">

    {{-- sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">



    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



    <!-- ======= Header ======= -->
    @include('template-dashboard.komponen-niceadmin.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('template-dashboard.komponen-niceadmin.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('template-dashboard.komponen-niceadmin.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- jquery --}}
    <script src="{{ asset('assets/jquery/jquery-3.7.1.min.js') }}"></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('niceadmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('niceadmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('niceadmin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('niceadmin/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('niceadmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('niceadmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('niceadmin/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('niceadmin/assets/js/main.js') }}"></script>

    {{-- datatables --}}
    <script src="{{ asset('assets/datatables/datatables.js') }}"></script>
    <script src="{{ asset('assets/datatables/datatables-button.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-2.4.2/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-2.4.2/js/buttons.dataTables.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-2.4.2/js/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-2.4.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-2.4.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-2.4.2/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/JSZip-3.10.1/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/pdfmake-0.2.7/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/pdfmake-0.2.7/vfs_fonts.js') }}"></script>
    {{-- <script src="{{ asset('assets/datatables/DataTables-1.13.8/js/dataTables.bootstrap5.js') }}"></script> --}}
    <script src="{{ asset('assets/datatables/Responsive-2.5.0/js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('assets/datatables/Responsive-2.5.0/js/responsive.bootstrap5.js') }}"></script>

    {{-- select2 --}}
    <script src="{{ asset('assets/vendor/select2-4.1.0/js/select2.min.js') }}"></script>

    {{-- sweetalert2 --}}
    <script src="{{ asset('assets/vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    {{-- sweetalert costum --}}
    {{-- <script src="{{ asset('assets/js-costum/costum-sweetalert2.js') }}"></script> --}}

    {{-- alert --}}
    @include('template-dashboard.komponen-niceadmin.alert')

    {{-- script costum --}}
    @yield('script')

</body>

</html>
