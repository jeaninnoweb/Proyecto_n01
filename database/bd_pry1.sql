-- MySQL Workbench Synchronization
-- Generated: 2015-10-17 17:50
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: JeanCarlos

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bd_pry1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `bd_pry1`.`usuario` (
  `usuario_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `permiso_id` INT(11) NOT NULL COMMENT '',
  `area_id` INT(11) NOT NULL COMMENT '',
  `usuario_nombre` VARCHAR(45) NOT NULL COMMENT '',
  `usuario_clave` VARCHAR(10) NOT NULL COMMENT '',
  PRIMARY KEY (`usuario_id`)  COMMENT '',
  INDEX `fk_usuario_permiso_idx` (`permiso_id` ASC)  COMMENT '',
  INDEX `fk_usuario_area1_idx` (`area_id` ASC)  COMMENT '',
  CONSTRAINT `fk_usuario_permiso`
    FOREIGN KEY (`permiso_id`)
    REFERENCES `bd_pry1`.`permiso` (`permiso_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_area1`
    FOREIGN KEY (`area_id`)
    REFERENCES `bd_pry1`.`area` (`area_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bd_pry1`.`permiso` (
  `permiso_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `permiso_nombre` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`permiso_id`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bd_pry1`.`area` (
  `area_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `area_nombre` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`area_id`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bd_pry1`.`documento` (
  `documento_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `area_id` INT(11) NOT NULL COMMENT '',
  `documento_nombre` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`documento_id`)  COMMENT '',
  INDEX `fk_documento_area1_idx` (`area_id` ASC)  COMMENT '',
  CONSTRAINT `fk_documento_area1`
    FOREIGN KEY (`area_id`)
    REFERENCES `bd_pry1`.`area` (`area_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bd_pry1`.`archivo` (
  `archivo_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `documento_id` INT(11) NOT NULL COMMENT '',
  `archivo_nombre` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`archivo_id`)  COMMENT '',
  INDEX `fk_archivo_documento1_idx` (`documento_id` ASC)  COMMENT '',
  CONSTRAINT `fk_archivo_documento1`
    FOREIGN KEY (`documento_id`)
    REFERENCES `bd_pry1`.`documento` (`documento_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bd_pry1`.`reporte` (
  `reporte_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `documento_id` INT(11) NOT NULL COMMENT '',
  `reporte_fecha` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`reporte_id`)  COMMENT '',
  INDEX `fk_reporte_documento1_idx` (`documento_id` ASC)  COMMENT '',
  CONSTRAINT `fk_reporte_documento1`
    FOREIGN KEY (`documento_id`)
    REFERENCES `bd_pry1`.`documento` (`documento_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `bd_pry1`.`detalle_documento_usuario` (
  `usuario_id` INT(11) NOT NULL COMMENT '',
  `documento_id` INT(11) NOT NULL COMMENT '',
  `detalle_du_fecha` DATE NOT NULL COMMENT '',
  INDEX `fk_detalle_documento_usuario_documento1_idx` (`documento_id` ASC)  COMMENT '',
  INDEX `fk_detalle_documento_usuario_usuario1_idx` (`usuario_id` ASC)  COMMENT '',
  PRIMARY KEY (`usuario_id`, `documento_id`)  COMMENT '',
  CONSTRAINT `fk_detalle_documento_usuario_documento1`
    FOREIGN KEY (`documento_id`)
    REFERENCES `bd_pry1`.`documento` (`documento_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_documento_usuario_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `bd_pry1`.`usuario` (`usuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
