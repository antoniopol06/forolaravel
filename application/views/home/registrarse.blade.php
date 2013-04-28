<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Foro realizado en Laravel</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('css/normalize.css') }}
	{{ HTML::style('css/estilo.css') }}
</head>
<body>
		<header id="inicio">
			<h1>Foro</h1>
			<h2>Realizado con el Framework Laravel</h2>
		</header>
		<section id="login">
			<section id="errores">
				@if($errors->has())
					{{ $errors->first('usuario') }}
					{{ $errors->first('password') }}
				@endif
			</section>
			{{ Form::open('/registrarse') }}

				 <!-- username field -->
				 <p>{{ Form::label('usuario', 'Usuario') }}</p>
				 <p>{{ Form::text('usuario', Input::old('usuario')) }}</p>

				 <!-- password field -->
				 <p>{{ Form::label('password', 'Password') }}</p>
				 <p>{{ Form::password('password') }}</p>

				 <!-- submit button -->
				 <p>{{ Form::submit('Registrarse') }}</p>

				 {{ Form::close() }}
		</section>
</body>
</html>