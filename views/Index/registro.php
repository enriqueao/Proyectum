<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache">
    <title>Únete - Proyectum</title>
    <link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">
    <link rel="stylesheet" type="text/css" href="<?=CSS;?>subirProyecto.css">

  	<script type="text/javascript" src="<?=JS;?>config.js"></script>
    <script defer type="text/javascript" src="<?=JS;?>registro.js"></script>
  </head>
  <body>
    <?=$this->render('Default','userorlogin',true);?>
    <div id="fakeBody">
    <div id="contenedorPrincipal">
    	<h1>Únete a Proyectum</h1>
    	<div id="fondo">
    		<form name="subirProyecto" onsubmit="return false">
          <p>Nombre Completo</p>
          <input class="registro-inputs" type="text" id="nombreCompleto" autocomplete="off">
          <p>Nombre de Usuario</p>
          <input class="registro-inputs" type="text" id="user" autocomplete="off">
          <p id="usernamecomp">Introduce tu nombre de usuario mayor a 5 caracteres</p>
          <p>Correo</p>
          <input class="registro-inputs" type="text" id="correo" value="" autocomplete="off">
          <p>Contraseña</p>
          <input class="registro-inputs" type="password" id="pass" value="">
          <p>Confirma Tu Contraseña</p>
          <input class="registro-inputs" type="password" value="">
    		<div id="contFinal">
    			<button id="botonSu" onclick="registrar()">Registrarme</button>
    		</div>
    		</form>
    	</div>
    </div>
    </div>
    <?=$this->render('Index','footer',true);?>
  </body>
</html>
