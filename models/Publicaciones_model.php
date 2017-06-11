<?php

class Publicaciones_model extends Model
{
	function __construct() {
		parent::__construct();
	}

	public function obtenerInfoPublicacion($idPublicacion){
		return $this->db->select('p.*, u.nombreCompleto, u.username','publicaciones p, usuarios u','p.idPublicacion='.$idPublicacion.' AND p.idUsuario=u.idUsuario');
	}

	public function subirPublicacion($idUsuario, $idCategoria, $nombrePublicacion, $descripcionCorta, $descripcionLarga, $imgs){
		$datos = array('idUsuario' => $idUsuario, 'idCategoria'=>$idCategoria, 'nombrePublicacion'=>$nombrePublicacion, 'descripcionCorta'=>$descripcionCorta, 'descripcionLarga');
		$i = 1;
		foreach ($imgs as $img) {
			if ($img!="") {
				$datos['media'.$i]="proyectos/".$img;
				$i+=1;
			}
		}
		return ($this->db->insert($datos,'publicaciones'))?0:1;
	}
}

?>