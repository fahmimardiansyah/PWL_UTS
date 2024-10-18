<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Fashion Store') }}</title>

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    
    @stack('css') <!-- Custom CSS Section -->
</head>

<body>
    <div class="wrapper">
        <!-- Header Section -->
        <!-- Navbar -->
        @include('layouts.header')
        <!-- /.navbar -->

        <!-- Main Content -->
        <main class="content-wrapper">
            @yield('content') <!-- Place for the content from other pages -->
        </main>

        <!-- Footer Section -->
        <footer class="footer">
            @include('layouts.footer')
        </footer>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    @stack('js') <!-- Custom JS Section -->
</body>

</html>
