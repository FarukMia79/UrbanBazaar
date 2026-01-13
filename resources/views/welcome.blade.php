<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- 1. GOOGLE FONTS ADDED HERE (For Roboto, Jost, Lato) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800;900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Fonts Bunny (Laravel Default) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- 2. Font Awesome Updated to Version 6 (Latest) for 'fa-solid' support -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- External Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <!-- 3. Flatpickr CSS moved to HEAD -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- FrontEnd CSS -->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/mobile-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/wsit-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/main.css') }}">
    

    <!-- BackEnd CSS -->
    <link rel="stylesheet" href="{{ asset('backEnd/assets/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backEnd/assets/css/styles.css') }}">

    <!-- ভুল লিঙ্কটি বাদ দিয়ে এটি বসান -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <!-- Vue App Mount Point -->
    <div id="content"></div>


    <!-- FrontEnd JS -->
    <script src="{{ asset('frontEnd/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/bootstrap.min.js') }}"></script>

    <!-- 4. Removed Duplicate Owl Carousel (kept only one) -->
    <script src="{{ asset('frontEnd/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('frontEnd/js/mobile-menu.js') }}"></script>
    <script src="{{ asset('frontEnd/js/wsit-menu.js') }}"></script>
    <script src="{{ asset('frontEnd/js/mobile-menu-init.js') }}"></script>
    <script src="{{ asset('frontEnd/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.syotimer.min.js') }}"></script>


    <script>
        new WOW().init();
    </script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Feather Icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script>
        feather.replace();
    </script>

    <!-- BackEnd toastr -->
    <script src="{{ asset('backEnd/assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('backEnd/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('backEnd/assets/js/datatables-simple-demo.js') }}"></script>
</body>

</html>