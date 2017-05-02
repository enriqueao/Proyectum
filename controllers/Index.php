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

    public function vistaProyecto(){
        $this->view->render($this,'vistaProyecto'); 
    }

    public function vistaSubirProyecto(){
        $this->view->render($this,'subirProyecto'); 
    }
}
?>