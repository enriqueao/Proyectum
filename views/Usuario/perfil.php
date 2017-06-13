<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proyectum</title>
	<meta http-equiv="pragma" content="no-cache">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">

	<script type="text/javascript" src="<?=JS;?>config.js"></script>
</head>
<body id="perfil-fondo">
	<?=$this->render('Default','userorlogin',true);?>
	<div class="perfil-contenedor">
		<div class="perfil">
			<img src="<?=IMG.$this->datos['imgProfile']?>">
			<div class="perfil-informacion">
				<h2><?=$this->datos['nombrecompleto']?></h3>
				<h3><?=$this->datos['descripcion']?></h4>
				<h3></h3>
			</div>
			<div class="perfil-contenido">
				<h2>Lo Más Relevante</h2>
				<ul>
					<li><a href="<?=URL.'Index/proyecto/'.$this->proyectoDestacado[0]['idPublicacion']?>">Proyecto Destacado</a></li>
					<li><a href="<?=URL.'Index/proyecto/'.$this->proyectoMasVisto[0]['idPublicacion']?>">Proyecto Más Visto</a></li>
					<li><a href="<?=URL.'Index/proyecto/'.$this->proyectoDestacado[0]['idPublicacion']?>">Proyecto Más Comentado</a></li>
				</ul>
				<h2>Datos Proyectum</h2>
				<ul>
					<li><a href="<?=URL.'Usuario/Perfil/'.$this->perfilDestacado[0]['username']?>">Perfil destacado</a></li>
					<li><?=$this->numUsers['numUsers']?> Usuarios en Proyectum</li>
					<li><?=$this->numVistas['numVistas']?> vistas en Proyectum</li>
					<li><?=$this->numProyectos['numProyectos']?> Proyectos en Proyectum</li>
				</ul>
			</div>
		</div>
			<?=$this->publicaciones?>
	</div>
	<footer>
		<img src="<?=IMG?>logo.png">
		<p>© 2017 Proyectum. Aguilar Orozco Enrique, Osornio Velazquez Edgar. All Rights Reserved.</p>
	</footer>
</body>
</html>
