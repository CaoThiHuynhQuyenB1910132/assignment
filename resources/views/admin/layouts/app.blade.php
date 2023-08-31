<!DOCTYPE html>
<html lang="en">

<base href="/">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Fast Food Dashboard Template</title>
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="admin/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="admin/assets/css/feathericon.min.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="admin/assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    @yield('style')
    @vite('resources/css/app.css')
    @livewireStyle
</head>

<body class="loading"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>>
<div class="main-wrapper">
    @include('admin.layouts.nav-bar')

    @include('admin.layouts.side-bar')

    @include('sweetalert::alert')

    <div class="content-page">
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
</body>
<script src="admin/assets/js/jquery-3.5.1.min.js"></script>
<script src="admin/assets/js/popper.min.js"></script>
<script src="admin/assets/js/bootstrap.min.js"></script>
<script src="admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="admin/assets/plugins/raphael/raphael.min.js"></script>
<script src="admin/assets/plugins/morris/morris.min.js"></script>
<script src="admin/assets/js/chart.morris.js"></script>
<script src="admin/assets/js/script.js"></script>
@yield('script')
@livewireScripts

</html>
