# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.1.47-log)
# Database: formbuilder
# Generation Time: 2015-07-27 00:08:09 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table field
# ------------------------------------------------------------

DROP TABLE IF EXISTS `field`;

CREATE TABLE `field` (
  `field_id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `element` varchar(16) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `prototype_name` varchar(32) NOT NULL DEFAULT '',
  `html` text NOT NULL,
  `regex` varchar(128) DEFAULT NULL,
  `min` int(3) DEFAULT NULL,
  `max` int(3) DEFAULT NULL,
  PRIMARY KEY (`field_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table form
# ------------------------------------------------------------

DROP TABLE IF EXISTS `form`;

CREATE TABLE `form` (
  `form_id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` mediumint(3) NOT NULL DEFAULT '0',
  `form_url_key` varchar(64) NOT NULL DEFAULT '',
  `name` varchar(64) NOT NULL DEFAULT '',
  `attributes` text,
  PRIMARY KEY (`form_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table form_field
# ------------------------------------------------------------

DROP TABLE IF EXISTS `form_field`;

CREATE TABLE `form_field` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `field_id` smallint(3) NOT NULL DEFAULT '0',
  `form_id` smallint(3) unsigned NOT NULL,
  `fieldset_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `position` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `label` varchar(128) NOT NULL DEFAULT '',
  `name` varchar(32) NOT NULL DEFAULT '',
  `value` text,
  `required` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `min` int(4) DEFAULT NULL,
  `max` int(4) DEFAULT NULL,
  `style` text,
  `tip` varchar(256) DEFAULT '',
  `data_definition` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `field_id` (`field_id`),
  KEY `form_id` (`form_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table form_fieldset
# ------------------------------------------------------------

DROP TABLE IF EXISTS `form_fieldset`;

CREATE TABLE `form_fieldset` (
  `fieldset_id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `form_id` tinyint(3) NOT NULL DEFAULT '0',
  `legend` varchar(62) DEFAULT NULL,
  `position` tinyint(3) unsigned NOT NULL,
  `required` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `class` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`fieldset_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
