<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="theme-color" content="#06BBF0">
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
                                <i class="fas fa-user-lock"></i> <a class="p-1" href="{{ route('login') }}">Acesso Restrito</a>


                            @endauth
                        </div>
                        <div class="row">
                            <div class="col mb-4 mt-4 text-center">

                                <i class="far fa-hand-point-right"></i> <a href="{{route('event_one.create')}}">Inscrições Abertas para o evento do dia 03/07/2021</a><br>
                                @if($total_confirmed_enrollments > 10)
                                    <i class="far fa-hand-point-right"></i><span class="text-center justify-content-center"> Já temos {{$total_confirmed_enrollments}}
                                 Inscrições Confirmadas.</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>




        </div>




</body>
</html>
