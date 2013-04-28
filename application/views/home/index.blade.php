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
			<form action="/login" method="post">
				@if(Session::has('errorLogin'))
					<p>El usuario o contraseña no son válidos</p>
				@endif
				<input type="text" name="usuario" id="usuario" placeholder="Nombre de Usuario"/>
				<br/>
				<input type="password" name="pass" id="pass" placeholder="Contraseña"/>
				<input type="submit" value="Entrar"/>
			</form>
		</section>
		<section id="registrarse">
			<a href="/registrarse" title="Registrarse">Registrarse</a>
		</section>
</body>
</html>
