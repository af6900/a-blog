-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2013 at 10:55 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `a_admin_user`
--

CREATE TABLE IF NOT EXISTS `a_admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `LoginName` varchar(255) NOT NULL,
  `LoginPass` varchar(255) NOT NULL,
  `UserEmail` varchar(500) NOT NULL,
  `UserAvatar` varchar(500) NOT NULL,
  `UserMobile` varchar(50) NOT NULL,
  `validateCode` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `a_admin_user`
--

INSERT INTO `a_admin_user` (`id`, `name`, `LoginName`, `LoginPass`, `UserEmail`, `UserAvatar`, `UserMobile`, `validateCode`) VALUES
(1, 'sarbaz', 'afshin', '7fc23f21d2d22372429366ea322b0533f2988d2e', 'afshin.nj@gmail.com', '0f212798601ce699aaa6187fcd745ff8.png', '09144540742', 'ac6b95a245b9c50e6df21e97c3a97b92fd126500'),
(3, 'افشین1', 'afshinafshin1', '7fc23f21d2d22372429366ea322b0533f2988d2e', 'bayanteacher@yahoo.com', '', '09147468575', '');

-- --------------------------------------------------------

--
-- Table structure for table `a_article`
--

CREATE TABLE IF NOT EXISTS `a_article` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `a_article`
--

INSERT INTO `a_article` (`id`, `title`, `sectionId`, `keywords`, `summary`, `fulltext`, `author`, `date`, `archive`, `archiveDate`, `comment`, `visit`, `publish_up`, `publish_down`) VALUES
(2, 'درباره ما1111111', 8, 'درباره ما22222222', '<p>werwerبلیبلیبیبل<br></p>', '', 'sarbaz', 'پنجشنبه ۱۴ شهریور ۱۳۹۲', 0, '', 1, 62, 13061392, 99999999),
(3, 'درباره ما8', 8, 'آلوده,رستاک', '<p>lhjlhkj<br></p>', '', 'sarbaz', 'چهارشنبه ۱۳ شهریور ۱۳۹۲', 0, '', 1, 6, 14061392, 99999999),
(4, 'تست شماره 2', 10, 'تست', '<p>سیبسیبسیب<br></p>', '', 'sarbaz', 'پنجشنبه ۱۴ شهریور ۱۳۹۲', 0, '', 1, 19, 14061392, 15061392),
(5, 'تست شماره 59', 8, 'تست شماره 9', '<p>تست<br></p>', '', 'sarbaz', 'پنجشنبه ۱۴ شهریور ۱۳۹۲', 0, '', 1, 32, 15061392, 16061392);

-- --------------------------------------------------------

--
-- Table structure for table `a_article_section`
--

CREATE TABLE IF NOT EXISTS `a_article_section` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `visit` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `a_article_section`
--

INSERT INTO `a_article_section` (`id`, `title`, `visit`) VALUES
(8, 'کامپیوتر', 14),
(10, 'تبلت1', 23);

-- --------------------------------------------------------

--
-- Table structure for table `a_block`
--

CREATE TABLE IF NOT EXISTS `a_block` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `box` int(1) NOT NULL,
  `position` varchar(100) NOT NULL,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `row` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `a_block`
--

INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES
(1, 'بخش ها', 1, 'left', 1, 0),
(2, 'آخرین مطالب', 2, 'left', 1, 1),
(3, 'صلوات شمار', 3, 'left', 1, 7),
(5, 'دوستان', 4, 'left', 1, 6),
(6, 'عضویت در خبرنامه', 5, 'left', 1, 9),
(9, 'تگ بازار', 6, 'left', 1, 10),
(10, 'آرشیو', 8, 'left', 1, 2),
(12, 'آمار', 10, 'left', 1, 8),
(13, 'بهترین نوشته ها', 11, 'left', 1, 3),
(14, 'نویسندگان', 13, 'left', 1, 4),
(17, 'منوی بالا', 9, 'top', 1, 1),
(18, 'لیست اخبار', 14, 'left', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `a_boxes`
--

CREATE TABLE IF NOT EXISTS `a_boxes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `active` int(1) NOT NULL,
  `row` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `a_boxes`
--

INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES
(1, 'box_section_list', 'لیست بخش ها', 'left', 1, 1),
(2, 'box_last_article', 'آخرین مطالب ثبت شده', 'left', 1, 2),
(3, 'box_salavat', 'صلوات شمار', 'left', 1, 6),
(4, 'box_friends_list', 'لیست دوستان', 'left', 1, 5),
(5, 'box_news_letter', 'خبرنامه', 'left', 1, 10),
(6, 'box_tag', 'تگ', 'left', 1, 9),
(8, 'box_list_archive', 'آرشیو مطالب', 'left', 1, 7),
(9, 'box_menu', 'منو', 'right', 1, 1),
(10, 'box_visit', 'آمار بازدید', 'left', 1, 8),
(11, 'box_top_article', 'بهترین نوشته ها', 'left', 1, 3),
(13, 'box_author', 'لیست نویسندگان', 'left', 1, 4),
(14, 'box_news', 'اخبار', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `a_captcha`
--

CREATE TABLE IF NOT EXISTS `a_captcha` (
  `time` int(10) unsigned NOT NULL,
  `captcha` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a_captcha`
--

INSERT INTO `a_captcha` (`time`, `captcha`) VALUES
(1381262578, '171753'),
(1381262635, '531310'),
(1378498498, '137922'),
(1378498516, '130589'),
(1378498636, '495029'),
(1378498638, '201662'),
(1378498685, '740728'),
(1378498751, '150684'),
(1378498780, '488325'),
(1378498800, '293583');

-- --------------------------------------------------------

--
-- Table structure for table `a_comment`
--

CREATE TABLE IF NOT EXISTS `a_comment` (
  `id_comment` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_article` varchar(255) NOT NULL,
  `contact_date` varchar(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `a_comment`
--

INSERT INTO `a_comment` (`id_comment`, `id_article`, `contact_date`, `user_name`, `user_email`, `comment`, `answer`, `active`) VALUES
(27, '6', 'سه شنبه ۲۲ اسفند ۱۳۹۱', 'afshin', 'afshin.nj@gmail.com', 'gggggggg', '', 0),
(28, '3', 'سه شنبه ۲۲ اسفند ۱۳۹۱', 'afshin', 'afshin.nj@gmail.com', 'wwwwwwwwwww', '', 0),
(29, '4', 'دوشنبه ۲۸ اسفند ۱۳۹۱', 'afshin1', 'afshin.nj@gmail.com', 'zzz', '<p>ertert<br></p>', 0),
(30, '5', 'سه شنبه ۱۶ مهر ۱۳۹۲', 'afshin', 'a@a.com', 'jsj', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `a_communique`
--

CREATE TABLE IF NOT EXISTS `a_communique` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(500) NOT NULL,
  `startPublic` varchar(50) NOT NULL,
  `endPublic` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `a_communique`
--

INSERT INTO `a_communique` (`id`, `text`, `startPublic`, `endPublic`) VALUES
(7, 'شسیشسی', '10/06/1392', '20/06/1392');

-- --------------------------------------------------------

--
-- Table structure for table `a_configuration`
--

CREATE TABLE IF NOT EXISTS `a_configuration` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `kay` varchar(100) NOT NULL,
  `value` varchar(1024) NOT NULL,
  `description` varchar(255) NOT NULL,
  `box_name` varchar(100) NOT NULL,
  `use_input` varchar(100) DEFAULT NULL,
  `set_input_value` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `a_configuration`
--

INSERT INTO `a_configuration` (`id`, `title`, `kay`, `value`, `description`, `box_name`, `use_input`, `set_input_value`) VALUES
(1, 'لیست دوستان', 'COUNT_FRIEND_LIST', '5', 'تعداد دوستان قابل نمایش', 'box_friends_list', 'text_value()', ''),
(2, 'خبرنامه', 'FEED_BURNER_URL', 'http://feedburner.google.com/fb/a/mailverify?uri=a-blog/Rss', 'آدرس feedburner', 'box_news_letter', 'text_value()', ''),
(3, 'خبرنامه', 'FEDD_BURNER_DESCRIPTION', 'خبرنامه سایت عضو شوید', 'توضیحات برای خبر نامه', 'box_news_letter', 'textarea_value()', ''),
(4, 'صلوات شمار', 'COUNT_SALAVAT', '198', 'تعداد صلوات ها', 'box_salavat', 'text_value()', ''),
(5, 'آخرین مطالب ثبت شده', 'COUNT_LAST_ARTICLE', '10', 'تعداد مطالب قابل نمایش', 'box_last_article', 'text_value()', ''),
(6, 'لیست بخش ها', 'ARTICLE_LIST', '6', 'تعداد بخش های قابل نمایش', 'box_section_list', 'text_value()', ''),
(7, 'لیست نویسندگان', 'COUNT_AUTHOR', '10', 'تعداد نویسندگان ', 'box_author', 'text_value()', '10'),
(8, 'سخن روز', 'STATUS_TEXT', 'سایت در دست ساخت است بزودی بر میگردیم', 'متن سخن روز', 'box_status', 'text_value()', 'سخن روز'),
(12, 'لیست اخبار', 'COUNT_LIST_NEWS', '10', 'تعداد اخبار قابل نمایش', 'BOX_LIST_NEWS', 'text_value()', '10');

-- --------------------------------------------------------

--
-- Table structure for table `a_email_template`
--

CREATE TABLE IF NOT EXISTS `a_email_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `template` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `a_email_template`
--

INSERT INTO `a_email_template` (`id`, `title`, `template`) VALUES
(1, 'فراموشی رمز عبور', '<div style="width:400px; height:200px; margin:auto; border:1px dashed #CCC; position:relative; background:#EEE;">\r\n  <h3 style="margin:0; padding:10px 10px 10px 0; border-bottom:1px dashed #CCC; text-align:right;">%title%</h3>\r\n  <p style="text-align:right; direction:rtl; padding:10px;">کلمه عبور جدید شما\r\n   : %pass%\r\n   \r\n   </p>\r\n  \r\n  <div style="position:absolute;bottom:0; border-top:1px dashed #CCC; width:385px; direction:rtl; padding:5px 10px 5px 5px;">\r\n  \r\n%webName% \r\n \r\n  </div>\r\n</div>\r\n<div style="direction:rtl; text-align:center">قدرت گرفته با سیستم مدیریت محتوای a cms</div>'),
(2, 'نظرات کاربران', '<div style="width:400px; height:200px; margin:auto; border:1px dashed #CCC; position:relative; background:#EEE;">\r\n  <h3 style="margin:0; padding:10px 10px 10px 0; border-bottom:1px dashed #CCC; text-align:right;">%title%</h3>\r\n  <p style="text-align:right; direction:rtl; padding:10px;">\r\n    %message%\r\n   \r\n   </p>\r\n  \r\n  <div style="position:absolute;bottom:0; border-top:1px dashed #CCC; width:385px; direction:rtl; padding:5px 10px 5px 5px;">\r\n  \r\n%webName% \r\n \r\n  </div>\r\n</div>\r\n<div style="direction:rtl; text-align:center">قدرت گرفته با سیستم مدیریت محتوای a cms</div>'),
(3, 'جواب مدیر', '<div style="width:400px; height:200px; margin:auto; border:1px dashed #CCC; position:relative; background:#EEE;">\n  <h3 style="margin:0; padding:10px 10px 10px 0; border-bottom:1px dashed #CCC; text-align:right;">%title%</h3>\n  <p style="text-align:right; direction:rtl; padding:10px;">\n   %message%\n   \n   </p>\n  \n  <div style="position:absolute;bottom:0; border-top:1px dashed #CCC; width:385px; direction:rtl; padding:5px 10px 5px 5px;">\n  \n%webName% \n \n  </div>\n</div>\n<div style="direction:rtl; text-align:center">قدرت گرفته با سیستم مدیریت محتوای a cms</div>'),
(4, 'تماس با ما', ''),
(5, 'ارسال به دوستان', '<style>\r\n body{\r\n	  font-family:Tahoma, Geneva, sans-serif;\r\n	  font-size:14px;\r\n	  background:#EEE;\r\n	  }\r\n\r\n</style>\r\n<table width=''600'' border=''0'' align=''center'' dir=''rtl'' style="background:#FFF; border:1px solid #CCC;" >\r\n    <tr>\r\n      <td colspan=''2'' align=''center''><a href="%base_url%" style="text-decoration:none;">%webName%</a></td>\r\n    </tr>\r\n    <tr>\r\n      <td style="border:1px solid #CCC; border-radius:5px; padding:5px; font-family:Tahoma, Geneva, sans-serif; font-size:12px;width:280px;">فرستنده : %YourName%</td>\r\n      <td style="border:1px solid #CCC; border-radius:5px; padding:5px; font-family:Tahoma, Geneva, sans-serif; font-size:12px;width:280px;">نویسنده :  %author%</td>\r\n    </tr>\r\n    <tr>\r\n      <td style="border:1px solid #CCC; border-radius:5px; padding:5px; font-family:Tahoma, Geneva, sans-serif; font-size:12px;width:280px;" colspan=''2'' >عنوان : %title%</td>\r\n    </tr>\r\n    <tr>\r\n      <td colspan=''2'' style=" border:1px solid #CCC; border-radius:5px; padding:5px;">%message%</td>\r\n    </tr>\r\n    <tr>\r\n      <td colspan=''2''></td>\r\n</tr>\r\n</table>'),
(6, 'کد امنیتی', '<div style="width:400px; height:200px; margin:auto; border:1px dashed #CCC; position:relative; background:#EEE;">\r\n  <h3 style="margin:0; padding:10px 10px 10px 0; border-bottom:1px dashed #CCC; text-align:right;">%title%</h3>\r\n  <p style="text-align:right; direction:rtl; padding:10px;">کد امنیتی\r\n   : %pass%\r\n   \r\n   </p>\r\n  \r\n  <div style="position:absolute;bottom:0; border-top:1px dashed #CCC; width:385px; direction:rtl; padding:5px 10px 5px 5px;">\r\n  \r\n%webName% \r\n \r\n  </div>\r\n</div>\r\n<div style="direction:rtl; text-align:center">قدرت گرفته با سیستم مدیریت محتوای a cms</div>');

-- --------------------------------------------------------

--
-- Table structure for table `a_friends`
--

CREATE TABLE IF NOT EXISTS `a_friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `a_friends`
--

INSERT INTO `a_friends` (`id`, `name`, `link`) VALUES
(3, 'google', 'http://www.google.com'),
(4, 'yahoo', 'http://www.yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `a_ip_banned`
--

CREATE TABLE IF NOT EXISTS `a_ip_banned` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `quant` int(2) NOT NULL,
  `timestamp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `a_ip_banned`
--

INSERT INTO `a_ip_banned` (`id`, `ip`, `quant`, `timestamp`) VALUES
(4, '::1', 2, '1374950854');

-- --------------------------------------------------------

--
-- Table structure for table `a_menu`
--

CREATE TABLE IF NOT EXISTS `a_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  `block` int(1) unsigned NOT NULL DEFAULT '0',
  `parent` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `a_menu`
--

INSERT INTO `a_menu` (`id`, `name`, `link`, `block`, `parent`) VALUES
(1, 'صفحه اصلی', 'index', 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `a_news`
--

CREATE TABLE IF NOT EXISTS `a_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `date` varchar(100) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publish_up` varchar(15) NOT NULL,
  `publish_down` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `a_news`
--

INSERT INTO `a_news` (`id`, `title`, `keywords`, `description`, `date`, `author`, `publish_up`, `publish_down`) VALUES
(1, 'تست1', 'تست کلمات کلیدی', '<p>تست متن اخبار <br></p><p>اخبار باید خوب و قشنگ باشد باور نداری بیا بپورس1<br></p>\r\n', 'سه شنبه ۵ شهریور ۱۳۹۲', 'افشین', '05/06/1392', '31/06/1392');

-- --------------------------------------------------------

--
-- Table structure for table `a_notes`
--

CREATE TABLE IF NOT EXISTS `a_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `a_notes`
--

INSERT INTO `a_notes` (`id`, `text`) VALUES
(1, ' رفع مشکل کش و آمار\nتبلیغات در سایت\nصفحه بندی اطلاعیه\nتکمیل کردن قسمت ایحاد صفحه هات\nعضویت در سایت\nماژول ورود به سایت\n');

-- --------------------------------------------------------

--
-- Table structure for table `a_pages`
--

CREATE TABLE IF NOT EXISTS `a_pages` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `a_polls`
--

CREATE TABLE IF NOT EXISTS `a_polls` (
  `id_polls` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `polls_title` varchar(255) NOT NULL,
  `active` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_polls`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `a_polls`
--

INSERT INTO `a_polls` (`id_polls`, `polls_title`, `active`) VALUES
(2, 'تست', 1);

-- --------------------------------------------------------

--
-- Table structure for table `a_polls_answer`
--

CREATE TABLE IF NOT EXISTS `a_polls_answer` (
  `id_answer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_poll` int(10) unsigned NOT NULL,
  `answer_title` varchar(200) NOT NULL,
  PRIMARY KEY (`id_answer`),
  KEY `id_poll` (`id_poll`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `a_polls_answer`
--

INSERT INTO `a_polls_answer` (`id_answer`, `id_poll`, `answer_title`) VALUES
(3, 2, 'سوال1'),
(4, 4, 'سوال 2');

-- --------------------------------------------------------

--
-- Table structure for table `a_polls_votes`
--

CREATE TABLE IF NOT EXISTS `a_polls_votes` (
  `id_votes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_answer` int(10) unsigned NOT NULL,
  `user_votes` int(11) NOT NULL,
  `user_ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id_votes`),
  KEY `id_answer` (`id_answer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `a_sessions`
--

CREATE TABLE IF NOT EXISTS `a_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a_sessions`
--

INSERT INTO `a_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('63b43d811bc02522d41e75370c950acc', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:23.0) Gecko/20100101 Firefox/23.0', 1378500598, 'a:4:{s:9:"user_data";s:0:"";s:6:"avatar";s:36:"0f212798601ce699aaa6187fcd745ff8.png";s:4:"name";s:6:"sarbaz";s:12:"is_logged_in";i:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `a_status`
--

CREATE TABLE IF NOT EXISTS `a_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(500) NOT NULL,
  `startPublic` varchar(100) NOT NULL,
  `endPublic` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `a_status`
--

INSERT INTO `a_status` (`id`, `text`, `startPublic`, `endPublic`, `date`) VALUES
(1, 'سخن روز', '01/06/1392', '13/06/1392', '13920610');

-- --------------------------------------------------------

--
-- Table structure for table `a_templates`
--

CREATE TABLE IF NOT EXISTS `a_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `a_templates`
--

INSERT INTO `a_templates` (`id`, `name`, `active`) VALUES
(1, 'ablog', '1'),
(2, 'newBlog', '0');

-- --------------------------------------------------------

--
-- Table structure for table `a_user`
--

CREATE TABLE IF NOT EXISTS `a_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fristName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `avatar` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `a_user`
--

INSERT INTO `a_user` (`id`, `fristName`, `lastName`, `email`, `password`, `avatar`) VALUES
(1, 'افشین', 'نژادشیخ', 'afshin@a-vitrin.ir', '4a2fb307b07978fc415381fd3d6cbb1a1a7b7ef9', '0f212798601ce699aaa6187fcd745ff8.png1');

-- --------------------------------------------------------

--
-- Table structure for table `a_useronline`
--

CREATE TABLE IF NOT EXISTS `a_useronline` (
  `ip` varchar(50) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a_useronline`
--

INSERT INTO `a_useronline` (`ip`, `time`) VALUES
('::1', 20130906);

-- --------------------------------------------------------

--
-- Table structure for table `a_visit`
--

CREATE TABLE IF NOT EXISTS `a_visit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dey` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `a_web_config`
--

CREATE TABLE IF NOT EXISTS `a_web_config` (
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `a_web_config`
--

INSERT INTO `a_web_config` (`id`, `Web_Title`, `Admin_Email`, `Keywords`, `Description`, `WebOff`, `OffDescription`, `login`, `email`, `sms`, `cache`) VALUES
(1, 'نوشته های یک مبتدی', 'a@a.com', 'کلمات,کلیدی', 'تست', 1, '                           سایت به منظور به روزرسانی تا اطلاع ثانوی غیرفعال می باشد، لطفا بعدا مراجعه فرمایید.\r\nمدیر سایت                           ', 0, 0, 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `a_polls_answer`
--
ALTER TABLE `a_polls_answer`
  ADD CONSTRAINT `a_polls_answer_ibfk_1` FOREIGN KEY (`id_poll`) REFERENCES `a_polls` (`id_polls`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `a_polls_votes`
--
ALTER TABLE `a_polls_votes`
  ADD CONSTRAINT `a_polls_votes_ibfk_1` FOREIGN KEY (`id_answer`) REFERENCES `a_polls_answer` (`id_answer`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
