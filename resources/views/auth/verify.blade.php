@extends('layouts.appold')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">

            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" col-12 col-md-7" style="margin-top: 2%">
                <div class="box">
                    <img class="img-fluid" src="{{asset('storage/img/folder1.jpeg')}}" alt="">
                    <h3 class="box-title">Verifique seu e-mail!!</h3>

                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">Um novo link de verificação foi enviado para
                                seu endereço de e-mail
                            </div>
                        @endif
                        <p>Antes de prosseguir, verifique se há um link de verificação em seu e-mail. Se você não recebeu
                            o e-mail,</p>
                        <a href="{{ route('verification.resend') }}">clique aqui para solicitar outro</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
