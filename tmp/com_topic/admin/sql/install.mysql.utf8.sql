DROP TABLE IF EXISTS `#__topic`;

CREATE TABLE `#__topic` (
  `id`       INT(11)     NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(25) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)
  ENGINE =MyISAM
  AUTO_INCREMENT =0
  DEFAULT CHARSET =utf8;

