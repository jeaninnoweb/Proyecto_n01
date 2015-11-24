/*
Navicat MySQL Data Transfer

Source Server         : Jeancarlos
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : bd_pry1

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-11-24 14:28:53
*/
DROP DATABASE IF EXISTS `bd_pry1`;
CREATE DATABASE IF NOT EXISTS `bd_pry1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_pry1`; 


SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for archivador
-- ----------------------------
DROP TABLE IF EXISTS `archivador`;
CREATE TABLE `archivador` (
  `archivador_id` int(11) NOT NULL AUTO_INCREMENT,
  `archivo_nombre` varchar(30) NOT NULL,
  `archivador_fechacrea` date NOT NULL,
  `archivador_anovigen` char(4) NOT NULL,
  `asignacion_id` int(11) NOT NULL,
  PRIMARY KEY (`archivador_id`),
  KEY `fk_archivador_asignacion1_idx` (`asignacion_id`),
  CONSTRAINT `fk_archivador_asignacion1` FOREIGN KEY (`asignacion_id`) REFERENCES `asignacion` (`asignacion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of archivador
-- ----------------------------

-- ----------------------------
-- Table structure for asignacion
-- ----------------------------
DROP TABLE IF EXISTS `asignacion`;
CREATE TABLE `asignacion` (
  `asignacion_id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) NOT NULL,
  `dependencia_id` int(11) NOT NULL,
  `cargo_id` int(11) NOT NULL,
  `asignacion_nivel` char(1) NOT NULL,
  `asignacion_estado` char(1) NOT NULL,
  PRIMARY KEY (`asignacion_id`),
  KEY `fk_asignacion_cargo1_idx` (`cargo_id`),
  KEY `fk_asignacion_persona1_idx` (`persona_id`),
  KEY `fk_asignacion_dependencia1_idx` (`dependencia_id`),
  CONSTRAINT `fk_asignacion_cargo1` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`cargo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_dependencia1` FOREIGN KEY (`dependencia_id`) REFERENCES `dependencia` (`dependencia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of asignacion
-- ----------------------------

-- ----------------------------
-- Table structure for cargo
-- ----------------------------
DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `cargo_id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_nombre` varchar(45) NOT NULL,
  `cargo_estado` char(1) NOT NULL,
  PRIMARY KEY (`cargo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cargo
-- ----------------------------

-- ----------------------------
-- Table structure for categoriadep
-- ----------------------------
DROP TABLE IF EXISTS `categoriadep`;
CREATE TABLE `categoriadep` (
  `ctdp_id` int(11) NOT NULL AUTO_INCREMENT,
  `ctdp_nombre` varchar(30) NOT NULL,
  `ctdp_abreviatura` varchar(5) NOT NULL,
  `ctdp_estado` char(1) NOT NULL,
  PRIMARY KEY (`ctdp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categoriadep
-- ----------------------------

-- ----------------------------
-- Table structure for categoriadoc
-- ----------------------------
DROP TABLE IF EXISTS `categoriadoc`;
CREATE TABLE `categoriadoc` (
  `ctd_id` int(11) NOT NULL AUTO_INCREMENT,
  `ctd_nombre` varchar(30) NOT NULL,
  `ctd_fuente` char(1) NOT NULL,
  `ctd_estado` char(1) NOT NULL,
  PRIMARY KEY (`ctd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categoriadoc
-- ----------------------------

-- ----------------------------
-- Table structure for clasificador
-- ----------------------------
DROP TABLE IF EXISTS `clasificador`;
CREATE TABLE `clasificador` (
  `clasificador_id` int(11) NOT NULL AUTO_INCREMENT,
  `clasificador_codigo` char(7) NOT NULL,
  `clasificador_nombre` text NOT NULL,
  `clasificador_estado` char(1) NOT NULL,
  PRIMARY KEY (`clasificador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clasificador
-- ----------------------------

-- ----------------------------
-- Table structure for dependencia
-- ----------------------------
DROP TABLE IF EXISTS `dependencia`;
CREATE TABLE `dependencia` (
  `dependencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `dependencia_nombre` varchar(50) NOT NULL,
  `dependencia_abreviatura` varchar(10) NOT NULL,
  `dependencia_asignacion` smallint(6) NOT NULL,
  `dependencia_estado` char(1) NOT NULL,
  `ctdp_id` int(11) NOT NULL,
  PRIMARY KEY (`dependencia_id`),
  KEY `fk_dependencia_categoriadep_idx` (`ctdp_id`),
  CONSTRAINT `fk_dependencia_categoriadep` FOREIGN KEY (`ctdp_id`) REFERENCES `categoriadep` (`ctdp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dependencia
-- ----------------------------

-- ----------------------------
-- Table structure for detalle_arc_mov
-- ----------------------------
DROP TABLE IF EXISTS `detalle_arc_mov`;
CREATE TABLE `detalle_arc_mov` (
  `dam_id` int(11) NOT NULL AUTO_INCREMENT,
  `movimiento_id` int(11) NOT NULL,
  `dam_observacion` varchar(150) NOT NULL,
  PRIMARY KEY (`dam_id`),
  KEY `fk_detalle_arc_mov_movimiento1_idx` (`movimiento_id`),
  CONSTRAINT `fk_detalle_arc_mov_movimiento1` FOREIGN KEY (`movimiento_id`) REFERENCES `movimiento` (`movimiento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detalle_arc_mov
-- ----------------------------

-- ----------------------------
-- Table structure for documento
-- ----------------------------
DROP TABLE IF EXISTS `documento`;
CREATE TABLE `documento` (
  `documento_id` int(11) NOT NULL AUTO_INCREMENT,
  `documento_numero` int(11) NOT NULL,
  `documento_fuente` varchar(8) NOT NULL,
  `documento_fecha` date NOT NULL,
  `documento_sigla` varchar(50) NOT NULL,
  `documento_asunto` varchar(100) NOT NULL,
  `documento_folio` int(11) NOT NULL,
  `documento_tipoper` varchar(8) NOT NULL,
  `documento_interesado` varchar(50) NOT NULL,
  `documento_empresa` varchar(50) NOT NULL,
  `documento_cargo` varchar(50) NOT NULL,
  `documento_prioridad` varchar(10) NOT NULL,
  `documento_archivo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`documento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of documento
-- ----------------------------

-- ----------------------------
-- Table structure for documento2
-- ----------------------------
DROP TABLE IF EXISTS `documento2`;
CREATE TABLE `documento2` (
  `documento_id` int(11) NOT NULL AUTO_INCREMENT,
  `documento_numero` int(11) NOT NULL,
  `documento_fuente` varchar(8) NOT NULL,
  `documento_fecha` date NOT NULL,
  `documento_sigla` varchar(50) NOT NULL,
  `documento_asunto` varchar(100) NOT NULL,
  `documento_folio` int(11) NOT NULL,
  `documento_tipoper` varchar(8) NOT NULL,
  `documento_interesado` varchar(50) NOT NULL,
  `documento_empresa` varchar(50) NOT NULL,
  `documento_cargo` varchar(50) NOT NULL,
  `documento_dni` char(8) NOT NULL,
  `documento_prioridad` varchar(10) NOT NULL,
  `ctdp_id` int(11) NOT NULL,
  `procedimiento_id` int(11) NOT NULL,
  PRIMARY KEY (`documento_id`),
  KEY `fk_documento_procedimiento1_idx` (`procedimiento_id`),
  KEY `fk_documento_categoriadoc1_idx` (`ctdp_id`),
  CONSTRAINT `fk_documento_categoriadoc1` FOREIGN KEY (`ctdp_id`) REFERENCES `categoriadoc` (`ctd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documento_procedimiento1` FOREIGN KEY (`procedimiento_id`) REFERENCES `procedimiento` (`procedimiento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of documento2
-- ----------------------------

-- ----------------------------
-- Table structure for incidencia
-- ----------------------------
DROP TABLE IF EXISTS `incidencia`;
CREATE TABLE `incidencia` (
  `incidencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `incidencia_forma` varchar(8) NOT NULL,
  `incidencia_destino` varchar(3) NOT NULL,
  `incidencia_perdestino` varchar(50) NOT NULL,
  `incidencia_depdestino` varchar(50) NOT NULL,
  `incidencia_cargo` varchar(30) NOT NULL,
  `incidencia_estado` char(1) NOT NULL,
  `movimiento_id` int(11) NOT NULL,
  PRIMARY KEY (`incidencia_id`),
  KEY `fk_incidencia_movimiento1_idx` (`movimiento_id`),
  CONSTRAINT `fk_incidencia_movimiento1` FOREIGN KEY (`movimiento_id`) REFERENCES `movimiento` (`movimiento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of incidencia
-- ----------------------------

-- ----------------------------
-- Table structure for movimiento
-- ----------------------------
DROP TABLE IF EXISTS `movimiento`;
CREATE TABLE `movimiento` (
  `movimiento_id` int(11) NOT NULL AUTO_INCREMENT,
  `movimiento_fecha` date NOT NULL,
  `movimiento_hora` time NOT NULL,
  `movimiento_fechalimite` date NOT NULL,
  `movimiento_proveido` varchar(100) NOT NULL,
  `movimiento_operacion` varchar(20) NOT NULL,
  `movimiento_estado` char(1) NOT NULL,
  `asignacion_id` int(11) NOT NULL,
  `documento_id` int(11) NOT NULL,
  PRIMARY KEY (`movimiento_id`),
  KEY `fk_movimiento_asignacion1_idx` (`asignacion_id`),
  KEY `fk_movimiento_documento1_idx` (`documento_id`),
  CONSTRAINT `fk_movimiento_asignacion1` FOREIGN KEY (`asignacion_id`) REFERENCES `asignacion` (`asignacion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimiento_documento1` FOREIGN KEY (`documento_id`) REFERENCES `documento` (`documento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of movimiento
-- ----------------------------

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `persona_id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_dni` char(8) NOT NULL,
  `persona_nombre` varchar(30) NOT NULL,
  `persona_apellido` varchar(30) NOT NULL,
  `persona_inicial` varchar(6) NOT NULL,
  `persona_login` varchar(15) NOT NULL,
  `persona_clave` varchar(32) NOT NULL,
  `persona_estado` char(1) NOT NULL,
  PRIMARY KEY (`persona_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES ('1', '12345678', 'demo', 'demo', 'de', 'demo', 'demo', '1');

-- ----------------------------
-- Table structure for procedimiento
-- ----------------------------
DROP TABLE IF EXISTS `procedimiento`;
CREATE TABLE `procedimiento` (
  `procedimiento_id` int(11) NOT NULL AUTO_INCREMENT,
  `procedimiento_codigo` char(7) NOT NULL,
  `procedimiento_denominacion` text NOT NULL,
  `procedimiento_descriptor` varchar(100) NOT NULL,
  `procedimiento_calificacion` varchar(10) NOT NULL,
  `procedimiento_numdias` int(11) NOT NULL,
  `procedimiento_iniciotram` varchar(100) NOT NULL,
  `procedimiento_unidadaprov` varchar(100) NOT NULL,
  `procedimiento_resuelve` varchar(100) NOT NULL,
  `procedimiento_impugna` varchar(100) NOT NULL,
  `procedimiento_baselegal` text NOT NULL,
  `procedimiento_vinculacion` int(11) NOT NULL,
  `procedimiento_estado` char(1) NOT NULL,
  `clasificador_id` int(11) NOT NULL,
  PRIMARY KEY (`procedimiento_id`),
  KEY `fk_procedimiento_clasificador1_idx` (`clasificador_id`),
  CONSTRAINT `fk_procedimiento_clasificador1` FOREIGN KEY (`clasificador_id`) REFERENCES `clasificador` (`clasificador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of procedimiento
-- ----------------------------

-- ----------------------------
-- Table structure for referencia
-- ----------------------------
DROP TABLE IF EXISTS `referencia`;
CREATE TABLE `referencia` (
  `referencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia_documento` varchar(15) NOT NULL,
  `documento_id` int(11) NOT NULL,
  PRIMARY KEY (`referencia_id`),
  KEY `fk_referencia_documento1_idx` (`documento_id`),
  CONSTRAINT `fk_referencia_documento1` FOREIGN KEY (`documento_id`) REFERENCES `documento` (`documento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of referencia
-- ----------------------------

-- ----------------------------
-- Table structure for requisito
-- ----------------------------
DROP TABLE IF EXISTS `requisito`;
CREATE TABLE `requisito` (
  `requisito_id` int(11) NOT NULL AUTO_INCREMENT,
  `requisito_codigo` char(7) NOT NULL,
  `requisito_descripcion` text NOT NULL,
  `requisito_porcuit` varchar(30) NOT NULL,
  `requisito_costo` varchar(30) NOT NULL,
  `requisito_estado` char(1) NOT NULL,
  `procedimiento_id` int(11) NOT NULL,
  PRIMARY KEY (`requisito_id`),
  KEY `fk_requisito_procedimiento1_idx` (`procedimiento_id`),
  CONSTRAINT `fk_requisito_procedimiento1` FOREIGN KEY (`procedimiento_id`) REFERENCES `procedimiento` (`procedimiento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of requisito
-- ----------------------------
