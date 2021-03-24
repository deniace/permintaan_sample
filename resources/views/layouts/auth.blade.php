<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="laravel">
    <meta name="author" content="Deni ace">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="icon" href="{{asset("img/logo.jpeg")}}">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{url("assets/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{url("css/sb-admin-2.min.css")}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
{{-- <body class="" style="background-image: url({{url("img/bluer.jpg")}}); background-size: 100% 100%"> --}}

    @yield('container')

    <!-- Bootstrap core JavaScript-->
    <script src="{{url("assets/jquery/jquery.min.js")}}"></script>
    <script src="{{url("assets/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url("assets/jquery-easing/jquery.easing.min.js")}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url("js/sb-admin-2.min.js")}}"></script>

</body>

</html>