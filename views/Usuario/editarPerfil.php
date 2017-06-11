<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proyectum | Editar perfil</title>
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>editarPerfil.css">
	<script defer src="<?=JS?>editarPerfil.js"></script>
	<script defer src="<?=JS?>config.js"></script>
	<script defer src="<?=JS?>complementos.js"></script>
</head>
<body>
<?=$this->render('Index','top-bar-sin',true);?>
<div id="fakeBody">
<div id="contenedorPrincipal">
	<h1>Editar perfil</h1>
	<div id="fondo">
		<form name="editarPerfil" onsubmit="return false">

		<p>Nombre Completo:</p>
		<input type="text" name="nombre" placeholder="Ej. Empresa S.A. de C.V.">
		<p>User name (No puede cambiarse):</p>
		<h5>@edgarosovel</h5>
		<p>Correo:</p>
		<input type="email" name="correo" placeholder="Ej. info@empresa.com">
		<p>Imagen de perfil:</p>
		<div id="contenedorInputFile">
		<input type="file" id="file1" name="img" class="inputfile" onchange="estImg()">
			<label class="labelInputFile" for="file1">
				<img src="<?=IMG?>camara.svg" alt="">
				<p>Subir imagen</p>
			</label>
		</div>
		<p>Descripción de usuario:</p>
		<textarea maxlength="250" size="250" type="text" name="desc" placeholder="Ej. Empresa S.A. de C.V. es una empresa vanguardista dedicada a la innovación en el campo de las tecnologías de información, comprometida 100% con la sociedad..." class="inputDesc" id="inputDesc"></textarea>
		<p>Cambio de contraseña</p>
		<div id="pass">		
			<p>Contraseña antigüa:</p>
			<input type="password" name="lastPass" onchange="estLPass()">
			<p>Nueva contraseña:</p>
			<input type="password" name="newPass" onchange="estNPass()">
			<p>Repita la nueva contraseña:</p>
			<input type="password" name="newPass2" onchange="estNPass()">
		</div>
		<div id="contFinal">
			<button id="btnSend">Cancelar</button>
			<button id="btnSend" onclick="editar()">Guardar cambios</button>
		</div>
		</form>
	</div>
</div>
</div>
<?=$this->render('Index','footer',true)?>
</body>
</html>