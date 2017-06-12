<?php

class Index extends Controller{
    function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->loadOtherModel('Publicaciones');
        $tar = $this->Publicaciones->tarjetasPublicacion();
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

    public function proyecto($idPublicacion){
        $this->loadOtherModel('Vistas');
        $this->loadOtherModel('Publicaciones');
        $this->loadOtherModel('Comentarios');
        $this->view->comentarios=$this->Comentarios->obtenerComentariosPublicacion($idPublicacion);
        $this->view->vistas=$this->Vistas->obtenerVistasPublicacion($idPublicacion);
        $this->view->info=$this->Publicaciones->obtenerInfoPublicacion($idPublicacion);
        $this->view->tiposReacciones=$this->Comentarios->obtenerTiposDeReacciones();
        $reacciones=$this->Comentarios->obtenerReaccionesPublicacion($idPublicacion);
        $this->view->reacciones=$reacciones;
        $this->view->render($this,'proyecto');
    }

    public function registro(){
        $this->view->render($this,'registro');
    }
    
}
?>
