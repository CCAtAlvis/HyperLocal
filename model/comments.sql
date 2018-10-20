CREATE TABLE `comments` (
  `comment_id` INT NOT NULL AUTO_INCREMENT,
  `comment` TEXT NOT NULL,
  `user_id` INT,
  `question_id` INT,
  `created_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report_status` BOOLEAN NOT NULL DEFAULT false,
  PRIMARY KEY (`id`),

  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`)
    REFERENCES `login`(`user_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE

  CONSTRAINT `fk_question_id` FOREIGN KEY (`question_id`)
    REFERENCES `questions`(`question_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;
