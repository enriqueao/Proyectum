<?php

class Vistas_model extends Model
{
	function __construct() {
		parent::__construct();
	}

	public function obtenerVistasPublicacion($idPublicacion){
		return $this->db->select('count(idVista) as num','vistas','idPublicacion='.$idPublicacion);
	}
	public function registrarVista($idPublicacion, $idUsuario=null){
		if (is_null($idUsuario)) {
			$this->db->insert(array('idPublicacion' => $idPublicacion),'vistas');
		}else{
			$r = $this->db->select('count(idUsuario) as num','vistas','idUsuario='.$idUsuario.' AND idPublicacion='.$idPublicacion);
			if ($r['num']==0) {
				$this->db->insert(array('idPublicacion' => $idPublicacion, 'idUsuario' => $idUsuario),'vistas');
			}
		}
		
	}
}

?>