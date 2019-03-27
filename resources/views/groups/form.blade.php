<div class="box-body">
    <div class='form-group'>
        @include('template.formulario.input',['label'=> 'Nome','class'=>'col-sm-1 control-label','input' => 'name', 'attributes' => ['placeholder'=> '','class'=> 'form-control']])

    </div>
    <div class='form-group'>
            @include('template.formulario.select',['label'=> 'Responsavel','class'=>'col-sm-1 control-label','select' => 'user_id', 'data'=>$user_list])

    </div>
    
    <div class='form-group'>
            @include('template.formulario.select',['label'=> 'Instituição','class'=>'col-sm-1 control-label','select' => 'instituition_id','data' => $instituition_list])

    </div>
</div>
