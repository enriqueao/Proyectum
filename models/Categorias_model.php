<?php

class Categorias_model extends Model
{
	function __construct() {
		parent::__construct();
	}

	public function obtenerCategorias(){
		return $this->db->select('*','categorias');
	}
}

?>