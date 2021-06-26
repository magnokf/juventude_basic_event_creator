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
        @foreach ($errors->all() as $message)
            <span class="badge badge-danger"><i class="fa fa-check"></i> ATENÇÃO: {{$message}}</span>

        @endforeach
            <form method="POST" action="{{route('event_one.store')}}" enctype="multipart/form-data" >
                @csrf
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h3>Formulário de Inscrição</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <img class="img-fluid" src="{{asset('images/folder1.jpeg')}}" alt="">
                </div>
                <div class="col-12 col-lg-8">
                    <label class="">Nome:</label>
                    <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" value="{{old('name') ?? ''}}" >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="hidden" name="ip_address" value="{{$_SERVER['REMOTE_ADDR']}}">
                    <label for="">Telefone para Contato:</label>
                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone') ?? ''}}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <label for="">E-mail:</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email') ?? ''}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <label for="">Data de Nascimento:</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{old('date_of_birth') ?? ''}}" >
                    @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br>
                    <input type="submit" value="Salvar" class="btn btn-success px-5 mr-5">
                    <input type="reset" value="Limpar" class="btn btn-danger">

                </div>

            </div>

        </form>
    </div>
@endsection
