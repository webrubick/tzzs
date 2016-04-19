-- MySQL Script generated by MySQL Workbench
-- Fri Mar 25 16:33:08 2016
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Table `db_dxsj`.`tab_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_dxsj`.`tab_user` ;

CREATE TABLE IF NOT EXISTS `db_dxsj`.`tab_user` (
  `uid` INT NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(50) NULL COMMENT '用户名',
  `password` VARCHAR(50) NULL COMMENT '密码',
  `salt` VARCHAR(50) NULL COMMENT '盐值',
  `create_time` DATETIME NULL,
  `update_time` DATETIME NULL,
  PRIMARY KEY (`uid`));

CREATE UNIQUE INDEX `user_name_UNIQUE` ON `db_dxsj`.`tab_user` (`user_name` ASC);


-- -----------------------------------------------------
-- Table `db_dxsj`.`tab_website_info`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_dxsj`.`tab_website_info` ;

CREATE TABLE IF NOT EXISTS `db_dxsj`.`tab_website_info` (
  `domain` VARCHAR(50) NOT NULL,
  `website_name` VARCHAR(100) NULL,
  `com_address` VARCHAR(200) NULL,
  `com_postcode` VARCHAR(20) NULL,
  `contact` VARCHAR(100) NULL,
  `com_keywords` VARCHAR(1000) NULL,
  `com_description` VARCHAR(2000) NULL COMMENT '公司介绍',
  `com_service_aim` VARCHAR(2000) NULL COMMENT '服务宗旨',
  `com_service_aim_desc` VARCHAR(2000) NULL COMMENT '服务宗旨描述',
  `com_desire` VARCHAR(2000) NULL COMMENT '愿景',
  `beian_url` VARCHAR(100) NULL,
  `beian_no` VARCHAR(100) NULL,
  `website_home_bg` VARCHAR(200) NULL,
  `create_time` DATETIME NULL,
  `update_time` DATETIME NULL);
  
CREATE UNIQUE INDEX `domain_UNIQUE` ON `db_dxsj`.`tab_website_info` (`domain` ASC);

USE `db_dxsj`;

DELIMITER $$

USE `db_dxsj`$$
DROP TRIGGER IF EXISTS `db_dxsj`.`tab_user_BEFORE_INSERT` $$
USE `db_dxsj`$$
CREATE DEFINER = CURRENT_USER TRIGGER `db_dxsj`.`tab_user_BEFORE_INSERT` BEFORE INSERT ON `tab_user` FOR EACH ROW
BEGIN
	IF @disable_triggers IS NULL THEN
		set @temp_now = now(); set new.`create_time` = @temp_now ; set new.`update_time` = @temp_now ;
	END IF;
    
END$$


USE `db_dxsj`$$
DROP TRIGGER IF EXISTS `db_dxsj`.`tab_user_BEFORE_UPDATE` $$
USE `db_dxsj`$$
CREATE DEFINER = CURRENT_USER TRIGGER `db_dxsj`.`tab_user_BEFORE_UPDATE` BEFORE UPDATE ON `tab_user` FOR EACH ROW
BEGIN
	IF @disable_triggers IS NULL THEN
		set new.`update_time` = now() ;
	END IF;

END$$


USE `db_dxsj`$$
DROP TRIGGER IF EXISTS `db_dxsj`.`tab_website_info_BEFORE_INSERT` $$
USE `db_dxsj`$$
CREATE DEFINER = CURRENT_USER TRIGGER `db_dxsj`.`tab_website_info_BEFORE_INSERT` BEFORE INSERT ON `tab_website_info` FOR EACH ROW
BEGIN
	IF @disable_triggers IS NULL THEN
		set @temp_now = now(); set new.`create_time` = @temp_now ; set new.`update_time` = @temp_now ;
	END IF;

END$$


USE `db_dxsj`$$
DROP TRIGGER IF EXISTS `db_dxsj`.`tab_website_info_BEFORE_UPDATE` $$
USE `db_dxsj`$$
CREATE DEFINER = CURRENT_USER TRIGGER `db_dxsj`.`tab_website_info_BEFORE_UPDATE` BEFORE UPDATE ON `tab_website_info` FOR EACH ROW
BEGIN
	IF @disable_triggers IS NULL THEN
		set new.`update_time` = now() ;
	END IF;

END$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
