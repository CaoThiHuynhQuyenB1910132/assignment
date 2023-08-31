<!DOCTYPE html>
<html>
<base href="/">
<head>
    <!-- Basic -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel="shortcut icon" href="client/assets/images/favicon.png" type="">
    <title> Feane </title>
    <link rel="stylesheet" type="text/css" href="client/assets/css/bootstrap.css"/>
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <!-- nice select  -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
          integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
          crossorigin="anonymous"/>
    <!-- font awesome style -->
    <link href="client/assets/css/font-awesome.min.css" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="client/assets/css/style.css" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="client/assets/css/responsive.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="client/new/images/icons/favicon.png" />

    <link rel="stylesheet" type="text/css" href="client/new/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="client/new/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="client/new/fonts/linearicons-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="client/new/vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="client/new/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="client/new/vendor/animsition/css/animsition.min.css">

    <link rel="stylesheet" type="text/css" href="client/new/vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="client/new/vendor/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="client/new/vendor/slick/slick.css">

    <link rel="stylesheet" type="text/css" href="client/new/vendor/lightbox2/css/lightbox.min.css">

    <link rel="stylesheet" type="text/css" href="client/new/vendor/perfect-scrollbar/perfect-scrollbar.css">

    <link rel="stylesheet" type="text/css" href="client/new/vendor/noui/nouislider.min.css">

    <link rel="stylesheet" type="text/css" href="client/new/vendor/slide100/slide100.css">

    <link rel="stylesheet" type="text/css" href="client/new/css/util.css">
    <link rel="stylesheet" type="text/css" href="client/new/css/main.css">
    @yield('styles')
    @livewireStyles
</head>

<body>
<div class="home">
    @include('client.layouts.nav')

    @include('sweetalert::alert')
    @yield('content')
</div>

@include('client.layouts.footer')
<script src="client/assets/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<script src="client/assets/js/custom.js"></script>
<script src="client/new/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="client/new/vendor/animsition/js/animsition.min.js"></script>
<script src="client/new/vendor/bootstrap/js/popper.js"></script>
<script src="client/new/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="client/new/vendor/select2/select2.min.js"></script>
<script src="client/new/vendor/daterangepicker/moment.min.js"></script>
<script src="client/new/vendor/daterangepicker/daterangepicker.js"></script>
<script src="client/new/vendor/slick/slick.min.js"></script>
<script src="client/new/js/slick-custom.js"></script>
<script src="client/new/vendor/parallax100/parallax100.js"></script>
<script src="client/new/vendor/lightbox2/js/lightbox.min.js"></script>
<script src="client/new/vendor/isotope/isotope.pkgd.min.js"></script>
<script src="client/new/vendor/sweetalert/sweetalert.min.js"></script>
<script src="client/new/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="client/new/vendor/noui/nouislider.min.js"></script>
<script src="client/new/vendor/slide100/slide100.js"></script>
<script src="client/new/js/slide100-custom.js"></script>
<script src="client/new/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script>


@yield('scripts')
@livewireScripts
</body>

</html>
