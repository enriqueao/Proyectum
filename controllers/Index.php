<?php

class Index extends Controller{
    function __construct() {
        parent::__construct();
    }

    public function index(){
        if(Session::exist()){
            header("location:".URL."Usuario/");
        }else{
           $this->view->render($this,'principal');
        }
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
        if (!is_array($reacciones)){
            $reac=array();
        }
        elseif (isset($reacciones['num'])) {
            $reac=array( $reacciones['reaccion']=> $reacciones['num']);
        }
        else{
            $reac=array();
            foreach ($reacciones as $r) {
                $reac[$r['reaccion']]=$r['num'];
            }
        }
        $this->view->reacciones=$reac;
        $this->view->render($this,'proyecto');
    }

    public function registro(){
        $this->view->render($this,'registro');
    }
}
?>
