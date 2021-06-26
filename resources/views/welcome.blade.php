<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="theme-color" content="#e08021">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JuvApp</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('images/folder1.jpeg'))}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href=" {{asset('css/app.css')}}">
    <style>
        html, body {
            background-color: #073563;
            color: #e7d110;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;

        }
        a{
            color: #e7d110;

        }
        a:link {
            color: #e7d110;
            text-decoration: none;
        }

        a:hover {
            color: #e7d110;
            text-decoration: none;
        }


    </style>
</head>
<body>

<form class="form-signin">
    <div class="text-center mb-4">
        <img class="mb-4 img-fluid mt-3" src="{{asset('images/folder1.jpeg')}}" alt="">
        <h3 class="h3 mb-3 font-weight-normal">Juventude<b>App</b></h3>
{{--        <p>Construa campos de formulário usando labels flutuantes, através do pseudo-elemento <code>:placeholder-shown</code>. <a href="https://caniuse.com/#feat=css-placeholder-shown">Funciona nas últimas versões do Chrome, Safari e Firefox.</a></p>--}}
        @auth
            <a class="btn bg-gradient-yellow m-3" href="{{ url('/home') }}">Acesso Permitido : {{Auth::user()->name}}</a>
        @else
            <a class="p-1" href="{{ route('login') }}">Acesso Restrito</a>


        @endauth
    </div>
</form>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">







        </div>
    </div>
</div>
</body>
</html>
