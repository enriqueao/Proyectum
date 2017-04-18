<?php
	date_default_timezone_set('America/Mexico_City');
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');

	define( 'URL' ,"http://10.195.103.103/".basename(getcwd())."/");

	define( 'CSS' , URL."public/css/");
	define( 'JS' , URL."public/js/" );
	define( 'IMG', URL."public/images/");
	define( 'LIB', URL."libs/");

	//Crean el archivo de config.js 
	@$file = fopen("public/js/config.js", "w");
	@fwrite($file, 
		'var config = {
			url: "'.URL.'",
			img: "'.URL.'public/images/"
		}
		var imported = document.createElement("script");
		imported.src = "'.URL.'public/js/complementos.js";
		document.head.appendChild(imported);' . PHP_EOL);
	@fclose($file);

	define( 'DB_HOST' ,'localhost');
	define( 'DB_USER' ,'root');
	define( 'DB_PASS' ,'');
	define( 'DB_NAME' ,'');
	
	define( 'DB_CHARSET' ,'utf8');

	define( 'ALGOR' ,'sha512');
	define( 'KEY' ,'spjecs');
	define( 'ID_SESSION', 'spaceProjects');
?>