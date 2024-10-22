<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('eaqly.gallery', 'Design Store') }}</title>

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    
    @stack('css') <!-- Custom CSS Section -->
</head>

<body>
    <div class="wrapper">
        <!-- Header Section -->
        <!-- Navbar -->
        @include('eaqly.header')
        <!-- /.navbar -->

        <!-- Main Content -->
        <main class="content-wrapper">
            @yield('content') <!-- Place for the content from other pages -->
        </main>

        <!-- Footer Section -->
        <footer class="footer">
            @include('eaqly.footer')
        </footer>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('slider.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    @stack('js') <!-- Custom JS Section -->
</body>

</html>
