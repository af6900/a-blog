<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the 'welcome' class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'login';
$route['404_override'] = '';

$route['login'] = 'login';
$route['login/(:any)'] = 'login';

$route['validate_credentials'] = 'login/validate_credentials';

$route['admin'] = 'admin';
$route['admin(:any)'] = 'admin';

$route['SaveWebConfig'] = 'configuration/SaveWebConfig';

$route['SiteOff'] = 'configuration/SiteOff';
$route['SaveSiteOff'] = 'configuration/SaveSiteOff';
$route['SiteOff/success'] = 'configuration/SiteOff';

$route['update-article'] = 'article/UpdateArticle';
$route['article'] = 'article/article';
$route['article/(:any)'] = 'article/article';
$route['articleList'] = 'article/articleList';
$route['articleList/(:num)'] = 'article/articleList';
$route['hide-comment/(:num)'] = 'article/hideComment';
$route['show-comment/(:num)'] = 'article/showComment';
$route['edit-article/(:num)'] = 'article/editArticle';
$route['delete-article/(:num)'] = 'article/deleteArticle';
$route['archive-article/(:num)'] = 'article/archive_article';




$route['archive'] = 'article/archive';
$route['restore-article/(:num)'] = 'article/restore';

$route['sections/(:any)'] = 'article/section';
$route['edit-section/(:num)'] = 'article/edit_section';
$route['delete-section/(:num)'] = 'article/delete_section';
$route['update-section'] = 'article/update_section';
$route['save-section'] = 'article/save_section';



$route['block'] = 'block';
$route['block/(:any)'] = 'block';
$route['insert_block'] = 'block/insert_block';
$route['delete_block/(:num)'] = 'block/delete_block';
$route['inactive_block/(:num)'] = 'block/inactive_block';
$route['active_block/(:num)'] = 'block/active_block';
$route['edit_block/(:num)'] = 'block/edit_block';
$route['update_block'] = 'block/update_block';

$route['box'] = 'box';
$route['save_boxes'] = 'box/save_boxes';
$route['edit-box/(:num)'] = 'box/edit_box';
$route['update-boxes'] = 'box/update_boxes';

$route['comment'] = 'comment';
$route['updateComment'] ='comment/updateComment';

$route['configuration'] = 'configuration';
$route['configuration/(:any)'] = 'configuration';

$route['email'] = 'email';
$route['EmailTemplate'] = 'EmailTemplate';

$route['WebTemplate'] = 'WebTemplate';


$route['fileManager'] = 'admin/fileManager';


$route['friend'] = 'friend';
$route['newFriend'] = 'friend/newFriend';
$route['deleteFriende/(:num)'] = 'friend/deleteFriende';


$route['menu'] = 'menu';
$route['insert-menu'] ='menu';
$route['delete-menu/(:num)'] = 'menu/delete';
$route['update-menu'] = 'menu/update';
$route['edit-menu/(:num)'] = 'menu/edit';


$route['poll'] = 'poll';
$route['new-poll'] = 'poll/newPoll';
$route['edit-poll/(:num)'] = 'poll/edit';
$route['admin-poll-update'] = 'poll/update';
$route['admin-poll-delete/(:num)'] = 'poll/delete';


$route['admin-users'] = 'adminUser';
$route['admin-users/(:any)'] = 'adminUser';
$route['admin-user-save'] = 'adminUser';
$route['admin-users-list'] = 'adminUser/listUser';
$route['admin-users-list/(:any)'] = 'adminUser/listUser';
$route['admin-user-update'] = 'adminUser/update';
$route['admin-user-delete/(:any)'] = 'adminUser/delete';
$route['admin-user-edit/(:any)'] = 'adminUser/edit';
$route['admin-user-send-email/(:num)'] = 'adminUser/send_email';
$route['form-admin-user-send-email'] = 'adminUser/send_email';
$route['admin-send-group-email'] = 'adminUser/send_group_email';

$route['menu'] = 'menu';

$route['admin-news'] = 'news';
$route['admin-news/(:any)'] = 'news';
$route['admin-news-list'] = 'news/news_list';
$route['admin-news-edit/(:num)']='news/edit';
$route['admin-news-delete/(:num)'] = 'news/delete';
$route['admin-news-insert'] = 'news/insert';
$route['admin-news-update'] = 'news/update';

$route['section'] = 'article/section';



$route['friend'] = 'friend';
$route['box'] = 'box';
$route['poll'] = 'poll';

$route['EmailTemplate'] = 'EmailTemplate';
$route['EmailTemplate/(:any)'] = 'EmailTemplate';
$route['edit-email-tamplate/(:num)'] = 'EmailTemplate/edit';


$route['backup'] = 'backup';
$route['backup-create'] = 'backup/create';
$route['backupDelete/(:any)'] = 'backup/delete';
$route['backupRestore/(:any)'] = 'backup/restore';
$route['backupDownload/(:any)'] = 'backup/download';

$route['commentDelete/(:num)'] = 'comment/commentDelete';
$route['commentActive/(:num)'] = 'comment/commentActive';
$route['commentDeActive/(:num)'] = 'comment/commentDeActive';
$route['commentEdit/(:num)'] = 'comment/commentEdit';

$route['ban'] = 'login/banned';

$route['validate_code'] = 'login/validate_code';
$route['validate_credentials'] = 'login/validate_credentials';

$route['settings'] = 'configuration/login';
$route['savelogin'] = 'configuration/savelogin';
$route['settings/(:any)'] = 'configuration/login';
$route['cache'] = 'configuration/cache';


$route['admin_logout'] = 'login/user_logout';

$route['communique-save'] = 'communique/save';
$route['communique-delete/(:num)'] = 'communique/delete';

$route['robots'] = 'robots';
$route['robots-save'] = 'robots/save';

$route['new-pages'] = 'pages';
$route['new-pages/(:any)'] = 'pages';
$route['pages-list'] = 'pages/page_list';
$route['save-pages'] = 'pages/save';
$route['delete-pages/(:num)'] = 'pages/delete';
$route['edit-pages/(:num)'] = 'pages/edit';
$route['update-pages'] = 'pages/update';


$route['banner'] = 'banner';


/* End of file routes.php */
/* Location: ./application/config/routes.php */