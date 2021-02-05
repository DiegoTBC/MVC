CREATE SCHEMA IF NOT EXISTS `testando` DEFAULT CHARACTER SET utf8 ;
USE `testando` ;

CREATE TABLE IF NOT EXISTS `testando`.`users` (
                                                  `id` INT NOT NULL AUTO_INCREMENT,
                                                  `name` VARCHAR(45) NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL,
    PRIMARY KEY (`id`))
    ENGINE = InnoDB;