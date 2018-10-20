CREATE TABLE `hyperlocal`.`login` ( 
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` CHAR(60) NOT NULL,
  `confcode` CHAR(32) NOT NULL,
  `created_on` DATETIME NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE  `username` (`username`),
  UNIQUE  `email` (`email`)
) ENGINE = InnoDB;
