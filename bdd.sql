-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `card`;
CREATE TABLE `card` (
  `id` tinyint(24) unsigned NOT NULL AUTO_INCREMENT,
  `civility` varchar(24) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `city` varchar(128) NOT NULL,
  `country` varchar(128) NOT NULL,
  `birthdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `phone` varchar(128) NOT NULL,
  `fax` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `url` varchar(240) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `card` (`id`, `civility`, `lastname`, `firstname`, `address`, `zipcode`, `city`, `country`, `birthdate`, `phone`, `fax`, `email`, `url`) VALUES
(1,	'Mme',	'Nom1',	'Prénom1',	'Adress1',	11111,	'Ville1',	'Pays1',	'2023-02-21 00:00:00',	'0235265241',	'0235265241',	'email1@email.com',	'https://url1.com'),
(2,	'Mr',	'Nom2',	'Prénom2',	'Adress2',	22222,	'Ville2',	'Pays2',	'2023-02-22 00:00:00',	'0225364512',	'0225364512',	'email2@email.com',	'https://url2.com'),
(3,	'Autre',	'Nom3',	'Prénom3',	'Adress3',	33333,	'Ville3',	'Pays3',	'2023-02-13 00:00:00',	'0225364512',	'0225364512',	'email3@email.com',	'https://url3.com'),
(4,	'Mme',	'Nom4',	'Prénom4',	'Adress4',	44444,	'Ville4',	'Pays4',	'2023-02-03 00:00:00',	'0451234567',	'0451234567',	'email4@email.com',	'https://url4.com'),
(5,	'Mme',	'Nom5',	'Prénom5',	'Adress5',	55555,	'Ville5',	'Pays5',	'2023-02-01 00:00:00',	'04561234589',	'04561234589',	'email5@email.com',	'https://url5.com'),
(6,	'Autre',	'Nom6',	'Prénom6',	'Adress6',	66666,	'Ville6',	'Pays6',	'2023-02-05 00:00:00',	'0331234562',	'0331234562',	'email6@email.com',	'https://url6.com'),
(7,	'Mr',	'Nom7',	'Prénom7',	'Adress7',	77777,	'Ville7',	'Pays7',	'2023-02-07 00:00:00',	'0231234556',	'0231234556',	'email7@email.com',	'https://url7.com');

-- 2023-02-21 16:21:37