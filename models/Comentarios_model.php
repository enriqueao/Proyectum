<?php

class Comentarios_model extends Model
{
	function __construct() {
		parent::__construct();
	}

	public function obtenerComentariosPublicacion($idPublicacion){
		return $this->db->select('c.*, t.img, u.nombrecompleto, u.username','comentarios c, tiposreacciones t, usuarios u','c.idPublicacion='.$idPublicacion.' AND t.idTipoReaccion=c.idTipoReaccion AND u.idUsuario=c.idUsuario');
	}
	public function obtenerReaccionesPublicacion($idPublicacion){
		return $this->db->select('count(c.idTipoReaccion) as num, t.reaccion','comentarios c, tiposreacciones t','c.idPublicacion='.$idPublicacion.' AND t.idTipoReaccion=c.idTipoReaccion GROUP BY c.idTipoReaccion',"c.idTipoReaccion");
	}
	
	public function obtenerTiposDeReacciones(){
		return $this->db->select('*','tiposreacciones');
	}

	public function comentar($idUsuario, $idPublicacion, $comentario, $idTipoReaccion){
		$datos = array('idUsuario' => $idUsuario, 'idPublicacion' => $idPublicacion, 'comentario' => $comentario, 'idTipoReaccion' => $idTipoReaccion);
		 if($this->db->insert($datos,'comentarios')){
		 	return 0;
		 }
		 else{
		 	return 1;
		 }
	}
}

?>