CREATE TABLE `hyperlocal`.`questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `report_status` boolean DEFAULT false,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;
