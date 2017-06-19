<?php

class Publicaciones_model extends Model
{
	function __construct() {
		parent::__construct();
	}

	public function obtenerInfoPublicacion($idPublicacion){
		return $this->db->select('p.*, u.nombreCompleto, u.username','publicaciones p, usuarios u','p.idPublicacion='.$idPublicacion.' AND p.idUsuario=u.idUsuario');
	}

	public function tarjetasPublicacion($l1="",$l2=""){
		$limit="";
		if($l1!=""){
			$limit=" LIMIT ".$l1;
			if ($l2!="") {
				$limit.=",".$l2;
			}
		}
		return $this->db->select('idPublicacion, idCategoria, nombrePublicacion, descripcionCorta, media1','publicaciones','','fechaDePublicacion'.$limit);
	}

	public function subirPublicacion($idUsuario, $idCategoria, $nombrePublicacion, $descripcionCorta, $descripcionLarga, $imgs){
		$datos = array('idUsuario' => $idUsuario, 'idCategoria'=>$idCategoria, 'nombrePublicacion'=>$nombrePublicacion, 'descripcionCorta'=>$descripcionCorta, 'descripcionLarga'=>$descripcionLarga);
		$i = 1;
		for($a = 0; $a < $imgs;$a++) {
				$datos['media'.$i] = 'media_'.$i;
				$i+=1;
		}
		return $this->db->insert($datos,'publicaciones');
	}

	public function editarPublicacion($idPublicacion, $idCategoria, $nombrePublicacion, $descripcionCorta, $descripcionLarga){
		$datos = array('idCategoria'=>$idCategoria, 'nombrePublicacion'=>$nombrePublicacion, 'descripcionCorta'=>$descripcionCorta, 'descripcionLarga'=>$descripcionLarga);
		return $this->db->update($datos,'publicaciones', "idPublicacion = {$idPublicacion}");
	}

	public function idProyectoUser(){
		return $this->db->query('SELECT idPublicacion FROM publicaciones WHERE idUsuario = '.Session::getValue('idUsuario').' ORDER BY idPublicacion DESC LIMIT 1');
	}

	public function updateMedia($campo,$valor,$idProyecto){
		$data[$campo] = $valor;
		return $this->db->update($data,'publicaciones',"idPublicacion = {$idProyecto}");
	}

	public function eliminarPublicacion($idUsuario, $idPublicacion){
		$this->db->delete('vistas','idUsuario='.$idUsuario.' AND idPublicacion='.$idPublicacion);
		return $this->db->delete('publicaciones','idUsuario='.$idUsuario.' AND idPublicacion='.$idPublicacion);
	}

	public function comprabarPublicacion($idPublicacion){
		return $this->db->select('*','publicaciones',"idPublicacion={$idPublicacion}");
	}

}
?>
