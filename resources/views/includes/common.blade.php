<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <!-- Icons font CSS-->
    <link href="{{asset('public/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('public/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('public/css/main.css')}}" rel="stylesheet" media="all">
</head>
<body>

    @yield('content');

<!-- Jquery JS-->
<script src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>
<!-- Vendor JS-->
<script src="{{asset('public/vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('public/vendor/datepicker/moment.min.js')}}"></script>
<script src="{{asset('public/vendor/datepicker/daterangepicker.js')}}"></script>

<!-- Main JS-->
<script src="{{asset('public/js/global.js')}}"></script>

@stack('custom-js')

</body>

</html>
<!-- end document-->