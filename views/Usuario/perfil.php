<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proyectum</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">

	<script type="text/javascript" src="<?=JS;?>config.js"></script>
	<script defer type="text/javascript" src="<?=JS;?>click.js"></script>
	<script defer type="text/javascript" src="<?=JS;?>iniciarSesion.js"></script>
</head>
<body id="perfil-fondo">
	<?=$this->render('Default','userorlogin',true);?>
	<div class="perfil">
		<img src="<?=IMG.$this->datos['imgProfile']?>">
		<div class="perfil-informacion">
			<h2><?=$this->datos['nombrecompleto']?></h3>
			<h3><?=$this->datos['descripcion']?></h4>
			<h3></h3>
		</div>
	</div>
	<div class="proyectos-perfil">
		<!-- <div class="perfil-lateral">
				<div class="perfil-proyecto">
					<h2>Titulo del proyecto</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco lab</p>
					<h5><a href="#">Haz click aqui para ver más</a></h5>
				</div>
		</div> -->
		<?=$this->publicaciones?>
		<div class="perfil-contenido">
			<h2>Mapa del sitio</h2>
			<ul>
				<li><a href="#">Top Proyectos</a></li>
				<li><a href="#">Perfil destacado</a></li>
				<li><a href="#">Más Vistos</a></li>
				<li><a href="#">Más Comentados</a></li>
				<li><a href="#">204k Usuarios en Proyectum</a></li>
				<li><a href="#">100k+ vistas en Proyectum</a></li>
				<li><a href="#">10k+ Proyectos</a></li>
			</ul>
		</div>
	</div>
	</div>
	<footer>
		<img src="<?=IMG?>logo.png">
		<p>© 2017 Proyectum. Aguilar Orozco Enrique, Osornio Velazquez Edgar. All Rights Reserved.</p>
	</footer>
</body>
</html>
