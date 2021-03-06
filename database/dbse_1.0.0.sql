-- MySQL Script generated by MySQL Workbench
-- 01/29/16 11:18:31
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema dbse
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbse
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbse` DEFAULT CHARACTER SET utf8 ;
USE `dbse` ;

-- -----------------------------------------------------
-- Table `dbse`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbse`.`user` (
  `rowno` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NULL,
  `lastname` VARCHAR(60) NULL,
  `email` VARCHAR(100) NULL,
  `phone` VARCHAR(10) NULL,
  `adress` VARCHAR(45) NULL,
  `userid` VARCHAR(15) NULL,
  `password` VARCHAR(150) NULL,
  `status` VARCHAR(10) NULL,
  `effective` DATE NULL,
  PRIMARY KEY (`rowno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbse`.`cust`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbse`.`cust` (
  `rowno` INT NOT NULL AUTO_INCREMENT,
  `nocust` VARCHAR(60) NULL,
  `compname` VARCHAR(150) NULL,
  `title` VARCHAR(10) NULL,
  `name` VARCHAR(60) NULL,
  `lastname` VARCHAR(60) NULL,
  `url` VARCHAR(150) NULL,
  `email` VARCHAR(150) NULL,
  `phone` VARCHAR(20) NULL,
  `adress` VARCHAR(150) NULL,
  `city` VARCHAR(60) NULL,
  `state` VARCHAR(60) NULL,
  `cp` VARCHAR(10) NULL,
  `note` VARCHAR(500) NULL,
  `status` VARCHAR(10) NULL,
  `effective` DATE NULL,
  PRIMARY KEY (`rowno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbse`.`hard`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbse`.`hard` (
  `rowno` INT NOT NULL AUTO_INCREMENT,
  `nohard` VARCHAR(60) NULL,
  `type` VARCHAR(20) NULL,
  `model` VARCHAR(150) NULL,
  `username` VARCHAR(150) NULL,
  `locip` VARCHAR(150) NULL,
  `pubip` VARCHAR(150) NULL,
  `phone` VARCHAR(20) NULL,
  `email` VARCHAR(150) NULL,
  `adress` VARCHAR(150) NULL,
  `city` VARCHAR(60) NULL,
  `state` VARCHAR(60) NULL,
  `cp` VARCHAR(10) NULL,
  `note` VARCHAR(500) NULL,
  `effective` DATE NULL,
  `endwarranty` DATE NULL,
  `warranty` VARCHAR(10) NULL,
  `status` VARCHAR(10) NULL,
  `cust_rowno` INT NOT NULL,
  PRIMARY KEY (`rowno`),
  INDEX `fk_hard_cust_idx` (`cust_rowno` ASC),
  CONSTRAINT `fk_hard_cust`
    FOREIGN KEY (`cust_rowno`)
    REFERENCES `dbse`.`cust` (`rowno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbse`.`tick`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbse`.`tick` (
  `rowno` INT NOT NULL AUTO_INCREMENT,
  `assigned` VARCHAR(15) NULL,
  `titlerequest` VARCHAR(60) NULL,
  `request` VARCHAR(500) NULL,
  `priority` VARCHAR(10) NULL,
  `warranty` VARCHAR(10) NULL,
  `effective` DATE NULL,
  `status` VARCHAR(10) NULL,
  `nocust` VARCHAR(60) NULL,
  `nohard` VARCHAR(60) NULL,
  `hard_rowno` INT NOT NULL,
  PRIMARY KEY (`rowno`),
  INDEX `fk_tick_hard1_idx` (`hard_rowno` ASC),
  CONSTRAINT `fk_tick_hard1`
    FOREIGN KEY (`hard_rowno`)
    REFERENCES `dbse`.`hard` (`rowno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbse`.`bita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbse`.`bita` (
  `rowno` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(120) NULL,
  `desc` VARCHAR(60) NULL,
  `note` VARCHAR(500) NULL,
  `effective` DATE NULL,
  `time` TIME NULL,
  `tick_rowno` INT NOT NULL,
  PRIMARY KEY (`rowno`),
  INDEX `fk_bita_tick1_idx` (`tick_rowno` ASC),
  CONSTRAINT `fk_bita_tick1`
    FOREIGN KEY (`tick_rowno`)
    REFERENCES `dbse`.`tick` (`rowno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
