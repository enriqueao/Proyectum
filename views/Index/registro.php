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
        <input class="registroInput" type="text" id="nombreCompleto">
        <p>Nombre de Usuario</p>
        <input class="registroInput" type="text" id="user">
        <p class="disponible" id="estado">nombre de usuario Disponible</p>
        <p>Correo</p>
        <input class="registroInput" type="text" id="correo" value="">
        <p>Contraseña</p>
        <input class="registroInput" type="password" id="pass" value="">
        <p>Confirma Tu Contraseña</p>
        <input class="registroInput" type="password" value="">
        <input class="registroSubmit" type="submit" id="botonSu" value="Registrarme" onclick="registrar()">
      </div>
    </div>
    <?=$this->render('Index','footer',true);?>
  </body>
</html>
