INSERT INTO `a_article` (`id`, `title`, `sectionId`, `keywords`, `summary`, `fulltext`, `author`, `date`, `archive`, `archiveDate`, `comment`, `visit`, `publish_up`, `publish_down`) VALUES (1, 'کلمات کلیدی', 1, 'تست عنوان', '<p>سلام رفیق<br></p>', '', 'مدیر', 'پنجشنبه ۱۴ شهریور ۱۳۹۲', 0, '', 1, 62, 13061392, 99999999);

INSERT INTO `a_article_section` (`id`, `title`, `visit`) VALUES (1, 'بخش خبری', 14);



INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES (1, 'بخش ها', 1, 'left', 1, 0);
INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES (2, 'آخرین مطالب', 2, 'left', 1, 1);
INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES (3, 'صلوات شمار', 3, 'left', 1, 7);
INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES (5, 'دوستان', 4, 'left', 1, 6);
INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES (6, 'عضویت در خبرنامه', 5, 'left', 1, 9);
INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES (9, 'تگ بازار', 6, 'left', 1, 10);
INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES (10, 'آرشیو', 8, 'left', 1, 2);
INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES (12, 'آمار', 10, 'left', 1, 8);
INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES (13, 'بهترین نوشته ها', 11, 'left', 1, 3);
INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES (14, 'نویسندگان', 13, 'left', 1, 4);
INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES (17, 'منوی بالا', 9, 'top', 1, 1);
INSERT INTO `a_block` (`id`, `name`, `box`, `position`, `active`, `row`) VALUES (18, 'لیست اخبار', 14, 'left', 1, 5);


INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES (1, 'box_section_list', 'لیست بخش ها', 'left', 1, 1);
INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES (2, 'box_last_article', 'آخرین مطالب ثبت شده', 'left', 1, 2);
INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES (3, 'box_salavat', 'صلوات شمار', 'left', 1, 6);
INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES (4, 'box_friends_list', 'لیست دوستان', 'left', 1, 5);
INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES (5, 'box_news_letter', 'خبرنامه', 'left', 1, 10);
INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES (6, 'box_tag', 'تگ', 'left', 1, 9);
INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES (8, 'box_list_archive', 'آرشیو مطالب', 'left', 1, 7);
INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES (9, 'box_menu', 'منو', 'right', 1, 1);
INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES (10, 'box_visit', 'آمار بازدید', 'left', 1, 8);
INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES (11, 'box_top_article', 'بهترین نوشته ها', 'left', 1, 3);
INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES (13, 'box_author', 'لیست نویسندگان', 'left', 1, 4);
INSERT INTO `a_boxes` (`id`, `name`, `title`, `position`, `active`, `row`) VALUES (14, 'box_news', 'اخبار', '', 0, 0);


INSERT INTO `a_communique` (`id`, `text`, `startPublic`, `endPublic`) VALUES (7, 'شسیشسی', '10/06/1392', '20/06/1392');


INSERT INTO `a_configuration` (`id`, `title`, `kay`, `value`, `description`, `box_name`, `use_input`, `set_input_value`) VALUES (1, 'لیست دوستان', 'COUNT_FRIEND_LIST', '5', 'تعداد دوستان قابل نمایش', 'box_friends_list', 'text_value()', '');
INSERT INTO `a_configuration` (`id`, `title`, `kay`, `value`, `description`, `box_name`, `use_input`, `set_input_value`) VALUES (2, 'خبرنامه', 'FEED_BURNER_URL', 'http://feedburner.google.com/fb/a/mailverify?uri=a-blog/Rss', 'آدرس feedburner', 'box_news_letter', 'text_value()', '');
INSERT INTO `a_configuration` (`id`, `title`, `kay`, `value`, `description`, `box_name`, `use_input`, `set_input_value`) VALUES (3, 'خبرنامه', 'FEDD_BURNER_DESCRIPTION', 'خبرنامه سایت عضو شوید', 'توضیحات برای خبر نامه', 'box_news_letter', 'textarea_value()', '');
INSERT INTO `a_configuration` (`id`, `title`, `kay`, `value`, `description`, `box_name`, `use_input`, `set_input_value`) VALUES (4, 'صلوات شمار', 'COUNT_SALAVAT', '203', 'تعداد صلوات ها', 'box_salavat', 'text_value()', '');
INSERT INTO `a_configuration` (`id`, `title`, `kay`, `value`, `description`, `box_name`, `use_input`, `set_input_value`) VALUES (5, 'آخرین مطالب ثبت شده', 'COUNT_LAST_ARTICLE', '10', 'تعداد مطالب قابل نمایش', 'box_last_article', 'text_value()', '');
INSERT INTO `a_configuration` (`id`, `title`, `kay`, `value`, `description`, `box_name`, `use_input`, `set_input_value`) VALUES (6, 'لیست بخش ها', 'ARTICLE_LIST', '6', 'تعداد بخش های قابل نمایش', 'box_section_list', 'text_value()', '');
INSERT INTO `a_configuration` (`id`, `title`, `kay`, `value`, `description`, `box_name`, `use_input`, `set_input_value`) VALUES (7, 'لیست نویسندگان', 'COUNT_AUTHOR', '10', 'تعداد نویسندگان ', 'box_author', 'text_value()', '10');
INSERT INTO `a_configuration` (`id`, `title`, `kay`, `value`, `description`, `box_name`, `use_input`, `set_input_value`) VALUES (8, 'سخن روز', 'STATUS_TEXT', 'سایت در دست ساخت است بزودی بر میگردیم', 'متن سخن روز', 'box_status', 'text_value()', 'سخن روز');
INSERT INTO `a_configuration` (`id`, `title`, `kay`, `value`, `description`, `box_name`, `use_input`, `set_input_value`) VALUES (12, 'لیست اخبار', 'COUNT_LIST_NEWS', '10', 'تعداد اخبار قابل نمایش', 'BOX_LIST_NEWS', 'text_value()', '10');

INSERT INTO `a_email_template` (`id`, `title`, `template`) VALUES (1, 'فراموشی رمز عبور', '<div style=\"width:400px; height:200px; margin:auto; border:1px dashed #CCC; position:relative; background:#EEE;\">\r\n  <h3 style=\"margin:0; padding:10px 10px 10px 0; border-bottom:1px dashed #CCC; text-align:right;\">%title%</h3>\r\n  <p style=\"text-align:right; direction:rtl; padding:10px;\">کلمه عبور جدید شما\r\n   : %pass%\r\n   \r\n   </p>\r\n  \r\n  <div style=\"position:absolute;bottom:0; border-top:1px dashed #CCC; width:385px; direction:rtl; padding:5px 10px 5px 5px;\">\r\n  \r\n%webName% \r\n \r\n  </div>\r\n</div>\r\n<div style=\"direction:rtl; text-align:center\">قدرت گرفته با سیستم مدیریت محتوای a cms</div>');
INSERT INTO `a_email_template` (`id`, `title`, `template`) VALUES (2, 'نظرات کاربران', '<div style=\"width:400px; height:200px; margin:auto; border:1px dashed #CCC; position:relative; background:#EEE;\">\r\n  <h3 style=\"margin:0; padding:10px 10px 10px 0; border-bottom:1px dashed #CCC; text-align:right;\">%title%</h3>\r\n  <p style=\"text-align:right; direction:rtl; padding:10px;\">\r\n    %message%\r\n   \r\n   </p>\r\n  \r\n  <div style=\"position:absolute;bottom:0; border-top:1px dashed #CCC; width:385px; direction:rtl; padding:5px 10px 5px 5px;\">\r\n  \r\n%webName% \r\n \r\n  </div>\r\n</div>\r\n<div style=\"direction:rtl; text-align:center\">قدرت گرفته با سیستم مدیریت محتوای a cms</div>');
INSERT INTO `a_email_template` (`id`, `title`, `template`) VALUES (3, 'جواب مدیر', '<div style=\"width:400px; height:200px; margin:auto; border:1px dashed #CCC; position:relative; background:#EEE;\">\n  <h3 style=\"margin:0; padding:10px 10px 10px 0; border-bottom:1px dashed #CCC; text-align:right;\">%title%</h3>\n  <p style=\"text-align:right; direction:rtl; padding:10px;\">\n   %message%\n   \n   </p>\n  \n  <div style=\"position:absolute;bottom:0; border-top:1px dashed #CCC; width:385px; direction:rtl; padding:5px 10px 5px 5px;\">\n  \n%webName% \n \n  </div>\n</div>\n<div style=\"direction:rtl; text-align:center\">قدرت گرفته با سیستم مدیریت محتوای a cms</div>');
INSERT INTO `a_email_template` (`id`, `title`, `template`) VALUES (4, 'تماس با ما', '');
INSERT INTO `a_email_template` (`id`, `title`, `template`) VALUES (5, 'ارسال به دوستان', '<style>\r\n body{\r\n	  font-family:Tahoma, Geneva, sans-serif;\r\n	  font-size:14px;\r\n	  background:#EEE;\r\n	  }\r\n\r\n</style>\r\n<table width=\'600\' border=\'0\' align=\'center\' dir=\'rtl\' style=\"background:#FFF; border:1px solid #CCC;\" >\r\n    <tr>\r\n      <td colspan=\'2\' align=\'center\'><a href="ºse_url%/" style=\"text-decoration:none;\">%webName%</a></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"border:1px solid #CCC; border-radius:5px; padding:5px; font-family:Tahoma, Geneva, sans-serif; font-size:12px;width:280px;\">فرستنده : %YourName%</td>\r\n      <td style=\"border:1px solid #CCC; border-radius:5px; padding:5px; font-family:Tahoma, Geneva, sans-serif; font-size:12px;width:280px;\">نویسنده :  %author%</td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"border:1px solid #CCC; border-radius:5px; padding:5px; font-family:Tahoma, Geneva, sans-serif; font-size:12px;width:280px;\" colspan=\'2\' >عنوان : %title%</td>\r\n    </tr>\r\n    <tr>\r\n      <td colspan=\'2\' style=\" border:1px solid #CCC; border-radius:5px; padding:5px;\">%message%</td>\r\n    </tr>\r\n    <tr>\r\n      <td colspan=\'2\'></td>\r\n</tr>\r\n</table>');
INSERT INTO `a_email_template` (`id`, `title`, `template`) VALUES (6, 'کد امنیتی', '<div style=\"width:400px; height:200px; margin:auto; border:1px dashed #CCC; position:relative; background:#EEE;\">\r\n  <h3 style=\"margin:0; padding:10px 10px 10px 0; border-bottom:1px dashed #CCC; text-align:right;\">%title%</h3>\r\n  <p style=\"text-align:right; direction:rtl; padding:10px;\">کد امنیتی\r\n   : %pass%\r\n   \r\n   </p>\r\n  \r\n  <div style=\"position:absolute;bottom:0; border-top:1px dashed #CCC; width:385px; direction:rtl; padding:5px 10px 5px 5px;\">\r\n  \r\n%webName% \r\n \r\n  </div>\r\n</div>\r\n<div style=\"direction:rtl; text-align:center\">قدرت گرفته با سیستم مدیریت محتوای a cms</div>');

INSERT INTO `a_friends` (`id`, `name`, `link`) VALUES (3, 'google', 'http://www.google.com');
INSERT INTO `a_friends` (`id`, `name`, `link`) VALUES (4, 'yahoo', 'http://www.yahoo.com');

INSERT INTO `a_ip_banned` (`id`, `ip`, `quant`, `timestamp`) VALUES (4, '::1', 2, '1374950854');

INSERT INTO `a_menu` (`id`, `name`, `link`, `block`, `parent`) VALUES (1, 'صفحه اصلی', 'index', 17, 0);

INSERT INTO `a_news` (`id`, `title`, `keywords`, `description`, `date`, `author`, `publish_up`, `publish_down`) VALUES (1, 'تست1', 'تست کلمات کلیدی', '<p>تست متن اخبار <br></p><p>اخبار باید خوب و قشنگ باشد باور نداری بیا بپورس1<br></p>\r\n', 'سه شنبه ۵ شهریور ۱۳۹۲', 'افشین', '05/06/1392', '31/06/1392');


INSERT INTO `a_notes` (`id`, `text`) VALUES (1, ' رفع مشکل کش و آمار\nتبلیغات در سایت\nصفحه بندی اطلاعیه\nتکمیل کردن قسمت ایحاد صفحه هات\nعضویت در سایت\nماژول ورود به سایت\n');

INSERT INTO `a_polls` (`id_polls`, `polls_title`, `active`) VALUES (2, 'تست', 1);

INSERT INTO `a_polls_answer` (`id_answer`, `id_poll`, `answer_title`) VALUES (3, 2, 'سوال1');
INSERT INTO `a_polls_answer` (`id_answer`, `id_poll`, `answer_title`) VALUES (4, 2, 'سوال 2');

INSERT INTO `a_status` (`id`, `text`, `startPublic`, `endPublic`, `date`) VALUES (1, 'سخن روز', '01/06/1392', '13/06/1392', '13920610');

INSERT INTO `a_templates` (`id`, `name`, `active`) VALUES (1, 'ablog', '1');
INSERT INTO `a_templates` (`id`, `name`, `active`) VALUES (2, 'newBlog', '0');

INSERT INTO `a_user` (`id`, `fristName`, `lastName`, `email`, `password`, `avatar`) VALUES (1, 'افشین', 'نژادشیخ', 'afshin@a-vitrin.ir', '4a2fb307b07978fc415381fd3d6cbb1a1a7b7ef9', '0f212798601ce699aaa6187fcd745ff8.png1');

INSERT INTO `a_useronline` (`ip`, `time`) VALUES ('::1', 20130908);
INSERT INTO `blogtest`.`njq_visit` (`id` ,`dey` ,`week` ,`month` ,`total` ,`date`) VALUES ( NULL , '1', '1', '1', '1', '20130912');


INSERT INTO `a_web_config` (`id`, `Web_Title`, `Admin_Email`, `Keywords`, `Description`, `WebOff`, `OffDescription`, `login`, `email`, `sms`, `cache`, `clear_cache`) VALUES (1, 'نوشته های یک مبتدی', 'a@a.com', 'کلمات,کلیدی', 'تست', 1, '                           سایت به منظور به روزرسانی تا اطلاع ثانوی غیرفعال می باشد، لطفا بعدا مراجعه فرمایید.\r\nمدیر سایت                           ', 0, 0, 0, 0, 1378732413);