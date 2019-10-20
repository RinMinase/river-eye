-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema rivereye
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema rivereye
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rivereye` DEFAULT CHARACTER SET utf8 ;
USE `rivereye` ;

-- -----------------------------------------------------
-- Table `rivereye`.`riverdata`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rivereye`.`riverdata` (
  `id` INT NOT NULL,
  `river` VARCHAR(45) NOT NULL,
  `station` VARCHAR(45) NOT NULL,
  `barangay` VARCHAR(45) NOT NULL,
  `sample_date` DATE NOT NULL,
  `collection_time` TIME NOT NULL,
  `BOD` SMALLINT(5) UNSIGNED NULL,
  `DO` SMALLINT(5) UNSIGNED NULL,
  `TSS` SMALLINT(5) UNSIGNED NULL,
  `pH` TINYINT(3) UNSIGNED NULL,
  `TMP` TINYINT(3) UNSIGNED NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
