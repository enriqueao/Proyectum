<?php

class Usuario_model extends Model
{
	function __construct() {
		parent::__construct();
	}

	/**
	*	Función para verificar el estado de los valores para el inicio de sesión.
	*
	* @param String $idUsuario
	* @param String $password
	*
	* @return 0: La cuenta esta bloqueada.
	* 	1: Inicio de sesión exitoso.
	*	2: Inicio de sesión fallido.
	*	3: No se encontró el registro.
	*	4: Es la primera vez que se accesa a la cuenta.
	*/
	public function iniciarSesion($idUsuario,$password){

		$registro = $this->db->select('*', 'usuarios', "username='{$idUsuario}' OR correo='{$idUsuario}'");

		if( is_array($registro) ) {
				if( $registro['pass'] == Hash::create(ALGOR, $password,KEY)){
					$this->crearSesion($idUsuario);
					return 1;
				} else {
					return 2;
				}
		} else {
			return 2;
		}
	}

	public function registro($registro){
			if(isset($registro)){
				$pass = Hash::create(ALGOR, $registro[3],KEY);
				$data = array('nombrecompleto'=>$registro[0],'username'=>$registro[1],'correo'=>$registro[2],'pass'=>$pass);
				return $this->db->insert($data,'usuarios');
			}
	}
	private function crearSesion($idUsuario){
		$informacion = $this->db->select('*','usuarios',"username='{$idUsuario}' OR correo='{$idUsuario}'");
		Session::setValue('idUsuario', $informacion['idUsuario']);
		Session::setValue('imagenPerfil',$informacion['imgProfile']);
		Session::setValue('nombreUsuario', $informacion['nombrecompleto']);
		Session::setValue('username', $informacion['username']);
	}

	public function editarPerfil($datos, $idUsuario){
		if(isset($datos['pass'])){
			$datos['pass'] = Hash::create(ALGOR, $datos['pass'], KEY);
		}
		return($this->db->update($datos,'usuarios','idUsuario='.$idUsuario))?0:1;
	}

	public function revisarPass($idUsuario,$pass){
		$pass = Hash::create(ALGOR, $pass, KEY);
		$res = $this->db->select("idUsuario","usuarios","idUsuario=".$idUsuario." AND pass=".$pass);
		return(is_array($res))?0:1;
	}

	public function statusUsername($username){
		return $this->db->select('*','usuarios',"username='{$username}'");
	}

	public function publicacionesPerfil($username){
		$idUsuario = $this->db->select('idUsuario','usuarios',"username='{$username}'");
		return $this->db->selectStrict('*','publicaciones',"idUsuario='{$idUsuario['idUsuario']}'");
	}
}
?>
