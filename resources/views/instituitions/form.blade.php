<div class="box-body">
        <div class='form-group'>
            @include('template.formulario.input',['label'=> 'Nome','class'=>'col-sm-1 control-label','input' => 'name', 'attributes' => ['placeholder'=> '','class'=> 'form-control']])

        </div>
    </div>
    <div class='box-footer'>
        @include('template.formulario.submit',['input' => 'Cadastrar', 'attributes'=> [ 'class'=> 'btn btn-info', 'required' => true]])
    </div>