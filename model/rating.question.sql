CREATE TABLE `rating.question` (
  `rating_id` INT NOT NULL AUTO_INCREMENT,
  `rating` INT,
  `question_id` INT,
  `creator_id` INT,
  `created_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rating_id`),
  INDEX `index_rating_question_question_id` (`question_id`),
  INDEX `index_rating_question_creator_id` (`creator_id`),

  CONSTRAINT `fk_rating_question_question_id` FOREIGN KEY (`question_id`)
    REFERENCES `questions`(`question_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,

  CONSTRAINT `fk_rating_questions_creator_id` FOREIGN KEY (`creator_id`)
    REFERENCES `login`(`user_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;

DELIMITER $$
CREATE OR REPLACE TRIGGER `insert_default_rating`
AFTER INSERT ON `questions`
FOR EACH ROW BEGIN
  INSERT INTO `rating.question` (rating, question_id, creator_id) VALUES(0, NEW.question_id, NEW.user_id);
END$$
DELIMITER ;