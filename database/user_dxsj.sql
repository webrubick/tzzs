-- MySQL Script generated by MySQL Workbench
-- Sun Mar 13 13:42:32 2016
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- user user_dxsj
-- -----------------------------------------------------
DROP USER IF EXISTS `user_dxsj`@`localhost`;
DROP USER IF EXISTS `user_dxsj`@`%`;
CREATE USER `user_dxsj`@`%` IDENTIFIED by 'yytest';
GRANT all privileges ON `db_dxsj`.* TO `user_dxsj`@`%`;

FLUSH privileges;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- -----------------------------------------------------
-- Table `db_tzthfdc`.`Tab_User` data yytest
-- -----------------------------------------------------
-- dxsj123
INSERT INTO `db_dxsj`.`Tab_User`(`user_name`, `password`, `salt`) VALUES ('admin', '58302b997d1195b9633282fbfd81615c', 'HIrVeF');

INSERT INTO `db_dxsj`.`tab_website_info`(`domain`, `com_name`, `website_name`, `com_address`, `com_postcode`, `contact`, `com_keywords`, `com_description`, `com_service_aim`, `com_service_aim_desc`, `com_desire`, `beian_url`, `beian_no`, `website_home_bg`) VALUES ('dx-sj.com', '泰兴鼎鑫设计装饰有限公司', '鼎鑫设计装饰', '江苏省泰兴市济川路12号3楼', '225400', '0523-87781789', '鼎鑫,鼎鑫装潢,鼎鑫设计,鼎鑫装饰,泰兴鼎鑫,设计,装饰,家装,设计装饰公司,装潢,设计装潢,家装设计,写字楼设计', '泰兴鼎鑫设计装饰有限公司，是一家专业从事家装、工装设计、施工、后期软装配饰于一体的大型装饰企业， “建筑装修装饰工程专业承包二级施工资质”企业。 高标准、严要求、优化设计、精心施工、管理规范、后期服务及优良的企业形象是鼎鑫人的追求目标；坚持以现代、时尚、亲和的定位塑造品牌形象， 致力于为消费者提供高品质的设计、施工、产品和服务。本公司管理科学、工作严谨、质量上乘、客户满意度及转介绍率高，用心服务好客户， 高品质做好工程质量，是三泰及周边地区有最高影响力、市场占有率的精品装饰公司。', '品质设计 服务至上', '我们秉承“品质设计 服务至上”的理念，以“完美源于细节，口碑来自真诚”为宗旨，引领行业的持久创新发展。 创百年品牌，致力“成为最受尊敬的卓越的装饰品牌运营商”的企业愿景，成为推动鼎鑫设计装饰健康、快速发展的内在驱动力。 我们将为您提供最专业、最真诚的完美贴心服务。', '泰兴鼎鑫设计装饰有限公司，是一家专业从事家装、工装设计、施工、后期软装配饰于一体的大型装饰企业， “建筑装修装饰工程专业承包二级施工资质”企业。', 'http://www.miitbeian.gov.cn/', '苏ICP备16009335号-1', 'public/img/home-gallery-1.jpg');

