<?php
$yaComentado=false;
if (isset($this->username)) {
	$username=$this->username;
	$nombreCompleto = $this->nombreCompleto;
	$yaComentado=$this->yaComentado;
}
$info=$this->info;
$vistas=$this->vistas;
$comentarios=$this->comentarios;
$reacciones=$this->reacciones;
$tiposReacciones=$this->tiposReacciones;

$coments = 0;
if (!is_null($reacciones)) {
	foreach ($reacciones as $v) {
		$coments+=(int)$v;
	}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$info['nombrePublicacion']?> | Proyectum</title>
	<?=$this->render('Default','loading',true);?>
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">
	<link rel="stylesheet" type="text/css" href=<?php echo CSS.'vistaProyecto.css' ?>>
	<script defer type="text/javascript" src="<?=JS;?>slider.js"></script>
	<script defer type="text/javascript" src="<?=JS;?>config.js"></script>
	<script defer src="<?=JS?>vistaProyecto.js"></script>
</head>
<body>
<?=$this->render('Default','alert',true);?>
<?=$this->render('Default','userorlogin',true);?>
	<h1><?=$info['nombrePublicacion']?></h1>

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
					<img src="'.IMG."proyectos/".$info['idPublicacion'].'/'.$info['media'.$i].'">
					</li>';
				}
			}

			 ?>
			</ul>
	</div>

<div id="fondoGeneral">
	<div id="info">
		<div id="autor">
			<div>
				<p>Autor:</p>
				<p><?php echo $info['nombreCompleto']?></p>
			</div>
			<div>
				<div class="reacciones">
					<img src="<?=IMG?>eye.svg" alt="">
					<p><?php echo $vistas['num']?></p>
				</div>
				<div class="reacciones">
					<img src="<?=IMG?>mensajes.svg" alt="">
					<p><?php echo $coments?></p>
				</div>
			</div>
		</div>
		<div id="puntaje">
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
	</div>


	<div id="fondoDescripcion">
	<div id="descripcion">
		<h2>Descripción del proyecto</h2>
		<p><?= nl2br(str_replace("\n", "</b>\n", str_replace("#", "<b>", $info['descripcionLarga'])))?></p>
	</div>
	</div>
	<div id="fondoComentarios">
		<h2>Evaluaciones de la comunidad</h2>
		<div id="comentarios">
		<div id="divComents">
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
				}

				if (!is_array($comentarios)){
					echo '<p id="noHayComents">No hay evaluciones en este proyecto. ¡Haz una nueva!</p>';
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
			</div>
			<hr id="saltoDeLinea">
			<h4>Nueva evaluacion</h4>
			<div id="nuevoComentario">
				<?php
					if (isset($username) && ($yaComentado)) {
						echo "<p>Ya has evaluado este proyecto</p>";
					}
					elseif (isset($username)) {
						$s='
						<form name=nuevoComentario onsubmit="return false">
					<h3>'.$nombreCompleto.' | @'.$username.'</h3>
					<textarea maxlength="500" placeholder="Escriba una nueva evalución del proyecto" id="nuevoComentComent" name="comentario"></textarea>
					<h5>Seleccione una reacción</h5>';
					foreach ($tiposReacciones as $tr) {
						$s.= '<input type="radio" name="reaccion" id="'.$tr['idTipoReaccion'].'" class="nuevoComentEval" value="'.$tr['idTipoReaccion'].'"><label for='.$tr['idTipoReaccion'].' onclick="regresarEstilo()"><img src='.IMG.$tr['img'].' alt=""><p>'.$tr['reaccion'].'</p></label>';
					}
					$s.='
					<input type="hidden" name="idPublicacion" value="'.$info['idPublicacion'].'">
					<input type="hidden" name="nombreCompleto" value="'.$nombreCompleto.'">
					<input type="hidden" name="username" value="'.$username.'">
					<button id="nuevoComentSend" onclick="comentar()">Evaluar</button>
					</form>';
						echo $s;
					}
					else{
						echo "<p>Inicia sesión para evaluar el proyecto</p>";
					}
				 ?>

			</div>
		</div>
	</div>
</div>
<?=$this->render('Index','footer',true);?>
</body>
</html>
