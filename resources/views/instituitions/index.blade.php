@extends('template.master')
@section('conteudo-view')

<section class="content-header">
    <h1>
        Instituições
        <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">instituições</li>
    </ol>
</section>


<!-- Main content -->
<section class="content container-fluid">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
                <a href="{{route('instituitions.create')}}" class='btn btn-info pull-right'>Adicionar</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <table id="instituitionsDatatable" class="table table-bordered table-striped" width="100%"></table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
@endsection 