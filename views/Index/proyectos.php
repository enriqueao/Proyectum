<?php
$t = $this->tarjetas;
// echo var_dump($t);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proyectos | Proyectum</title>
  <meta http-equiv="pragma" content="no-cache">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?=CSS;?>estilosSpace.css">
	<script type="text/javascript" src="<?=JS;?>config.js"></script>
	<script type="text/javascript" src="<?=JS;?>proyectos.js"></script>
<!-- 	<script defer type="text/javascript" src="<?=JS;?>slider.js"></script> -->
</head>
<body class="principal">
	<?=$this->render('Default','alert',true);?>
	<?=$this->render('Default','userorlogin',true);?>
	<div class="proyectos" id="proyectos">
	<p id="titulo">Proyectos</p>
		<div class="contenido-proyectos" id="cargarAki">
			<?=$this->render('Default','loading',true);?>
			<?php

			function formatoTarjeta($t,$des=""){
				$d='';
				$des1="";
				$des2="";
				$des3="";
				$des4="";
				$des5="";
				if ($des!="") {
					$d='<div class="desNum"><p>'.$des.'</p></div>';
					$des="proyectoDes";
					$des1="detDes";
					$des2="icoDes";
					$des3="icoDesVer";
					$des4='<div class="desInfo">';
					$des5="</div>";
				}
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
				<div class="proyecto '.$des.'">
				<img src="'.IMG.$t['media1'].'">'.$d.'
				'.$des4.'
				<h3>'.$t['nombrePublicacion'].'</h3>
				<p>'.$t['descripcionCorta'].'</p>
				<div class="detalles-proyecto '.$des1.'">
					<div class="icono-detalles '.$des2.'">
						<img src="'.IMG.'eye.svg">
						<p>'.$t['vistas']['num'].'</p>
					</div>
					<div class="icono-detalles '.$des2.'">
						<img src="'.IMG.'mensajes.svg">
						<p>'.$coments.'</p>
					</div>
					<div class="icono-detalles '.$des2.'">
						<img src="'.IMG.'/reacciones/excelente.svg">
						<p>'.$e.'</p>
					</div>
					<div class="icono-detalles '.$des2.'">
						<img src="'.IMG.'/reacciones/bien.svg">
						<p>'.$b.'</p>
					</div>
					<div class="icono-detalles '.$des2.'">
						<img src="'.IMG.'/reacciones/regular.svg">
						<p>'.$r.'</p>
					</div>
					<div class="icono-detalles '.$des2.'">
						<img src="'.IMG.'/reacciones/malo.svg">
						<p>'.$m.'</p>
					</div>
					<div class="icono-detalles '.$des2.'">
						<img src="'.IMG.'/reacciones/wacala.svg">
						<p>'.$w.'</p>
					</div>
					<div class="icono-detalles-ver '.$des3.'">
						<a href="'.URL.'index/proyecto/'.$t['idPublicacion'].'">Ver Más</a>
					</div>
				</div>
				'.$des5.'
			</div>';
			}
			$c =  count($t) > 3 ? 3 : count($t);
			//DESTACADOS
	        if (!is_array($t)){
            	echo("No hay ningún proyecto");
	        }
	        elseif (isset($t['idPublicacion'])) {
	            echo formatoTarjeta($t,1);
	        }
	        else{
	            for ($i=0; $i < $c; $i++) { 
	            	echo formatoTarjeta($t[$i],$i+1);
	            }
	        }
	        //DEMÁS
	        $s = count($t) > 3 ? count($t) : 0;
	        if($s != 0 && (!isset($t['idPublicacion']))){
		        for ($i=$c; $i < $s; $i++) { 
		          	echo formatoTarjeta($t[$i]);
		        }
	        }

			 ?>

		</div>
		<div class="proyectos-ver-mas">
			<a onclick="cargarMas()">Cargar más</a>
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