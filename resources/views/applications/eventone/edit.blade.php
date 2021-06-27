@extends('layouts.master')

<!-- Content Header (Page header) -->
@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Atualizar Inscrição</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Atualizar Inscrição</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <form method="POST" action="{{ route('event_one.update', [$eventOne->uuid]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
<div class="row">
    @foreach ($errors->all() as $message)
        <span class="badge badge-danger"><i class="fa fa-check"></i> ATENÇÃO: {{$message}}</span>

    @endforeach
            <div class="col-12">
                <button type="submit" class="btn btn-success">Atualizar Inscrição</button>

            </div>
            <div class="col-12 col-lg-6">
                <label for="">Nome:</label>
                <input type="text" name="name" value="{{$eventOne->name ?? ''}}" class="form-control">
                <label for="">E-mail:</label>
                <input type="email" name="email" value="{{$eventOne->email ?? ''}}" class="form-control">
                <label for="">Telefone:</label>
                <input type="text" name="phone" value="{{$eventOne->phone ?? ''}}" class="form-control">
            </div>
            <div class="col-12 col-lg-6">
                <label for="">Data de Nascimento:</label>
                <input type="date" name="date_of_birth" value="{{$eventOne->date_of_birth ?? ''}}" class="form-control">
                <label for="">Data de Confirmação:</label>
                <input type="text" name="email_verified_at" value="{{$eventOne->email_verified_at ?? ''}}" class="form-control" readonly>

            </div>

</div>
    </form>
@endsection
