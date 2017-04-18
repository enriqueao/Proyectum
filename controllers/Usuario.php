<?php 

class Usuario extends Controller{
    function __construct() {
        parent::__construct();

    }

    public function index(){
        if($this->sessionExist()){
            $this->view->render($this,'principal');
        }
    }
    
    public function iniciarSesion(){
        if(isset($_POST["username"], $_POST["password"]) ){
            $inicio = $this->model->iniciarSesion($_POST["username"], $_POST["password"]);
            echo $inicio;
            if($inicio == '1' || $inicio == '4'){
                $this->initLog($_POST['username'],1,$_POST['username'],'Inicio de Sesión');
            }
        }
    }

    /**
    * @author Enrique Aguilar Orozco
    *
    */
    public function updateImgPro(){
        if(isset($_FILES['imagen']) ){
          if ($_FILES['imagen']['size'] < 16777216) {
            $imagenType = $_FILES['imagen']['type'];
            if ($imagenType == "image/jpeg" || $imagenType == "image/jpg" || $imagenType == "image/png"){
                $ext     = explode(".", $_FILES['imagen']['name']); 
                $dir     = 'IMG_'.$this->getKeyImg(Session::getValue('idUsuario')).".".end($ext);
                $dirmove = "public/images/".$dir;

                $upload  = $this->comprimirImagenAndUpload($imagenType,$dirmove,$_FILES['imagen']['tmp_name']);
                if($upload){
                    $this->model->actualizarInformacion('imagen',$dir,Session::getValue('idUsuario'),'personas');
                    $this->deleteAnterior(Session::getValue('imagenPerfil'));
                    Session::setValue('imagenPerfil',$dir);
                } else {
                    echo '0';
                }
                echo ($upload) ? '1' : '0' ;
            } else {
                echo 2; //formato no admitido
            }
           } else {
               echo 'Tamaño Superado'; //tamaño superadoaaa
           }
        }
    }

    /**
    * @author Enrique Aguilar Orozco
    *
    */
    private function deleteAnterior($img){
        if(file_exists('./public/images/'.$img)){
            if($img != 'man.svg' && $img != 'girl.svg'){
                unlink('./public/images/'.$img);
            }
        }
    }

    public function perfil(){
        $this->view->render($this,'perfil');
    }
    
    public function cerrarSesion(){
        Session::destroy();
        $this->initLog(Session::getValue('idUsuario'),2,Session::getValue('idUsuario'),'Cierre de Sesión');
        header("location:".URL);
    }

}
?>