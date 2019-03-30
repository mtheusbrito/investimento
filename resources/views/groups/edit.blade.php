@extends('template.master') 
@section('conteudo-view')
<section class="content-header">
    <h1>
        Grupo
        <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="{{ route('groups.index') }}">grupos</a></li>
        <li class="active">grupo</li>
    </ol>
</section>


<!-- Main content -->
<section class="content container-fluid">



    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Atualizar grupo</h3>
        </div>

        {!! Form::model( $group, ['route'=> ['groups.update', $group->id],'method' => 'put', 'class'=>'form-horizontal']) !!}
    @include('groups.form')

        <div class='box-footer'>
    @include('template.formulario.submit',['input' => 'Atualizar', 'attributes'=> [ 'class'=> 'btn btn-info']])
        </div>
        {!! Form::close() !!}


    </div>


    </div>


</section>
@endsection