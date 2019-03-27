@extends('template.master')
@section('conteudo-view')


<section class="content-header">
    <h1>
        Instituição
        <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('instituitions.index')}}">instituições</a></li>
        <li class="active">nova instutuição</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">



    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Nova Instituição</h3>
        </div>
        
        {!! Form::open(['route'=> 'instituitions.store','method' => 'post', 'class'=>'form-horizontal']) !!}
       
        @include('instituitions.form')
        {!! Form::close() !!}


    </div>
    <!-- /.box-body -->


    </div>




</section>
@endsection 