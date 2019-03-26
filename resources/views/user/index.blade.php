@extends('template.master')
@section('conteudo-view')

<section class="content-header">
    <h1>
        Usuarios
        <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">usuários</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
            <a href="{{ route('users.create') }}" class='btn btn-info pull-right'>Adicionar</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cpf</th>
                        <th>Nascimento</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Permissão</th>
                        <th>Opções</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user -> name}}</td>
                        <td>{{$user -> cpf}}</td>
                        <td>{{$user -> birth}}
                        <td>{{$user -> phone}}</td>
                        <td>{{$user -> email}}</td>
                        <td>{{$user -> status}}</td>
                        <td>{{$user -> permission}}</td>
                        <td>
                            {!!Form::open(['route' => ['users.destroy',$user -> id], 'method'=>'DELETE']) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class'=> '']) !!}
                            {!! Form::close()  !!}

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>
@endsection 