-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `chat` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `chat`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(31) NOT NULL,
  `password` varchar(31) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1,	'новий1aa',	'новий1aa'),
(3,	'theme_1',	'd       d'),
(4,	'nananaa',	'nananaa'),
(5,	'dsjsdfkjhfskf',	'ytytytyt yt ty yt'),
(6,	'theme_1  d',	'theme_1sssss'),
(7,	'куккіііі',	'кукііііі'),
(8,	'new_cookie',	'new_cookie'),
(9,	'theme_1asdasd',	'theme_1sssa'),
(10,	'asldkasdlka/dl',	'theme_1asdm'),
(12,	'34567890-=-09876',	'theme_14567890-'),
(13,	'cookie_test_1',	'cookie_test_1'),
(14,	'user_test',	'user_test'),
(15,	'user_test_2',	'user_test_2');

-- 2016-10-05 04:28:12
