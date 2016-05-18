-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema trabalho-lp
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `trabalho-lp` ;

-- -----------------------------------------------------
-- Schema trabalho-lp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `trabalho-lp` DEFAULT CHARACTER SET utf8 ;
USE `trabalho-lp` ;

-- -----------------------------------------------------
-- Table `trabalho-lp`.`convenio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho-lp`.`convenio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho-lp`.`paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho-lp`.`paciente` (
  `codigo` INT NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `sobrenome` VARCHAR(100) NOT NULL,
  `telefone1` VARCHAR(16) NOT NULL,
  `telefone2` VARCHAR(16) NULL,
  `celular1` VARCHAR(16) NOT NULL,
  `celular2` VARCHAR(16) NULL,
  `convenio_id` INT NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE INDEX `id_UNIQUE` (`codigo` ASC),
  INDEX `fk_paciente_convenio_id_idx` (`convenio_id` ASC),
  CONSTRAINT `fk_paciente_convenio_id`
    FOREIGN KEY (`convenio_id`)
    REFERENCES `trabalho-lp`.`convenio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho-lp`.`agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho-lp`.`agendamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `paciente_codigo` INT NOT NULL,
  `data` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `tipo` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `paciente_id_UNIQUE` (`paciente_codigo` ASC),
  CONSTRAINT `fk_agendamento_paciente_codigo`
    FOREIGN KEY (`paciente_codigo`)
    REFERENCES `trabalho-lp`.`paciente` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
