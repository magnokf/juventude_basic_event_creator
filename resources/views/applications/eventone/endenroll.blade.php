@extends('layouts.appold')
@push('styles')
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
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">

            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" col-12 col-md-7" style="margin-top: 2%">
                <div class="box">
                    <a href="{{route('principal')}}"><img class="img-fluid" src="{{asset('images/folder1.jpeg')}}" alt=""></a>
                    <h3 class="box-title">Incrições estão encerradas!!</h3>

                    <div class="box-body">

                        <p>Aguarde pelo próximo evento!!! <b>"Obrigado pela compreensão".</b></p>
                        <a href="{{route('principal')}}">Voltar para a página principal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

