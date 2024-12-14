<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>@section('title')Blog |@show</title>
    <link rel="shortcut icon" href="{{ asset('assets/blog/img/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/blog/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/blog/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/blog/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/blog/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/blog/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/blog/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}"
>
</head>

<body>
    @yield('content')

    <a href="#" class="scroll_top">SCROLL TO TOP<span></span></a>
    <script src="{{ asset('assets/blog/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/blog/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/blog/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/blog/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/blog/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/blog/js/main.js') }}"></script>
</body>

</html>