CREATE TABLE `comments` (
  `comment_id` INT NOT NULL AUTO_INCREMENT,
  `comment` TEXT NOT NULL,
  `user_id` INT,
  `question_id` INT,
  `created_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report_status` BOOLEAN NOT NULL DEFAULT false,
  PRIMARY KEY (`comment_id`),
  INDEX `index_comments_user_id` (`user_id`),
  INDEX `index_comments_question_id` (`question_id`),

  CONSTRAINT `fk_comment_user_id` FOREIGN KEY (`user_id`)
    REFERENCES `login`(`user_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,

  CONSTRAINT `fk_comment_question_id` FOREIGN KEY (`question_id`)
    REFERENCES `questions`(`question_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;
