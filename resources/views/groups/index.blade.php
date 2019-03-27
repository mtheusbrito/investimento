@extends('template.master')
@section('conteudo-view')

<section class="content-header">
    <h1>
        Grupos
        <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">grupos</li>
    </ol>
</section>


<!-- Main content -->
<section class="content container-fluid">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
                <a href="{{ route('groups.create') }}" class='btn btn-info pull-right'>Adicionar</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="instituitionsDatatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Instituição</th>
                            <th>Responsavel</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                        <tr>
                            <td>{{$group -> name}}</td>
                            <td>{{$group -> instituition->name}}</td>
                            <td>{{$group -> owner->name}}</td>
                            
                            <td>
                                {!!Form::open(['route' => ['groups.destroy',$group -> id], 'method'=>'DELETE']) !!}
                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class'=> '']) !!}
                                {!! Form::close()  !!}
    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
    
                </table>
            </div>
        </div>
    </section>
@endsection 