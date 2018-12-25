<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-4.0.0/dist/css/bootstrap.min.css') }}" >

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap-4.0.0/assets/js/vendor/popper.min.js') }}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap-4.0.0/dist/js/bootstrap.min.js') }}"></script>



    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/javascript.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .menu ul{
            background: #3BA6D8;
        }
        .menu ul li {
            display: inline-block;
        }
        .menu ul li a{
            color: white;
            padding: 40px;
            font-size: 20px;
            text-decoration: none;
        }
    </style>


</head>
<body>

<div class="container">
    <div class=menu>
        <ul>
            <li><a href="{{url('/')}}">Danh mục </a></li>
            <li><a href="{{url('/product')}}" class="btn btn-success">Sản phẩm</a></li>
            <li><a href="{{url('/comment')}}">Bình luận</a></li>
        </ul>
    </div>
    <h1>@yield('title')</h1>
    <div class="row">
        <div class="col-sm-12">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
