<?php

class Controller {

    function __construct(){
        Session::init();
        $this->view = new View();
        $this->loadModel();
        $this->view->menu = (Session::existVar('menu') ) ? Session::getValue('menu') : null ;
        $this->accesos = (Session::existVar('accesosMetodos') ) ? Session::getValue('accesosMetodos') : null ;
        $this->loadOtherModel('Log');
    }

    function loadModel() {
        $model = get_class($this) . '_model';
        $path = 'models/' . $model . '.php';

        if (file_exists($path)) {
            require_once($path);
            $this->model = new $model();
        }
    }

    function loadOtherModel($model) {
        $nameModel = $model;
        $model = $model. '_model';
        $path = 'models/' . $model . '.php';

        if (file_exists($path)) {
            require_once($path);
            $this->$nameModel = new $model;
        }
    }

    function pageNotFound(){
        $this->view->render('Default', 'errorSitio', true); 
    }

    function pageHistoryBack(){
        $this->view->render('Default','pageHistoryBack',true);
    }

    /**
    * Funcion para controlar el acceso a los metodos de cada controlador.
    * @param {String} $metodo: metodo el cual se tiene acceso ej. 'Nutricion::RealizarPrueba'.
    *
    * @author Enrique Aguilar Orozco
    *
    */
    function seguridad($metodo){
        if (Session::exist()) {
            return (in_array($metodo,$this->accesos)) ? true : $this->pageHistoryBack();
        } else {
            header('location:'.URL);
        }
    }

    function clienteIP(){
        return $_SERVER['REMOTE_ADDR'];
    }

    function initLog($folio,$idLog,$folioAfectado,$descripcion = ''){
        $log = array('folio'=>$folio,'idLog'=>$idLog,'idUsuarioAfectado'=>$folioAfectado,'ip'=>$this->clienteIP(),'descripcion'=>$descripcion);
        return $this->Log->setLog($log,'logs');
    }

    /**
    * @author Enrique Aguilar Orozco
    *
    */
    function sessionExist(){
        if(Session::exist()){return true; } else {header('location:'.URL); } 
    }

    /**
    * @author Enrique Aguilar Orozco
    *
    */
    function sendEmail($correo,$key,$nombre){
        require_once './libs/PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer();
        ob_start();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "noreplysaluduaq@gmail.com";
        $mail->Password = "@saluduaq";
        $mail->Port = 587;

        $mail->FromName = "SaludUAQ";
        $mail->AddAddress($correo);
        $mail->IsHTML(true);
        $mail->Subject = utf8_decode('Restablecer Contraseña SaludUAQ ');
        $mail->addReplyTo('noreply@SaludUAQ.com', 'NoReply');
        $email = include ('./views/Default/correo.php');
        $email = ob_get_clean();
        $mail->Body = utf8_decode($email);
        
        $exito = $mail->Send();
        return $exito;
    }

    /**
    * @author Enrique Aguilar Orozco
    *
    */
    public function comprimirImagenAndUpload($tipo,$destino,$Archivotmp){
        if ($Archivotmp != ''){
            //Imagen original
            $rtOriginal = $Archivotmp;
            //Crear variable
            if($tipo == "image/jpeg" || $tipo == 'image/jpg'){
                $original = imagecreatefromjpeg($rtOriginal);
            } elseif($tipo == 'image/png') {
                $original = imagecreatefrompng($rtOriginal);
            }
            //Ancho y alto máximo
            $max_ancho = 400; $max_alto = 200;

            list($ancho,$alto)=getimagesize($rtOriginal);

            $x_ratio = $max_ancho / $ancho;
            $y_ratio = $max_alto / $alto;

            if(($ancho <= $max_ancho) && ($alto <= $max_alto) ){
                $ancho_final = $ancho;
                $alto_final = $alto;
            }
            else if(($x_ratio * $alto) < $max_alto){
                $alto_final = ceil($x_ratio * $alto);
                $ancho_final = $max_ancho;
            }
            else {
                $ancho_final = ceil($y_ratio * $ancho);
                $alto_final = $max_alto;
            }

            $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 

            imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
            imagedestroy($original);

            if($tipo == "image/jpeg" || $tipo == 'image/jpg'){
                imagejpeg($lienzo,$destino);
            } elseif($tipo == 'image/png'){
                imagepng($lienzo,$destino); 
            }
            return true;
        } else {
            return false;
        }

    }

    protected function crearPaginacion( $pagActiva = 1 , $totalRegistros = ''){

        $primerRegMostrada = ($totalRegistros != 'NA ') ? ( $pagActiva * 15 - 14 ) : $totalRegistros;
        $ultimoRegMostrado = ( ($pagActiva * 15) <= $totalRegistros ) ? $pagActiva * 15 : $totalRegistros ;
        $paginacion = '<p class="div3" >Resultado: '.$primerRegMostrada.' - '.$ultimoRegMostrado.' de '.$totalRegistros.' Registros</p>';

        if($totalRegistros > 15){

            //------------Obtiene el número de paginas que se podrán utilizar.
            $totalPaginas = floor($totalRegistros / 15);
            $registrosSobrantes = $totalRegistros - ($totalPaginas * 15); 
            if($registrosSobrantes != 0) $totalPaginas++;

            $pagInicial = ($pagActiva <= 10) ? 1 : (floor( ($pagActiva-1) / 10) * 10)+1;

            $paginacion .='<div class="numeros div7">';

            //------------Agrega el botón para ver las siguientes páginas.
            if( ($pagInicial+9) < $totalPaginas) { 
                $paginacion.= '<button class="div1 btn-opciones" onclick="setPage('.$totalPaginas.')">>|</button>
                <button class="div1 btn-opciones" onclick="setPage('.($pagActiva+1).')">></button>';
            }
            
            //------------Agrega las páginas que se mostrarán.
            $paginaFinal = (($totalPaginas-$pagInicial) >= 10) ? $pagInicial+9 : $totalPaginas ;
            for ( $pagina = $paginaFinal ; $pagina >= $pagInicial ; $pagina-- ) {
                $pagActiva == $pagina ? 
                $paginacion.='<button class="div1 btn-numero-activo" onclick="setPage('.$pagina.')">'.$pagina.'</button>' :
                $paginacion.='<button class="div1 btn-numero" onclick="setPage('.$pagina.')">'.$pagina.'</button>' ;
            }

            //------------Agrega el botón para ver las páginas anteriores.
            if( $pagInicial != 1) { 
                $paginacion.= '<button class="div1 btn-opciones" onclick="setPage('.($pagActiva-1).')"><</button>
                <button class="div1 btn-opciones" onclick="setPage(1)">|<</button>';
            }
        }
        $paginacion .= '</div>';
        return $paginacion;
    }
}

?>