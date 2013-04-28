<?php

class Usuarios {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//codigo para crear la tabla de usuarios
		Schema::create('usuarios', function($tabla){
			$tabla->increments('id');
			$tabla->string('usuario', 50);
			$tabla->string('password',200);
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//codigo para eliminar la tabla
		Schema::drop('usuarios');
	}

}