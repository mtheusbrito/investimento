@extends('template.master')
@section('conteudo-view')

<section class="content-header">
    <h1>
        Usuarios
        <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">usuários</li>
    </ol>
</section>

<section class="content container-fluid">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
            <a href="{{ route('users.create') }}" class='btn btn-info pull-right'>Adicionar</a>
        </div>
      
        <div class="box-body">
        <table id="usersDatatable" class="table table-bordered table-striped" width="100%"></table>
        </div>
      
    </div>
</section>
@endsection
