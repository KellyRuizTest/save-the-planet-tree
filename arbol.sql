-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `arbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE IF NOT EXISTS `banco` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`id`, `nombre`) VALUES
(1, '100%BANCO'),
(4, 'BANCO ACTIVO BANCO COMERCIAL, C.A.'),
(5, 'BANCO AGRICOLA'),
(6, 'BANCO BICENTENARIO'),
(7, 'BANCO CARONI, C.A. BANCO UNIVERSAL'),
(8, 'BANCO DE DESARROLLO DEL MICROEMPRESARIO'),
(9, 'BANCO DE VENEZUELA S.A.I.C.A.'),
(10, 'BANCO DEL CARIBE C.A.'),
(12, 'BANCO DEL TESORO'),
(13, 'BANCO ESPIRITO SANTO, S.A.'),
(14, 'BANCO EXTERIOR C.A.'),
(15, 'BANCO INDUSTRIAL DE VENEZUELA.'),
(16, 'BANCO INTERNACIONAL DE DESARROLLO, C.A.'),
(17, 'BANCO MERCANTIL C.A.'),
(18, 'BANCO NACIONAL DE CREDITO'),
(19, 'BANCO OCCIDENTAL DE DESCUENTO.'),
(21, 'BANCO PROVINCIAL BBVA'),
(22, 'BANCO VENEZOLANO DE CREDITO S.A.'),
(23, 'BANCRECER S.A. BANCO DE DESARROLLO'),
(24, 'BANESCO BANCO UNIVERSAL'),
(25, 'BANGENTE'),
(26, 'BANPLUS BANCO COMERCIAL C.A.'),
(27, 'CITIBANK'),
(28, 'CORP BANCA'),
(30, 'FONDO COMUN'),
(31, 'INSTITUTO MUNICIPAL DE CREDITO POPULAR'),
(32, 'MIBANCO BANCO DE DESARROLLO, C.A.'),
(33, 'SOFITASA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comite`
--

CREATE TABLE IF NOT EXISTS `comite` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `razon` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Escolar, Comunidad, Institucional',
  `creacion` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `comite`
--

INSERT INTO `comite` (`id`, `nombre`, `razon`, `creacion`, `saldo`) VALUES
(2, 'Comite Salvaguarda', 'K', '20-03-2013', '201.00'),
(3, 'Comite Siembra mas', 'C', '06-03-2013', '15152.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenca`
--

CREATE TABLE IF NOT EXISTS `cuenca` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `idzona` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `fk_cuencas_zonas1` (`idzona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `numero` varchar(23) COLLATE utf8_unicode_ci NOT NULL,
  `titular` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `idcomite` smallint(6) NOT NULL,
  `idbanco` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_UNIQUE` (`numero`),
  KEY `fk_banco_comite1` (`idcomite`),
  KEY `fk_banco_tban1` (`idbanco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultivo`
--

CREATE TABLE IF NOT EXISTS `cultivo` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cantidad` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `idproyecto` smallint(6) NOT NULL,
  `idespecie` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `fk_cultivos_proyectos1` (`idproyecto`),
  KEY `fk_cultivos_especiesp1` (`idespecie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desembolso`
--

CREATE TABLE IF NOT EXISTS `desembolso` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `idproyecto` smallint(6) NOT NULL,
  `portador` int(10) NOT NULL COMMENT 'Nombre de la persona a la que va dirigida el cheque',
  `cheque` varchar(8) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Numero de cheque',
  `fecha_cobro` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fecha del cheque',
  `fecha_emision` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Fecha del desembolso',
  `monto` decimal(10,2) NOT NULL,
  `nota` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nota',
  `primer` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `fk_desembolso_proyectos1` (`idproyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE IF NOT EXISTS `especie` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `familia` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombrecomun` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nomrecientifico` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`id`, `familia`, `nombrecomun`, `nomrecientifico`) VALUES
(1, 'Fabaceae', 'Acacia de siam', 'Cassia siamea'),
(3, 'Fabaceae', 'Aceite', 'Copaifera officinalis'),
(4, 'Fabaceae', 'Algarrobo', 'Hymenaea courbaril'),
(5, 'Combretaceae', 'Almendron', 'Terminalia catappa'),
(6, 'Bignoniaceae', 'Apamate', 'Tabebuia rosea'),
(7, 'Bignoniaceae', 'Araguaney', 'Tabebuia chrysantha'),
(8, 'Rubiaceae', 'Cafè', 'Coffea arabica'),
(9, 'Meliaceae', 'Caoba', 'Swietenia macrophylla'),
(10, 'Caesalpiniaceae', 'Cañafistola', 'Cassia moschata'),
(11, 'Bombacaceae', 'Castaño', 'Pachira insignis'),
(12, 'Fabaceae', 'Carocaro', 'Enterolobium cyclocarpum'),
(13, 'Meliaceae', 'Cedro', 'Cedrela odorata'),
(14, 'Fabáceas', 'Cuji', 'Acacia macracantha'),
(15, 'Arecaceae', 'Chaguaramo', 'Roystonea oleracea'),
(16, 'Fabaceae', 'Dividive', 'Caesalpinia coriaria'),
(17, 'Oleaceae', 'Fresno', 'Fraxinus chinensis'),
(18, 'Fabaceae', 'Flamboyant', 'Delonix regia'),
(19, 'Lythraceae', 'Flor de la reina', 'Lagerstroemia speciosa'),
(20, 'Fabaceae', 'Guamo machete', 'Inga spectabilis'),
(21, 'Zygophyllaceae', 'Guayacan', 'Guaiacum officinale'),
(22, 'Euphorbiaceae', 'Jabillo', 'Hura crepitans'),
(23, 'Arecaceae', 'Mapora', 'Oenocarpus mapora'),
(24, 'Sapindaceae', 'Parapara', 'Sapindus saponaria'),
(25, 'Boraginaceae', 'Pardillo negro', 'Cordia thaisiana'),
(26, 'Fabaceae', 'Peonia', 'Ormosia macrocalix'),
(27, 'Fabaceae', 'Samàn', 'Samanea saman'),
(28, 'Fabaceae', 'Samàn margariteño', 'Albizia lebbeck'),
(29, 'Bignoniaceae', 'Tulipan africano', 'Spathodea campanulata'),
(30, 'Fabaceae', 'Urape,pata de vaca', 'Bauhinia sp'),
(33, 'Fabaceae', 'Acacia', 'Acacia decurrens');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `idproyecto` smallint(6) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`path`),
  KEY `id` (`id`),
  KEY `fk_fotos_proyectos1` (`idproyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembro`
--

CREATE TABLE IF NOT EXISTS `miembro` (
  `id` smallint(6) NOT NULL,
  `coordinador` tinyint(1) NOT NULL COMMENT 'Coordinador, Miembro',
  `idcomite` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_integrante_comite1` (`idcomite`),
  KEY `fk_integrante_persona1` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `miembro`
--

INSERT INTO `miembro` (`id`, `coordinador`, `idcomite`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `nombre`) VALUES
(1, 'ALBERTO ADRIANI'),
(2, 'ANDRES BELLO'),
(3, 'ANTONIO PINTO SALINAS'),
(4, 'ARICAGUA'),
(5, 'ARZOBISPO CHACON'),
(6, 'CAMPO ELIAS'),
(7, 'CARACCIOLO PARRA OLMEDO'),
(8, 'CARDENAL QUINTERO'),
(9, 'GUARAQUE'),
(10, 'JULIO CESAR SALAS'),
(11, 'JUSTO BRICEÑO'),
(12, 'LIBERTADOR'),
(13, 'MIRANDA'),
(14, 'OBISPO RAMOS DE LORA'),
(15, 'PADRE NOGUERA'),
(16, 'PUEBLO LLANO'),
(17, 'RANGEL'),
(18, 'RIVAS DAVILA'),
(19, 'SANTOS MARQUINA'),
(20, 'SUCRE'),
(21, 'TOVAR'),
(22, 'TULIO FEBRES CORDERO'),
(23, 'ZEA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE IF NOT EXISTS `parroquia` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idmunicipio` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `fk_parroquias_municipios` (`idmunicipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=87 ;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`id`, `nombre`, `idmunicipio`) VALUES
(1, 'GABRIEL PICON G.', 1),
(2, 'HECTOR AMABLE MORA', 1),
(3, 'JOSE NUCETE SARDI', 1),
(4, 'PRESIDENTE BETANCOURT', 1),
(5, 'PRESIDENTE PAEZ', 1),
(6, 'PRESIDENTE ROMULO GALLEGOS', 1),
(7, 'PULIDO MENDEZ', 1),
(8, 'LA AZULITA', 2),
(9, 'MESA BOLIVAR', 3),
(10, 'MESA DE LAS PALMAS', 3),
(11, 'STA CRUZ DE MORA', 3),
(13, 'SAN ANTONIO', 4),
(14, 'CANAGUA', 5),
(16, 'CHACANTA', 5),
(17, 'EL MOLINO', 5),
(18, 'GUAIMARAL', 5),
(19, 'MUCUCHACHI', 5),
(20, 'MUCUTUY', 5),
(21, 'ACEQUIAS', 6),
(22, 'FERNANDEZ PEÑA', 6),
(23, 'JAJI', 6),
(24, 'LA MESA', 6),
(25, 'MATRIZ', 6),
(26, 'MONTALBAN', 6),
(27, 'SAN JOSE', 6),
(28, 'FLORENCIO RAMIREZ', 7),
(29, 'TUCANI', 7),
(30, 'LAS PIEDRAS', 8),
(31, 'SANTO DOMINGO', 8),
(32, 'GUARAQUE', 9),
(33, 'MESA DE QUINTERO', 9),
(34, 'RIO NEGRO', 9),
(35, 'ARAPUEY', 10),
(36, 'PALMIRA', 10),
(37, 'SAN CRISTOBAL DE TACHIRA', 11),
(38, 'TORONDOY', 11),
(39, 'ANTONIO SPINETTI DINI', 12),
(40, 'ARIAS', 12),
(41, 'CARACCIOLO PARRA P', 12),
(42, 'DOMINGO PEÑA', 12),
(43, 'EL LLANO', 12),
(44, 'EL MORRO', 12),
(45, 'GONZALO PICON FEBRES', 12),
(46, 'JACINTO PLAZA', 12),
(47, 'JUAN RODRIGUEZ SUAREZ', 12),
(48, 'LASSO DE LA VEGA', 12),
(49, 'LOS NEVADOS', 12),
(50, 'MARIANO PICON SALAS', 12),
(51, 'MILLA', 12),
(52, 'OSUNA RODRIGUEZ', 12),
(53, 'SAGRARIO', 12),
(54, 'ANDRES ELOY BLANCO', 13),
(55, 'CHACHOPO', 13),
(56, 'LA VENTA', 13),
(57, 'PIÑANGO', 13),
(58, 'ELOY PAREDES', 14),
(59, 'R DE ALCAZAR', 14),
(60, 'STA ELENA DE ARENALES', 14),
(61, 'STA MARIA DE CAPARO', 15),
(62, 'PUEBLO LLANO', 16),
(63, 'CACUTE', 17),
(64, 'LA TOMA', 17),
(65, 'MUCUCHIES', 17),
(66, 'MUCURUBA', 17),
(67, 'SAN RAFAEL', 17),
(68, 'BAILADORES', 18),
(69, 'GERONIMO MALDONADO', 18),
(70, 'TABAY', 19),
(71, 'CHIGUARA', 20),
(72, 'ESTANQUES', 20),
(73, 'LAGUNILLAS', 20),
(74, 'LA TRAMPA', 20),
(75, 'PUEBLO NUEVO DEL SUR', 20),
(76, 'SAN JUAN', 20),
(77, 'EL AMPARO', 21),
(78, 'EL LLANO', 21),
(79, 'SAN FRANCISCO', 21),
(80, 'TOVAR', 21),
(81, 'INDEPENDENCIA', 22),
(82, 'MARIA C PALACIOS', 22),
(83, 'NUEVA BOLIVIA', 22),
(84, 'SANTA APOLONIA', 22),
(85, 'CAÑO EL TIGRE', 23),
(86, 'ZEA', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Masculino, Femenino',
  `direccion` tinytext COLLATE utf8_unicode_ci,
  `telefono` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_UNIQUE` (`cedula`),
  KEY `id` (`id`),
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `cedula`, `nombre`, `apellido`, `sexo`, `direccion`, `telefono`) VALUES
(1, 'V-19071590', 'Kelly Ramon', 'Ruiz Hernandez', '1', 'Caracas - Distrito Capital Municipio Chacao', '(426)-470.0658'),
(2, 'V-18772981', 'Andrea', 'Perez', '0', 'Caracas - Distrito Capital. Municipio Libertador', '(424)-776.1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotor`
--

CREATE TABLE IF NOT EXISTS `promotor` (
  `id` smallint(6) NOT NULL,
  `permanente` tinyint(1) NOT NULL COMMENT 'Permanente o internitenet',
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_promotor_persona1` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `promotor`
--

INSERT INTO `promotor` (`id`, `permanente`, `activo`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `idparroquia` smallint(6) NOT NULL,
  `idzona` smallint(6) NOT NULL,
  `idpromotor` smallint(6) NOT NULL,
  `idcomite` smallint(6) NOT NULL,
  `numero` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Numero de convenio',
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del proyecto',
  `fecha` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `hectareas` decimal(10,2) NOT NULL,
  `meta` int(10) NOT NULL,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Observacion',
  `fase` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Vivero,Plantacion, Mantenimiento',
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ejecucion,espera Recurso,Cerrado (no se cumplio), Terminado, Paralizado',
  `sistema` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Forestal,Agroforestal,Protector,Comercial',
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`),
  KEY `id` (`id`),
  KEY `fk_proyectos_parroquias1` (`idparroquia`),
  KEY `fk_proyectos_zonas1` (`idzona`),
  KEY `fk_proyectos_promotores1` (`idpromotor`),
  KEY `fk_proyectos_comite1` (`idcomite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `idparroquia`, `idzona`, `idpromotor`, `idcomite`, `numero`, `nombre`, `fecha`, `monto`, `hectareas`, `meta`, `observacion`, `fase`, `status`, `sistema`) VALUES
(1, 16, 2, 1, 2, 'mmm988', 'Salva El Planeta', '01-03-2013', '7890.00', '500.00', 300, 'Se estima sembrar 500 hectareas de arboles en el municipio', 'V', 'E', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rendicion`
--

CREATE TABLE IF NOT EXISTS `rendicion` (
  `id` smallint(6) NOT NULL,
  `fecha` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Recibo, Factura, Comision bancaria',
  `numero` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `monto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FKrendicion67755` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE IF NOT EXISTS `zona` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `desripcion` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `precipitacion` decimal(6,2) NOT NULL,
  `temperatura` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id`, `nombre`, `desripcion`, `precipitacion`, `temperatura`) VALUES
(2, 'Los cascabeles', 'Esta zona es apta para el cultivo de distintas especies de arboles.', '123.10', '10.50');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenca`
--
ALTER TABLE `cuenca`
  ADD CONSTRAINT `fk_cuencas_zonas1` FOREIGN KEY (`idzona`) REFERENCES `zona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `fk_banco_comite1` FOREIGN KEY (`idcomite`) REFERENCES `comite` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_banco_tban1` FOREIGN KEY (`idbanco`) REFERENCES `banco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cultivo`
--
ALTER TABLE `cultivo`
  ADD CONSTRAINT `fk_cultivos_especiesp1` FOREIGN KEY (`idespecie`) REFERENCES `especie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cultivos_proyectos1` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `desembolso`
--
ALTER TABLE `desembolso`
  ADD CONSTRAINT `fk_desembolso_proyectos1` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `fk_fotos_proyectos1` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `miembro`
--
ALTER TABLE `miembro`
  ADD CONSTRAINT `fk_integrante_comite1` FOREIGN KEY (`idcomite`) REFERENCES `comite` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_integrante_persona1` FOREIGN KEY (`id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `fk_parroquias_municipios` FOREIGN KEY (`idmunicipio`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `promotor`
--
ALTER TABLE `promotor`
  ADD CONSTRAINT `fk_promotor_persona1` FOREIGN KEY (`id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `fk_proyectos_comite1` FOREIGN KEY (`idcomite`) REFERENCES `comite` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proyectos_parroquias1` FOREIGN KEY (`idparroquia`) REFERENCES `parroquia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proyectos_promotores1` FOREIGN KEY (`idpromotor`) REFERENCES `promotor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proyectos_zonas1` FOREIGN KEY (`idzona`) REFERENCES `zona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rendicion`
--
ALTER TABLE `rendicion`
  ADD CONSTRAINT `FKrendicion67755` FOREIGN KEY (`id`) REFERENCES `desembolso` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
