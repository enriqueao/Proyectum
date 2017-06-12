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
			for ($i=0; $i < 23; $i++) {
				echo '
				<div class="proyecto">
				<img src="'.IMG.'6.jpg">
				<h3>Titulo</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fermentum leo metus, quis tristique tellus posuere a. Nullam aliquet quis urna a nullam.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="'.IMG.'vistas.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="'.IMG.'like.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="'.IMG.'dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="'.IMG.'mensajes.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<a href="#">Ver Más</a>
					</div>
				</div>
			</div>';
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
