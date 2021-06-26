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
        <div class="row">
            <div class="col mt-3">

            </div>
        </div>
        <div class="row">
            <div class="col text-center mt-3">
                <h3>Inscrição Confirmada com Sucesso!</h3>
                <a href="{{route('principal')}}">Voltar a juventude.app.br</a>
            </div>
        </div>
    </div>
@endsection
