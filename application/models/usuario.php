<?php
class Usuario extends Eloquent
{
	public static $table="usuarios";

	public function temas(){
		return $this->has_many('Tema');
	}
}