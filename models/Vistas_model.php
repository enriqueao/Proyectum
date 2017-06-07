<?php

class Vistas_model extends Model
{
	function __construct() {
		parent::__construct();
	}

	public function obtenerVistasPublicacion($idPublicacion){
		return $this->db->select('count(idVista)','vistas','idPublicacion='.$idPublicacion);
	}
}

?>