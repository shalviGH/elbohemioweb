-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para bohemiobd
CREATE DATABASE IF NOT EXISTS `bohemiobd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `bohemiobd`;

-- Volcando estructura para tabla bohemiobd.carrito
CREATE TABLE IF NOT EXISTS `carrito` (
  `idCarrito` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idProducto` int(10) unsigned DEFAULT NULL,
  `cantidad` int(10) unsigned DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `idCliente` varchar(50) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCarrito`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bohemiobd.carrito: ~5 rows (aproximadamente)
INSERT INTO `carrito` (`idCarrito`, `idProducto`, `cantidad`, `fecha`, `idCliente`, `estatus`) VALUES
	(143, 99, 4, '2023-07-26 23:14:55', '77', 0),
	(144, 103, 1, '2023-07-26 23:15:07', '77', 0),
	(145, 109, 1, '2023-07-26 23:15:13', '77', 0),
	(147, 98, 1, '2023-07-26 23:22:12', '78', 0),
	(148, 101, 5, '2023-07-26 23:22:17', '78', 0);

-- Volcando estructura para tabla bohemiobd.carrito_has_productos
CREATE TABLE IF NOT EXISTS `carrito_has_productos` (
  `carrito_idCarrito` int(10) unsigned NOT NULL,
  `productos_idProductos` int(10) unsigned NOT NULL,
  PRIMARY KEY (`carrito_idCarrito`,`productos_idProductos`),
  KEY `carrito_has_productos_FKIndex1` (`carrito_idCarrito`),
  KEY `carrito_has_productos_FKIndex2` (`productos_idProductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bohemiobd.carrito_has_productos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bohemiobd.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fecha_hora` datetime DEFAULT current_timestamp(),
  `mensaje_recibido` varchar(1000) DEFAULT '',
  `mensaje_enviado` varchar(1000) DEFAULT '',
  `id_wa` varchar(1000) DEFAULT '',
  `timestamp_wa` int(15) DEFAULT NULL,
  `telefono_wa` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Volcando datos para la tabla bohemiobd.chat: ~60 rows (aproximadamente)
INSERT INTO `chat` (`id`, `fecha_hora`, `mensaje_recibido`, `mensaje_enviado`, `id_wa`, `timestamp_wa`, `telefono_wa`) VALUES
	(1, '2023-07-22 08:20:37', 'Su pues', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDAwOTcwMThGMTU4NDcyM0U2MjExOEU1NEM3RTc4OEU5AA==', 1690035636, '5219191321935'),
	(2, '2023-07-22 08:21:19', 'HacKeando la nasa', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDIyRjNFMTlDQjQzMjA4M0U0N0I3Njg2NUMwRjZFOUI3AA==', 1690035678, '5219191321935'),
	(3, '2023-07-22 08:25:29', 'Probando con base de datos', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEQ1MjBCQjY3QzdGQzFFMjY1RjIyODc2ODk0ODg2ODVGAA==', 1690035498, '5219191321935'),
	(4, '2023-07-22 08:25:40', 'No', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDNBOTQwQzc5RTUxRDhFMzY2MzkxQkMyQUJFRkQyMENFAA==', 1690035535, '5219191321935'),
	(5, '2023-07-22 18:12:25', 'Que paso', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDZBREYxOEE5NDc3Njg1RUZEOUMyREVFOEM1NUQ0QzU0AA==', 1690071143, '5219191321935'),
	(6, '2023-07-22 18:14:20', 'Que paso', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEIxRTg3QUFCMTdFMzE1M0RCRDg2QkNCRjQwREVFMjM1AA==', 1690070814, '5219191321935'),
	(7, '2023-07-22 18:14:37', 'Es cierto', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEMxNUQxN0ZEQkQ4N0Y2MDRGOUM3NDg1QjVGNjFFNTMzAA==', 1690070845, '5219191321935'),
	(8, '2023-07-22 18:15:00', 'Es cierto', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDAyQTMyRTExQjlEMEI4N0RFODgwQUE5NkFDRUQzRjg0AA==', 1690071299, '5219191321935'),
	(9, '2023-07-22 18:15:19', 'Lunes', 'Menu del Lunes \nChiles en nogada 20.50 \nChilaquiles 15.50 \n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDVBNENFMEU5QjAxNEE4NEI4MzczNkNCNjc3N0U2NUIyAA==', 1690071317, '5219191321935'),
	(10, '2023-07-22 18:16:35', 'De que hay', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDFCRjdBMDA3Mzc4OTdDRjQ4MDY4NEI0NzIxQkM1OTJEAA==', 1690070891, '5219191321935'),
	(11, '2023-07-22 18:17:25', 'Qu rollo', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEFGNjBENTI3MEQxRTE5NjM2RDEyQkQ3OEE1MTczNDgxAA==', 1690071031, '5219191321935'),
	(12, '2023-07-22 18:17:31', 'S comenta', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDNFNEMxOERBNzA1Rjk5MzZENDdCOEREMkYwMzdFMDJGAA==', 1690070999, '5219191321935'),
	(13, '2023-07-22 19:15:27', 'De ayer', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEI2MzhFMDhFQkI2NDZBNUJFMUJEMzRDQTdBN0M3RjVGAA==', 1690074926, '5219191321935'),
	(14, '2023-07-22 19:15:34', 'Saber', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEUxMjlENkMzNzEyMUU4RDg5MkQxMDkwMDJGMUJCQkY5AA==', 1690074933, '5219191321935'),
	(15, '2023-07-22 19:15:55', 'Ea', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDhCNkNDNTM1OUM5RUVDQ0VBNzIzMjQzRTE2NDIyRjU3AA==', 1690074527, '5219191321935'),
	(16, '2023-07-22 19:16:08', 'Que paso', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEE5RjkyODk4MDZCNTYxRDM1Rjk4RUE0NEU4QkU5ODBGAA==', 1690074533, '5219191321935'),
	(17, '2023-07-22 19:16:48', 'Lunes', 'Menu del Lunes \nChiles en nogada 20.50 \nChilaquiles 15.50 \n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDQ3NDUwQzk2MkE1MURFRjBDOEUyQTQ5OTQxODREOTAzAA==', 1690075004, '5219191321935'),
	(18, '2023-07-22 19:16:51', 'Lunes', 'Menu del Lunes \nChiles en nogada 20.50 \nChilaquiles 15.50 \n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDRDRkQxRjg5RTNFNTc3ODUyM0NEN0NGMjA5RjA3OUQ4AA==', 1690074597, '5219191321935'),
	(19, '2023-07-22 19:17:01', 'No', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDE3MDEzNEQwNUIxMzgxQTZDMDI0Nzk1RTYyMDE1MEIzAA==', 1690075019, '5219191321935'),
	(20, '2023-07-22 19:18:09', 'Dj', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEE4RjVFNkYzNzU5RkVFMDA3NkY1Q0U1NTQwMDZFMUYyAA==', 1690074640, '5219191321935'),
	(21, '2023-07-22 19:19:35', 'Bnd', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDU3QzU2MUE0RjJGNEJBODgwM0EwM0E5RjRCRjdFQzc3AA==', 1690074755, '5219191321935'),
	(22, '2023-07-22 19:19:46', 'Hdnd', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDYyREJDQjBGN0YzOTJDNDAzMTUwMkU4NTkwQjJBNjdBAA==', 1690074766, '5219191321935'),
	(23, '2023-07-22 19:21:03', 'Lunes', 'Menu del Lunes \nChiles en nogada 20.50 \nChilaquiles 15.50 \n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDQ1NEZCRDY0MTU2NUZEOUE4OTEwNERERDExMkVDOEU4AA==', 1690074830, '5219191321935'),
	(24, '2023-07-22 19:57:11', 'Hora', 'Lunes abrimos de 08:00 a 18:00\nMartes abrimos de 08:00 a 18:00\nMiercoles abrimos de 08:00 a 18:00\nJueves abrimos de 08:00 a 18:00\nViernes abrimos de 08:00 a 18:00\nSabados abrimos de 08:00 a 12:00\nDomingos Cerrado\n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDFFNkNCNTQ4OTEyNjMzMkFFMzQ2NjEwRERGMERCMUFCAA==', 1690077428, '5219191321935'),
	(25, '2023-07-22 19:58:58', 'Menú martes', 'Menu del Martes \nPambasos 20.50 \nHuitlacoche 15.50 \n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDlBODhFQzAzOUFEMENGNjlBRUFFMTA0QzdDRTQ1QUI0AA==', 1690077533, '5219191321935'),
	(26, '2023-07-22 19:59:01', 'Lunes', 'Menu del Lunes \nChiles en nogada 20.50 \nChilaquiles 15.50 \n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDg3Qzg2NzhCNkEyRUJFNjI5NEVDNEZCMzlGOUMzMkQ2AA==', 1690077537, '5219191321935'),
	(27, '2023-07-22 20:03:10', 'Lunes', 'Menu del Lunes \nChiles en nogada 20.50 \nChilaquiles 15.50 \n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDc0NEE4NkVCMTQyMTMzNzNBNkE5RTRBREQyRkIwMzU5AA==', 1690077788, '5219191321935'),
	(28, '2023-07-22 20:33:35', 'C', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEQzMjc4RDUwNzJFRjQyNTZGN0M4MTg3QjA5Q0Q2Q0QzAA==', 1690073237, '5219191321935'),
	(29, '2023-07-22 20:36:40', 'Miercoles', 'Menu del Miercoles \nEnchiladas 120.50 \nCaldo de olla 15.50 \n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEEzMTVCOTIyM0NCRDM2MEZDRjdGQjMyNDYxREY3RkEzAA==', 1690073058, '5219191321935'),
	(30, '2023-07-22 20:40:24', 'Cf', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEU0OERGNTQ3NjNDNEYwMzg1Qzk5QkNCNzE5RUU1NTE0AA==', 1690073777, '5219191321935'),
	(31, '2023-07-22 20:42:07', 'Yea', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDQzNjlEMjkzODBCNzM2MzU2QURFNEVBMUNBMjc2ODdCAA==', 1690073088, '5219191321935'),
	(32, '2023-07-22 20:42:15', 'Que paso', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEQ5OUYxNzEwRTAwQTA2NzBGQ0FGNkE3QUE3MDZEMDMzAA==', 1690073785, '5219191321935'),
	(33, '2023-07-22 20:43:23', 'Q paso', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDEzMjEzMDc4Q0U3RDgyREZFNzRFNUNCQ0JFQzk1RTg3AA==', 1690072937, '5219191321935'),
	(34, '2023-07-22 20:43:48', 'Martes', 'Menu del Martes \nPambasos 20.50 \nHuitlacoche 15.50 \n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEM3QzdFQzM3OUY5QUQ5NEU2RTIwNTA3MUE3REE4NzAzAA==', 1690072874, '5219191321935'),
	(35, '2023-07-22 20:44:06', 'Ok', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEY5RjEwNjk3QjcwNUQ5NjREN0E3QjQ0NjZDRTgzMTFFAA==', 1690080243, '5219191321935'),
	(36, '2023-07-22 20:45:16', 'Hola', 'Hola, Soy un robot, esta es la informacion que te puedo ofrecer\nNuestros telefonos\nNuestra direccion\nEntregas\nPagina web\nHorarios\nMenu\n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDA0QTcwNUM3MDVFMjlDMkFBRDEyOEMwOThENUE2NkE3AA==', 1690080313, '5219191321935'),
	(37, '2023-07-22 20:45:28', 'Que paso', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDlCMDE1QzNDQUUyRjExNDBGOTlENEJEODIwQjhFMDgwAA==', 1690080324, '5219191321935'),
	(38, '2023-07-22 20:45:40', 'Si', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDlFM0Q1NkRBQzI4MTEzRDZGNEZFMjBCNDlGMUVBQ0M2AA==', 1690080338, '5219191321935'),
	(39, '2023-07-22 20:45:59', 'No', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDJBQjkyMDUxNjRGQkZGRTQ5OERFMDk1OUM0MTE0MjJDAA==', 1690080356, '5219191321935'),
	(40, '2023-07-22 20:46:11', 'Lunes', 'Menu del Lunes \nChiles en nogada 20.50 \nChilaquiles 15.50 \n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDcyMjE3QjI3MjcxOTY2RDFGRUFDNDQxREY3OTQ0QUM2AA==', 1690080367, '5219191321935'),
	(41, '2023-07-22 20:46:27', 'Nel', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDgyNTY4MzI3NTgyM0YxQThCM0QzMDY0QjFFQkJBNUM4AA==', 1690080385, '5219191321935'),
	(42, '2023-07-22 20:46:41', 'Si', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDk1MEMzQkVDMEI1N0Q3NTdCMEY0QjEyODQ4QUY3RjVDAA==', 1690080398, '5219191321935'),
	(43, '2023-07-22 20:49:28', 'Si', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIENCNzFENEUzQkFEMTIxMDU1REVFNzMyRTQzNEU2NEIzAA==', 1690074355, '5219191321935'),
	(44, '2023-07-22 20:51:15', 'Ea', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDA0QTU4QjE2QjBBMkRFRDc0N0IzQ0QyNDJGOTA0RDAzAA==', 1690073746, '5219191321935'),
	(45, '2023-07-22 20:54:20', 'Hay que probarlo', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDJEQzAyQzM0NzFENDhEMjI3QTkzQTQzNzVBNzYxOEJFAA==', 1690074234, '5219191321935'),
	(46, '2023-07-22 20:55:14', 'No quiero', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDQxRTU1MDhBQTM5RDRCQUI5MzNCNkU1NUQ2RERDOERCAA==', 1690073795, '5219191321935'),
	(47, '2023-07-22 20:57:18', 'Ea', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDY0RkE5MkFBNEVEOUExMDM3QTE0MUU1M0M5RkYwQkQzAA==', 1690073776, '5219191321935'),
	(48, '2023-07-22 20:59:16', 'Lunes', 'Menu del Lunes \nChiles en nogada 20.50 \nChilaquiles 15.50 \n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDBDQ0U0RDIxNjU0NUUyMTBFMzU1M0Y1QjY4OEFGMzc5AA==', 1690073965, '5219191321935'),
	(49, '2023-07-22 20:59:40', 'Sus', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDg2NkNFMkI4QzBFRDk3M0JCREVEQTEyMUUwQkM4NEI2AA==', 1690074361, '5219191321935'),
	(50, '2023-07-22 21:01:31', 'Hdjd', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDY5NEU0M0MzMkE3MTgxRDAzNzVDNjUzNEY2NEVCOTQ3AA==', 1690073946, '5219191321935'),
	(51, '2023-07-22 21:01:34', 'Hola', 'Hola, Soy un robot, esta es la informacion que te puedo ofrecer\nNuestros telefonos\nNuestra direccion\nEntregas\nPagina web\nHorarios\nMenu\n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDZDNjRFNzBCRjJGREUxNUYwQ0Q2M0JDNTE3NUVDNUJGAA==', 1690073952, '5219191321935'),
	(52, '2023-07-22 22:19:57', 'Si', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDZBMTUzOTMyRDc4RjQ4NTgwNDk0NEM4QUVBNjg5OEFBAA==', 1690085995, '5219191321935'),
	(53, '2023-07-22 22:20:28', 'Como estas', 'Hola, Soy un robot, esta es la informacion que te puedo ofrecer\nNuestros telefonos\nNuestra direccion\nEntregas\nPagina web\nHorarios\nMenu\n', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEMyNjI2RjlCQjUwRDA2NzQwQUZGQzZBRUJDRjM1NjFEAA==', 1690086026, '5219191321935'),
	(54, '2023-07-22 22:20:40', 'Menu', 'Menu del Lunes \nChiles en nogada 20.50 \nChilaquiles 15.50 \n \n Menu del Martes \nPambasos 20.50 \nHuitlacoche 15.50 \n \n Menu del Miercoles \nEnchiladas 120.50 \nCaldo de olla 15.50 \n \n Menu del Jueves \nTacos 120.50 \nQuesadillas 15.50 \n \n Menu del Viernes \nTortas 20.50 \nTacos 15.50 \n \n Menu del Sabado \nEnchiladas 120.50 \nHuitlacoche 15.50 \n \n Los domingo esta cerrado', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDM0RDAyQzMyNkFDODkzMjA1MkJCMENFQzJBQzNGMUVFAA==', 1690086038, '5219191321935'),
	(55, '2023-07-22 22:20:53', 'Entregas', 'Realizamos entregas a domicilio solo de lunes a viernes de 12:00 a 15:00', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDQ0QkE1QThGMDEzRkJFNTRFQ0REOUY1QjI5NUNEQzhEAA==', 1690086051, '5219191321935'),
	(56, '2023-07-22 22:24:21', '..', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIERDNjc5MkMyRThBQjFFMTM4RjVGQjEwOUYyNDE5RTA3AA==', 1690086258, '5219191321935'),
	(57, '2023-07-22 22:24:29', '..', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDM1ODlDREI4NDZFNjY0MThBMkQyNzNGQkUxQjI4ODA1AA==', 1690086267, '5219191321935'),
	(58, '2023-07-22 22:24:35', '..', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDY0RkRBQjMzQUFGNDc4OUEzMjI0QzVCOEI0QkQ0M0VBAA==', 1690086273, '5219191321935'),
	(59, '2023-07-22 22:24:42', '..', 'Recuerda que soy un robot, me podrías preguntar de otra forma', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIEMyMTFDNThBQTg0MTQxRTQwMTEyNjgyQUJCNDFGQjdFAA==', 1690086280, '5219191321935'),
	(60, '2023-07-22 22:24:48', '.....', 'Intenta hacer tu pregunta de otra manera.', 'wamid.HBgNNTIxOTE5MTMyMTkzNRUCABIYIDMxNkM2RTQxMUNDNDZGQUE3RTY2MUIzNTg1M0IzOTc5AA==', 1690086286, '5219191321935');

-- Volcando estructura para tabla bohemiobd.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `idCarrito` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bohemiobd.pedido: ~4 rows (aproximadamente)
INSERT INTO `pedido` (`idPedido`, `codigo`, `fecha`, `estatus`, `tipo`, `idCarrito`) VALUES
	(121, '2707173491919', '2023-07-26 23:17:34', 0, 2, 143),
	(122, '2707173491919', '2023-07-26 23:17:34', 0, 2, 144),
	(123, '2707173491919', '2023-07-26 23:17:34', 0, 2, 145),
	(124, '27072238345678', '2023-07-26 23:22:38', 1, 2, 147);

-- Volcando estructura para tabla bohemiobd.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idProductos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `stok` int(10) unsigned DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad` int(10) unsigned DEFAULT NULL,
  `imagen` longblob DEFAULT NULL,
  `categoria` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idProductos`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bohemiobd.productos: ~11 rows (aproximadamente)
INSERT INTO `productos` (`idProductos`, `nombre`, `descripcion`, `stok`, `precio`, `cantidad`, `imagen`, `categoria`) VALUES
	(98, 'carnita bien frita', 'dddg fgafbf ff', 100, 120, 1, _binary 0x636f6d696461362e6a7067, 1),
	(99, 'Pollo empanizadodv', '123454678', 96, 120, 1, _binary 0x726566726573636f322e61766966, 1),
	(101, 'tEspagetti', '3333333', 100, 59, 1, _binary 0x726566726573636f322e61766966, 1),
	(102, 'jusgo de mango', '', 100, 45, 1, _binary 0x726566726573636f352e6a7067, 2),
	(103, 'jugo ', 'jugo preparados del dia', 99, 50, 1, _binary 0x726566726573636f342e6a7067, 2),
	(104, 'orchata', '', 100, 20, 1, _binary 0x72656665726573636f332e6a7067, 2),
	(105, 'referesco enlatado', 'refersco de 350 ml', 100, 35, 1, _binary 0x726566726573636f312e6a7067, 2),
	(106, 'caffe', 'cafe preparado ', 100, 15, 1, _binary 0x726566726573636f322e61766966, 2),
	(107, 'platillo gurmet', 'platillo individual con 3 opiezzas', 100, 100, 1, _binary 0x636f6d696461332e6a7067, 1),
	(108, 'efdwsf', '2345678', 100, 123, 1, _binary 0x636f6d696461312e6a7067, 1),
	(109, 'eqwr', 'erqwr', 99, 0, 1, _binary 0x636f6d696461312e6a7067, 2);

-- Volcando estructura para tabla bohemiobd.tipousuario
CREATE TABLE IF NOT EXISTS `tipousuario` (
  `idtipoUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idtipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bohemiobd.tipousuario: ~2 rows (aproximadamente)
INSERT INTO `tipousuario` (`idtipoUsuario`, `tipo`) VALUES
	(1, 'admin'),
	(2, 'user');

-- Volcando estructura para tabla bohemiobd.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipoUsuario` int(10) unsigned NOT NULL,
  `nombreUsuario` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `telefono` int(10) unsigned DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `contraseña` varchar(30) DEFAULT NULL,
  `tipoUsario` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idUsuario`,`tipoUsuario`) USING BTREE,
  KEY `usuario_FKIndex1` (`tipoUsuario`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bohemiobd.usuario: ~4 rows (aproximadamente)
INSERT INTO `usuario` (`idUsuario`, `tipoUsuario`, `nombreUsuario`, `apellidos`, `telefono`, `direccion`, `usuario`, `contraseña`, `tipoUsario`) VALUES
	(16, 1, 'ff', 'desconocido ', 0, 'ff', 'admin', 'admin', 0),
	(17, 1, '2fed', 'sss', 0, 'dddsss', 'user', 'user', 0),
	(77, 3, 'salvador garcia', '0000000', 91919191, 'calle 50 70', 'usuario', '0000', 1),
	(78, 3, 'ernesto cardenas', '0000000', 123456789, '45678 ', 'usuario', '0000', 1);

-- Volcando estructura para tabla bohemiobd.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `idventas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idPedido` int(10) unsigned DEFAULT NULL,
  `precioTotal` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idventas`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bohemiobd.ventas: ~3 rows (aproximadamente)
INSERT INTO `ventas` (`idventas`, `idPedido`, `precioTotal`, `fecha`) VALUES
	(143, 121, 480, '2023-07-26'),
	(144, 122, 50, '2023-07-26'),
	(145, 123, 0, '2023-07-26');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
