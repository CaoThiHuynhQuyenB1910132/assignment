<!DOCTYPE html>
<html lang="en">
<base href="/">
<head>
    <meta charset="utf-8">
    <title>Fast Food</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <link rel="shortcut icon" href="{{ asset('admin1/assets/images/favicon.ico') }}">
    <link href="{{ asset('admin1/assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin1/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin1/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{ asset('admin1/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style">
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="{{ asset('admin1/assets/js/yearpicker.css') }}" rel="stylesheet" type="text/css" id="dark-style">
    <script src="{{ asset('admin1/assets/js/yearpicker.js') }}"></script>
    @yield('style')
    @livewireStyle
</head>

<body class="loading" >

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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('admin1/path/or/uri/to/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script src="{{ asset('admin1/assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('admin1/assets/js/app.min.js') }}"></script>
<script src="{{ asset('admin1/assets/js/vendor/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin1/assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('admin1/assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('admin1/assets/js/pages/demo.dashboard.js') }}"></script>
<script src="{{ asset('admin1/assets/js/vendor/dropzone.min.js') }}"></script>
<script src="{{ asset('admin1/assets/js/ui/component.fileupload.js') }}"></script>
</body>
</html>
