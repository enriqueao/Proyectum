<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="<?=CSS?>subirProyecto.css">
</head>
<body>
<div id="contenedorPrincipal">
	<h1>Nuevo Proyecto</h1>
	<div id="fondo">
		<p>Escoge una categoría para tu proyecto:</p>
		<select>
			<option value="">1</option>
			<option value="">2</option>
			<option value="">3</option>
			<option value="">4</option>
			<option value="">5</option>
		</select>
		<p>Escribe un título para tu proyecto:</p>
		<input type="text" placeholder="¡likdgfklj!">

		<p>Escoja 5 imágenes que representen su proyecto:</p>
		<input type="file" id="file1" class="inputfile">
			<label class="labelInputFile" for="file1">
				<img src="<?=IMG?>camara.svg" alt="">
				<p>Subir imagen</p>
			</label>
		<input type="file" id="file2" class="inputfile">
			<label class="labelInputFile" for="file2">
				<img src="<?=IMG?>camara.svg" alt="">
				<p>Subir imagen</p>
			</label>
		<input type="file" id="file3" class="inputfile">
			<label class="labelInputFile" for="file3">
				<img src="<?=IMG?>camara.svg" alt="">
				<p>Subir imagen</p>
			</label>
		<input type="file" id="file4" class="inputfile">
			<label class="labelInputFile" for="file4">
				<img src="<?=IMG?>camara.svg" alt="">
				<p>Subir imagen</p>
			</label>
		<input type="file" id="file5" class="inputfile">
			<label class="labelInputFile" for="file5">
				<img src="<?=IMG?>camara.svg" alt="">
				<p>Subir imagen</p>
			</label>

		<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/kJQP7kiw5Fk" allowfullscreen></iframe> -->
		<div id="contFinal">
			<button id="btnSend">Cancelar</button>
			<button id="btnSend">Subir</button>
		</div>
	</div>
</div>
</body>
</html>