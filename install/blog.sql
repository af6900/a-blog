
DROP TABLE IF EXISTS `a_admin_user`;

CREATE TABLE `a_admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `LoginName` varchar(255) NOT NULL,
  `LoginPass` varchar(255) NOT NULL,
  `UserEmail` varchar(500) NOT NULL,
  `UserAvatar` varchar(500) NOT NULL,
  `UserMobile` varchar(50) NOT NULL,
  `validateCode` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



#
# TABLE STRUCTURE FOR: a_article
#

DROP TABLE IF EXISTS `a_article`;

CREATE TABLE `a_article` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sectionId` bigint(20) unsigned NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `fulltext` longtext NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL,
  `archive` int(1) unsigned NOT NULL,
  `archiveDate` varchar(30) NOT NULL,
  `comment` int(1) unsigned NOT NULL DEFAULT '1',
  `visit` int(11) unsigned NOT NULL,
  `publish_up` int(11) NOT NULL,
  `publish_down` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;




#
# TABLE STRUCTURE FOR: a_article_section
#

DROP TABLE IF EXISTS `a_article_section`;

CREATE TABLE `a_article_section` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `visit` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


#
# TABLE STRUCTURE FOR: a_block
#

DROP TABLE IF EXISTS `a_block`;

CREATE TABLE `a_block` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `box` int(1) NOT NULL,
  `position` varchar(100) NOT NULL,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `row` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;


#
# TABLE STRUCTURE FOR: a_boxes
#

DROP TABLE IF EXISTS `a_boxes`;

CREATE TABLE `a_boxes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `active` int(1) NOT NULL,
  `row` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;


#
# TABLE STRUCTURE FOR: a_captcha
#

DROP TABLE IF EXISTS `a_captcha`;

CREATE TABLE `a_captcha` (
  `time` int(10) unsigned NOT NULL,
  `captcha` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# TABLE STRUCTURE FOR: a_comment
#

DROP TABLE IF EXISTS `a_comment`;

CREATE TABLE `a_comment` (
  `id_comment` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_article` varchar(255) NOT NULL,
  `contact_date` varchar(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;



#
# TABLE STRUCTURE FOR: a_communique
#

DROP TABLE IF EXISTS `a_communique`;

CREATE TABLE `a_communique` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(500) NOT NULL,
  `startPublic` varchar(50) NOT NULL,
  `endPublic` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;


#
# TABLE STRUCTURE FOR: a_configuration
#

DROP TABLE IF EXISTS `a_configuration`;

CREATE TABLE `a_configuration` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `kay` varchar(100) NOT NULL,
  `value` varchar(1024) NOT NULL,
  `description` varchar(255) NOT NULL,
  `box_name` varchar(100) NOT NULL,
  `use_input` varchar(100) DEFAULT NULL,
  `set_input_value` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;




#
# TABLE STRUCTURE FOR: a_email_template
#

DROP TABLE IF EXISTS `a_email_template`;

CREATE TABLE `a_email_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `template` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: a_friends
#

DROP TABLE IF EXISTS `a_friends`;

CREATE TABLE `a_friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;




#
# TABLE STRUCTURE FOR: a_ip_banned
#

DROP TABLE IF EXISTS `a_ip_banned`;

CREATE TABLE `a_ip_banned` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `quant` int(2) NOT NULL,
  `timestamp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;




#
# TABLE STRUCTURE FOR: a_menu
#

DROP TABLE IF EXISTS `a_menu`;

CREATE TABLE `a_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  `block` int(1) unsigned NOT NULL DEFAULT '0',
  `parent` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;




#
# TABLE STRUCTURE FOR: a_news
#

DROP TABLE IF EXISTS `a_news`;

CREATE TABLE `a_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `date` varchar(100) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publish_up` varchar(15) NOT NULL,
  `publish_down` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: a_notes
#

DROP TABLE IF EXISTS `a_notes`;

CREATE TABLE `a_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


#
# TABLE STRUCTURE FOR: a_pages
#

DROP TABLE IF EXISTS `a_pages`;

CREATE TABLE `a_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enTitle` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `discription` varchar(200) NOT NULL,
  `option` int(11) NOT NULL,
  `visit` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `qr` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: a_polls
#

DROP TABLE IF EXISTS `a_polls`;

CREATE TABLE `a_polls` (
  `id_polls` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `polls_title` varchar(255) NOT NULL,
  `active` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_polls`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




#
# TABLE STRUCTURE FOR: a_polls_answer
#

DROP TABLE IF EXISTS `a_polls_answer`;

CREATE TABLE `a_polls_answer` (
  `id_answer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_poll` int(10) unsigned NOT NULL,
  `answer_title` varchar(200) NOT NULL,
  PRIMARY KEY (`id_answer`),
  KEY `id_poll` (`id_poll`),
  KEY `id_poll_2` (`id_poll`),
  CONSTRAINT `a_polls_answer_ibfk_1` FOREIGN KEY (`id_poll`) REFERENCES `a_polls` (`id_polls`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


#
# TABLE STRUCTURE FOR: a_polls_votes
#

DROP TABLE IF EXISTS `a_polls_votes`;

CREATE TABLE `a_polls_votes` (
  `id_votes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_answer` int(10) unsigned NOT NULL,
  `user_votes` int(11) NOT NULL,
  `user_ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id_votes`),
  KEY `id_answer` (`id_answer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: a_sessions
#

DROP TABLE IF EXISTS `a_sessions`;

CREATE TABLE `a_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# TABLE STRUCTURE FOR: a_status
#

DROP TABLE IF EXISTS `a_status`;

CREATE TABLE `a_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(500) NOT NULL,
  `startPublic` varchar(100) NOT NULL,
  `endPublic` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


#
# TABLE STRUCTURE FOR: a_templates
#

DROP TABLE IF EXISTS `a_templates`;

CREATE TABLE `a_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


#
# TABLE STRUCTURE FOR: a_user
#

DROP TABLE IF EXISTS `a_user`;

CREATE TABLE `a_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fristName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `avatar` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


#
# TABLE STRUCTURE FOR: a_useronline
#

DROP TABLE IF EXISTS `a_useronline`;

CREATE TABLE `a_useronline` (
  `ip` varchar(50) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: a_visit
#

DROP TABLE IF EXISTS `a_visit`;

CREATE TABLE `a_visit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dey` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: a_web_config
#

DROP TABLE IF EXISTS `a_web_config`;

CREATE TABLE `a_web_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Web_Title` varchar(255) NOT NULL,
  `Admin_Email` varchar(255) NOT NULL,
  `Keywords` text NOT NULL,
  `Description` text NOT NULL,
  `WebOff` int(1) NOT NULL,
  `OffDescription` text NOT NULL,
  `login` int(11) NOT NULL DEFAULT '0',
  `email` int(11) NOT NULL DEFAULT '0',
  `sms` int(11) NOT NULL DEFAULT '0',
  `cache` int(11) NOT NULL DEFAULT '1',
  `clear_cache` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;




