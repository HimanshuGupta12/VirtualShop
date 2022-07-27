<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Horizontal Topbar Light | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('front/assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('front/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('front/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-topbar="light" data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('frontend.layout.header')

        @include('frontend.layout.navbar')

        @yield('content')

    </div>
    <!-- END layout-wrapper -->



    <!-- JAVASCRIPT -->
    <script src="{{ asset('front/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('front/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('front/assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('front/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ asset('front/assets/js/pages/dashboard.init.js') }}"></script>

    <script src="{{ asset('front/assets/js/app.js') }}"></script>
</body>

</html>
