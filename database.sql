-- MySQL Script generated by MySQL Workbench
-- Thu Dec 12 22:37:46 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema project
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema project
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `project` ;

-- -----------------------------------------------------
-- Table `project`.`check_url`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`check_url` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `url_UNIQUE` (`url` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 42
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `project`.`evaluations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`evaluations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `class_id` INT NULL DEFAULT NULL,
  `evaluation_url` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 299
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `project`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`professor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `class_id` INT NULL DEFAULT NULL,
  `professor_name` VARCHAR(45) NOT NULL,
  `subject` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 132
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `project`.`statistics`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`statistics` (
  `stat_id` INT NOT NULL AUTO_INCREMENT,
  `fairness` INT NULL DEFAULT NULL,
  `expertise` INT NULL DEFAULT NULL,
  `adaptability` INT NULL DEFAULT NULL,
  `use_of_tech` INT NULL DEFAULT NULL,
  `responsiveness` INT NULL DEFAULT NULL,
  `engagment` INT NULL DEFAULT NULL,
  `class` INT NULL DEFAULT NULL,
  `profesor` VARCHAR(45) NULL DEFAULT NULL,
  `subject` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`stat_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 363
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `project`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`users` (
  `user` VARCHAR(45) NOT NULL,
  `password` TEXT NULL DEFAULT NULL,
  `role` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
