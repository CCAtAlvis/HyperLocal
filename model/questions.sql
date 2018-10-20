CREATE TABLE `questions` (
  `question_id` INT NOT NULL AUTO_INCREMENT,
  `question` TEXT NOT NULL,
  `user_id` INT,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report_status` BOOLEAN NOT NULL DEFAULT false,
  PRIMARY KEY (`id`),

  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`)
    REFERENCES `login`(`user_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;
