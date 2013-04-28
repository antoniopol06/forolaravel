<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{
	return View::make('home.index');
});

Route::get('/registrarse', function()
{
	return View::make('home.registrarse');
});


Route::post('/registrarse', function()
{
	$usuario=Input::get('usuario');
	$password=Input::get('password');
	$nuevoUsuario=array("usuario"=>$usuario,"password"=>$password);
	$reglas=array("usuario"=>"required|unique:usuarios,usuario|min:8", "password"=>"required|min:6");
	$mensajes=array("required"=>"El :attribute es obligatorio", 
					"min"=>"El :attribute tiene que tener al menos 6 carácteres", 
					"unique"=>"El :attribute ya existe y debe ser único");
	$validar=Validator::make($nuevoUsuario,$reglas,$mensajes);
	if($validar->passes())
	{
		$usuario=Input::get('usuario');
		$password=Input::get('password');
		$password=Hash::make($password);
		$nuevoUsuario=array("usuario"=>$usuario,"password"=>$password);
		DB::table('usuarios')->insert($nuevoUsuario);
	 	return Redirect::to('/');
	}else{
		return Redirect::to('/registrarse')->with_input()->with_errors($validar);
	}
	
});

Route::post('/login', function()
{
	$usuario=Input::get('usuario');
	$password=Input::get('pass');
	$datos=array("username"=>$usuario, "password"=>$password);
	if(Auth::attempt($datos))
	{
		return Redirect::to('/foro');
	}else{
		return Redirect::to('/')->with('errorLogin', true);
	}
});

Route::get('/login', function()
{
	return View::make('home.index');
});

Route::group(array("before"=>"auth"), function()
{
	Route::get('/foro', function()
	{
		$usuario=Auth::user();
		$temas=Tema::all(array("id","tema","created_at"));
		return View::make('foro.index')->with("temas",$temas)->with("usuario",$usuario);
	});

	Route::post('/enviar-tema', function(){
		$usuario_id=Input::get('usuario');
		$tema=Input::get('titulo');
		$texto=Input::get('texto');
		$url=Input::get('url');
		$nuevoTema=array("tema"=>$tema, "texto"=>$texto, "url"=>$url);
		Usuario::find($usuario_id)->temas()->insert($nuevoTema);
		return Redirect::to('/foro');
	});

});







/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});