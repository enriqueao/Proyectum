<?php
$data = $this->data;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proyectum | Editar proyecto</title>
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>subirProyecto.css">
	<?=$this->render('Default','loading',true);?>
	<script defer src="<?=JS?>editarProyecto.js"></script>
	<script defer src="<?=JS?>config.js"></script>
</head>
<body>
<?=$this->render('Default','userorlogin',true);?>
<?=$this->render('Default','alert',true);?>
<div id="fakeBody">
<div id="contenedorPrincipal">
	<h1>Editar <?=$data['nombrePublicacion']?></h1>
	<div id="fondo">
		<form name="subirProyecto" id="formPro" onsubmit="return false">
		<p>Escoja una categoría para tu proyecto:</p>
		<div id="divSelect">
			<select name="categoria" onchange="estCat()">
				<option value="" selected disabled>Seleccione una categoría</option>
        <?=$this->categorias;?>
			</select>
		</div>
		<p>Escriba un el nuevo título para tu proyecto:</p>
		<input type="text" name="titulo" id="titulo" placeholder="¡Mi proyecto genial!" onchange="estTit()" value="<?=$data['nombrePublicacion']?>">
    <br>
    <br>
    <br>
    <h5>La modificación de imagenes del proyecto no esta permitido, le sugerimos Subir una Versión Nueva.</h5>
    <hr>
    <br>
    <br>
		<p>Descripción corta del proyecto <p id="contador">0/150</p></p>
		<textarea maxlength="150" size="150" type="text" name="descCorta" placeholder="Descripción resumida en 150 caracteres de tu proyecto" class="inputDesc" id="inputDescCorta" onchange="estDC()"><?=$data['descripcionCorta']?></textarea>
		<p>Descripción completa del proyecto:</p>
		<h5>Escriba un símbolo de gato "#" al principio de una oración para convertirla en un título.</h5>
		<textarea maxlength="2000" name="descLarga" placeholder="Escriba una descripción para su proyecto" class="inputDesc" id="inputDescLarga" onchange="estDL()"><?=$data['descripcionLarga']?></textarea>
    <input type="hidden" id="idPublicacion" value="<?=$data['idPublicacion']?>">
    <div id="contFinal">
			<button id="btnSend" onclick="window.history.back()">Cancelar</button>
			<button id="btnSend" name="btnSend" onclick="subir()">Editar</button>
		</div>
		</form>
	</div>
</div>
</div>
<?=$this->render('Index','footer',true)?>
</body>
</html>
