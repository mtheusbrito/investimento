<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login | Investindo</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  </head>

  <body>
    <section id='conteudo-view' class="login">

      <h1>Investindo</h1>
      <h3>O nosso gerenciador de investimento</h3>
      <p>Acesse o sistema</p>
      {!! Form::open(['route'=> 'user.login', 'method' =>'post' ]) !!}



      {!! Form::text('username', null, ['class'=>'input', 'placeholder'=>"Usuário"]) !!}
      {!! Form::password('password', ['class'=>'input', 'placeholder'=>"Senha"]) !!}
      {!! Form::submit('Entrar') !!}

      {!! Form::close() !!}
    </section>
    <section id='apresentacao-view' class="apresentacao">
    </section>
  </body>
</html>
