<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/tampilan.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css') }}" rel="stylesheet">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js') }}"></script>
     <!-- Tambahkan Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css') }}">
    <!-- SweetAlert2 -->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>


</head>
  <body>
    <x-navbar></x-navbar>
    {{-- <div class="container mt-5"> --}}
        {{ $slot }}
    {{-- </div> --}}
    
    <x-footer></x-footer>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/front.js') }}"></script>
  </body>
</html>