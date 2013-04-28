<?php

class Temas {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('temas', function($tabla){
			$tabla->increments('id');
			$tabla->string('tema', 200);
			$tabla->text('texto');
			$tabla->timestamps();
			$tabla->string('url',200);
			$tabla->integer('usuario_id');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('temas');
	}

}