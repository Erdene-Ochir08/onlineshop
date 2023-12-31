<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets\css\bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets\css\style.css') }}" rel="stylesheet">

    <!-- Owl Carousel -->
    <link href="{{ asset('assets\css\owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets\css\owl.theme.default.min.css') }}" rel="stylesheet">

    <!-- EXZOOM PROD IMAGE -->
    <link href="{{ asset('assets\exzoom\jquery.exzoom.css') }}" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


    @livewireStyles
</head>

<body>
<div id="app">

    @include('layouts.inc.frontend.navbar')
    <main>
        @yield('content')
    </main>
    @include('layouts.inc.frontend.footer')
</div>
<!-- Scripts -->
<script src="{{ asset('assets\js\bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets\js\jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('assets\exzoom\jquery.exzoom.js') }}"></script>


<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
    window.addEventListener('message', event => {
        alertify.set('notifier', 'position', 'top-right');
        alertify.notify(event.detail.text, event.detail.type);
    });
</script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      loop:true,
    });
  </script>

<script src="{{ asset('assets\js\owl.carousel.min.js') }}"></script>
@yield('script')

@livewireScripts
@stack('scripts')
</body>

</html>
