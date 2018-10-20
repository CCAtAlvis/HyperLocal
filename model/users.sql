CREATE TABLE `users` ( 
  `user_id` INT,
  `name` VARCHAR(100) NOT NULL,
  `address` TEXT,
  `about` VARCHAR(256),
  `links` TEXT,
  `per_latitude` double,
  `per_longitude` double,
  `created_on` DATETIME DEFAULT CURRENT_TIMESTAMP,
  UNIQUE  `_id` (`user_id`),

  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`)
    REFERENCES `login`(`user_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE = InnoDB;
