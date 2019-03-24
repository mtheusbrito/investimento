<label class='{{ $class ?? null }}'>{{ $label ??   $input ?? "Erro"}}</label> 
                <div class='col-sm-10'>
                {!! Form::password($input, $attributes) !!}
                </div>


