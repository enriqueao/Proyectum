<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proyectum</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">

	<script type="text/javascript" src="<?=JS;?>config.js"></script>
</head>
<body id="perfil-fondo">
	<div class="blanco"></div>
	<div class="top-bar">
		<div class="logo-top-bar">
			<a href="<?=URL?>"><img src="<?=IMG?>logo.png"></a>
		</div>
		<div class="top-buscador">
			<div class="top-buscador-input">                
				<input type="search" name="busqueda" placeholder="Buscar">
			</div>
		</div>
        <div class="top-SignIn">
        	<img src="<?=IMG?>perfil.jpg">
        	<div class="top-perfil">
	            <a href="#proyectos">Enrique Aguilar</a>
	            <a href="#proyectos">Cerrar Sesión</a>
            </div>
        </div>
	</div>
	<div class="perfil">
		<img src="<?=IMG?>perfil.jpg">
		<div class="perfil-informacion">
			<h2>Enrique Aguilar Orozco</h3>
			<h3>estudiante de Ingenieria de Software en la universidad Autonoma de Queretaro</h4>
			<h3>Estudiante</h3>
		</div>
	</div>
	<div class="perfil-contenido">
		<div class="perfil-proyectos">
			<div class="perfil-proyecto"></div>
			<div class="perfil-proyecto"></div>
			<div class="perfil-proyecto"></div>
			<div class="perfil-proyecto"></div>
			<div class="perfil-proyecto"></div>
			<div class="perfil-proyecto"></div>
		</div>
		<div class="perfil-tops"></div>
	</div>
	<footer>
		<img src="<?=IMG?>logo.png">
		<p>© 2017 Proyectum. Aguilar Orozco Enrique, Osornio Velazquez Edgar. All Rights Reserved.</p>
	</footer>
</body>
</html>