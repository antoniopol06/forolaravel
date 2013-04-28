<?php
class Tema extends Eloquent
{
	public static $table="temas";

	function get_created_at(){
		$fecha=$this->get_attribute("created_at");
		$fecha=DateTime::createFromFormat('Y-m-d H:i:s', $fecha);
		$fecha=$fecha->format('d-m-Y H:i:s');
		return $fecha;
	}

	public function usuario(){
		return $this->belongs_to('Usuario');
	}
}