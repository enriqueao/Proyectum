<?php 
$t = $this->tarjetas;
// echo var_dump($t);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proyectum</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">

	<script type="text/javascript" src="<?=JS;?>config.js"></script>
	<script defer type="text/javascript" src="<?=JS;?>slider.js"></script>
</head>
<body class="principal">
	<?=$this->render('Default','alert',true);?>
	<?=$this->render('Default','userorlogin',true);?>
	<div class="slider" id="slider">
		<div class="prev">
			<a href="#" onclick="slider(0)" ><img src="<?=IMG?>back.svg"></a>
		</div>
		<div class="next">
			<a href="#" onclick="slider(1)" ><img src="<?=IMG?>next.svg"></a>
		</div>
			<ul id="slide">
				<li>
					<div class="titulos-slider">
						<h2>Miles de proyectos</h2>
						<h4>comparte tu proyecto para buscar ayuda y consejos</4>
						<h6><input type="submit" value="Unirme Ahora" onclick="registro()"></h6>
					</div>
					<img src="<?=IMG?>2.png"></li>
				<li>
					<div class="titulos-slider">
						<h2>Haz que tu proyecto crezca y sea un Éxito</h2>
						<h4>Solo publicalo y deja que la comunitad te ayude</4>
						<h6></h6>
					</div>
					<img src="<?=IMG?>1.png">
				</li>
				<li>
					<div class="titulos-slider">
						<h2>Únete a Esta Gran Comunidad</h2>
						<h4>Se parte de Proyectum</4>
						<h6></h6>
					</div>
					<img src="<?=IMG?>webstr.png">
				</li>
			</ul>
	</div>
	<div class="proyectos" id="proyectos">
	<p id="titulo">Proyectos</p>
		<div class="contenido-proyectos">
			<?php

			function formatoTarjeta($t){
				$coments = 0;
				if (!is_null($t['reacciones'])) {
					foreach ($t['reacciones'] as $v) {
						$coments+=(int)$v;
					}
				}
				$e = isset($t['reacciones']['Excelente'])?$t['reacciones']['Excelente']:'0';
				$b = isset($t['reacciones']['Bueno'])?$t['reacciones']['Bueno']:'0';
				$r = isset($t['reacciones']['Regular'])?$t['reacciones']['Regular']:'0';
				$m = isset($t['reacciones']['Malo'])?$t['reacciones']['Malo']:'0';
				$w = isset($t['reacciones']['Wacala'])?$t['reacciones']['Wacala']:'0';

				return '
				<div class="proyecto">
				<img src="'.IMG.$t['media1'].'">
				<h3>'.$t['nombrePublicacion'].'</h3>
				<p>'.$t['descripcionCorta'].'</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="'.IMG.'eye.svg">
						<p>'.$t['vistas']['num'].'</p>
					</div>
					<div class="icono-detalles">
						<img src="'.IMG.'mensajes.svg">
						<p>'.$coments.'</p>
					</div>
					<div class="icono-detalles">
						<img src="'.IMG.'/reacciones/excelente.svg">
						<p>'.$e.'</p>
					</div>
					<div class="icono-detalles">
						<img src="'.IMG.'/reacciones/bien.svg">
						<p>'.$b.'</p>
					</div>
					<div class="icono-detalles">
						<img src="'.IMG.'/reacciones/regular.svg">
						<p>'.$r.'</p>
					</div>
					<div class="icono-detalles">
						<img src="'.IMG.'/reacciones/malo.svg">
						<p>'.$m.'</p>
					</div>
					<div class="icono-detalles">
						<img src="'.IMG.'/reacciones/wacala.svg">
						<p>'.$w.'</p>
					</div>
					<div class="icono-detalles-ver">
						<a href="'.URL.'index/proyecto/'.$t['idPublicacion'].'">Ver Más</a>
					</div>
				</div>
			</div>';
			}


			if (!is_array($t)){
            	echo("No hay ningún proyecto");
	        }
	        elseif (isset($t['idPublicacion'])) {
	            echo formatoTarjeta($t);
	        }
	        else{
	            foreach ($t as $ta) {
	                echo formatoTarjeta($ta);
	            }
	        }
			 ?>

		</div>
		<div class="proyectos-ver-mas">
			<a href="#">Quiero ver más proyectos</a>
		</div>
	</div>
<?=$this->render('Index','footer',true)?>
<script type="text/javascript">
	function registro() {
		location.href = config.url+'Index/registro';
	}
</script>
</body>
</html>
