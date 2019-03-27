<label class='{{ $class ?? null }}'>{{ $label ??   $select ?? "Erro"}}</label> 
                <div class='col-md-10'>
                    {!! Form::select($select, $data ?? [] ,null,  ['class'=>"form-control select2", 'style'=>"width: 100%"] )!!}
                </div>


