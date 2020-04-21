-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_articles
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_articles
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_articles` DEFAULT CHARACTER SET latin1 ;
USE `db_articles` ;

-- -----------------------------------------------------
-- Table `db_articles`.`articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_articles`.`articles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  `reference` VARCHAR(255) NOT NULL,
  `archived` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `db_articles`.`phinxlog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_articles`.`phinxlog` (
  `version` BIGINT(20) NOT NULL,
  `migration_name` VARCHAR(100) NULL DEFAULT NULL,
  `start_time` TIMESTAMP NULL DEFAULT NULL,
  `end_time` TIMESTAMP NULL DEFAULT NULL,
  `breakpoint` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_articles`.`related_articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_articles`.`related_articles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  `articles_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_related_articles_articles_idx` (`articles_id` ASC),
  CONSTRAINT `fk_related_articles_articles`
    FOREIGN KEY (`articles_id`)
    REFERENCES `db_articles`.`articles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
