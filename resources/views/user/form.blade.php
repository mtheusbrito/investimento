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