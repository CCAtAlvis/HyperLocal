CREATE TABLE `report.user` (
  `report_id` INT NOT NULL AUTO_INCREMENT,
  `report` TEXT,
  `user_id` INT,
  `creator_id` INT,
  `created_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`report_id`),
  INDEX `index_report_user_user_id` (`user_id`),
  INDEX `index_report_user_creator_id` (`creator_id`),

  CONSTRAINT `fk_report_user_user_id` FOREIGN KEY (`user_id`)
    REFERENCES `login`(`user_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,

  CONSTRAINT `fk_report_user_creator_id` FOREIGN KEY (`creator_id`)
    REFERENCES `login`(`user_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;
