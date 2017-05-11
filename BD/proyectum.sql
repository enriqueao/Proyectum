-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.19-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
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
  `categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.categorias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla proyectum.comentarios
CREATE TABLE IF NOT EXISTS `comentarios` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `comentario` varchar(150) DEFAULT NULL,
  `fechaComentario` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idComentario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.comentarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;

-- Volcando estructura para tabla proyectum.publicaciones
CREATE TABLE IF NOT EXISTS `publicaciones` (
  `idPublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `nombrePublicacion` varchar(50) NOT NULL DEFAULT 'Corregir Información',
  `descripcionCorta` varchar(100) NOT NULL,
  `descripcionLarga` varchar(200) DEFAULT NULL,
  `media1` varchar(50) DEFAULT NULL,
  `media2` varchar(50) DEFAULT NULL,
  `media3` varchar(50) DEFAULT NULL,
  `media4` varchar(50) DEFAULT NULL,
  `media5` varchar(50) DEFAULT NULL,
  `fechaDePublicacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPublicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.publicaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `publicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicaciones` ENABLE KEYS */;

-- Volcando estructura para tabla proyectum.reacciones
CREATE TABLE IF NOT EXISTS `reacciones` (
  `idReaccion` int(11) NOT NULL AUTO_INCREMENT,
  `idPublicacion` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `idTipoReaccion` tinyint(4),
  PRIMARY KEY (`idReaccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.reacciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reacciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `reacciones` ENABLE KEYS */;

-- Volcando estructura para tabla proyectum.tiposreacciones
CREATE TABLE IF NOT EXISTS `tiposreacciones` (
  `idTipoReaccion` int(11) NOT NULL AUTO_INCREMENT,
  `reaccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTipoReaccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.tiposreacciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tiposreacciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiposreacciones` ENABLE KEYS */;

-- Volcando estructura para tabla proyectum.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL,
  `nombrecompleto` varchar(30) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `fechaDeRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `imgProfile` varchar(200) DEFAULT 'user.svg',
  PRIMARY KEY (`idUsuario`,`username`,`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuario`, `descripcion`, `username`, `nombrecompleto`, `pass`, `correo`, `fechaDeRegistro`, `imgProfile`) VALUES
	(1, '0', 'enriqueao', 'Enrique Aguilar Orozco', '0945baab2d85aca9895251cf1a5d9797b175c4fae6821526367045d6d7232fb1df7bd8ecd78e550938988a5474d363041c63e23fd125186ae11efeb64de91ee9', 'enriqueao96@gmail.com', '2017-05-07 21:12:20', 'user.svg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla proyectum.vistas
CREATE TABLE IF NOT EXISTS `vistas` (
  `idVista` int(11) NOT NULL AUTO_INCREMENT,
  `username` int(11),
  PRIMARY KEY (`idVista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla proyectum.vistas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vistas` DISABLE KEYS */;
/*!40000 ALTER TABLE `vistas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
