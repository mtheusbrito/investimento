@extends('template.master')
@section('conteudo-view')


<section class="content-header">
    <h1>
        Usuário
        <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">



    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Adicionar usuário</h3>
        </div>

        {!! Form::open(['method' => 'post', 'class'=>'form-horizontal']) !!}
        <div class="box-body">
            <div class='form-group'>
                @include('template.formulario.input',['label'=> 'CPF','class'=>'col-sm-1 control-label','input' => 'cpf', 'attributes' => ['placeholder'=> '','class'=> 'form-control']])

            </div>
            <div class='form-group'>
                @include('template.formulario.input',['label'=> 'Nome','class'=>'col-sm-1 control-label','input' => 'name', 'attributes' => ['placeholder'=> '','class'=> 'form-control']])

            </div>
            <div class='form-group'>
                @include('template.formulario.input',['label'=> 'Telefone','class'=>'col-sm-1 control-label','input' => 'phone', 'attributes' => ['placeholder'=> '','class'=> 'form-control']])

            </div>
            <div class='form-group'>
                @include('template.formulario.input',['label'=> 'Email','class'=>'col-sm-1 control-label','input' => 'email', 'attributes' => ['placeholder'=> '','class'=> 'form-control']])

            </div>
            <div class='form-group'>
                @include('template.formulario.password',['label'=> 'Senha','class'=>'col-sm-1 control-label','input' => 'password', 'attributes' => ['placeholder'=> '','class'=> 'form-control']])

            </div>
        </div>
        <div class='box-footer'>
            @include('template.formulario.submit',['input' => 'Cadastrar', 'attributes'=> [ 'class'=> 'btn btn-info']])
        </div>
        {!! Form::close() !!}


    </div>
    <!-- /.box-body -->


    </div>




</section>
@endsection 