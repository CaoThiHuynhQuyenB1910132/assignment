<!DOCTYPE html>
<html lang="en">

<base href="/">
<head>
    <meta charset="utf-8">
    <title>Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <link rel="shortcut icon" href="admin1/assets/images/favicon.ico">
    <link href="admin1/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
    <link href="admin1/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="admin1/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="admin1/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @yield('style')
    @vite('resources/css/app.css')
    @livewireStyle
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

<div class="wrapper">
    @include('sweetalert::alert')
    @include('admin.layouts.side-bar')
    <div class="content-page">
        <div class="content">
            @include('admin.layouts.nav')
            @yield('content')
        </div>
    </div>
</div>

@yield('script')
@livewireScripts
<div class="rightbar-overlay"></div>
<script src="/path/or/uri/to/tinymce.min.js" referrerpolicy="origin"></script>
<script src="admin1/assets/js/vendor.min.js"></script>
<script src="admin1/assets/js/app.min.js"></script>
<script src="admin1/assets/js/vendor/apexcharts.min.js"></script>
<script src="admin1/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="admin1/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<script src="admin1/assets/js/pages/demo.dashboard.js"></script>
<!-- plugin js -->
<script src="assets/js/vendor/dropzone.min.js"></script>
<!-- init js -->
<script src="assets/js/ui/component.fileupload.js"></script>
</body>
</html>
