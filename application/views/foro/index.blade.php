<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Foro realizado en Laravel</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('css/normalize.css') }}
	{{ HTML::style('css/estilo.css') }}
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="//forolaravel/js/funciones.js"></script>
</head>
<body>
		<header id="inicio">
			<h1>Foro</h1>
			<h2>Bienvenido {{$usuario->usuario}}</h2>
		</header>
		<section id="nuevotema">
			<form action="/enviar-tema" method="post">
				<input type="text" id="titulo" name="titulo" placeholder="Título">
				<input type="text" readonly="readonly" id="url" name="url" placeholder="URL">
				<input type="hidden" id="usuario" name="usuario" value="{{$usuario->id}}"/>
				<textarea id="texto" name="texto" placeholder="Texto"></textarea>
				<input type="submit"/>
			</form>
		</section>
		<section id="temas">
			@if($temas)
				@foreach($temas as $tema)
					<section class="tema">
						<p>{{ $tema->tema }}</p>
						<span>Creado {{$tema->created_at}}</span>
					</section>
				@endforeach
			@else
				<section class="tema">Actualmente no hay temas</section>
			@endif
			
		</section>
</body>
</html>