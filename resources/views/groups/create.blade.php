@extends('template.master') 
@section('conteudo-view')


<section class="content-header">
    <h1>
        Grupo
        <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ route('instituitions.index')}}">grupos</a></li>
        <li class="active">novo grupo</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">



    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Novo grupo</h3>
        </div>

        {!! Form::open(['route'=> 'groups.store','method' => 'post', 'class'=>'form-horizontal']) !!}
    @include('groups.form')

        <div class='box-footer'>
    @include('template.formulario.submit',['input' => 'Cadastrar', 'attributes'=> [ 'class'=> 'btn btn-info', 'required' => true]])
        </div>
        {!! Form::close() !!}


    </div>
    <!-- /.box-body -->


    </div>




</section>
@endsection