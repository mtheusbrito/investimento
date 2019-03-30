@extends('template.master')
@section('conteudo-view')

<section class="content-header">
    <h1>
        {{$group->name}}
        <small><span>  <b>Instiruição:</b> {{ $group->instituition->name}}</span> / <span><b>Responsavel:</b>{{$group->owner->name}}</span></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
    <li><a href='{{ route('groups.index')}}'>grupos</a></li>
    <li class="active">integrantes</li>

    </ol>
</section>

<section class="content container-fluid">

        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Usuários</h3>
           
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-iline">
                    {!! Form::open([ 'route'=> ['groups.user.store', $group->id],'method'=> 'post', 'class'=> 'form-horizontal']) !!}
                    <div class='form-group'>
                            @include('template.formulario.select',['label'=> '',
                            'select' => 'user_id', 
                            'data'=>$users] )

                    </div>
                   
                    @include('template.formulario.submit',['input' => 'Adicionar', 'attributes'=> [ 'class'=> 'btn btn-success', 'required' => true]])
                  
                    {!! Form::close() !!}

                </div>
                  
            </div>
            
            
        </div>
        <div class="box">
                <div class="box-header">
                <h3 class="box-title">Membros do grupo</h3>
                <h4></h4>
                </div>
                
                <div class="box-body">
                <table id="membersDatatable" data-id-group="{!!$group->id!!}"class="table table-bordered table-striped" width="100%"></table>

                </div>
                
                
            </div>
    

</section>

@endsection 