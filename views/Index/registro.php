<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache">
    <title>Únete | Proyectum</title>
    <link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">
    <link rel="stylesheet" type="text/css" href="<?=CSS;?>subirProyecto.css">

  	<script type="text/javascript" src="<?=JS;?>config.js"></script>
    <script defer type="text/javascript" src="<?=JS;?>registro.js"></script>
  </head>
  <body>
    <?=$this->render('Default','userorlogin',true);?>
    <?=$this->render('Default','alert',true);?>
    <div class="registro">
      <h1>Registro</h1>
      <div class="formulario-regitro">
        <p>Nombre completo</p>
        <input class="registro-inputs" type="text" id="nombreCompleto" autocomplete="off">
        <p>Nombre de usuario</p>
        <h5 id="usernamecomp">Introduce tu nombre de usuario mayor a 5 caracteres</h5>
        <input class="registro-inputs" type="text" id="user" autocomplete="off">
        <p>Correo</p>
        <input class="registro-inputs" type="email" id="correo" value="" autocomplete="off">
        <p>Descripción de usuario:</p>
        <textarea maxlength="250" size="250" type="text" placeholder="Ej. Empresa S.A. de C.V. es una empresa vanguardista dedicada a la innovación en el campo de las tecnologías de información, comprometida 100% con la sociedad..." id="inputDesc"></textarea>
        <p>Contraseña</p>
        <input class="registro-inputs" type="password" id="pass" value="">
        <p>Confirma tu contraseña</p>
        <input class="registro-inputs" type="password" value="">
        <input class="registro-submit" type="submit" id="botonSu" value="Registrarme" onclick="registrar()">
      </div>
    </div>
    <?=$this->render('Index','footer',true);?>
  </body>
</html>
