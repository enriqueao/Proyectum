<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Subir proyecto</title>
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>subirProyecto.css">
	<script defer src="<?=JS?>subirProyecto.js"></script>
	<script defer src="<?=JS?>config.js"></script>
	<script defer src="<?=JS?>complementos.js"></script>
</head>
<body>
<?=$this->render('Index','top-bar-sin',true);?>
<div id="fakeBody">
<div id="contenedorPrincipal">
	<h1>Nuevo Proyecto</h1>
	<div id="fondo">
		<form name="subirProyecto" onsubmit="return false">
		<p>Escoja una categoría para tu proyecto:</p>
		<div id="divSelect">
			<!-- <p id="selectImg">&#8964</p> -->
			<select name="categoria" onchange="estCat()">
				<option value="">Seleccione una categoría</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
		<p>Escriba un título para tu proyecto:</p>
		<input type="text" name="titulo" placeholder="¡Mi proyecto genial!" onchange="estTit()">

		<p>Escoja hasta 5 imágenes que representen su proyecto:</p>
		<div id="contenedorInputFile">
		<input type="file" id="file1" name="img" class="inputfile" onchange="estImg()">
			<label class="labelInputFile" for="file1">
				<img src="<?=IMG?>camara.svg" alt="">
				<p>Subir imagen</p>
			</label>
		<input type="file" id="file2" name="img" class="inputfile" onchange="estImg()">
			<label class="labelInputFile" for="file2">
				<img src="<?=IMG?>camara.svg" alt="">
				<p>Subir imagen</p>
			</label>
		<input type="file" id="file3" name="img" class="inputfile" onchange="estImg()">
			<label class="labelInputFile" for="file3">
				<img src="<?=IMG?>camara.svg" alt="">
				<p>Subir imagen</p>
			</label>
		<input type="file" id="file4" name="img" class="inputfile" onchange="estImg()">
			<label class="labelInputFile" for="file4">
				<img src="<?=IMG?>camara.svg" alt="">
				<p>Subir imagen</p>
			</label>
		<input type="file" id="file5" name="img" class="inputfile" onchange="estImg()">
			<label class="labelInputFile" for="file5">
				<img src="<?=IMG?>camara.svg" alt="">
				<p>Subir imagen</p>
			</label>
		</div>
		<p>Descripción corta del proyecto:</p>
		<textarea maxlength="150" size="150" type="text" name="descCorta" placeholder="Descripción resumida en 150 caracteres de tu proyecto" class="inputDesc" id="inputDescCorta" onchange="estDC()"></textarea>
		<p>Descripción completa del proyecto:</p>
		<!-- <h5>Escriba un símbolo de gato "#" al principio de una oración para convertirla en un título.</h5> -->
		<textarea maxlength="2000" name="descLarga" placeholder="Escriba una descripción para su proyecto" class="inputDesc" id="inputDescLarga" onchange="estDL()"></textarea>
		<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/kJQP7kiw5Fk" allowfullscreen></iframe> -->
		<div id="contFinal">
			<button id="btnSend">Cancelar</button>
			<button id="btnSend" onclick="subir()">Subir</button>
		</div>
		</form>
	</div>
</div>
</div>
<?=$this->render('Index','footer',true)?>
</body>
</html>