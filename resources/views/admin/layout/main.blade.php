<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>E-Library UNM | @yield('title')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- AdminLTE Theme -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
        rel="stylesheet">

    {{-- =========================
        Tambahan File CSS
    ========================== --}}

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">

    <!-- DataTables -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

    <link
        rel="stylesheet"
        href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <!-- Select2 -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <link
        rel="stylesheet"
        href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- iCheck -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <style>
        .info-box {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .info-box:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .booking {
            height: 200px;
            object-fit: cover;
        }
    </style>

    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- =========================
             Navbar
        ========================== -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('admin.layout.navbar')
        </nav>

        <!-- =========================
             Sidebar
        ========================== -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('admin.layout.sidebar')
        </aside>

        <!-- =========================
             Content Wrapper
        ========================== -->
        <div class="content-wrapper">

            <!-- Content Header -->
            <div class="content-header">
                @include('admin.layout.header')
            </div>

            <!-- Main Content -->
            <div class="content">
                @yield('content')
            </div>

        </div>

        <!-- =========================
             Footer
        ========================== -->
        <footer class="main-footer">
            @include('admin.layout.footer')
        </footer>

    </div>

    <!-- =========================
         REQUIRED SCRIPTS
    ========================== -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    <!-- bs-custom-file-input -->
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- Page-specific scripts -->
    @stack('scripts')

    <!-- =========================
         Custom JavaScript
    ========================== -->
    <script>
        // =========================
        // Toastr Configuration
        // =========================
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: true,
            progressBar: true,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };


        // =========================
        // Toastr Error Message
        // =========================
        @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @endif


        // =========================
        // Toastr Success Message
        // =========================
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif


        // =========================
        // Initialize Select2
        // =========================
        $(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });
        });


        // =========================
        // Application URL
        // =========================
        const APP_URL = "{!!json_encode(url('/')) !!}";
    </script>

</body>

</html>