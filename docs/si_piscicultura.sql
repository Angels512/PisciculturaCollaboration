CREATE DATABASE IF NOT EXISTS `si_piscicultura`;
USE `si_piscicultura`;
SET SQL_SAFE_UPDATES = 0;

-- ///// CREATE TABLES /////

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` char(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cat` text COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `nombre_usu` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_usu` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_usu` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_usu` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `documento_usu` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `correo_usu` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pass_usu` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_edit` datetime DEFAULT NULL,
  `fecha_elim` datetime DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `est` int(1) NOT NULL,
  PRIMARY KEY (`id_usu`),
  UNIQUE KEY `documento_usu` (`documento_usu`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `FK_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `password_rest` (
  `id_pass` int(11) NOT NULL AUTO_INCREMENT,
  `id_usu` int(11) DEFAULT NULL,
  `token` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` int(4) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pass`),
  KEY `FK_password_rest_usuario` (`id_usu`),
  CONSTRAINT `FK_password_rest_usuario` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `id_usu` int(11) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `titulo_chat` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_chat` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_chat` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `est` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_chat`) USING BTREE,
  KEY `FK_chat_usuario` (`id_usu`),
  KEY `FK_chat_categoria` (`id_cat`),
  CONSTRAINT `FK_chat_categoria` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`),
  CONSTRAINT `FK_chat_usuario` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `chatdetalle` (
  `id_chatd` int(11) NOT NULL AUTO_INCREMENT,
  `id_chat` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `desc_chatd` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `est` int(1) NOT NULL,
  PRIMARY KEY (`id_chatd`),
  KEY `FK__chat` (`id_chat`),
  KEY `FK_chatdetalle_usuario` (`id_usu`),
  CONSTRAINT `FK__chat` FOREIGN KEY (`id_chat`) REFERENCES `chat` (`id_chat`),
  CONSTRAINT `FK_chatdetalle_usuario` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `responsable` (
  `id_respon` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_respon` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_respon` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_elim` datetime DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `est` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_respon`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `estanque` (
  `id_tanque` int(11) NOT NULL AUTO_INCREMENT,
  `num_tanque` int(11) DEFAULT NULL,
  `capacidad_tanque` int(11) DEFAULT NULL,
  `desc_tanque` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fehca_elim` datetime DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `est` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_tanque`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `cultivo` (
  `id_cultivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_respon` int(11) DEFAULT NULL,
  `id_tanque` int(11) DEFAULT NULL,
  `num_lote` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cant_siembra` int(11) DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `est` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_cultivo`),
  KEY `id_respon` (`id_respon`),
  KEY `id_tanque` (`id_tanque`),
  CONSTRAINT `FK_cultivo_estanque` FOREIGN KEY (`id_tanque`) REFERENCES `estanque` (`id_tanque`),
  CONSTRAINT `FK_cultivo_responsables` FOREIGN KEY (`id_respon`) REFERENCES `responsable` (`id_respon`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `mortalidad` (
  `id_mortalidad` int(11) NOT NULL AUTO_INCREMENT,
  `id_cultivo` int(11) DEFAULT NULL,
  `reg_mortandad` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_mortalidad`),
  KEY `FK__cultivo` (`id_cultivo`),
  CONSTRAINT `FK__cultivo` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `novedad` (
  `id_novedad` int(11) NOT NULL AUTO_INCREMENT,
  `id_cultivo` int(11) DEFAULT NULL,
  `medidad_prev` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_novedad`),
  KEY `id_cultivo` (`id_cultivo`),
  CONSTRAINT `FK_novedad_cultivo` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `etapa` (
  `id_etapa` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_etapa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_etapa`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `biocrecimiento` (
  `id_biocre` int(11) NOT NULL AUTO_INCREMENT,
  `id_etapa` int(11) NOT NULL,
  `id_cultivo` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `num_organ` int(11) NOT NULL,
  `peso_organ` int(11) NOT NULL,
  `peso_biomasa` int(11) NOT NULL,
  `edad_organ` int(11) NOT NULL,
  `color_organ` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `escamas_organ` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ojos_organ` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `compor_organ` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `crecimiento_organ` int(11) NOT NULL,
  `obser_adic` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL,
  PRIMARY KEY (`id_biocre`),
  KEY `id_etapa` (`id_etapa`),
  KEY `id_cultivo` (`id_cultivo`),
  KEY `id_usu` (`id_usu`),
  CONSTRAINT `FK_id_cultivo` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`),
  CONSTRAINT `FK_id_etapa` FOREIGN KEY (`id_etapa`) REFERENCES `etapa` (`id_etapa`),
  CONSTRAINT `FK_id_usu` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `tempagua` (
  `id_temp_agua` int(11) NOT NULL AUTO_INCREMENT,
  `id_cultivo` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `num_dia` int(11) NOT NULL,
  `grados1` int(11) NOT NULL,
  `grados2` int(11) DEFAULT NULL,
  `grados3` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL,
  PRIMARY KEY (`id_temp_agua`),
  KEY `id_cultivo` (`id_cultivo`),
  KEY `id_usu` (`id_usu`),
  CONSTRAINT `FK_id_cultivo1` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`),
  CONSTRAINT `FK_id_usu1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `parametrosfq` (
  `id_par_fq` int(11) NOT NULL AUTO_INCREMENT,
  `id_cultivo` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `rango_amonio` float NOT NULL,
  `rango_nitrito` float NOT NULL,
  `rango_nitrato` float NOT NULL,
  `rango_ph` float NOT NULL,
  `cant_melaza` float NOT NULL,
  `porc_agua` int(11) NOT NULL,
  `observaciones` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL,
  PRIMARY KEY (`id_par_fq`),
  KEY `id_cultivo` (`id_cultivo`),
  KEY `id_usu` (`id_usu`),
  CONSTRAINT `FK_id_cultivo2` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`),
  CONSTRAINT `FK_id_usu2` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `tempambiente` (
  `id_temp_amb` int(11) NOT NULL AUTO_INCREMENT,
  `id_cultivo` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `num_dia` int(11) NOT NULL,
  `grados1` int(11) NOT NULL,
  `grados2` int(11) DEFAULT NULL,
  `grados3` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL,
  PRIMARY KEY (`id_temp_amb`),
  KEY `id_cultivo` (`id_cultivo`),
  KEY `id_usu` (`id_usu`),
  CONSTRAINT `FK_id_cultivo3` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`),
  CONSTRAINT `FK_id_usu3` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `estacuicultura` (
  `id_est_acui` int(11) NOT NULL AUTO_INCREMENT,
  `id_cultivo` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `obser_gene` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL,
  PRIMARY KEY (`id_est_acui`),
  KEY `id_cultivo` (`id_cultivo`),
  KEY `id_usu` (`id_usu`),
  CONSTRAINT `FK_id_cultivo4` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`),
  CONSTRAINT `FK_id_usu4` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `claseproducto` (
  `id_clase` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_clase` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_clase` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_clase`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

SELECT * FROM claseproducto;

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_prove` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_emp` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion_emp` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_emp` varchar(10) NOT NULL,
  `correo_emp` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL,
  PRIMARY KEY (`id_prove`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `producto` (
  `id_produ` int(11) NOT NULL AUTO_INCREMENT,
  `id_prove` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `fech_venc` date NOT NULL,
  `num_lote` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL,
  PRIMARY KEY (`id_produ`),
  KEY `id_prove` (`id_prove`),
  KEY `id_clase` (`id_clase`),
  CONSTRAINT `FK_id_clase` FOREIGN KEY (`id_clase`) REFERENCES `claseproducto` (`id_clase`),
  CONSTRAINT `FK_id_prove` FOREIGN KEY (`id_prove`) REFERENCES `proveedor` (`id_prove`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `tblalimentacion` (
  `id_tbl_alim` int(11) NOT NULL AUTO_INCREMENT,
  `id_produ` int(11) NOT NULL,
  `id_cultivo` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `cant_siembra` int(6) NOT NULL,
  `porc_proteina` int(11) NOT NULL,
  `hora_sum_alim1` time NOT NULL,
  `hora_sum_alim2` time DEFAULT NULL,
  `hora_sum_alim3` time DEFAULT NULL,
  `obser_atmo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `obser_gen_cult` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL,
  PRIMARY KEY (`id_tbl_alim`),
  KEY `id_produ` (`id_produ`),
  KEY `id_cultivo` (`id_cultivo`),
  KEY `id_usu` (`id_usu`),
  CONSTRAINT `FK_id_cultivo5` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`),
  CONSTRAINT `FK_id_produ` FOREIGN KEY (`id_produ`) REFERENCES `producto` (`id_produ`),
  CONSTRAINT `FK_id_usu5` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


update cultivo set est = 1; 


-- ///// INSERTS /////

-- Rol
INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
	(1, 'Jefe de produccion'),
	(2, 'Piscicultor'),
	(3, 'Acuicultor');

-- Categoria
INSERT INTO `categoria` (`id_cat`, `nombre_cat`) VALUES
	(1, 'Consulta'),
	(2, 'Incidencia '),
	(3, 'Peticion de servicio'),
	(4, 'Otros');

-- Usuario
INSERT INTO `usuario` (`id_usu`, `id_rol`, `nombre_usu`, `apellido_usu`, `direccion_usu`, `telefono_usu`, `documento_usu`, `correo_usu`, `pass_usu`, `fecha_edit`, `fecha_elim`, `fecha`, `est`) VALUES
	(1, 1, 'Miguel', 'Cuellar', 'Cra 8 Este #37-71', '3168580636', '1021663015', 'miguelcolmatiz@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', NULL, NULL, '2021-05-09 17:06:34', 1),
	(2, 1, 'Mariana', 'Diaz', 'Cra 8 Este #30-70 Sur', '3125623542', '1003882513', 'mariana@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', NULL, NULL, '2021-05-20 22:20:15', 1),
	(3, 3, 'Pepito', 'Perez', 'Cra 8 Este #37-70', '3194577113', '1021663012', 'pepito@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', NULL, NULL, '2021-05-20 22:20:35', 1),
	(4, 2, 'Camila', 'Ramirez', 'Cra 8 Este #30-70 Sur', '3125623542', '1021663013', 'camilaramirez@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', NULL, NULL, '2021-05-22 23:57:08', 1),
	(24, 2, 'Miguel', 'Angel', 'Cra 8 Este #30-70 Sur', '1234567891', '1021663029', 'miguelangels2468@gmail.com', '3043aa4a83b0934982956a90828140cb834869135b5f294938865de12e036de440a330e1e8529bec15ddd59f18d1161a97bfec110d2622680f2c714a737d7061', NULL, NULL, '2021-06-15 23:34:48', 1);

-- Password Rest
INSERT INTO `password_rest` (`id_pass`, `id_usu`, `token`, `codigo`, `fecha`) VALUES
	(18, 24, '70b33be774cedf85fe4eb7fa26285464d38240fa773617df41910b7c97e22a0c88da772f0ec79d9bda33afe5bfc50b0df0539fe7065bc23d53ca1aed7068879f61da72667ef50c77848a5268227af5ad45551ee679f4219bbe9ecf14f12a285c65cf3a8b', 3057, '2021-06-15 23:35:59');

-- Chat
INSERT INTO `chat` (`id_chat`, `id_usu`, `id_cat`, `titulo_chat`, `desc_chat`, `estado_chat`, `fecha`, `est`) VALUES
	(1, 3, 1, 'Solicitud de ayuda', '<p>Descipcion completa de prueba</p>', 'Cerrado', '2021-05-19 22:31:33', 1),
	(2, 3, 1, 'Mantenimiento de estanque', '<p>Todo esto es una descripcion <b>nueva</b></p>', 'Cerrado', '2021-05-19 22:32:39', 1),
	(3, 2, 2, 'Problema con el sistema de informacion', '<p>Descripcion de prueba 123</p>', 'Abierto', '2021-05-20 18:13:45', 1),
	(4, 2, 1, 'Buenas noches', '<p>Esto es solo una prueba</p>', 'Abierto', '2021-06-13 04:00:06', 1),
	(5, 2, 1, 'Esto es una prueba', 'Hola, buenas tardes. Como estas?', 'Abierto', '2021-06-15 17:15:00', 1),
	(6, 2, 1, 'Hola, esto es una prueba...', 'Holaaaaa', 'Abierto', '2021-06-15 17:15:33', 1);

-- Chat Detalle
INSERT INTO `chatdetalle` (`id_chatd`, `id_chat`, `id_usu`, `desc_chatd`, `fecha`, `est`) VALUES
	(1, 1, 1, 'Te respondo!', '2021-05-21 22:33:19', 1),
	(2, 1, 2, 'Perfecto, gracias...', '2021-05-21 22:33:47', 1),
	(3, 1, 1, 'Vale, con gusto.', '2021-05-21 22:34:11', 1),
	(4, 1, 2, 'Hola, como estas?', '2021-05-22 02:22:27', 1),
	(5, 1, 1, 'Muy bien y tu?', '2021-05-22 02:22:30', 1),
	(6, 1, 2, 'Me alegra, muy bien!', '2021-05-22 02:22:33', 1),
	(7, 1, 1, '<p>Esto es una prueba</p>', '2021-05-22 02:26:07', 1),
	(8, 1, 1, '<p>Alguna otra duda?</p>', '2021-05-22 02:33:15', 1),
	(9, 2, 1, '<p>Buenos días, en que te puedo colaborar?</p>', '2021-05-22 03:09:17', 1),
	(10, 2, 1, '<p>Cuentame…</p>', '2021-05-22 03:09:43', 1),
	(11, 3, 2, '<p>Buenos dias...</p>', '2021-05-22 03:10:40', 1),
	(12, 3, 1, '<p>Como estas?</p>', '2021-05-22 03:11:10', 1),
	(13, 1, 1, '<p>Otra...</p>', '2021-05-22 13:33:10', 1),
	(14, 2, 1, '<p>Mucho gusto!!</p>', '2021-05-22 23:30:31', 1),
	(19, 2, 1, '<p>Que hace?<br></p>', '2021-05-24 19:24:09', 1),
	(21, 3, 1, '<p>Hola</p>', '2021-05-28 20:57:16', 1),
	(23, 2, 1, '<p>Hola</p>', '2021-06-03 12:51:10', 1),
	(26, 1, 1, '<p>Holaaaaa, como estas, esto es solo es una prueba para mirar el diseño responsive...</p>', '2021-06-10 13:36:05', 1),
	(27, 1, 1, '<p>Hola</p>', '2021-06-12 23:04:31', 1),
	(32, 1, 1, '<p>Buenas</p>', '2021-06-13 03:35:26', 1),
	(33, 1, 1, '<b>¡Esta conversación ha finalizado!</b>', '2021-06-13 03:35:30', 1),
	(34, 2, 1, '<b>¡Esta conversación ha finalizado!</b>', '2021-06-13 14:38:21', 1);

-- Responsable
INSERT INTO `responsable` (`id_respon`, `nombre_respon`, `apellido_respon`, `fecha_elim`, `fecha`, `est`) VALUES
	(1, 'Julian David', 'Gonzalez', NULL, '2021-05-27 18:19:59', 1),
	(2, 'Mariana', 'Diaz', NULL, '2021-05-27 18:19:59', 1),
	(3, 'Miguel Angel', 'Cuellar', NULL, '2021-05-27 18:20:28', 1),
	(4, 'Sofia', 'Rodriguez', NULL, '2021-06-21 20:06:03', 1),
	(5, 'Ajelandro', 'Sanabria', NULL, '2021-06-21 20:06:22', 1);
    


-- Estanque
INSERT INTO `estanque` (`id_tanque`, `num_tanque`, `capacidad_tanque`, `desc_tanque`, `fehca_elim`, `fecha`, `est`) VALUES
	(1, 1, 2000, 'Estanque grande de prueba', NULL, '2021-05-27 18:20:51', 1),
	(2, 2, 2000, 'Estanque mediano de prueba', NULL, '2021-05-27 18:21:08', 1),
	(3, 3, 2000, 'Otro estanque de prueba', NULL, '2021-05-27 23:04:03', 1),
	(4, 4, 2000, 'Estanque nuevo', NULL, '2021-06-21 20:21:39', 1),
	(5, 5, 2000, 'Estanque para revision', NULL, '2021-06-21 20:21:56', 1);
    
-- Cultivo
INSERT INTO `cultivo` (`id_cultivo`, `id_respon`, `id_tanque`, `num_lote`, `cant_siembra`, `fecha_cierre`, `fecha`, `est`) VALUES
	(1, 1, 1, '0001', 2500, '2021-11-21', '2021-05-27 18:21:50', 1),
	(2, 2, 2, '0002', 1750, '2021-11-21', '2021-04-24 18:21:55', 1),
	(3, 3, 3, '0003', 1500, '2021-11-21', '2021-04-21 23:04:24', 1),
	(4, 1, 1, '0004', 1250, '2021-11-21', '2021-05-28 12:21:50', 1),
	(5, 2, 2, '0005', 1000, '2021-11-21', '2021-05-28 16:26:45', 1),
	(6, 2, 3, '0006', 400, '2021-06-21', '2021-06-01 22:20:09', 0),
	(7, 1, 1, '0007', 500, '2021-06-21', '2021-06-01 22:20:50', 0),
	(8, 2, 2, '0008', 400, '2021-06-21', '2021-06-02 22:34:26', 0),
	(9, 3, 3, '0009', 500, '2021-06-21', '2021-06-02 22:37:04', 0),
	(10, 3, 1, '00010', 800, '2021-06-21', '2021-06-03 12:56:24', 0);

-- Mortalidad
INSERT INTO `mortalidad` (`id_mortalidad`, `id_cultivo`, `reg_mortandad`, `fecha`) VALUES
	(1, 1, 10, '2021-05-27 18:26:09'),
	(2, 1, 10, '2021-05-27 18:26:14'),
	(3, 1, 10, '2021-05-27 18:26:21'),
	(4, 2, 2, '2021-05-27 22:05:04'),
	(5, 2, 15, '2021-06-21 20:10:58');

-- Novedad
INSERT INTO `novedad` (`id_novedad`, `id_cultivo`, `medidad_prev`, `fecha`) VALUES
	(1, 1, 'Daños exteriores', '2021-05-27 18:26:53'),
	(2, 1, 'Cambios externos', '2021-05-27 18:26:54'),
	(3, 1, 'Cambios del agua', '2021-05-27 18:26:54'),
	(4, 1, 'Fisura en el tanque', '2021-06-21 20:07:40'),
	(5, 1, 'Daño en la bomba', '2021-06-21 20:08:54');

-- Etapa
INSERT INTO `etapa` (`id_etapa`, `nombre_etapa`) VALUES
	(1, 'Alevin'),
	(2, 'Cria'),
	(3, 'Juvenil'),
	(4, 'Ceba'),
	(5, 'Engorde');

-- Biocrecimiento
INSERT INTO `biocrecimiento` (`id_biocre`, `id_etapa`, `id_cultivo`, `id_usu`, `num_organ`, `peso_organ`, `peso_biomasa`, `edad_organ`, `color_organ`, `escamas_organ`, `ojos_organ`, `compor_organ`, `crecimiento_organ`, `obser_adic`, `fecha`, `fecha_elim`, `est`) VALUES
	(1, 2, 1, 2, 1900, 12, 12, 4, 'Naranja-Rojo', 'Limpias', 'Normal', 'Sospechoso', 6, 'Ninguna', '2021-06-21 20:14:37', NULL, 1),
	(2, 1, 1, 2, 1950, 2, 2, 1, 'Naranja-Rojo', 'Limpias', 'Normal', 'Sospechoso', 1, 'Ninguna', '2021-06-21 20:14:37', NULL, 1),
	(3, 3, 1, 2, 1900, 120, 120, 6, 'Naranja-Rojo', 'Limpias', 'Normal', 'Sospechoso', 10, 'Ninguna', '2021-06-21 20:14:37', NULL, 1),
	(4, 4, 1, 2, 1800, 200, 200, 12, 'Naranja-Rojo', 'Limpias', 'Normal', 'Sospechoso', 22, 'Ninguna', '2021-06-21 20:14:37', NULL, 1),
	(5, 5, 1, 2, 1950, 460, 460, 16, 'Naranja-Rojo', 'Limpias', 'Normal', 'Sospechoso', 33, 'Ninguna', '2021-06-21 20:14:37', NULL, 1);
    
-- Temperatura del agua
INSERT INTO `tempagua` (`id_temp_agua`, `id_cultivo`, `id_usu`, `num_dia`, `grados1`, `grados2`, `grados3`, `fecha`, `fecha_elim`, `est`) VALUES
	(1, 4, 3, 32, 15, NULL, NULL, '2021-06-23', NULL, 1),
	(2, 6, 3, 46, 18, NULL, NULL, '2021-06-23', NULL, 1),
	(3, 7, 3, 67, 22, NULL, NULL, '2021-06-23', NULL, 1),
	(4, 10, 3, 83, 26, NULL, NULL, '2021-06-23', NULL, 1),
	(5, 5, 3, 98, 30, NULL, NULL, '2021-06-23', NULL, 1);

-- Parametros FQ
INSERT INTO `parametrosfq` (`id_par_fq`, `id_cultivo`, `id_usu`, `rango_amonio`, `rango_nitrito`, `rango_nitrato`, `rango_ph`, `cant_melaza`, `porc_agua`, `observaciones`, `fecha`, `fecha_elim`, `est`) VALUES
	(1, 1, 3, 2.8, 1.8, 32, 6, 10, 3, 'Ninguna', '2021-06-21', NULL, 1),
	(2, 1, 3, 2.7, 1.9, 31, 8, 5, 5, 'Ninguna', '2021-06-21', NULL, 1),
	(3, 1, 3, 2.6, 1.6, 34, 7, 15, 10, 'Ninguna', '2021-06-21', NULL, 1),
	(4, 1, 3, 2.3, 2, 36, 6, 12, 8, 'Ninguna', '2021-06-21', NULL, 1),
	(5, 1, 3, 2.2, 1.7, 33, 5, 20, 6, 'Ninguna', '2021-06-21', NULL, 1);

-- Temperatura del ambiente
INSERT INTO `tempambiente` (`id_temp_amb`, `id_cultivo`, `id_usu`, `num_dia`, `grados1`, `grados2`, `grados3`, `fecha`, `fecha_elim`, `est`) VALUES
	(1, 3, 3, 12, 17, NULL, NULL, '2021-06-23', NULL, 1),
	(2, 5, 3, 65, 20, NULL, NULL, '2021-06-23', NULL, 1),
	(3, 4, 3, 73, 15, NULL, NULL, NULL, NULL, 1),
	(4, 8, 3, 87, 24, NULL, NULL, '2021-06-23', NULL, 1),
	(5, 1, 3, 82, 22, NULL, NULL, '2021-06-23', NULL, 1);

-- Estacuicultura
INSERT INTO `estacuicultura` (`id_est_acui`, `id_cultivo`, `id_usu`, `obser_gene`, `fecha`, `fecha_elim`, `est`) VALUES
	(1, 1, 3, 'Ninguna', '2021-06-21', NULL, 1),
	(2, 1, 3, 'Agua demasiado oscura', '2021-06-21', NULL, 1),
	(3, 1, 3, 'Agua estable', '2021-06-21', NULL, 1),
	(4, 1, 3, 'Agua sucia', '2021-06-21', NULL, 1),
	(5, 1, 3, 'Ninguna', '2021-06-21', NULL, 1);
    
-- Clase de Producto
INSERT INTO `claseproducto` (`id_clase`, `nombre_clase`, `tipo_clase`) VALUES
	(1, 'Mojarra 34%', 'Polvo'),
	(2, 'Mojarra 24%', 'Grano'),
	(3, 'Mojarra 14%', 'Pepa');

-- Proveedor
INSERT INTO `proveedor` (`id_prove`, `nombre_emp`, `direccion_emp`, `telefono_emp`, `correo_emp`, `fecha`, `fecha_elim`, `est`) VALUES
	(1, 'Italcol ', 'km 13 Vio occ Mosquera-Funza', '3164989248', 'contacto@italcol.com', '2021-06-24', NULL, 1),
	(2, 'Tilapia S.A ', 'calle 67 sur N° 6-11', '3546765', 'tilapiasa@gmail.com', '2021-06-24', NULL, 1);

-- Producto
INSERT INTO `producto` (`id_produ`, `id_prove`, `id_clase`, `fech_venc`, `num_lote`, `fecha`, `fecha_elim`, `est`) VALUES
	(1, 1, 2, '2022-09-18', 'R02579321', '2021-06-24', NULL, 1),
	(2, 1, 1, '2021-10-24', 'R08765667', '2021-06-24', NULL, 1),
	(3, 1, 3, '2022-06-22', 'R08763456', '2021-06-24', NULL, 1),
	(4, 1, 2, '2022-03-30', 'R05676470', '2021-06-24', NULL, 1),
	(5, 1, 2, '2022-02-08', 'R09876823', '2021-06-24', NULL, 1);
    
SELECT nombre_clase, num_lote, fech_venc FROM producto INNER JOIN claseproducto on producto.id_clase = claseproducto.id_clase WHERE producto.est = 1;

-- Tabla de Alimentacion
INSERT INTO `tblalimentacion` (`id_tbl_alim`, `id_produ`, `id_cultivo`, `id_usu`, `cant_siembra`, `porc_proteina`, `hora_sum_alim1`, `hora_sum_alim2`, `hora_sum_alim3`, `obser_atmo`, `obser_gen_cult`, `fecha`, `fecha_elim`, `est`) VALUES
	(1, 3, 6, 2, 2000, 24, '06:30:00', NULL, NULL, 'Invernadero muy Frio ', 'Ninguno', '2021-06-24', NULL, 1),
	(2, 5, 2, 1, 1980, 10, '06:30:00', NULL, NULL, 'Ideal', 'Peces Saludables', '2021-06-24', NULL, 1),
	(3, 1, 1, 2, 1990, 36, '06:38:00', NULL, NULL, 'Ideal', 'Peces Sospechosos', '2021-06-24', NULL, 1),
	(4, 4, 7, 4, 1899, 30, '06:00:00', NULL, NULL, 'Invernadero con una Temperatura Alta', 'Peces Enfermos', '2021-06-24', NULL, 1),
	(5, 5, 4, 1, 2000, 10, '06:47:00', NULL, NULL, 'Ideal', 'Peces Saludables', '2021-06-24', NULL, 1);
    