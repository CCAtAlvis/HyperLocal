CREATE TABLE `rating.comment` (
  `rating_id` INT NOT NULL AUTO_INCREMENT,
  `rating` INT,
  `comment_id` INT,
  `creator_id` INT,
  `created_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rating_id`),
  INDEX `index_rating_comment_comment_id` (`comment_id`),
  INDEX `index_rating_comment_creator_id` (`creator_id`),

  CONSTRAINT `fk_rating_comment_comment_id` FOREIGN KEY (`comment_id`)
    REFERENCES `comments`(`comment_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,

  CONSTRAINT `fk_rating_comment_creator_id` FOREIGN KEY (`creator_id`)
    REFERENCES `login`(`user_id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;
