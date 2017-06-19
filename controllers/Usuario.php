<?php

class Usuario extends Controller{
    function __construct() {
        parent::__construct();
    }

    public function index(){
      $this->perfil();
    }

    public function iniciarSesion(){
        if(isset($_POST["username"], $_POST["password"]) ){
            echo $this->model->iniciarSesion($_POST["username"], $_POST["password"]);
        }
    }

    public function registro(){
      if(!$this->sessionExist()){
        if(isset($_POST['nombrecompleto'],$_POST['username'],$_POST['correo'])){
          if($this->checkStatusUsername($_POST['username'])){
            $registro = array($_POST['nombrecompleto'],$_POST['username'],$_POST['correo'],$_POST['pass'],$_POST['descripcion']);
            echo $this->model->registro($registro);
          } else {
            echo '0';
          }
        }
      }
    }

    /**
    * @author Enrique Aguilar Orozco
    *
    */
    public function updateImgPro(){
        if(isset($_FILES['images']) ){
          if ($_FILES['images']['size'] < 16777216) {
            $imagenType = $_FILES['images']['type'];
            if ($imagenType == "image/jpeg" || $imagenType == "image/jpg" || $imagenType == "image/png"){
                $ext     = explode(".", $_FILES['images']['name']);
                $dir     = 'IMG_'.$this->getKeyImg(Session::getValue('idUsuario')).".".end($ext);
                $dirmove = "public/images/".$dir;

                $upload  = $this->comprimirImagenAndUpload($imagenType,$dirmove,$_FILES['images']['tmp_name']);
                if($upload){
                    $this->model->actualizarInformacion('imgProfile','usuarios/'.$dir,Session::getValue('idUsuario'),'usuarios');
                    $this->deleteAnterior(Session::getValue('imagenPerfil'));
                    Session::setValue('imagenPerfil',$dir);
                    echo 1;
                } else {
                    echo '0';
                }
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
        if(file_exists('./public/images/usuarios/'.$img)){
            if($img != 'user.svg'){
                unlink('./public/images/usuarios/'.$img);
            }
        }
    }

    /**
    * @author Enrique Aguilar Orozco
    *
    */
    private function getKeyImg($cuenta){
        $key = implode(getDate());
        $key.=$cuenta;
        $ran = rand(1,6);
        for ($i=0; $i < $ran; $i++) {
            $key = base64_encode($key);
        }
        $key = substr($key,5,40);
        return $key;
    }

    public function perfil($user = ''){
      $username = ($user == '') ? Session::getValue('username') : $user ;
      if($this->perfilExist($username)){
          $this->view->publicaciones = $this->publicacionesPerfil($username);
          $this->view->datos = $this->model->statusUsername($username);
          $this->view->proyectoDestacado = $this->model->proyectoDestacado($username);
          $this->view->proyectoMasVisto = $this->model->proyectoMasVisto($username);
          $this->view->perfilDestacado = $this->model->perfilDestacado();
          $this->view->numUsers = $this->model->numUsers();
          $this->view->numVistas = $this->model->numVistas();
          $this->view->numProyectos = $this->model->numProyectos();

          $this->view->render($this,'perfil');
        } else {
          $this->pageHistoryBack();
        }
    }


    public function perfilExist($username){
      return is_array($this->model->statusUsername($username));
    }

    public function publicacionesPerfil($username){
      $publicaciones = $this->model->publicacionesPerfil($username);
      $proyectos = "<div class='perfil-lateral' id='perf-lat'>";
      if(is_array($publicaciones)){
        foreach ($publicaciones as $key => $value) {
          $proyectos .=
          "<div class='perfil-proyecto'>
      					<h2>{$value['nombrePublicacion']}</h2>
      					<p class='perfil-parrafo'>{$value['descripcionCorta']}</p>";
              if(Session::getValue('idUsuario') == $value['idUsuario']){
                $proyectos .=
                "<h5><a id='editar' href='".URL."Usuario/editarProyecto/".$value['idPublicacion']."')>Editar</a></h5>
                <h5><a id='eliminar' onclick=eliminar(".$value['idPublicacion'].")>Eliminar</a></h5>";
              }
      				$proyectos .= "<h5><a href='".URL."Index/proyecto/".$value['idPublicacion']."'>Ver más</a></h5>
      				</div>";
        }
        return $proyectos.="</div>";
      } else {
        #Corregir ruta para ver proyectos *************************************
        return $proyectos .=
        '<div class="perfil-proyecto">
            <h2>Aún No tiene proyectos</h2>
            <p>Para comenzar Con esta gran comunidad sube un proyecto.</p>
            <h5><a href="'.URL.'Usuario/subeProyecto">Haz click aqui para ver más</a></h5>
          </div>';
      }
    }


    public function cerrarSesion(){
        Session::destroy();
        $_SESSION = [];
        // header("Refresh:0");
        header("Location: ".URL);
    }

    public function comentar(){
        $this->loadOtherModel('Comentarios');
        echo $this->Comentarios->comentar(Session::getValue('idUsuario'), $_POST['idPublicacion'], $_POST['comentario'], $_POST['idTipoReaccion']);
    }

    public function subirProyecto(){
        $this->loadOtherModel('Publicaciones');
        echo $this->Publicaciones->subirPublicacion(Session::getValue('idUsuario'), $_POST['categoria'], $_POST['titulo'], $_POST['descCorta'], $_POST['descLarga'],$_POST['imgs']);
    }

    public function editarPublicacion(){
        $this->loadOtherModel('Publicaciones');
        echo $this->Publicaciones->editarPublicacion($_POST['idPublicacion'], $_POST['categoria'], $_POST['titulo'], $_POST['descCorta'], $_POST['descLarga']);
    }

    public function subirImgsProyecto(){
      $i = 1;
      $ban = 1;
      $this->loadOtherModel('Publicaciones');
      $idProyecto = $this->Publicaciones->idProyectoUser()['idPublicacion'];
      if(isset($_FILES)){
        $estruc = './public/images/proyectos/'.$idProyecto;
        mkdir($estruc,0700);
        foreach ($_FILES as $img) {
          if ($img['size'] < 16777216) {
            $imagenType = $img['type'];
            if ($imagenType == "image/jpeg" || $imagenType == "image/jpg" || $imagenType == "image/png"){
                $ext     = explode(".", $img['name']);
                $dir     = 'media_'.$i.".".end($ext);
                $dirmove = "public/images/proyectos/{$idProyecto}/".$dir;
                $this->Publicaciones->updateMedia('media'.$i,$dir,$idProyecto);
                $upload  = $this->comprimirImagenAndUpload($imagenType,$dirmove,$img['tmp_name']);
                if($upload){
                  $ban = 1;
                }
            } else {
              $ban = 0;
            }
            $i++;
           } else {
               $ban = 0;
           }
         }
         return $ban;
      }
    }

    public function eliminarProyecto(){
      if($this->sessionExist()){
          $this->loadOtherModel('Publicaciones');
          echo $this->Publicaciones->eliminarPublicacion(Session::getValue('idUsuario'),$_POST['idPublicacion'])?1:0;
      }
    }

    public function subeProyecto(){
      if (!Session::exist()) {
        header("Location: ".URL);
      }
      $this->loadOtherModel('Categorias');
      $this->view->categorias=$this->Categorias->obtenerCategorias();
      $this->view->render($this,'subirProyecto');
    }

    public function editaPerfil(){
      if (!Session::exist()) {
        header("Location: ".URL);
      }
      $this->view->datos = $this->model->statusUsername(Session::getValue('username'));
      $this->view->render($this,'editarPerfil');
    }

    public function editarPerfil(){
      if (isset($_POST['pass'])) {
        $r = $this->model->revisarPass(Session::getValue('idUsuario'),$_POST['pass']);
        if ($r==1) {
          echo '1';
          return;
        }
        $_POST['pass']=$_POST['newPass'];
        unset($_POST['newPass']);
      }
      echo $this->model->editarPerfil($_POST,Session::getValue('idUsuario'));
    }

    public function statusUsername(){
      if(isset($_POST['username'])){
        if(is_array($this->model->statusUsername($_POST['username']))){
          // echo '<p class="ocupado">No Disponible</p>';
          echo 0;
        } else {
          // echo '<p class="disponible">Disponible</p>';
          echo 1;
        }
      }
    }

    public function checkStatusUsername($username){
        if(is_array($this->model->statusUsername($username))){
          return 0;
        } else {
          return 1;
        }
    }

    public function buscar(){
      if(isset($_POST['search'])){
        $publicaciones = $this->model->publicaciones($_POST['search']);
        $usuarios = $this->model->usuarios($_POST['search']);

        $resultados =
        '<p class="info-busqueda">Titulo del proyecto o nombre del usuario</p>
        <hr>
        <h5>Proyectos</h5>';
        if(is_array($publicaciones)){
          foreach ($publicaciones as $key => $value) {
            $resultados .= "<p>+<a href='".URL."Index/proyecto/{$value['idPublicacion']}'>{$value['nombrePublicacion']}</a></p>";
          }
        } else{
          $resultados .= "<p>Sin resultados</p>";
        }

        $resultados .=
        '<h5>Usuarios</h5>
        <hr>';
        if(is_array($usuarios)){
          foreach ($usuarios as $key => $value) {
            $resultados .= "<p>@<a href='".URL."Usuario/perfil/{$value['username']}'>{$value['username']}</a></p>";
          }
        } else{
          $resultados .= "<p>Sin resultados</p>";
        }
        echo $resultados;
      }
    }

    public function editarProyecto($idPublicacion){
      $this->sessionExist();
      $this->loadOtherModel('Publicaciones');
      $idUsuario = $this->Publicaciones->comprabarPublicacion($idPublicacion);
      if(is_array($idUsuario)){
        if($idUsuario['idUsuario'] == Session::getValue('idUsuario')){
          $this->view->categorias = $this->categorias($idUsuario['idCategoria']);
          $this->view->data = $idUsuario;
          $this->view->render($this,'editarProyecto');
        } else {
          $this->$this->pageHistoryBack();
        }
      } else {
          $this->$this->pageHistoryBack();
      }
    }

    public function categorias($idCategoria){
      $this->loadOtherModel('Categorias');
      $categorias = $this->Categorias->obtenerCategorias();
      $categoria = '';
      if (is_array($categorias)) {
        foreach ($categorias as $cat) {
          $select = ($cat['idCategoria'] == $idCategoria) ? 'selected' : '';
          $categoria.= '<option value="'.$cat['idCategoria'].'" '.$select.'>'.$cat['categoria'].'</option>';
        }
        return $categoria;
      } else {
        return '<p>No hay categorias</p>';
      }
    }

}
?>
