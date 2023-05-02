-- --------------------------------------------------------
-- Host:                         18.220.22.111
-- Versión del servidor:         10.4.8-MariaDB-1:10.4.8+maria~bionic-log - mariadb.org binary distribution
-- SO del servidor:              debian-linux-gnu
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla upabasoft.C_Alumnos
CREATE TABLE IF NOT EXISTS `C_Alumnos` (
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres_usuarios` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `codigos_postales` varchar(5) NOT NULL,
  `claves` varchar(8) NOT NULL,
  PRIMARY KEY (`nombres_usuarios`),
  KEY `FK_C_Alumnos_C_Escuelas` (`claves`),
  CONSTRAINT `FK_C_Alumnos_C_Escuelas` FOREIGN KEY (`claves`) REFERENCES `C_Escuelas` (`claves`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_Alumnos: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `C_Alumnos` DISABLE KEYS */;
INSERT INTO `C_Alumnos` (`nombres`, `apellidos`, `nombres_usuarios`, `email`, `password`, `codigos_postales`, `claves`) VALUES
	('Axel', 'Avila', 'axel.avil', 'axel.avil@gmail.com', 'axel.avil', '55763', 'clave2'),
	('Braulio Melquisedec', 'Ojeda Contreras', 'braumel.oj', 'braumel@gmail.com', 'braumel151', '55763', 'clave2'),
	('Juan Pablo', 'Suarez Perez', 'breko151', 'brekopablo@gmail.com', 'brekopab151', '55763', 'clave1'),
	('Elanor ', 'Reyes Torres', 'elanor.rey', 'elanor.rey@gmail.com', 'elanor.rey', '55763', 'clave2'),
	('Karla Samantha', 'Jimenez Sanchez', 'karla.sama', 'karla.sama@gmail.com', 'karla.sama', '55763', 'clave2'),
	('Leonardo', 'MartÃ­nez', 'leo.mc', 'leo.mc@gmail.com', 'leomc', '09700', 'clave2'),
	('Luis Fernando', 'Suarez Perez', 'luis.fern', 'luis.fern@gmail.com', 'luis.fern', '55763', 'clave2'),
	('Luis Fernando', 'Suarez Salam', 'luisf101', 'luisf101@gmail.com', 'luisf1016', '55763', 'ESO0946'),
	('Usuario', 'Prueba', 'userp1', 'usuarioprueba1@gmail.com', 'userp1', '09700', 'clave2'),
	('Victor Ulises', 'Miranda Chavez', 'victor.ulis', 'victor.ulis@gmail.com', 'victor.ulis', '55763', 'clave2');
/*!40000 ALTER TABLE `C_Alumnos` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.C_Contacto
CREATE TABLE IF NOT EXISTS `C_Contacto` (
  `nombre_personal` varchar(100) DEFAULT NULL,
  `correo_personal` varchar(50) DEFAULT NULL,
  `mensaje` varchar(200) DEFAULT NULL,
  `nivel_escolar` varchar(10) DEFAULT 'Primaria',
  `nombre_escuela` varchar(100) NOT NULL DEFAULT 'NULL',
  `codigo_postal` varchar(50) DEFAULT NULL,
  `fecha` varchar(14) DEFAULT NULL,
  `hora` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`nombre_escuela`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_Contacto: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `C_Contacto` DISABLE KEYS */;
INSERT INTO `C_Contacto` (`nombre_personal`, `correo_personal`, `mensaje`, `nivel_escolar`, `nombre_escuela`, `codigo_postal`, `fecha`, `hora`) VALUES
	('Juan Pablo Suarez Perez', 'brekopablo@gmail.com', 'Hola, deseo dar de alta mi escuela...', 'Secundaria', 'Esc. Sec. Oficial 0946 Martires de Chicago ', '55789', '2020-06-08', '12:00'),
	('Juan Pablo Suarez Perez', 'brekopablo@gmail.com', 'Hola', 'Primaria', 'SSQqsss', 'ssqqssw', '0011-11-01', '11:11');
/*!40000 ALTER TABLE `C_Contacto` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.C_Directores
CREATE TABLE IF NOT EXISTS `C_Directores` (
  `nombres_usuarios` varchar(30) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `codigos_postales` varchar(8) NOT NULL,
  `claves` varchar(8) NOT NULL,
  `claves_directores` varchar(8) NOT NULL,
  PRIMARY KEY (`nombres_usuarios`),
  KEY `FK_C_Directores_C_Escuelas` (`claves`),
  KEY `FK_C_Directores_C_Escuelas2` (`claves_directores`),
  CONSTRAINT `FK_C_Directores_C_Escuelas` FOREIGN KEY (`claves`) REFERENCES `C_Escuelas` (`claves`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_C_Directores_C_Escuelas2` FOREIGN KEY (`claves_directores`) REFERENCES `C_Escuelas` (`claves_directores`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_Directores: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `C_Directores` DISABLE KEYS */;
INSERT INTO `C_Directores` (`nombres_usuarios`, `nombres`, `apellidos`, `email`, `password`, `codigos_postales`, `claves`, `claves_directores`) VALUES
	('axelfer1', 'Axel Fernando', 'Jimenez Suarez', 'axelfer@gmail.com', 'axelfer1', '66788', 'ESO0946', 'ESO0946D'),
	('braudir', 'Braumel', 'OC', 'braumel10@gmail.com', 'braudir', '09700', 'clave2', 'clave2d'),
	('pablo.rui', 'Pablito', 'Ruisenior', 'pablo.rui@gmail.com', 'pablo.rui', '55763', 'clave2', 'clave2d'),
	('pedro.cov', 'Pedro', 'Covarrubias', 'pedro.cov@gmail.com', 'pedro.cov', '55763', 'clave1', 'clave1d');
/*!40000 ALTER TABLE `C_Directores` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.C_Escuelas
CREATE TABLE IF NOT EXISTS `C_Escuelas` (
  `claves` varchar(8) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `codigos_postales` varchar(8) NOT NULL,
  `claves_directores` varchar(8) NOT NULL,
  `claves_profesores` varchar(8) NOT NULL,
  PRIMARY KEY (`claves`),
  KEY `claves_directores` (`claves_directores`),
  KEY `claves_profesores` (`claves_profesores`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_Escuelas: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `C_Escuelas` DISABLE KEYS */;
INSERT INTO `C_Escuelas` (`claves`, `nombres`, `email`, `codigos_postales`, `claves_directores`, `claves_profesores`) VALUES
	('clave1', 'Escuela de Prueba 1', 'escueladeprueba1@gmail.com', '55763', 'clave1d', 'clave1p'),
	('clave2', 'Escuela de Prueba 2', 'escueladeprueba2@gmail.com', '55763', 'clave2d', 'clave2p'),
	('ESO0946', 'Esc. Sec. Oficial 0946 Martires de Chicago', 'brekopablo@gmail.com', '55789', 'ESO0946D', 'ESO0946M');
/*!40000 ALTER TABLE `C_Escuelas` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.C_Examenes
CREATE TABLE IF NOT EXISTS `C_Examenes` (
  `clave_examen` varchar(8) NOT NULL,
  `user_profe` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(50) NOT NULL DEFAULT 'titulo',
  `clave_materia` varchar(35) NOT NULL,
  `clave_escuela` varchar(8) NOT NULL,
  `fechaMax` date NOT NULL,
  `horaMax` time NOT NULL,
  `duracion` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`clave_examen`,`user_profe`,`fecha`),
  KEY `FK_c_examenes` (`user_profe`),
  KEY `FK_c_examenes2` (`clave_escuela`,`clave_materia`),
  CONSTRAINT `FK_c_examenes` FOREIGN KEY (`user_profe`) REFERENCES `C_Maestros` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_c_examenes2` FOREIGN KEY (`clave_escuela`, `clave_materia`) REFERENCES `C_Materia` (`claves_escuela`, `claves_materias`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_Examenes: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `C_Examenes` DISABLE KEYS */;
INSERT INTO `C_Examenes` (`clave_examen`, `user_profe`, `fecha`, `titulo`, `clave_materia`, `clave_escuela`, `fechaMax`, `horaMax`, `duracion`) VALUES
	('Examen1', 'profeb.21', '2020-04-18', 'Examencito de Prueba 1', 'fis4', 'clave2', '2020-05-20', '23:00:00', 10),
	('examen2', 'profeb.21', '2020-06-03', 'Examencito de Prueba 2', 'fis4', 'clave2', '2020-06-05', '18:30:00', 20),
	('examen3', 'profeb.21', '2020-06-06', 'Examencito de Prueba 3', 'fis4', 'clave2', '2020-06-08', '21:30:00', 20);
/*!40000 ALTER TABLE `C_Examenes` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.C_Grupo
CREATE TABLE IF NOT EXISTS `C_Grupo` (
  `clave_grupo` varchar(10) NOT NULL,
  `clave_escuela` varchar(8) NOT NULL,
  `grupo` varchar(8) NOT NULL,
  PRIMARY KEY (`clave_grupo`,`clave_escuela`),
  KEY `FK_grupos_clave_escuela` (`clave_escuela`),
  CONSTRAINT `FK_grupos_clave_escuela` FOREIGN KEY (`clave_escuela`) REFERENCES `C_Escuelas` (`claves`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_Grupo: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `C_Grupo` DISABLE KEYS */;
INSERT INTO `C_Grupo` (`clave_grupo`, `clave_escuela`, `grupo`) VALUES
	('1IM1', 'ESO0946', '1A'),
	('2IM1', 'ESO0946', '2A'),
	('3IM1', 'ESO0946', '3A'),
	('BT1IM5', 'clave1', '1IM5'),
	('BT1IM5', 'clave2', '1IM5'),
	('BT1IM6', 'clave1', '1IM6'),
	('BT1IM7', 'clave1', '1IM7'),
	('BT6IM7', 'clave2', '6IM7'),
	('BT6IM8', 'clave2', '6IM8'),
	('BT6IM9', 'clave2', '6IM9');
/*!40000 ALTER TABLE `C_Grupo` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.C_Grupos
CREATE TABLE IF NOT EXISTS `C_Grupos` (
  `claves` varchar(6) NOT NULL,
  `nombre_grupo` varchar(10) NOT NULL,
  `contraseña` varchar(5) NOT NULL,
  PRIMARY KEY (`claves`,`nombre_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_Grupos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `C_Grupos` DISABLE KEYS */;
/*!40000 ALTER TABLE `C_Grupos` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.C_Maestros
CREATE TABLE IF NOT EXISTS `C_Maestros` (
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres_usuarios` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `codigos_postales` varchar(8) NOT NULL,
  `claves` varchar(8) NOT NULL,
  `claves_profesores` varchar(8) NOT NULL,
  PRIMARY KEY (`nombres_usuarios`),
  KEY `FK_C_Maestros_C_Escuelas` (`claves`),
  KEY `FK_C_Maestros_C_Escuelas_2` (`claves_profesores`),
  CONSTRAINT `FK_C_Maestros_C_Escuelas_2` FOREIGN KEY (`claves_profesores`) REFERENCES `C_Escuelas` (`claves_profesores`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_Maestros: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `C_Maestros` DISABLE KEYS */;
INSERT INTO `C_Maestros` (`nombres`, `apellidos`, `nombres_usuarios`, `email`, `password`, `codigos_postales`, `claves`, `claves_profesores`) VALUES
	('Argelio', 'Martinoli Sanchez', 'argelinima', 'argelinima@gmail.com', 'argelinima', '55763', 'ESO0946', 'ESO0946M'),
	('Juan Pablo', 'Suarez Perez', 'brekopablo', 'brekopablo@gmail.com', 'brekopab151', '55764', 'ESO0946', 'ESO0946M'),
	('Gamaliel', 'DÃ­az', 'gamita', 'gamitabb@gmail.com', 'gamabb', '12345', 'clave2', 'clave2p'),
	('Profe', 'Uno', 'profeb', 'profe1@gmail.com', 'profe1f', '09700', 'clave1', 'clave1p'),
	('Profe', 'Uno', 'profeb.12', 'profe1@gmail.com', 'profe1f1', '09700', 'clave1', 'clave1p'),
	('Juan Pablo', 'Miranda Chavez', 'profeb.21', 'profe2@gmail.com', 'profe1f1', '09700', 'clave2', 'clave2p'),
	('Profe', 'Prueba 1', 'profep1', 'profep1@gmail.com', 'profep1', '09700', 'clave2', 'clave2p');
/*!40000 ALTER TABLE `C_Maestros` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.C_Materia
CREATE TABLE IF NOT EXISTS `C_Materia` (
  `claves_escuela` varchar(8) NOT NULL,
  `nombre_materia` varchar(40) NOT NULL,
  `claves_materias` varchar(35) NOT NULL,
  PRIMARY KEY (`claves_escuela`,`claves_materias`),
  CONSTRAINT `FK1C_Materia` FOREIGN KEY (`claves_escuela`) REFERENCES `C_Directores` (`claves`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_Materia: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `C_Materia` DISABLE KEYS */;
INSERT INTO `C_Materia` (`claves_escuela`, `nombre_materia`, `claves_materias`) VALUES
	('clave2', 'FÃ­sica IV', 'fis4'),
	('clave2', 'InglÃ©s VI', 'ingles6'),
	('clave2', 'Probabilidad y EstadÃ­stica', 'probaest'),
	('clave2', 'QuÃ­mica IV', 'quim4'),
	('ESO0946', 'FISICA 1', 'FIS1'),
	('ESO0946', 'HISTORIA III', 'HIS3'),
	('ESO0946', 'MATEMATICAS I', 'MAT1');
/*!40000 ALTER TABLE `C_Materia` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.C_Publicaciones
CREATE TABLE IF NOT EXISTS `C_Publicaciones` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(30) NOT NULL,
  `clave` varchar(8) NOT NULL,
  `publicacion` text NOT NULL,
  `puesto` varchar(50) NOT NULL DEFAULT '0',
  `nombres` varchar(50) NOT NULL DEFAULT '0',
  `apellidos` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_C_Publicaciones_C_Directores` (`nombre_usuario`),
  KEY `FK_C_Publicaciones_C_Escuelas` (`clave`),
  CONSTRAINT `FK_C_Publicaciones_C_Directores` FOREIGN KEY (`nombre_usuario`) REFERENCES `C_Directores` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_C_Publicaciones_C_Escuelas` FOREIGN KEY (`clave`) REFERENCES `C_Escuelas` (`claves`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_Publicaciones: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `C_Publicaciones` DISABLE KEYS */;
INSERT INTO `C_Publicaciones` (`id`, `nombre_usuario`, `clave`, `publicacion`, `puesto`, `nombres`, `apellidos`) VALUES
	(1, 'pablo.rui', 'clave2', 'Hola Chaviza loca', 'Director', 'Pablo', 'RuiseÃ±or'),
	(2, 'pablo.rui', 'clave2', 'Esperos se encuentren bien', 'Director', 'Pablo', 'RuiseÃ±or'),
	(3, 'pablo.rui', 'clave2', 'https://www.youtube.com/watch?v=WWUoq4RtHV0}', 'Director', 'Pablo', 'RuiseÃ±or'),
	(6, 'pedro.cov', 'clave1', 'Publicacion de Prueba Pedro\r\n', 'Director', 'Pedro', 'Covarruvias'),
	(7, 'pedro.cov', 'clave1', 'Publicacion de Prueba 2 Pedro \r\n', 'Director', 'Pedro', 'Covarruvias'),
	(18, 'pablo.rui', 'clave2', 'PublicaciÃ³n prueba 3 Mayo PR', 'Director', 'Pablito', 'RuiseÃ±or'),
	(19, 'axelfer1', 'ESO0946', 'Hola, inician clases online', 'Director', 'Axel Fernando', 'Jimenez Suarez');
/*!40000 ALTER TABLE `C_Publicaciones` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.C_Publicaciones_Alumno
CREATE TABLE IF NOT EXISTS `C_Publicaciones_Alumno` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(30) NOT NULL,
  `clave` varchar(8) NOT NULL,
  `publicacion` text DEFAULT NULL,
  `puesto` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_C_Publicaciones_Alumno_C_Alumnos` (`nombre_usuario`),
  KEY `FK_C_Publicaciones_Alumno_C_Escuelas` (`clave`),
  CONSTRAINT `FK_C_Publicaciones_Alumno_C_Alumnos` FOREIGN KEY (`nombre_usuario`) REFERENCES `C_Alumnos` (`nombres_usuarios`),
  CONSTRAINT `FK_C_Publicaciones_Alumno_C_Escuelas` FOREIGN KEY (`clave`) REFERENCES `C_Escuelas` (`claves`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_Publicaciones_Alumno: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `C_Publicaciones_Alumno` DISABLE KEYS */;
INSERT INTO `C_Publicaciones_Alumno` (`id`, `nombre_usuario`, `clave`, `publicacion`, `puesto`, `nombres`, `apellidos`) VALUES
	(1, 'axel.avil', 'clave2', 'Hola queridos amigos\r\n', 'Alumno', 'Axel', 'Avila'),
	(2, 'axel.avil', 'clave2', 'XD', 'Alumno', 'Axel', 'Avila'),
	(4, 'karla.sama', 'clave2', 'Hola Amigos', 'Alumno', 'Karla Samantha', 'Jimenez Sanchez'),
	(10, 'braumel.oj', 'clave2', 'Merci', 'Alumno', 'Braulio Melquisedec', 'Ojeda Contreras'),
	(11, 'braumel.oj', 'clave2', 'Merci2', 'Alumno', 'Braulio Melquisedec', 'Ojeda Contreras'),
	(12, 'braumel.oj', 'clave2', 'Merci3', 'Alumno', 'Braulio Melquisedec', 'Ojeda Contreras'),
	(13, 'braumel.oj', 'clave2', 'Merci4', 'Alumno', 'Braulio Melquisedec', 'Ojeda Contreras'),
	(15, 'braumel.oj', 'clave2', 'Merci5', 'Alumno', 'Braulio Melquisedec', 'Ojeda Contreras'),
	(17, 'userp1', 'clave2', 'PublicaciÃ³n de userp1 1.0', 'Alumno', 'Usuario', 'Prueba'),
	(18, 'userp1', 'clave2', 'PublicaciÃ³n de userp1 2.0', 'Alumno', 'Usuario', 'Prueba'),
	(19, 'userp1', 'clave2', 'PublicaciÃ³n de userp1 3.0', 'Alumno', 'Usuario', 'Prueba'),
	(20, 'luisf101', 'ESO0946', 'Hola', 'Alumno', 'Luis Fernando', 'Suarez Salam'),
	(21, 'luisf101', 'ESO0946', 'Gracias', 'Alumno', 'Luis Fernando', 'Suarez Salam');
/*!40000 ALTER TABLE `C_Publicaciones_Alumno` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.C_Publicaciones_Maestro
CREATE TABLE IF NOT EXISTS `C_Publicaciones_Maestro` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(30) NOT NULL,
  `clave` varchar(8) NOT NULL,
  `publicacion` text DEFAULT NULL,
  `puesto` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_C_Publicaciones_Maestro_C_Maestros` (`nombre_usuario`),
  KEY `FK_C_Publicaciones_Maestro_C_Escuelas` (`clave`),
  CONSTRAINT `FK_C_Publicaciones_Maestro_C_Escuelas` FOREIGN KEY (`clave`) REFERENCES `C_Escuelas` (`claves`),
  CONSTRAINT `FK_C_Publicaciones_Maestro_C_Maestros` FOREIGN KEY (`nombre_usuario`) REFERENCES `C_Maestros` (`nombres_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_Publicaciones_Maestro: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `C_Publicaciones_Maestro` DISABLE KEYS */;
INSERT INTO `C_Publicaciones_Maestro` (`id`, `nombre_usuario`, `clave`, `publicacion`, `puesto`, `nombres`, `apellidos`) VALUES
	(1, 'profeb.21', 'clave2', 'Prueba del Profe Juan Pablo', 'Maestro', 'Juan Pablo', 'Miranda Chavez'),
	(2, 'profeb.21', 'clave2', 'Hola\r\n', 'Maestro', 'Juan Pablo', 'Miranda Chavez'),
	(3, 'profeb.21', 'clave2', 'Prueba profeb.21 1', 'Maestro', 'Juan Pablo', 'Miranda Chavez'),
	(4, 'brekopablo', 'ESO0946', 'Hola, Gracias', 'Maestro', 'Juan Pablo', 'Suarez Perez');
/*!40000 ALTER TABLE `C_Publicaciones_Maestro` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.C_UPABA
CREATE TABLE IF NOT EXISTS `C_UPABA` (
  `email` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.C_UPABA: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `C_UPABA` DISABLE KEYS */;
INSERT INTO `C_UPABA` (`email`, `usuario`, `password`) VALUES
	('upabasoft.sa.cv@gmail.com', 'UPABAsoft', 'upabasoft395');
/*!40000 ALTER TABLE `C_UPABA` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.Datos
CREATE TABLE IF NOT EXISTS `Datos` (
  `usuario` varchar(50) NOT NULL DEFAULT 'user',
  `correo` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.Datos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `Datos` DISABLE KEYS */;
INSERT INTO `Datos` (`usuario`, `correo`, `password`) VALUES
	('aa', 'aa', 'aa'),
	('Axel', 'axel.adrian02@gmail.com', 'axel1'),
	('Axel1', 'aaaa', '123'),
	('ho', 'ajakak@hotmail.com', 'ho'),
	('Usuario1', 'user1@gmail.com', 'user123'),
	('usuario2', 'user2@gmail.com', 'user1234');
/*!40000 ALTER TABLE `Datos` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.D_Examenes
CREATE TABLE IF NOT EXISTS `D_Examenes` (
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `clave_examen` varchar(10) NOT NULL DEFAULT '0',
  `user_profe` varchar(30) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `clasificacion` tinytext NOT NULL DEFAULT 'p',
  `enunciado` varchar(100) NOT NULL DEFAULT 'enunciado',
  PRIMARY KEY (`Index`),
  KEY `FK_d_examenes` (`clave_examen`,`user_profe`,`fecha`),
  CONSTRAINT `FK_d_examenes` FOREIGN KEY (`clave_examen`, `user_profe`, `fecha`) REFERENCES `C_Examenes` (`clave_examen`, `user_profe`, `fecha`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=462 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.D_Examenes: ~45 rows (aproximadamente)
/*!40000 ALTER TABLE `D_Examenes` DISABLE KEYS */;
INSERT INTO `D_Examenes` (`Index`, `clave_examen`, `user_profe`, `fecha`, `clasificacion`, `enunciado`) VALUES
	(307, 'Examen1', 'profeb.21', '2020-04-18', '1a', '1a'),
	(308, 'Examen1', 'profeb.21', '2020-04-18', '1p', 'Pregunta1'),
	(309, 'Examen1', 'profeb.21', '2020-04-18', '2a', '2a'),
	(310, 'Examen1', 'profeb.21', '2020-04-18', '1c', '1c'),
	(311, 'Examen1', 'profeb.21', '2020-04-18', '1b', '1b'),
	(312, 'Examen1', 'profeb.21', '2020-04-18', '2c', '2c'),
	(313, 'Examen1', 'profeb.21', '2020-04-18', '2p', 'Pregunta 2'),
	(314, 'Examen1', 'profeb.21', '2020-04-18', '1d', 'CORRECTA1'),
	(315, 'Examen1', 'profeb.21', '2020-04-18', '3c', '3c'),
	(316, 'Examen1', 'profeb.21', '2020-04-18', '2d', 'CORRECTA2'),
	(317, 'Examen1', 'profeb.21', '2020-04-18', '3p', 'Pregunta 3'),
	(318, 'Examen1', 'profeb.21', '2020-04-18', '3d', 'CORRECTA 3'),
	(319, 'Examen1', 'profeb.21', '2020-04-18', '2b', '2b'),
	(320, 'Examen1', 'profeb.21', '2020-04-18', '3a', '3a'),
	(321, 'Examen1', 'profeb.21', '2020-04-18', '3b', '3b'),
	(367, 'examen2', 'profeb.21', '2020-06-03', '1a', 'incorrecta1'),
	(368, 'examen2', 'profeb.21', '2020-06-03', '1p', 'Pregunta1'),
	(369, 'examen2', 'profeb.21', '2020-06-03', '1b', 'incorrecta2'),
	(370, 'examen2', 'profeb.21', '2020-06-03', '1c', 'incorrecta3'),
	(371, 'examen2', 'profeb.21', '2020-06-03', '1d', 'CorrectaP1'),
	(372, 'examen2', 'profeb.21', '2020-06-03', '2d', 'CorrectaP2'),
	(373, 'examen2', 'profeb.21', '2020-06-03', '3b', 'incorrecta32'),
	(374, 'examen2', 'profeb.21', '2020-06-03', '2p', 'Pregunta2'),
	(375, 'examen2', 'profeb.21', '2020-06-03', '3p', 'Pregunta3'),
	(376, 'examen2', 'profeb.21', '2020-06-03', '2a', 'incorrecta21'),
	(377, 'examen2', 'profeb.21', '2020-06-03', '2b', 'incorrecta22'),
	(378, 'examen2', 'profeb.21', '2020-06-03', '2c', 'incorrecta23'),
	(379, 'examen2', 'profeb.21', '2020-06-03', '3c', 'incorrecta33'),
	(380, 'examen2', 'profeb.21', '2020-06-03', '3d', 'CorrectaP3'),
	(381, 'examen2', 'profeb.21', '2020-06-03', '3a', 'incorrecta31'),
	(447, 'examen3', 'profeb.21', '2020-06-06', '1a', 'inc 1.1'),
	(448, 'examen3', 'profeb.21', '2020-06-06', '1c', 'inc 1.3'),
	(449, 'examen3', 'profeb.21', '2020-06-06', '3d', 'Correcta 3'),
	(450, 'examen3', 'profeb.21', '2020-06-06', '1p', 'Pregunta 1'),
	(451, 'examen3', 'profeb.21', '2020-06-06', '1b', 'inc 1.2'),
	(452, 'examen3', 'profeb.21', '2020-06-06', '1d', 'Correcta 1'),
	(453, 'examen3', 'profeb.21', '2020-06-06', '3b', 'inc 3.2'),
	(454, 'examen3', 'profeb.21', '2020-06-06', '3p', 'Pregunta 3'),
	(455, 'examen3', 'profeb.21', '2020-06-06', '2c', 'inc 2.3'),
	(456, 'examen3', 'profeb.21', '2020-06-06', '2a', 'inc 2.1'),
	(457, 'examen3', 'profeb.21', '2020-06-06', '3a', 'inc 3.1'),
	(458, 'examen3', 'profeb.21', '2020-06-06', '2b', 'inc 2.2'),
	(459, 'examen3', 'profeb.21', '2020-06-06', '2p', 'Pregunta 2'),
	(460, 'examen3', 'profeb.21', '2020-06-06', '2d', 'Correcta 2'),
	(461, 'examen3', 'profeb.21', '2020-06-06', '3c', 'inc 3.3');
/*!40000 ALTER TABLE `D_Examenes` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.D_RespuestasExamen
CREATE TABLE IF NOT EXISTS `D_RespuestasExamen` (
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `clave_examen` varchar(8) NOT NULL,
  `user_profe` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `user_alumno` varchar(30) NOT NULL,
  `numero_pregunta` int(11) NOT NULL DEFAULT 0,
  `respuesta` varchar(100) NOT NULL,
  PRIMARY KEY (`Index`),
  KEY `fk_d_re1` (`clave_examen`,`user_profe`,`fecha`),
  KEY `fk_d_re2` (`user_alumno`),
  CONSTRAINT `fk_d_re1` FOREIGN KEY (`clave_examen`, `user_profe`, `fecha`) REFERENCES `C_Examenes` (`clave_examen`, `user_profe`, `fecha`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_d_re2` FOREIGN KEY (`user_alumno`) REFERENCES `C_Alumnos` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='Aquí irán las respuestas contestadas para manejar sus estadísticas';

-- Volcando datos para la tabla upabasoft.D_RespuestasExamen: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `D_RespuestasExamen` DISABLE KEYS */;
INSERT INTO `D_RespuestasExamen` (`Index`, `clave_examen`, `user_profe`, `fecha`, `user_alumno`, `numero_pregunta`, `respuesta`) VALUES
	(1, 'Examen1', 'profeb.21', '2020-04-18', 'braumel.oj', 3, 'CORRECTA 3'),
	(2, 'Examen1', 'profeb.21', '2020-04-18', 'braumel.oj', 2, 'CORRECTA2'),
	(3, 'Examen1', 'profeb.21', '2020-04-18', 'braumel.oj', 1, 'CORRECTA1'),
	(4, 'examen2', 'profeb.21', '2020-06-03', 'braumel.oj', 3, 'CorrectaP3'),
	(5, 'examen2', 'profeb.21', '2020-06-03', 'braumel.oj', 1, 'CorrectaP1'),
	(6, 'examen2', 'profeb.21', '2020-06-03', 'braumel.oj', 2, 'CorrectaP2'),
	(7, 'examen3', 'profeb.21', '2020-06-06', 'braumel.oj', 3, 'Correcta 3'),
	(8, 'examen3', 'profeb.21', '2020-06-06', 'braumel.oj', 2, 'Correcta 2'),
	(9, 'examen3', 'profeb.21', '2020-06-06', 'braumel.oj', 1, 'Correcta 1');
/*!40000 ALTER TABLE `D_RespuestasExamen` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.D_ResultadoExamenes
CREATE TABLE IF NOT EXISTS `D_ResultadoExamenes` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `clave_examen` varchar(8) NOT NULL,
  `user_profe` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `user_alumno` varchar(30) NOT NULL,
  `puntaje` int(11) NOT NULL DEFAULT 0,
  `estado_examen` varchar(20) NOT NULL DEFAULT 'No iniciado',
  `fechaInicio` date NOT NULL,
  `horaInicio` time NOT NULL,
  `tiempo` decimal(10,3) NOT NULL DEFAULT 0.000,
  `fechaFin` date NOT NULL,
  `horaFin` time NOT NULL,
  PRIMARY KEY (`index`),
  KEY `FK_dre_1` (`clave_examen`,`user_profe`,`fecha`),
  KEY `FK_dre_alumno` (`user_alumno`),
  CONSTRAINT `FK_dre_1` FOREIGN KEY (`clave_examen`, `user_profe`, `fecha`) REFERENCES `C_Examenes` (`clave_examen`, `user_profe`, `fecha`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_dre_alumno` FOREIGN KEY (`user_alumno`) REFERENCES `C_Alumnos` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.D_ResultadoExamenes: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `D_ResultadoExamenes` DISABLE KEYS */;
INSERT INTO `D_ResultadoExamenes` (`index`, `clave_examen`, `user_profe`, `fecha`, `user_alumno`, `puntaje`, `estado_examen`, `fechaInicio`, `horaInicio`, `tiempo`, `fechaFin`, `horaFin`) VALUES
	(37, 'Examen1', 'profeb.21', '2020-04-18', 'braumel.oj', 3, 'Terminado', '2020-05-05', '21:36:54', 0.200, '2020-05-05', '21:46:54'),
	(38, 'examen2', 'profeb.21', '2020-06-03', 'braumel.oj', 3, 'Terminado', '2020-06-03', '20:13:22', 0.400, '2020-06-03', '20:33:22'),
	(39, 'examen3', 'profeb.21', '2020-06-06', 'braumel.oj', 3, 'Terminado', '2020-06-06', '21:40:16', 0.450, '2020-06-06', '22:00:16');
/*!40000 ALTER TABLE `D_ResultadoExamenes` ENABLE KEYS */;

-- Volcando estructura para procedimiento upabasoft.InicioSesion
DELIMITER //
CREATE DEFINER=`upabasoft`@`%` PROCEDURE `InicioSesion`(in usuario varchar(20))
begin
select * from C_Directores where nombres_usuarios like usuario;
select * from C_Escuelas where claves like 'ABCDEF';
end//
DELIMITER ;

-- Volcando estructura para procedimiento upabasoft.insertEscuela
DELIMITER //
CREATE DEFINER=`upabasoft`@`%` PROCEDURE `insertEscuela`(
IN _claves varchar(6),
_nombres varchar(100),
_email varchar(50),
_codigos_postales varchar(6),
_claves_directores varchar(6),
_claves_profesores varchar(6)
)
BEGIN
INSERT INTO C_Escuelas(claves, nombres, email, codigos_postales, claves_directores, claves_profesores) VALUES (_claves, _nombres, _email, _codigos_postales, _claves_directores, _claves_profesores);
END//
DELIMITER ;

-- Volcando estructura para tabla upabasoft.M_Alumno_grupo
CREATE TABLE IF NOT EXISTS `M_Alumno_grupo` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `clave_grupo` varchar(8) NOT NULL,
  `user_alumno` varchar(30) NOT NULL,
  `clave_escuela` varchar(10) NOT NULL,
  PRIMARY KEY (`index`),
  KEY `FK_mag_user_alumno` (`user_alumno`),
  KEY `FK_mag_grupitos` (`clave_grupo`,`clave_escuela`),
  CONSTRAINT `FK_mag_grupitos` FOREIGN KEY (`clave_grupo`, `clave_escuela`) REFERENCES `C_Grupo` (`clave_grupo`, `clave_escuela`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mag_user_alumno` FOREIGN KEY (`user_alumno`) REFERENCES `C_Alumnos` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.M_Alumno_grupo: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `M_Alumno_grupo` DISABLE KEYS */;
INSERT INTO `M_Alumno_grupo` (`index`, `clave_grupo`, `user_alumno`, `clave_escuela`) VALUES
	(1, 'BT6IM8', 'braumel.oj', 'clave2'),
	(11, 'BT6IM8', 'axel.avil', 'clave2'),
	(12, 'BT6IM8', 'elanor.rey', 'clave2'),
	(20, 'BT6IM8', 'victor.ulis', 'clave2'),
	(27, 'BT6IM8', 'leo.mc', 'clave2'),
	(28, 'BT6IM8', 'userp1', 'clave2'),
	(29, '1IM1', 'luisf101', 'ESO0946');
/*!40000 ALTER TABLE `M_Alumno_grupo` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.M_Asignacion_Examenes
CREATE TABLE IF NOT EXISTS `M_Asignacion_Examenes` (
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `clave_examen` varchar(10) NOT NULL DEFAULT '0',
  `user_profe` varchar(30) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL DEFAULT curdate(),
  `clave_grupo` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Index`),
  KEY `FK_asign_exams` (`clave_examen`,`user_profe`,`fecha`),
  KEY `FK_asign_exams2` (`clave_grupo`),
  CONSTRAINT `FK_asign_exams` FOREIGN KEY (`clave_examen`, `user_profe`, `fecha`) REFERENCES `C_Examenes` (`clave_examen`, `user_profe`, `fecha`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_asign_exams2` FOREIGN KEY (`clave_grupo`) REFERENCES `C_Grupo` (`clave_grupo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.M_Asignacion_Examenes: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `M_Asignacion_Examenes` DISABLE KEYS */;
INSERT INTO `M_Asignacion_Examenes` (`Index`, `clave_examen`, `user_profe`, `fecha`, `clave_grupo`) VALUES
	(57, 'Examen1', 'profeb.21', '2020-04-18', 'BT6IM8'),
	(58, 'Examen1', 'profeb.21', '2020-04-18', 'BT6IM7'),
	(62, 'examen2', 'profeb.21', '2020-06-03', 'BT6IM7'),
	(63, 'examen2', 'profeb.21', '2020-06-03', 'BT6IM7'),
	(64, 'examen2', 'profeb.21', '2020-06-03', 'BT6IM9'),
	(65, 'examen2', 'profeb.21', '2020-06-03', 'BT6IM8'),
	(73, 'examen3', 'profeb.21', '2020-06-06', 'BT6IM8'),
	(74, 'examen3', 'profeb.21', '2020-06-06', 'BT6IM9'),
	(75, 'examen3', 'profeb.21', '2020-06-06', 'BT6IM7');
/*!40000 ALTER TABLE `M_Asignacion_Examenes` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.M_Calificada
CREATE TABLE IF NOT EXISTS `M_Calificada` (
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `Color` varchar(10) NOT NULL DEFAULT 'Verde',
  `usuario_alumno` varchar(30) NOT NULL DEFAULT 'alumno',
  `fecha` date NOT NULL DEFAULT curdate(),
  `clave_materia` varchar(35) NOT NULL DEFAULT 'clave',
  `clave_escuela` varchar(8) NOT NULL DEFAULT 'clave',
  `comentario` varchar(100) NOT NULL DEFAULT 'NULL',
  `usuario_profe` varchar(30) NOT NULL DEFAULT 'profe',
  PRIMARY KEY (`Index`),
  KEY `FK3_user_profe` (`usuario_profe`),
  KEY `FK_2` (`clave_escuela`,`clave_materia`),
  KEY `FK_user_alumno` (`usuario_alumno`),
  CONSTRAINT `FK3_user_profe` FOREIGN KEY (`usuario_profe`) REFERENCES `C_Maestros` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_2` FOREIGN KEY (`clave_escuela`, `clave_materia`) REFERENCES `C_Materia` (`claves_escuela`, `claves_materias`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_alumno` FOREIGN KEY (`usuario_alumno`) REFERENCES `C_Alumnos` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1 COMMENT='Tabla de Calificaciones "diarias" del Alumno hacia el Profe';

-- Volcando datos para la tabla upabasoft.M_Calificada: ~39 rows (aproximadamente)
/*!40000 ALTER TABLE `M_Calificada` DISABLE KEYS */;
INSERT INTO `M_Calificada` (`Index`, `Color`, `usuario_alumno`, `fecha`, `clave_materia`, `clave_escuela`, `comentario`, `usuario_profe`) VALUES
	(1, 'Verde', 'braumel.oj', '2020-03-07', 'fis4', 'clave2', 'Bien chida la clase', 'profeb.21'),
	(2, 'Verde', 'braumel.oj', '2020-03-07', 'probaest', 'clave2', 'Bien chidoo', 'profeb.21'),
	(11, 'Amarillo', 'breko151', '2020-03-07', 'fis4', 'clave2', 'NULL', 'profeb.21'),
	(12, 'Amarillo', 'elanor.rey', '2020-03-07', 'fis4', 'clave2', 'NULL', 'profeb.21'),
	(13, 'Verde', 'braumel.oj', '2020-03-08', 'fis4', 'clave2', 'NULL', 'profeb.21'),
	(14, 'Rojo', 'braumel.oj', '2020-03-08', 'probaest', 'clave2', 'Comentario de Prueba Rojo', 'profeb.21'),
	(15, 'Amarillo', 'braumel.oj', '2020-03-09', 'fis4', 'clave2', 'comentario', 'profeb.21'),
	(16, 'Verde', 'braumel.oj', '2020-03-09', 'probaest', 'clave2', 'OpiniÃ³n de Prueba Verde', 'profeb.21'),
	(17, 'Verde', 'elanor.rey', '2020-03-09', 'fis4', 'clave2', 'NULL', 'profeb.21'),
	(18, 'Rojo', 'breko151', '2020-03-09', 'fis4', 'clave2', 'NULL', 'profeb.21'),
	(19, 'Verde', 'victor.ulis', '2020-03-09', 'fis4', 'clave2', 'NULL', 'profeb.21'),
	(20, 'Verde', 'breko151', '2020-03-09', 'probaest', 'clave2', 'NULL', 'profeb.21'),
	(22, 'Rojo', 'elanor.rey', '2020-03-09', 'probaest', 'clave2', 'NULL', 'profeb.21'),
	(23, 'Verde', 'braumel.oj', '2020-03-10', 'fis4', 'clave2', 'Comentario Verde 10Marzo', 'profeb.21'),
	(24, 'Verde', 'braumel.oj', '2020-03-10', 'probaest', 'clave2', 'Comentario Verde 10Marzo', 'profeb.21'),
	(25, 'Verde', 'braumel.oj', '2020-03-11', 'fis4', 'clave2', 'comentario', 'profeb.21'),
	(26, 'Verde', 'braumel.oj', '2020-03-11', 'probaest', 'clave2', 'comentario', 'profeb.21'),
	(27, 'Verde', 'braumel.oj', '2020-03-12', 'fis4', 'clave2', 'Comentario Verde 12 Marzo', 'profeb.21'),
	(28, 'Verde', 'braumel.oj', '2020-03-12', 'probaest', 'clave2', 'Comentario Verde 12 Marzo', 'profeb.21'),
	(29, 'Verde', 'braumel.oj', '2020-03-16', 'fis4', 'clave2', 'comentario', 'profeb.21'),
	(30, 'Verde', 'braumel.oj', '2020-03-16', 'probaest', 'clave2', 'comentario', 'profeb.21'),
	(32, 'Verde', 'braumel.oj', '2020-03-17', 'fis4', 'clave2', 'comentario1', 'profeb.21'),
	(37, 'Verde', 'victor.ulis', '2020-03-17', 'fis4', 'clave2', 'comentario6', 'profeb.21'),
	(39, 'Verde', 'braumel.oj', '2020-03-18', 'fis4', 'clave2', 'comentario', 'profeb.21'),
	(40, 'Verde', 'braumel.oj', '2020-04-12', 'fis4', 'clave2', 'Comentario del 12 de Marzo', 'profeb.21'),
	(41, 'Verde', 'braumel.oj', '2020-04-15', 'fis4', 'clave2', 'comentario', 'profeb.21'),
	(42, 'Verde', 'braumel.oj', '2020-04-19', 'fis4', 'clave2', 'NULL', 'profeb.21'),
	(43, 'Verde', 'braumel.oj', '2020-04-19', 'probaest', 'clave2', 'Comentario del 19 de Marzo', 'profeb.21'),
	(44, 'Verde', 'braumel.oj', '2020-04-22', 'fis4', 'clave2', 'Comentario del 22 de marzo', 'profeb.21'),
	(45, 'Amarillo', 'braumel.oj', '2020-04-23', 'fis4', 'clave2', 'Amarillo 23 de Marzo', 'profeb.21'),
	(46, 'Verde', 'leo.mc', '2020-05-30', 'fis4', 'clave2', 'Comentario Leo 30 Mayo', 'profeb.21'),
	(54, 'Verde', 'braumel.oj', '2020-06-01', 'fis4', 'clave2', 'Prueba 1 Junio', 'profeb.21'),
	(55, 'Rojo', 'braumel.oj', '2020-06-03', 'fis4', 'clave2', 'Comentario rojo 3 Junio', 'profeb.21'),
	(56, 'Rojo', 'braumel.oj', '2020-06-03', 'probaest', 'clave2', 'Comentario Rojo 3 Junio', 'profeb.21'),
	(57, 'Rojo', 'axel.avil', '2020-06-04', 'fis4', 'clave2', 'Apesta', 'profeb.21'),
	(58, 'Amarillo', 'axel.avil', '2020-06-04', 'fis4', 'clave2', 'Maso', 'profeb.21'),
	(59, 'Verde', 'axel.avil', '2020-06-04', 'probaest', 'clave2', 'ffggg', 'profeb.21'),
	(60, 'Verde', 'userp1', '2020-06-06', 'fis4', 'clave2', 'Comentario de prueba userp1', 'profeb.21'),
	(61, 'Verde', 'luisf101', '2020-06-08', 'MAT1', 'ESO0946', 'Clase muy dinamica', 'brekopablo');
/*!40000 ALTER TABLE `M_Calificada` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.M_CIDir
CREATE TABLE IF NOT EXISTS `M_CIDir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_alumno` varchar(30) NOT NULL DEFAULT 'usuario',
  `destinatario` varchar(30) NOT NULL DEFAULT 'profe',
  `comentario` text NOT NULL DEFAULT 'comentario',
  `fecha` date NOT NULL DEFAULT curdate(),
  PRIMARY KEY (`id`),
  KEY `FK_m_cidir1` (`usuario_alumno`),
  KEY `FK_m_cidir2` (`destinatario`),
  CONSTRAINT `FK_m_cidir1` FOREIGN KEY (`usuario_alumno`) REFERENCES `C_Alumnos` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_m_cidir2` FOREIGN KEY (`destinatario`) REFERENCES `C_Directores` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.M_CIDir: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `M_CIDir` DISABLE KEYS */;
INSERT INTO `M_CIDir` (`id`, `usuario_alumno`, `destinatario`, `comentario`, `fecha`) VALUES
	(3, 'braumel.oj', 'pablo.rui', 'Comentariooo', '2020-06-03'),
	(4, 'braumel.oj', 'braudir', 'CI Braumel OC 3 Junio', '2020-06-03'),
	(5, 'userp1', 'braudir', 'Comentario IncÃ³gnito al directivo Braumel', '2020-06-06'),
	(6, 'axel.avil', 'braudir', 'Hola Profe', '2020-06-06'),
	(7, 'luisf101', 'axelfer1', 'Gracias por el sistema', '2020-06-08');
/*!40000 ALTER TABLE `M_CIDir` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.M_CIProfe
CREATE TABLE IF NOT EXISTS `M_CIProfe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_alumno` varchar(30) NOT NULL DEFAULT 'usuario',
  `destinatario` varchar(30) NOT NULL DEFAULT 'profe',
  `comentario` text NOT NULL DEFAULT 'comentario',
  `fecha` date NOT NULL DEFAULT curdate(),
  `clave_escuela` varchar(8) NOT NULL DEFAULT '',
  `clave_materia` varchar(35) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_cid_1` (`usuario_alumno`),
  KEY `FK_cid_2` (`destinatario`),
  KEY `FK_cid_3` (`clave_escuela`,`clave_materia`),
  CONSTRAINT `FK_cid_1` FOREIGN KEY (`usuario_alumno`) REFERENCES `C_Alumnos` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cid_2` FOREIGN KEY (`destinatario`) REFERENCES `C_Maestros` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cid_3` FOREIGN KEY (`clave_escuela`, `clave_materia`) REFERENCES `C_Materia` (`claves_escuela`, `claves_materias`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COMMENT='Comentarios Incógnitos hacia Profes';

-- Volcando datos para la tabla upabasoft.M_CIProfe: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `M_CIProfe` DISABLE KEYS */;
INSERT INTO `M_CIProfe` (`id`, `usuario_alumno`, `destinatario`, `comentario`, `fecha`, `clave_escuela`, `clave_materia`) VALUES
	(9, 'braumel.oj', 'profeb.21', 'comentario', '2020-06-02', 'clave2', 'fis4'),
	(11, 'braumel.oj', 'profeb.21', 'comentario2', '2020-06-02', 'clave2', 'fis4'),
	(12, 'braumel.oj', 'profeb.21', 'Comentario Proba 2 Mayo Madrugada', '2020-06-02', 'clave2', 'probaest'),
	(13, 'braumel.oj', 'profeb.21', 'CI Prueba 2 Junio', '2020-06-02', 'clave2', 'probaest'),
	(15, 'userp1', 'profeb.21', 'Comentario IncÃ³gnito userp1 al profe Juan Pablo', '2020-06-06', 'clave2', 'fis4'),
	(16, 'axel.avil', 'profeb.21', 'Hay Tarea?', '2020-06-06', 'clave2', 'fis4'),
	(17, 'luisf101', 'brekopablo', 'Â¿Hay tarea?', '2020-06-08', 'ESO0946', 'MAT1');
/*!40000 ALTER TABLE `M_CIProfe` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.M_EspecGrupos
CREATE TABLE IF NOT EXISTS `M_EspecGrupos` (
  `clave_escuela` varchar(8) NOT NULL,
  `clave_materia` varchar(35) NOT NULL,
  `clave_grupo` varchar(10) NOT NULL,
  `user_profesor` varchar(30) NOT NULL,
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Index`),
  KEY `FK_mesp_clave_grupo` (`clave_grupo`),
  KEY `FK_mesp_user_profesor` (`user_profesor`),
  KEY `FK_c_examenes2` (`clave_escuela`,`clave_materia`),
  KEY `FK_mag_1` (`clave_escuela`,`clave_grupo`),
  CONSTRAINT `FK_1` FOREIGN KEY (`clave_escuela`, `clave_materia`) REFERENCES `C_Materia` (`claves_escuela`, `claves_materias`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mag_1` FOREIGN KEY (`clave_escuela`, `clave_grupo`) REFERENCES `C_Grupo` (`clave_escuela`, `clave_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mesp_clave_grupo` FOREIGN KEY (`clave_grupo`) REFERENCES `C_Grupo` (`clave_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mesp_user_profesor` FOREIGN KEY (`user_profesor`) REFERENCES `C_Maestros` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.M_EspecGrupos: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `M_EspecGrupos` DISABLE KEYS */;
INSERT INTO `M_EspecGrupos` (`clave_escuela`, `clave_materia`, `clave_grupo`, `user_profesor`, `Index`) VALUES
	('clave2', 'fis4', 'BT6IM8', 'profeb.21', 2),
	('clave2', 'probaest', 'BT6IM8', 'profeb.21', 3),
	('clave2', 'fis4', 'BT6IM7', 'profeb.21', 4),
	('clave2', 'fis4', 'BT6IM9', 'profeb.21', 5),
	('clave2', 'probaest', 'BT1IM5', 'profeb.21', 9),
	('clave2', 'quim4', 'BT1IM5', 'profeb.21', 10),
	('clave2', 'ingles6', 'BT1IM5', 'gamita', 11),
	('ESO0946', 'MAT1', '1IM1', 'brekopablo', 12);
/*!40000 ALTER TABLE `M_EspecGrupos` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.M_Examenes
CREATE TABLE IF NOT EXISTS `M_Examenes` (
  `clave_examen` varchar(8) NOT NULL DEFAULT 'clave',
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `user_profe` varchar(30) NOT NULL DEFAULT 'profe',
  `fecha` date NOT NULL DEFAULT curdate(),
  `clave_grupo` varchar(10) NOT NULL DEFAULT '0',
  `titulo` varchar(50) NOT NULL DEFAULT 'Título',
  `pregunta` text NOT NULL DEFAULT '0',
  `clasificacion` tinytext NOT NULL DEFAULT 'p',
  PRIMARY KEY (`Index`),
  KEY `FK1_M_Examenes` (`clave_grupo`),
  KEY `FK2_M_Examenes` (`user_profe`),
  CONSTRAINT `FK1_M_Examenes` FOREIGN KEY (`clave_grupo`) REFERENCES `C_Grupo` (`clave_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK2_M_Examenes` FOREIGN KEY (`user_profe`) REFERENCES `C_Maestros` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.M_Examenes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `M_Examenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `M_Examenes` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.M_MDP
CREATE TABLE IF NOT EXISTS `M_MDP` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Destinatario` varchar(30) NOT NULL DEFAULT '0',
  `Creador` varchar(30) NOT NULL DEFAULT '0',
  `Mensaje` text NOT NULL DEFAULT '0',
  `Fecha` date DEFAULT curdate(),
  PRIMARY KEY (`ID`),
  KEY `FK_M_MDP_C_Maestros` (`Destinatario`),
  KEY `FK_M_MDP_C_Directores` (`Creador`),
  CONSTRAINT `FK_M_MDP_C_Directores` FOREIGN KEY (`Creador`) REFERENCES `C_Directores` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_M_MDP_C_Maestros` FOREIGN KEY (`Destinatario`) REFERENCES `C_Maestros` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.M_MDP: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `M_MDP` DISABLE KEYS */;
INSERT INTO `M_MDP` (`ID`, `Destinatario`, `Creador`, `Mensaje`, `Fecha`) VALUES
	(1, 'profeb.21', 'pablo.rui', 'Arriba el America', '2020-06-07'),
	(2, 'profeb.21', 'pablo.rui', 'No, usted lo es', '2020-06-07'),
	(3, 'profeb.21', 'pablo.rui', 'No, usted lo es', '2020-06-07'),
	(4, 'brekopablo', 'axelfer1', 'Te asignare un grupo\r\n', '2020-06-08'),
	(5, 'brekopablo', 'axelfer1', 'Hola, ya se te asigno un grupo', '2020-06-08');
/*!40000 ALTER TABLE `M_MDP` ENABLE KEYS */;

-- Volcando estructura para tabla upabasoft.M_MPD
CREATE TABLE IF NOT EXISTS `M_MPD` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Destinatario` varchar(30) DEFAULT NULL,
  `Creador` varchar(30) DEFAULT NULL,
  `Mensaje` text DEFAULT NULL,
  `Fecha` date DEFAULT curdate(),
  PRIMARY KEY (`ID`),
  KEY `FK_M_MPD_C_Directores` (`Destinatario`),
  KEY `FK_M_MPD_C_Maestros` (`Creador`),
  CONSTRAINT `FK_M_MPD_C_Directores` FOREIGN KEY (`Destinatario`) REFERENCES `C_Directores` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_M_MPD_C_Maestros` FOREIGN KEY (`Creador`) REFERENCES `C_Maestros` (`nombres_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla upabasoft.M_MPD: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `M_MPD` DISABLE KEYS */;
INSERT INTO `M_MPD` (`ID`, `Destinatario`, `Creador`, `Mensaje`, `Fecha`) VALUES
	(1, 'pablo.rui', 'profeb.21', 'Arriba el America', '2020-06-07'),
	(2, 'pablo.rui', 'profeb.21', 'Usted es Gay', '2020-06-07'),
	(3, 'axelfer1', 'brekopablo', 'Gracias por la asginacion', '2020-06-08');
/*!40000 ALTER TABLE `M_MPD` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
