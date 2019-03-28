@extends('template.master')
@section('conteudo-view')

<section class="content-header">
    <h1>
       {{ $instituition->name}}
        <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('instituitions.index')}}">instituições</a></li>
    <li class="active">detalhes</li>

    </ol>
</section>

<section class="content container-fluid">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Grupos </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

               
                <table id="instGroupsDatatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome do grupo</th>
                                <th>Responsavel</th>
                                <th>Opções</th>
        
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($instituition->groups as $group)
                            <tr>
                                <td>{{$group -> name}}</td>
                                <td>{{$group -> owner->name}}</td>
                        
                                <td>
                                    {{-- {!!Form::open(['route' => ['instituitions.destroy',$instituition -> id], 'method'=>'DELETE']) !!}
                                    <a href="{{ route('instituitions.show', $instituition->id) }}" type="button" class="btn btn-default btn-xs dt-edit" style="margin-right:10px;">
                                            <span class="fa fa-bars" aria-hidden="true"></span>
                                    </a>
                                    <a type="button" class="btn btn-default btn-xs dt-edit" style="margin-right:10px;">
                                        <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                                    </a>
                                   
                                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class'=> 'btn btn-default btn-xs dt-edit']) !!}
                                    {!! Form::close()  !!} --}}
        
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
        
                    </table>

            </div>
            
            
        </div>

</section>


@endsection
