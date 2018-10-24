CREATE TABLE `report.question` (
  `report_id` INT NOT NULL AUTO_INCREMENT,
  `report` TEXT,
  `question_id` INT,
  `creator_id` INT,
  `created_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`report_id`),
  INDEX `index_report_question_question_id` (`question_id`),
  INDEX `index_report_question_creator_id` (`creator_id`),

  CONSTRAINT `fk_report_question_question_id` FOREIGN KEY (`question_id`)
    REFERENCES `questions`(`question_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,

  CONSTRAINT `fk_report_questions_creator_id` FOREIGN KEY (`creator_id`)
    REFERENCES `login`(`user_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;