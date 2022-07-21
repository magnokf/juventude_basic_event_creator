@extends('layouts.master')

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
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                            <h3 class="card-title">Tabela de Inscrições Confirmadas</h3>
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
                                    <th>Idade (anos)</th>
                                    <th>Confirmada em:</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inscritos as $i)
                                <tr>
                                    <td>{{$i->name}}</td>
                                    <td>{{$i->phone}}
                                    </td>
                                    <td>{{$i->email}}</td>
                                    <td>{{date('d-m-Y', strtotime($i->date_of_birth))}}</td>
                                    <td>{{$i->idade}}</td>
                                    <td>{{$i->email_verified_at}}
                                        <form action="{{ route('event_one.destroy', $i->uuid)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a class="btn btn-sm btn-warning mt-2" href="{{route('event_one.edit', $i->uuid)}}">
                                                <i class="fa fa-pencil-alt"></i> Editar
                                            </a>

                                            <button class="btn btn-sm btn-danger mt-2" type="submit" onclick="return confirm('Deseja Excluir DEFINITIVAMENTE? IMPOSSÍVEL ser recuperada');">
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
                                    <th>Confirmada em:</th>
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
