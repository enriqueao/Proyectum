<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Regitrar</title>
    <link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">

  	<script type="text/javascript" src="<?=JS;?>config.js"></script>
    <script defer type="text/javascript" src="<?=JS;?>click.js"></script>
    <script defer type="text/javascript" src="<?=JS;?>registro.js"></script>
  </head>
  <body>
    <?=$this->render('Index','top-bar-sin',true);?>
    <div class="registro">
      <div class="formulario-regitro">
        <p>Nombre Completo</p>
        <input class="registro-inputs" type="text" id="nombreCompleto">
        <p>Nombre de Usuario</p>
        <input class="registro-inputs" type="text" id="user">
        <p class="disponible" id="estado">Disponible</p>
        <p>Correo</p>
        <input class="registro-inputs" type="text" id="correo" value="">
        <p>Contraseña</p>
        <input class="registro-inputs" type="password" id="pass" value="">
        <p>Confirma Tu Contraseña</p>
        <input class="registro-inputs" type="password" value="">
        <input class="registro-submit" type="submit" id="botonSu" value="Registrarme" onclick="registrar()">
      </div>
    </div>
    <?=$this->render('Index','footer',true);?>
  </body>
</html>
