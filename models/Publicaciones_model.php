<?php

class Publicaciones_model extends Model
{
	function __construct() {
		parent::__construct();
	}

	public function obtenerInfoPublicacion($idPublicacion){
		return $this->db->select('p.*, u.nombreCompleto, u.username','publicaciones p, usuarios u','p.idPublicacion='.$idPublicacion.' AND p.idUsuario=u.idUsuario');
	}
}

?>