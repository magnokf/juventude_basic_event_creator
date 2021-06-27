@extends('layouts.master')
<title>Não Confirmadas </title>

<!-- Content Header (Page header) -->
@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tabelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tabelas</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">

            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <p class="card-title text-red">Tabela de Inscrições <b>Não Confirmadas</b> </p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Data de Nascimento</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($not_confirmed as $i)
                            <tr>
                                <td>{{$i->name}}</td>
                                <td>{{$i->phone}}
                                </td>
                                <td>{{$i->email}}</td>
                                <td>{{$i->date_of_birth}}</td>
                                <td>{{$i->email_verified_at}}
                                    <form action="{{ route('event_one.destroy', $i->uuid)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a onclick="return alert('Deseja que essa inscrição seja CONFIRMADA MANUALMENTE?' +
                                         'Lembrando que não será possivel enviar e-mail de confirmação.')" class="btn btn-sm btn-primary mt-2" href="{{route('manual_confirmed', $i->uuid)}}">Confirmar Manualmente</a>



                                        <button name="destroy" class="btn btn-sm btn-danger mt-2" type="submit" onclick="return confirm('Deseja Excluir DEFINITIVAMENTE? IMPOSSÍVEL ser recuperada');">
                                            <i class="fa fa-trash-alt"></i>
                                            Excluir
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Data de Nascimento</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


@endsection

@push('js')
    <script>

        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [
                    "copy",
                    "csv",
                    "excel",
                    "pdf",
                    "print",
                    "colvis"],
                language: {
                    "lengthMenu": "Exibe _MENU_ registrados por página",
                    "search": "Pesquisar",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",


                    buttons: {
                        colvis: 'Visualizar Colunas',
                        print: 'Imprimir',
                        copy: 'Copiar',
                    }


                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush

