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
        <div class="container">


                <div class="row">
                    <div class="col text-center">
                        <div class="mb-4 mt-4 text-center">
                            <img class="img-fluid rounded " src="{{asset('images/folder1.jpeg')}}" alt="">


                            <h3 class="h3 mb-3 mt-4 font-weight-normal">Juventude<b>App</b></h3>
                            @auth
                                <a class="btn bg-gradient-yellow m-3" href="{{ url('/home') }}">Acesso Permitido : {{Auth::user()->name}}</a>
                            @else
                                <a class="p-1" href="{{ route('login') }}">Acesso Restrito</a>


                            @endauth
                        </div>
                    </div>

                </div>




        </div>




</body>
</html>
