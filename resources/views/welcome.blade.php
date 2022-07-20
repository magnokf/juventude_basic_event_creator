<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="theme-color" content="#06BBF0">
    <meta charset="utf-8">
    <title>JuvApp</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favico.png')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href=" {{asset('css/app.css')}}">



    <style>
        html, body {
            background-color: #073563;
            color: #e7d110;
            font-family: 'Nunito', sans-serif;
            font-weight: 500;
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
                            <div class="col mb-5 mt-5 text-center">
                                @if($today_date <= $deadline)
                                    @if($total_confirmed_enrollments < 500)
                                        <i class="far fa-hand-point-right"></i>
                                        <a class="p-2" href="{{url('/eventone')}}">Inscrições Abertas para o evento do dia 31/07/2022</a>
                                        <i class="far fa-hand-point-left"></i>
                                        <br>

                                    @endif
{{--                                    @if($total_confirmed_enrollments >= 100)--}}

{{--                                        <span class="text-center text-red justify-content-center">--}}
{{--                                                              <h4> <i class=" text-red far fa-hand-point-right"></i> Inscrições estão ENCERRADAS!!!</h4>--}}
{{--                                                                <subtille>Aguarde o próximo evento.</subtille>--}}
{{--                                                            </span>--}}
{{--                                    @endif--}}
{{--                                    @if($total_confirmed_enrollments > 95 && $total_confirmed_enrollments <= 99 )--}}

{{--                                        <span class="text-center text-white justify-content-center m-2">--}}
{{--                                                            <a class="text-white" href="{{url('/eventone')}}"> <h4> <i class=" text-white far fa-hand-point-right"></i>  Últimas Vagas!!!</h4>--}}
{{--                                            <subtitle>Só temos 100 vagas.</subtitle>--}}
{{--                                                            </a>--}}

{{--                                                            </span>--}}
{{--                                    @endif--}}

{{--                                    @if($total_confirmed_enrollments > 10)--}}
{{--                                        <div class="m-3">--}}
{{--                                            <i class="far fa-thumbs-up"></i><span class=" p-3 text-center justify-content-center"> Já temos {{$total_confirmed_enrollments}}--}}
{{--                                         Inscrições Confirmadas.</span>--}}
{{--                                        </div>--}}

{{--                                    @endif--}}
                                @else
                                    <div class="m-3">
                                        <i class="fa fa-ban"></i><span class=" p-1 text-center justify-content-center">
                                         As Inscrições estão encerradas.</span>
                                    </div>
                                @endif









                            </div>
                        </div>
                    </div>

                </div>
        </div>




</body>
</html>
