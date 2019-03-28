@extends('template.master')
@section('conteudo-view')

<section class="content-header">
    <h1>
        {{$group->name}}
        <small><span>  <b>Instiruição:</b> {{ $group->instituition->name}}</span> / <span><b>Responsavel:</b>{{$group->owner->name}}</span></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
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
                        <table id="groupsDatatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Status</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($group->users as $user)
                                    <tr>
                                    <td>{{$user -> name}}</td>
                                    <td>{{$user -> email}}</td>
                                    <td>{{$user -> phone}}</td>
                                    <td>{{$user -> status}}</td>
                                    <td></td>



                                    </tr>
                                    @endforeach
                                </tbody>

                        </table>

                </div>
                
                
            </div>
    

</section>

@endsection 