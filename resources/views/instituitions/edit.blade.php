@extends('template.master') 
@section('conteudo-view')
<section class="content-header">
    <h1>
        Instituição
        <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="{{ route('users.index') }}">usuários</a></li>
        <li class="active">usuario</li>
    </ol>
</section>


<!-- Main content -->
<section class="content container-fluid">



    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Atualizar usuário</h3>
        </div>

        {!! Form::model( $instituition, ['route'=> ['instituitions.update', $instituition->id],'method' => 'put', 'class'=>'form-horizontal'])
        !!}
    @include('instituitions.form')

        <div class='box-footer'>
    @include('template.formulario.submit',['input' => 'Atualizar', 'attributes'=> [ 'class'=> 'btn btn-info']])
        </div>
        {!! Form::close() !!}


    </div>


    </div>


</section>
@endsection