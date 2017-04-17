<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proyectum</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">

	<script type="text/javascript" src="<?=JS;?>config.js"></script>
	<script type="text/javascript" src="<?=JS;?>slider.js"></script>
</head>
<body class="principal">
	<div class="blanco"></div>
	<div class="top-bar">
		<div class="logo-top-bar">
			<img src="<?=IMG?>logoOK.svg">
		</div>
		<div class="top-buscador">
			<input type="search" name="busqueda" placeholder="Introduce una palabra clave para comenzar">
			<a href="#"><img src="<?=IMG?>search.svg"></a>
		</div>
        <div class="top-SignIn">
            <a href="#proyectos">Unirme Ahora</a>
            <input type="submit" value="Iniciar Sesión">
        </div>
	</div>
	<div class="slider" id="slider">
		<div class="prev">
			<a href="#" onclick="atras()" ><img src="<?=IMG?>back.svg"></a>
		</div>
		<div class="next">
			<a href="#" onclick="next()" ><img src="<?=IMG?>next.svg"></a>
		</div>
			<ul id="slide">
				<li>
					<div class="titulos-slider">
						<h2>Miles de proyectos</h2>
						<h4>comparte tu proyecto para buscar ayuda y consejos</4>
						<h6><input type="submit" value="Unirme Ahora"></h6>
					</div>
					<img src="<?=IMG?>2.png"></li>
				<li>
					<div class="titulos-slider">
						<h2>Haz que tu proyecto cresca y sea un Exito</h2>
						<h4>Solo publicalo y deja que la comunitad te ayude</4>
						<h6></h6>
					</div>
					<img src="<?=IMG?>1.png">
				</li>
				<li>
					<div class="titulos-slider">
						<h2>Unete a Esta Gran Comunidad</h2>
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
			<div class="proyecto">
				<img src="<?=IMG?>6.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamc.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="<?=IMG?>likeup.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>chat.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<p><a href="#">Ver Más...</a></p>
					</div>
				</div>
			</div>
			<div class="proyecto">
				<img src="<?=IMG?>pruebaP.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="<?=IMG?>likeup.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>chat.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<p><a href="#">Ver Más...</a></p>
					</div>
				</div>
			</div>
			<div class="proyecto">
				<img src="<?=IMG?>pruebaP.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="<?=IMG?>likeup.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>chat.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<p><a href="#">Ver Más...</a></p>
					</div>
				</div>
			</div>
			<div class="proyecto">
				<img src="<?=IMG?>pruebaP.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="<?=IMG?>likeup.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>chat.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<p><a href="#">Ver Más...</a></p>
					</div>
				</div>
			</div>
			<div class="proyecto">
				<img src="<?=IMG?>pruebaP.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="<?=IMG?>likeup.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>chat.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<p><a href="#">Ver Más...</a></p>
					</div>
				</div>
			</div>
			<div class="proyecto">
				<img src="<?=IMG?>pruebaP.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="<?=IMG?>likeup.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>chat.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<p><a href="#">Ver Más...</a></p>
					</div>
				</div>
			</div>
			<div class="proyecto">
				<img src="<?=IMG?>pruebaP.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="<?=IMG?>likeup.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>chat.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<p><a href="#">Ver Más...</a></p>
					</div>
				</div>
			</div>
			<div class="proyecto">
				<img src="<?=IMG?>pruebaP.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="<?=IMG?>likeup.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>chat.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<p><a href="#">Ver Más...</a></p>
					</div>
				</div>
			</div>
			<div class="proyecto">
				<img src="<?=IMG?>pruebaP.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="<?=IMG?>likeup.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>chat.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<p><a href="#">Ver Más...</a></p>
					</div>
				</div>
			</div>
			<div class="proyecto">
				<img src="<?=IMG?>pruebaP.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="<?=IMG?>likeup.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>chat.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<p><a href="#">Ver Más...</a></p>
					</div>
				</div>
			</div>
			<div class="proyecto">
				<img src="<?=IMG?>pruebaP.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="<?=IMG?>likeup.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>chat.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<p><a href="#">Ver Más...</a></p>
					</div>
				</div>
			</div>
			<div class="proyecto">
				<img src="<?=IMG?>pruebaP.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
				<div class="detalles-proyecto">
					<div class="icono-detalles">
						<img src="<?=IMG?>likeup.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>dislike.svg">
						<p>0</p>
					</div>
					<div class="icono-detalles">
						<img src="<?=IMG?>chat.svg">
						<p>100</p>
					</div>
					<div class="icono-detalles-ver">
						<p><a href="#">Ver Más...</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="proyectos-ver-mas">
		<a href="#"><p style="text-align: center;">Ver Más</p></a>
	</div>
	<footer>
		<img src="<?=IMG?>logo.png">
		<p>© 2017 Proyectum. Aguilar Orozco Enrique, Osornio Velazquez Edgar. All Rights Reserved.</p>
	</footer>
</body>
</html>