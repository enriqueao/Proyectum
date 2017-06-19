<?php

class Index extends Controller{
    function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->loadOtherModel('Publicaciones');
        $tar = $this->Publicaciones->tarjetasPublicacion(9);
        if (!is_array($tar)){
            $tar = null;
        }
        elseif (isset($tar['idPublicacion'])) {
            $tar['vistas'] = $this->vistasTarjeta($tar['idPublicacion']);
            $tar['reacciones'] = $this->reaccionesTarjeta($tar['idPublicacion']);
        }
        else{
            foreach ($tar as &$t) {
                $t['vistas'] = $this->vistasTarjeta($t['idPublicacion']);
                $t['reacciones'] = $this->reaccionesTarjeta($t['idPublicacion']);
            }
        }
        $this->view->tarjetas = $tar;
        $this->view->render($this,'principal');
    }
        //Obtiene el número de vistas de cada tarjeta
        private function vistasTarjeta($idP){
            $this->loadOtherModel('Vistas');
            return $this->Vistas->obtenerVistasPublicacion($idP);
        }
        //Obtiene el número de reacciones de cada tarjeta
        private function reaccionesTarjeta($idP){
            $this->loadOtherModel('Comentarios');
            return $this->Comentarios->obtenerReaccionesPublicacion($idP);
        }
    public function proyectos(){
        $this->loadOtherModel('Publicaciones');
        $tar = $this->Publicaciones->tarjetasPublicacion(6);
        if (!is_array($tar)){
            $tar = null;
        }
        elseif (isset($tar['idPublicacion'])) {
            $tar['vistas'] = $this->vistasTarjeta($tar['idPublicacion']);
            $tar['reacciones'] = $this->reaccionesTarjeta($tar['idPublicacion']);
        }
        else{
            foreach ($tar as &$t) {
                $t['vistas'] = $this->vistasTarjeta($t['idPublicacion']);
                $t['reacciones'] = $this->reaccionesTarjeta($t['idPublicacion']);
            }
        }
        $this->view->tarjetas = $tar;
        $this->view->render($this,'proyectos');
    }
    public function cargarMas(){
        $this->loadOtherModel('Publicaciones');
        $tar = $this->Publicaciones->tarjetasPublicacion($_POST['desde'],$_POST['saltos']);
        if (!is_array($tar)){
            $tar = null;
        }
        elseif (isset($tar['idPublicacion'])) {
            $tar['vistas'] = $this->vistasTarjeta($tar['idPublicacion']);
            $tar['reacciones'] = $this->reaccionesTarjeta($tar['idPublicacion']);
        }
        else{
            foreach ($tar as &$t) {
                $t['vistas'] = $this->vistasTarjeta($t['idPublicacion']);
                $t['reacciones'] = $this->reaccionesTarjeta($t['idPublicacion']);
            }
        }
        echo $this->tarjetas($tar);
    }

    function tarjetas($t){
        $s="";
            if (!is_array($t)){
                return $s;
            }
            elseif (isset($t['idPublicacion'])) {
                return $this->formatoTarjeta($t);
            }
            else{
                foreach ($t as $ta) {
                    $s.=$this->formatoTarjeta($ta);
                }
                return $s;
            }
    }

    function formatoTarjeta($t){
                $coments = 0;
                if (!is_null($t['reacciones'])) {
                    foreach ($t['reacciones'] as $v) {
                        $coments+=(int)$v;
                    }
                }
                $e = isset($t['reacciones']['Excelente'])?$t['reacciones']['Excelente']:'0';
                $b = isset($t['reacciones']['Bueno'])?$t['reacciones']['Bueno']:'0';
                $r = isset($t['reacciones']['Regular'])?$t['reacciones']['Regular']:'0';
                $m = isset($t['reacciones']['Malo'])?$t['reacciones']['Malo']:'0';
                $w = isset($t['reacciones']['Wacala'])?$t['reacciones']['Wacala']:'0';

                return '
                <div class="proyecto">
                <img src="'.IMG.$t['media1'].'">
                <h3>'.$t['nombrePublicacion'].'</h3>
                <p>'.$t['descripcionCorta'].'</p>
                <div class="detalles-proyecto">
                    <div class="icono-detalles">
                        <img src="'.IMG.'eye.svg">
                        <p>'.$t['vistas']['num'].'</p>
                    </div>
                    <div class="icono-detalles">
                        <img src="'.IMG.'mensajes.svg">
                        <p>'.$coments.'</p>
                    </div>
                    <div class="icono-detalles">
                        <img src="'.IMG.'/reacciones/excelente.svg">
                        <p>'.$e.'</p>
                    </div>
                    <div class="icono-detalles">
                        <img src="'.IMG.'/reacciones/bien.svg">
                        <p>'.$b.'</p>
                    </div>
                    <div class="icono-detalles">
                        <img src="'.IMG.'/reacciones/regular.svg">
                        <p>'.$r.'</p>
                    </div>
                    <div class="icono-detalles">
                        <img src="'.IMG.'/reacciones/malo.svg">
                        <p>'.$m.'</p>
                    </div>
                    <div class="icono-detalles">
                        <img src="'.IMG.'/reacciones/wacala.svg">
                        <p>'.$w.'</p>
                    </div>
                    <div class="icono-detalles-ver">
                        <a href="'.URL.'Index/proyecto/'.$t['idPublicacion'].'">Ver Más</a>
                    </div>
                </div>
            </div>';
            }

    public function proyecto($idPublicacion){
        $this->loadOtherModel('Comentarios');
        $this->loadOtherModel('Vistas');
        $this->loadOtherModel('Publicaciones'); 
        $this->view->info=$this->Publicaciones->obtenerInfoPublicacion($idPublicacion);
        if(!is_array($this->view->info)){
            header("Location: ".URL);
        }
        if (Session::exist()) {
            $this->view->username = Session::getValue('username');
            $this->view->nombreCompleto = Session::getValue('nombreUsuario');
            $this->view->yaComentado=$this->Comentarios->yaComentado(Session::getValue('idUsuario'),$idPublicacion);
            $this->Vistas->registrarVista($idPublicacion,Session::getValue('idUsuario'));
        }else{
            $this->Vistas->registrarVista($idPublicacion);
        }
        $this->view->comentarios=$this->Comentarios->obtenerComentariosPublicacion($idPublicacion);
        $this->view->vistas=$this->Vistas->obtenerVistasPublicacion($idPublicacion);
        $this->view->tiposReacciones=$this->Comentarios->obtenerTiposDeReacciones();
        $reacciones=$this->Comentarios->obtenerReaccionesPublicacion($idPublicacion);
        $this->view->reacciones=$reacciones;
        $this->view->render($this,'proyecto');
    }

    public function registro(){
        if (Session::exist()) {
            header("Location: ".URL);
        }
        $this->view->render($this,'registro');
    }

}
?>
