<!DOCTYPE html>

<base href="/">
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <head>
        <title>Fast Food</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
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

        <link rel="stylesheet" type="text/css" href="client/new/vendor/revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="client/new/vendor/revolution/css/navigation.css">
        <link rel="stylesheet" type="text/css" href="client/new/vendor/revolution/css/settings.css">

        <link rel="stylesheet" type="text/css" href="client/new/css/util.css">
        <link rel="stylesheet" type="text/css" href="client/new/css/main.css">
        <link rel="stylesheet" type="text/css" href="client/new/css/custom.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

        @stack('styles')
        @livewireStyles
    </head>
    <body class="animsition">

        <div class="home" >
            @php
                $categories = app('categories');
            @endphp
            @include('sweetalert::alert')
            @include('client.layouts.nav')

            @yield('content')
            <!-- Messenger Plugin chat Code -->
            <div id="fb-root"></div>

            <!-- Your Plugin chat code -->
            <div id="fb-customer-chat" class="fb-customerchat">
            </div>

            <script>
                var chatbox = document.getElementById('fb-customer-chat');
                chatbox.setAttribute("page_id", "172853315905140");
                chatbox.setAttribute("attribution", "biz_inbox");
            </script>

            <!-- Your SDK code -->
            <script>
                window.fbAsyncInit = function() {
                    FB.init({
                        xfbml            : true,
                        version          : 'v18.0'
                    });
                };

                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>

        </div>
        @include('client.layouts.footer')

        <div class="btn-back-to-top bg0-hov" id="myBtn">
                <span class="symbol-btn-back-to-top">
                    <span class="lnr lnr-chevron-up"></span>
                </span>
        </div>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <x-livewire-alert::scripts />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="client/new/vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="client/new/vendor/animsition/js/animsition.min.js"></script>

    <script src="client/new/vendor/bootstrap/js/popper.js"></script>
    <script src="client/new/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="client/new/vendor/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="client/new/vendor/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="client/new/vendor/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="client/new/vendor/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="client/new/vendor/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="client/new/vendor/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="client/new/vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="client/new/vendor/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="client/new/vendor/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="client/new/vendor/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="client/new/vendor/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="client/new/js/revo-custom.js"></script>

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

    <script src="client/new/js/main.js"></script>

    @stack('scripts')
        @livewireScripts
    </body>

</html>
