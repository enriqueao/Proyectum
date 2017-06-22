-- --------------------------------------------------------
-- Host:                         177.231.44.78
-- Versión del servidor:         5.7.18-0ubuntu0.16.10.1 - (Ubuntu)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.4.0.5159
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para proyectum
CREATE DATABASE IF NOT EXISTS `proyectum` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `proyectum`;

-- Volcando estructura para tabla proyectum.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.categorias: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`idCategoria`, `categoria`) VALUES
	(1, 'Arte'),
	(2, 'Comics'),
	(3, 'Artesanías'),
	(4, 'Baile'),
	(5, 'Diseño'),
	(6, 'Moda'),
	(7, 'Cine y video'),
	(8, 'Comida'),
	(9, 'Juegos'),
	(10, 'Periodismo'),
	(11, 'Música'),
	(12, 'Fotografía'),
	(13, 'Publicaciones'),
	(14, 'Tecnología'),
	(15, 'Teatro');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla proyectum.comentarios
CREATE TABLE IF NOT EXISTS `comentarios` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idPublicacion` int(11) NOT NULL,
  `comentario` varchar(500) DEFAULT NULL,
  `fechaComentario` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idTipoReaccion` tinyint(1) NOT NULL,
  PRIMARY KEY (`idComentario`,`idUsuario`,`idPublicacion`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idTipoReaccion` (`idTipoReaccion`),
  KEY `idp` (`idPublicacion`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idTipoReaccion`) REFERENCES `tiposreacciones` (`idTipoReaccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`idPublicacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.comentarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` (`idComentario`, `idUsuario`, `idPublicacion`, `comentario`, `fechaComentario`, `idTipoReaccion`) VALUES
	(14, 41, 31, 'Muy buen proyecto :)', '2017-06-20 15:00:31', 1),
	(15, 41, 30, 'NO ME GUSTAN LAS TORTUGAS :(', '2017-06-20 15:00:58', 5),
	(16, 1, 31, 'No ME GUSTA', '2017-06-20 15:15:57', 5),
	(17, 2, 31, 'PREFIERO LOS GATITOS >:v', '2017-06-20 15:17:09', 5);
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;

-- Volcando estructura para tabla proyectum.publicaciones
CREATE TABLE IF NOT EXISTS `publicaciones` (
  `idPublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `nombrePublicacion` varchar(100) NOT NULL DEFAULT 'Corregir Información',
  `descripcionCorta` varchar(150) NOT NULL,
  `descripcionLarga` varchar(2000) DEFAULT NULL,
  `media1` mediumtext,
  `media2` mediumtext,
  `media3` mediumtext,
  `media4` mediumtext,
  `media5` mediumtext,
  `fechaDePublicacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPublicacion`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idCategoria` (`idCategoria`),
  CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.publicaciones: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `publicaciones` DISABLE KEYS */;
INSERT INTO `publicaciones` (`idPublicacion`, `idUsuario`, `idCategoria`, `nombrePublicacion`, `descripcionCorta`, `descripcionLarga`, `media1`, `media2`, `media3`, `media4`, `media5`, `fechaDePublicacion`) VALUES
	(30, 40, 6, 'Galaxy Bat Plush: Purple Edition V2', 'In 2016, the galaxy bats invaded. White and black bats flew around the world to take up their new roles as guardians of workstations, snuggle buddies.', 'In 2016, the galaxy bats invaded. White and black bats flew around the world to take up their new roles as guardians of workstations, snuggle buddies, and travel companions. Now they are back and this time they\'ve brought along new purple friends! Purple bats are my 3rd most popular color after the black and white bats. I think they would make a great addition to the galaxy bat family and I\'d love to make them a reality. So I\'m asking for your help once again to help raise the funds to put the purple bats into production.', 'media_1.jpg', 'media_2.jpg', 'media_3.png', NULL, NULL, '2017-06-20 14:35:33'),
	(31, 41, 6, 'ROPA PARA PERRITO', 'Hacemos ropa para perrito de diferentes tipos. Tela hipoalergenia :), menos para perros tan grandotes como fernando.', '#CACA DE PERRO\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n\n#FERNANDO\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n\n', 'media_1.jpg', 'media_2.png', 'media_3.jpg', 'media_4.jpg', NULL, '2017-06-20 14:59:51');
/*!40000 ALTER TABLE `publicaciones` ENABLE KEYS */;

-- Volcando estructura para tabla proyectum.reacciones
CREATE TABLE IF NOT EXISTS `reacciones` (
  `idReaccion` int(11) NOT NULL AUTO_INCREMENT,
  `idPublicacion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idTipoReaccion` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idReaccion`),
  KEY `idPublicacion` (`idPublicacion`),
  KEY `idTipoReaccion` (`idTipoReaccion`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `reacciones_ibfk_1` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`idPublicacion`) ON DELETE CASCADE,
  CONSTRAINT `reacciones_ibfk_2` FOREIGN KEY (`idTipoReaccion`) REFERENCES `tiposreacciones` (`idTipoReaccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reacciones_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.reacciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reacciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `reacciones` ENABLE KEYS */;

-- Volcando estructura para tabla proyectum.tiposreacciones
CREATE TABLE IF NOT EXISTS `tiposreacciones` (
  `idTipoReaccion` tinyint(1) NOT NULL AUTO_INCREMENT,
  `reaccion` varchar(15) DEFAULT NULL,
  `img` varchar(1024) NOT NULL,
  PRIMARY KEY (`idTipoReaccion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.tiposreacciones: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tiposreacciones` DISABLE KEYS */;
INSERT INTO `tiposreacciones` (`idTipoReaccion`, `reaccion`, `img`) VALUES
	(1, 'Excelente', 'reacciones/excelente.svg'),
	(2, 'Bueno', 'reacciones/bien.svg'),
	(3, 'Regular', 'reacciones/regular.svg'),
	(4, 'Malo', 'reacciones/malo.svg'),
	(5, 'Wacala', 'reacciones/wacala.svg');
/*!40000 ALTER TABLE `tiposreacciones` ENABLE KEYS */;

-- Volcando estructura para tabla proyectum.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `nombrecompleto` varchar(30) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `fechaDeRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `imgProfile` varchar(200) DEFAULT 'user.svg',
  PRIMARY KEY (`idUsuario`,`username`,`correo`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.usuarios: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuario`, `descripcion`, `username`, `nombrecompleto`, `pass`, `correo`, `fechaDeRegistro`, `imgProfile`) VALUES
	(1, 'en instagram @kikea_o', 'enriqueao', 'Enrique Aguilar Orozco', 'cc90d2f47ec4b8b0addb1392171f3fece9b9e15e0549759658729ad4fc756f54a643afceef95c6fdd895fe7fd91188db85eeb695ba2e4eaaaaf92276b74ebec6', 'enriqueao96@gmail.com', '2017-06-19 23:11:12', 'IMG_VUxSnRWa1pOVmxaVVYwaENUMVpyWkRCT1JsSjBZM.jpg'),
	(2, 'Hola mundo, soy Edgar.', 'edgarosovel', 'Edgar Osornio Velázquezz', '836f2ed18f69fe276dd26d00557cff0923a0101e73b61c0375974a27459c0fcdbb0fc3f9776be82ade15fe4db6dd88970e80ed87e79dd18739efe434cc7acf9e', 'edgarov@live.com.mx', '2017-06-20 11:30:57', 'user.svg'),
	(22, '', 'soyjuan', 'Juanito', '1efd74479ed97d1bf4dacd909f27061d08a689a20260d7c73856c7142f46eda648f776194ee1e71cef164d1a5fc41ed2a70bf61fdc51d43f13f98e72f146185a', 'ejuan@correo.com', '2017-06-19 12:49:10', 'user.svg'),
	(23, 'wewer', 'pepe1', 'pepe', '836f2ed18f69fe276dd26d00557cff0923a0101e73b61c0375974a27459c0fcdbb0fc3f9776be82ade15fe4db6dd88970e80ed87e79dd18739efe434cc7acf9e', 'dsad@adsa.com', '2017-06-19 12:49:15', 'user.svg'),
	(24, 'Yo soy tontin', 'tontin', 'Tontin', '836f2ed18f69fe276dd26d00557cff0923a0101e73b61c0375974a27459c0fcdbb0fc3f9776be82ade15fe4db6dd88970e80ed87e79dd18739efe434cc7acf9e', 'qwe@edq.com', '2017-06-19 12:49:19', 'user.svg'),
	(25, 'asas g hr fd gdas dsg ah w 4h5  er', 'elpapa', 'elpapa', '836f2ed18f69fe276dd26d00557cff0923a0101e73b61c0375974a27459c0fcdbb0fc3f9776be82ade15fe4db6dd88970e80ed87e79dd18739efe434cc7acf9e', 'ed@asd.com', '2017-06-19 12:49:24', 'user.svg'),
	(26, 'bla bla bla bla bla bla ', 'enriqueao96', 'Enrique Aguilar ', 'cc90d2f47ec4b8b0addb1392171f3fece9b9e15e0549759658729ad4fc756f54a643afceef95c6fdd895fe7fd91188db85eeb695ba2e4eaaaaf92276b74ebec6', 'enriqueao96@hotmail.com', '2017-06-19 12:49:29', 'user.svg'),
	(27, 'Hola, soy derian.', 'derian', 'Derian Jair Lira', '1efd74479ed97d1bf4dacd909f27061d08a689a20260d7c73856c7142f46eda648f776194ee1e71cef164d1a5fc41ed2a70bf61fdc51d43f13f98e72f146185a', 'derian@asda.com', '2017-06-19 12:50:57', 'user.svg'),
	(28, 'Soy alguien aburrido que encontró esta página y la pienso romper.', 'nuhg12', 'Mauricio Arturo', 'cc90d2f47ec4b8b0addb1392171f3fece9b9e15e0549759658729ad4fc756f54a643afceef95c6fdd895fe7fd91188db85eeb695ba2e4eaaaaf92276b74ebec6', 'sasuke_arti@hotmail.com', '2017-06-19 16:10:38', 'IMG_mVFMUVSVEpOVkd0NFRtcEpkMDFVWTNoT2FteE9Za.jpg'),
	(30, 'Soy amigo de Mau :) ', 'cesar', 'El César', '1ab9df507c6e67bbc4487b33774998d42d19ccd3bdb598c6df100feea42e4b4d3feed44e421eb1459d7576e12f9b465b22b45140e6fa03ef4f3f281abf5fa757', 'cesar@gmail.com', '2017-06-19 15:22:30', 'user.svg'),
	(31, 'Hola, me llamo Fernando.', 'celio', 'Fernando Rico Celio', '1efd74479ed97d1bf4dacd909f27061d08a689a20260d7c73856c7142f46eda648f776194ee1e71cef164d1a5fc41ed2a70bf61fdc51d43f13f98e72f146185a', 'celio@algo.com', '2017-06-19 16:01:55', 'user.svg'),
	(32, 'Soy un humano', 'LuisJorgeLozano', 'Luis Jorge Lozano Domínguez', '69e1a028d26dddd83f5f4102fbdeedb26889db54d182ae3c56374d992b399142140a173f7658b2b6d496a20812c3d4e8e80cdefdee5f14c7c172453915186d03', 'lozanoluisjorge@gmail.com', '2017-06-19 17:10:48', 'IMG_FUySnRWa1pOVlZaVFZrVTFUMVpyWkRCT1JsSjBZM.png'),
	(33, 'BD ', 'jpablo215', 'Ej Juan Pablo', '69e1a028d26dddd83f5f4102fbdeedb26889db54d182ae3c56374d992b399142140a173f7658b2b6d496a20812c3d4e8e80cdefdee5f14c7c172453915186d03', 'jp.gtzo215@hotmail.com', '2017-06-20 13:08:22', 'user.svg'),
	(34, 'BD', 'jpablo', '  ', '69e1a028d26dddd83f5f4102fbdeedb26889db54d182ae3c56374d992b399142140a173f7658b2b6d496a20812c3d4e8e80cdefdee5f14c7c172453915186d03', 'espiasecreto@hotmail.com', '2017-06-20 13:09:59', 'user.svg'),
	(35, ' ', 'disponible', 'Sugar daddy JP', '69e1a028d26dddd83f5f4102fbdeedb26889db54d182ae3c56374d992b399142140a173f7658b2b6d496a20812c3d4e8e80cdefdee5f14c7c172453915186d03', 'correo@hotmail.com', '2017-06-20 13:16:09', 'IMG_TMyMDI2MjAxNzE3MFR1ZXNkYXlKdW5lMTQ5Nzk4M.jpg'),
	(36, 'fsdfdsf', 'prueba', '<h1>Hola perro</h1>', '69e1a028d26dddd83f5f4102fbdeedb26889db54d182ae3c56374d992b399142140a173f7658b2b6d496a20812c3d4e8e80cdefdee5f14c7c172453915186d03', 'correo1@hotmail.com', '2017-06-20 13:17:35', 'user.svg'),
	(37, 'hola', 'juanp', '<u>JP</u>', 'cc90d2f47ec4b8b0addb1392171f3fece9b9e15e0549759658729ad4fc756f54a643afceef95c6fdd895fe7fd91188db85eeb695ba2e4eaaaaf92276b74ebec6', 'jp@hotmail.com', '2017-06-20 13:34:24', 'user.svg'),
	(38, 'prueba', 'prueba2', '?><?=6?><?php', 'cc90d2f47ec4b8b0addb1392171f3fece9b9e15e0549759658729ad4fc756f54a643afceef95c6fdd895fe7fd91188db85eeb695ba2e4eaaaaf92276b74ebec6', 'jp@hotmail.com', '2017-06-20 13:37:20', 'user.svg'),
	(39, 'holaaaaa', 'qwerty', 'Juan Carlos', '1efd74479ed97d1bf4dacd909f27061d08a689a20260d7c73856c7142f46eda648f776194ee1e71cef164d1a5fc41ed2a70bf61fdc51d43f13f98e72f146185a', 'qw@sad.com', '2017-06-20 13:45:03', 'user.svg'),
	(40, 'Hola, yo soy Edgar :)', 'edgar', 'Edgar Osornio', '1efd74479ed97d1bf4dacd909f27061d08a689a20260d7c73856c7142f46eda648f776194ee1e71cef164d1a5fc41ed2a70bf61fdc51d43f13f98e72f146185a', 'edgar@hotmail.com', '2017-06-20 14:32:15', 'user.svg'),
	(41, 'SOY EL AMO DE SUS ALMAS', 'laloaguirre', 'Eduardo Aguirre', '29375b4b994c60d518379c9b8fb49821d4b641f154c72c901fc8b72c1e39e380d2203c22cfc10544dce2216bae1e45fff31ed67cd475b78a3747af35428ffe7b', 'lalo@uaq.mx', '2017-06-20 15:41:15', 'IMG_k1FMVVSVEZOYWtGNVRtcEpkMDFVWTNoT2VrSlZaR.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla proyectum.vistas
CREATE TABLE IF NOT EXISTS `vistas` (
  `idVista` int(11) NOT NULL AUTO_INCREMENT,
  `idPublicacion` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVista`),
  KEY `idPublicacion` (`idPublicacion`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idUsuario_2` (`idUsuario`),
  CONSTRAINT `vistas_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `vistas_ibfk_3` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`idPublicacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.vistas: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `vistas` DISABLE KEYS */;
INSERT INTO `vistas` (`idVista`, `idPublicacion`, `idUsuario`) VALUES
	(59, 30, 40),
	(60, 30, NULL),
	(61, 30, 41),
	(62, 31, 41),
	(63, 30, NULL),
	(64, 31, NULL),
	(65, 31, NULL),
	(66, 31, 1),
	(67, 30, NULL),
	(68, 30, 2),
	(69, 31, 2),
	(70, 31, NULL);
/*!40000 ALTER TABLE `vistas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
