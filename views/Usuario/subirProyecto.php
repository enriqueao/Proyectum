<?php
$categorias = $this->categorias;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proyectum | Nuevo proyecto</title>
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>subirProyecto.css">
	<script defer src="<?=JS?>subirProyecto.js"></script>
	<script defer src="<?=JS?>config.js"></script>
</head>
<body>
<?=$this->render('Default','userorlogin',true);?>
<?=$this->render('Default','alert',true);?>
<div id="fakeBody">
<div id="contenedorPrincipal">
	<h1>Nuevo Proyecto</h1>
	<div id="fondo">
		<form name="subirProyecto" id="formPro" onsubmit="return false">
		<p>Escoja una categoría para tu proyecto:</p>
		<div id="divSelect">
			<!-- <p id="selectImg">&#8964</p> -->
			<select name="categoria" onchange="estCat()">
				<option value="">Seleccione una categoría</option>
				<?php

				function formatoCat($id,$nom){
					return '<option value="'.$id.'">'.$nom.'</option>';
				}

				if (!is_array($categorias)){
					echo '<p>No hay categorias</p>';
				}
				elseif (isset($categorias['idCategoria'])) {
					echo formatoCat($categorias['idCategoria'],$categorias['categoria']);
				}
				else{
					foreach ($categorias as $cat) {
						echo formatoCat($cat['idCategoria'],$cat['categoria']);
					}
				}
				 ?>
			</select>
		</div>
		<p>Escriba un título para tu proyecto:</p>
		<input type="text" name="titulo" placeholder="¡Mi proyecto genial!" onchange="estTit()">

		<p>Escoja hasta 5 imágenes que representen su proyecto:</p>
    <h5>Tienes que subir minímo 3 imágenes</h5>
		<div id="contenedorInputFile">
		<input type="file" id="file1" name="img" class="inputfile" onchange="estImg()">
			<label class="labelInputFile" for="file1">
				<img id="1" src="<?=IMG?>camara.svg" alt="">
				<p id="10">Subir imagen</p>
			</label>
		<input type="file" id="file2" name="img" class="inputfile" onchange="estImg()">
			<label class="labelInputFile" for="file2">
				<img id="2" src="<?=IMG?>camara.svg" alt="">
				<p id="20">Subir imagen</p>
			</label>
		<input type="file" id="file3" name="img" class="inputfile" onchange="estImg()">
			<label class="labelInputFile" for="file3">
				<img id="3" src="<?=IMG?>camara.svg" alt="">
				<p id="30">Subir imagen</p>
			</label>
		<input type="file" id="file4" name="img" class="inputfile" onchange="estImg()">
			<label class="labelInputFile" for="file4">
				<img id="4" src="<?=IMG?>camara.svg" alt="">
				<p id="40">Subir imagen</p>
			</label>
		<input type="file" id="file5" name="img" class="inputfile" onchange="estImg()">
			<label class="labelInputFile" for="file5">
				<img id="5" src="<?=IMG?>camara.svg" alt="">
				<p id="50">Subir imagen</p>
			</label>
		</div>
		<p>Descripción corta del proyecto <p id="contador">0/150</p></p>
		<textarea maxlength="150" size="150" type="text" name="descCorta" placeholder="Descripción resumida en 150 caracteres de tu proyecto" class="inputDesc" id="inputDescCorta" onchange="estDC()"></textarea>
		<p>Descripción completa del proyecto:</p>
		<h5>Escriba un símbolo de gato "#" al principio de una oración para convertirla en un título.</h5>
		<textarea maxlength="2000" name="descLarga" placeholder="Escriba una descripción para su proyecto" class="inputDesc" id="inputDescLarga" onchange="estDL()"></textarea>
		<div id="contFinal">
			<button id="btnSend" onclick="window.history.back()">Cancelar</button>
			<button id="btnSend" name="btnSend" onclick="subir()">Subir</button>
		</div>
		</form>
	</div>
</div>
</div>
<?=$this->render('Index','footer',true)?>
</body>
<script type="text/javascript">
var fotos = [];
function archivo(evt) {
    var id = evt.srcElement.id;
    var idElement = id.split("file")[1];
    var img = document.getElementById(idElement);
    document.getElementById(idElement+'0').innerHTML = 'Preparada';
    var files = evt.target.files;
    for (var i = 0, f; f = files[i]; i++) {
      if (!f.type.match('image.*')) {
          continue;
      }
      var reader = new FileReader();
      reader.onload = (function(theFile) {
          return function(e) {
            // Insertamos la imagen
            fotos[parseInt(idElement) - 1 ] = (e.target.result);
           img.src = e.target.result;
           img.title = escape(theFile.name);
          };
      })(f);
      reader.readAsDataURL(f);
    }
}
document.getElementById('file1').addEventListener('change', archivo, false);
document.getElementById('file2').addEventListener('change', archivo, false);
document.getElementById('file3').addEventListener('change', archivo, false);
document.getElementById('file4').addEventListener('change', archivo, false);
document.getElementById('file5').addEventListener('change', archivo, false);
</script>
</html>
