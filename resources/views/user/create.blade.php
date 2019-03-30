@extends('template.master')
@section('conteudo-view')


<section class="content-header">
    <h1>
        Usuário
        <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ route('users.index') }}">usuários</a></li>
        <li class="active">novo usuário</li>
        
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">



    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Novo usuário</h3>
        </div>

        {!! Form::open(['route'=> 'users.store','method' => 'post', 'class'=>'form-horizontal']) !!}
        @include('user.form')

        <div class='box-footer'>
                @include('template.formulario.submit',['input' => 'Cadastrar', 'attributes'=> [ 'class'=> 'btn btn-info']])
            </div>
        {!! Form::close() !!}


    </div>


    </div>




</section>
@endsection 