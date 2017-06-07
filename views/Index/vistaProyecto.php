<?php 
$info=$this->info;
$vistas=$this->vistas;
$comentarios=$this->comentarios;
$reacciones=$this->reacciones;
$tiposReacciones=$this->tiposReacciones;
// print_r($reacciones);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PROYECTO</title>
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">
	<link rel="stylesheet" type="text/css" href=<?php echo CSS.'vistaProyecto.css' ?>>
	<script defer type="text/javascript" src="<?=JS;?>slider.js"></script>
	<script defer type="text/javascript" src="<?=JS;?>config.js"></script>
	<script defer src="<?=JS?>vistaProyecto.js"></script>
</head>
<body>
<?=$this->render('Index','top-bar-sin',true);?>
	<h1><?echo $info['nombrePublicacion']?></h1>

	<!-- slider -->
	<div class="slider" id="slider">
		<div class="prev">
			<a onclick="slider(0)" ><img src="<?=IMG?>back.svg"></a>
		</div>
		<div class="next">
			<a onclick="slider(1)" ><img src="<?=IMG?>next.svg"></a>
		</div>
			<ul id="slide">
			<?php 

			for ($i=1; $i <= 5; $i++) { 
				if($info['media'.$i]!=""){
					echo '<li>
					<img src="'.IMG.$info['media'.$i].'">
					</li>';
				}
			}

			 ?>
			</ul>
	</div>

<div id="fondoGeneral">
	<div id="info">
		<div id="puntaje">
			<div class="reacciones">
				<img src="<?=IMG?>eye.svg" alt="">
				<p><?php echo $vistas['count(idVista)']?></p>
			</div>
			<div class="reacciones">
				<img src="<?=IMG?>reacciones/excelente.svg" alt="">
				<p><?=(isset($reacciones['Excelente']))?$reacciones['Excelente']:0?></p>
			</div>
			<div class="reacciones">
				<img src="<?=IMG?>reacciones/bien.svg" alt="">
				<p><?=(isset($reacciones['Bueno']))?$reacciones['Bueno']:0?></p>
			</div>
			<div class="reacciones">
				<img src="<?=IMG?>reacciones/regular.svg" alt="">
				<p><?=(isset($reacciones['Regular']))?$reacciones['Regular']:0?></p>
			</div>
			<div class="reacciones">
				<img src="<?=IMG?>reacciones/malo.svg" alt="">
				<p><?=(isset($reacciones['Malo']))?$reacciones['Malo']:0?></p>
			</div>
			<div class="reacciones">
				<img src="<?=IMG?>reacciones/wacala.svg" alt="">
				<p><?=(isset($reacciones['Wacala']))?$reacciones['Wacala']:0?></p>
			</div>
		</div>
		<div id="autor">
			<p>Autor:</p>
			<p><?php echo $info['nombreCompleto']?></p>
		</div>
	</div>


	<div id="fondoDescripcion">
	<div id="descripcion">
		<h2>Descripción del proyecto</h2>
		<p><?echo nl2br($info['descripcionLarga'])?></p>
	</div>
	</div>
	<div id="fondoComentarios">
		<h2>Evaluaciones de la comunidad</h2>
		<div id="comentarios">

			<?php
				function formatoComent($coment){
					return	'<div id="comentario">
					<div id="calificacion">
						<img src='.IMG.$coment['img'].' alt="">
					</div>
					<div id="contenido">
						<h3>'.$coment['nombrecompleto'].' | @'.$coment['username'].'</h3>
						<p>'.$coment['comentario'].'</p>

					</div>
					</div>';
					// <div id="commentLike">
					// 	<p>Like</p>
					// </div>
					// <div id="commentDislike">
					// 	<p>Dislike</p>
					// </div>
				}


				if (!is_array($comentarios)){
					echo "<p>No hay evaluciones en este proyecto. ¡Haz una nueva!</p>";
				}
				elseif (isset($comentarios['comentario'])) {
					echo formatoComent($comentarios);
				}
				else{
					foreach ($comentarios as $coment) {
						echo formatoComent($coment);
					}
				}
				
			 ?>

			<hr id="saltoDeLinea">
			<h4>Nueva evaluacion</h4>
			<div id="nuevoComentario">
				<form name=nuevoComentario onsubmit="return false">
					<h3>@edgarOsoVel</h3>
					<textarea maxlength="400" placeholder="Escriba una nueva evalución del proyecto" id="nuevoComentComent" name="comentario"></textarea>
					<h5>Seleccione una reacción</h5>
					<?php 
					foreach ($tiposReacciones as $tr) {
						echo '<input type="radio" name="reaccion" id='.$tr['idTipoReaccion'].' class="nuevoComentEval" value="'.$tr['idTipoReaccion'].'"><label for='.$tr['idTipoReaccion'].'><img src='.IMG.$tr['img'].' alt=""><p>'.$tr['reaccion'].'</p></label>';
					}
					 ?>
					 <input type="hidden" name="idPublicacion" value=<?=$info['idPublicacion']?>>
					<!-- <input type="radio" name="eval" id="nuevoComentEval"> -->
					<button id="nuevoComentSend" onclick="comentar()">Evaluar</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?=$this->render('Index','footer',true);?>
</body>
</html>