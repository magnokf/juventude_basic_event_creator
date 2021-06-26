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
                    <img class="img-fluid" src="{{asset('images/folder1.jpeg)}}" alt="">
                    <h3 class="box-title">Verifique seu e-mail!!</h3>

                    <div class="box-body">

                        <p>Em alguns instantes você receberá por e-mail um link de <b>"Confirmação de Inscrição".</b></p>
                            <p>Verifique se há um link e faça lá a confirmação de sua inscrição.</p>
{{--                            Se você não recebeu--}}
{{--                            o e-mail,</p>--}}
{{--                            <form class="d-inline" method="POST" action="{{ route('confirmation_event', ['uuid'=>$uuid]) }}">--}}
{{--                                @csrf--}}
{{--                                <button type="submit" class="btn btn-link text-orange p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.--}}
{{--                            </form>--}}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

