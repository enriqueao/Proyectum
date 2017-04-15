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
		
		$registro = $this->db->select('*', 'usuarios', "folio='".$idUsuario."'");

		if( is_array($registro) ) {
			if( $registro['status'] == 1 ){
				if( $registro['pass'] == Hash::create(ALGOR, $password,KEY)){
					$this->db->query("CALL resetIntentos($idUsuario);");
					$this->menuGenerar($registro['folio']);
					$this->crearSesion($idUsuario, $registro['idTipoUsuario']);
					if( $registro['inicial'] == 0) {
						return 1;
					} else {
						return 4;
					}
				} else {
					//	$resultado = $this->db->query("CALL intentosFallidos($idUsuario);");
					return 2;
				}
			} else {
				return 0;
			}
		} else {
			return 3;
		}
	}


	public function actualizarPassword($idUsuario, $password){
		$data['IdUsuario'] = $curp;
		return $this->db->insert($data,'persona');
	}
}
?>