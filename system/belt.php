-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema belt_exam
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema belt_exam
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `belt_exam` DEFAULT CHARACTER SET utf8 ;
USE `belt_exam` ;

-- -----------------------------------------------------
-- Table `belt_exam`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `belt_exam`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `confirm_password` VARCHAR(45) NULL,
  `birthday` DATE NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `belt_exam`.`appointments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `belt_exam`.`appointments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tasks` VARCHAR(100) NULL,
  `date` DATE NOT NULL,
  `time` TIME NULL,
  `status` VARCHAR(45) NULL,
  `poster_id` INT NOT NULL,
  PRIMARY KEY (`id`, `date`),
  INDEX `fk_appointments_users_idx` (`poster_id` ASC),
  CONSTRAINT `fk_appointments_users`
    FOREIGN KEY (`poster_id`)
    REFERENCES `belt_exam`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `belt_exam`.`user_has_appointment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `belt_exam`.`user_has_appointment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `appointment_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_has_appointment_users1_idx` (`user_id` ASC),
  INDEX `fk_user_has_appointment_appointments1_idx` (`appointment_id` ASC),
  CONSTRAINT `fk_user_has_appointment_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `belt_exam`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_appointment_appointments1`
    FOREIGN KEY (`appointment_id`)
    REFERENCES `belt_exam`.`appointments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
