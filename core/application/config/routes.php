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
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "frontend/site";
$route['404_override'] = '';

$route['login'] = "admin/login";
$route['login/(:any)'] = "admin/login";

$route['validate_credentials'] = "admin/login/validate_credentials";

$route['admin'] = "admin/admin";


$route['SaveWebConfig'] = 'admin/configuration/SaveWebConfig';

$route['SiteOff'] = "admin/configuration/SiteOff";
$route['SaveSiteOff'] = 'admin/configuration/SaveSiteOff';
$route['SiteOff/success'] = 'admin/configuration/SiteOff';

$route['update-article'] = 'admin/article/UpdateArticle';
$route['article'] = "admin/article/article";
$route['article/(:any)'] = "admin/article/article";
$route['articleList'] = "admin/article/articleList";
$route['articleList/(:num)'] = "admin/article/articleList";
$route['hide-comment/(:num)'] = 'admin/article/hideComment';
$route['show-comment/(:num)'] = 'admin/article/showComment';
$route['edit-article/(:num)'] = 'admin/article/editArticle';
$route['delete-article/(:num)'] = 'admin/article/deleteArticle';
$route['archive-article/(:num)'] = 'admin/article/archive_article';




$route['archive'] = "admin/article/archive";
$route['restore-article/(:num)'] = 'admin/article/restore';

$route['sections/(:any)'] = 'admin/article/section';
$route['edit-section/(:num)'] = 'admin/article/edit_section';
$route['delete-section/(:num)'] = 'admin/article/delete_section';
$route['update-section'] = 'admin/article/update_section';
$route['save-section'] = 'admin/article/save_section';



$route['block'] = "admin/block";
$route['block/(:any)'] = "admin/block";
$route['insert_block'] = 'admin/block/insert_block';
$route['delete_block/(:num)'] = 'admin/block/delete_block';
$route['inactive_block/(:num)'] = 'admin/block/inactive_block';
$route['active_block/(:num)'] = 'admin/block/active_block';
$route['edit_block/(:num)'] = 'admin/block/edit_block';
$route['update_block'] = 'admin/block/update_block';

$route['box'] = "admin/box";
$route['save_boxes'] = 'admin/box/save_boxes';
$route['edit-box/(:num)'] = 'admin/box/edit_box';
$route['update-boxes'] = 'admin/box/update_boxes';

$route['comment'] = "admin/comment";
$route['updateComment'] ='admin/comment/updateComment';

$route['configuration'] = "admin/configuration";
$route['configuration/(:any)'] = "admin/configuration";

$route['email'] = "admin/email";
$route['EmailTemplate'] = "admin/EmailTemplate";

$route['WebTemplate'] = "admin/WebTemplate";


$route['fileManager'] = 'admin/admin/fileManager';


$route['friend'] = "admin/friend";
$route['newFriend'] = 'admin/friend/newFriend';
$route['deleteFriende/(:num)'] = 'admin/friend/deleteFriende';


$route['menu'] = "admin/menu";
$route['insert-menu'] ='admin/menu';
$route['delete-menu/(:num)'] = "admin/menu/delete";
$route['update-menu'] = "admin/menu/update";
$route['edit-menu/(:num)'] = "admin/menu/edit";


$route['poll'] = "admin/poll";
$route['new-poll'] = 'admin/poll/newPoll';
$route['edit-poll/(:num)'] = 'admin/poll/edit';
$route['admin-poll-update'] = 'admin/poll/update';
$route['admin-poll-delete/(:num)'] = 'admin/poll/delete';


$route['admin-users'] = "admin/adminUser";
$route['admin-users/(:any)'] = 'admin/adminUser';
$route['admin-user-save'] = "admin/adminUser";
$route['admin-users-list'] = 'admin/adminUser/listUser';
$route['admin-users-list/(:any)'] = 'admin/adminUser/listUser';
$route['admin-user-update'] = "admin/adminUser/update";
$route['admin-user-delete/(:any)'] = "admin/adminUser/delete";
$route['admin-user-edit/(:any)'] = "admin/adminUser/edit";
$route['admin-user-send-email/(:num)'] = "admin/adminUser/send_email";
$route['form-admin-user-send-email'] = "admin/adminUser/send_email";
$route['admin-send-group-email'] = 'admin/adminUser/send_group_email';

$route['menu'] = "admin/menu";

$route['admin-news'] = "admin/news";
$route['admin-news/(:any)'] = "admin/news";
$route['admin-news-list'] = "admin/news/news_list";
$route['admin-news-edit/(:num)']="admin/news/edit";
$route['admin-news-delete/(:num)'] = "admin/news/delete";
$route['admin-news-insert'] = 'admin/news/insert';
$route['admin-news-update'] = 'admin/news/update';

$route['section'] = "admin/article/section";



$route['friend'] = "admin/friend";
$route['box'] = "admin/box";
$route['poll'] = "admin/poll";

$route['EmailTemplate'] = "admin/EmailTemplate";
$route['EmailTemplate/(:any)'] = "admin/EmailTemplate";
$route['edit-email-tamplate/(:num)'] = "admin/EmailTemplate/edit";


$route['backup'] = "admin/backup";
$route['backup-create'] = 'admin/backup/create';
$route['backupDelete/(:any)'] = 'admin/backup/delete';
$route['backupRestore/(:any)'] = 'admin/backup/restore';
$route['backupDownload/(:any)'] = 'admin/backup/download';

$route['commentDelete/(:num)'] = 'admin/comment/commentDelete';
$route['commentActive/(:num)'] = 'admin/comment/commentActive';
$route['commentDeActive/(:num)'] = 'admin/comment/commentDeActive';
$route['commentEdit/(:num)'] = 'admin/comment/commentEdit';

$route['ban'] = "admin/login/banned";

$route['validate_code'] = "admin/login/validate_code";
$route['validate_credentials'] = "admin/login/validate_credentials";

$route['settings'] = "admin/configuration/login";
$route['savelogin'] = "admin/configuration/savelogin";
$route['settings/(:any)'] = "admin/configuration/login";
$route['cache'] = "admin/configuration/cache";


$route['admin_logout'] = "admin/login/user_logout";

$route['communique-save'] = 'admin/communique/save';
$route['communique-delete/(:num)'] = 'admin/communique/delete';

$route['robots'] = 'admin/robots';
$route['robots-save'] = 'admin/robots/save';

$route['new-pages'] = 'admin/pages';
$route['new-pages/(:any)'] = 'admin/pages';
$route['pages-list'] = 'admin/pages/page_list';
$route['save-pages'] = 'admin/pages/save';
$route['delete-pages/(:num)'] = 'admin/pages/delete';
$route['edit-pages/(:num)'] = 'admin/pages/edit';
$route['update-pages'] = 'admin/pages/update';

// Frontend route 
$route['index'] = "frontend/site";
$route['index/(:any)'] = "frontend/site";
$route['site'] = "frontend/site";

$route['pages/(:any)'] = "frontend/site/pages";

$route['archive/(:any)'] = "frontend/site/archive";

$route['mellat'] = 'frontend/site/mellat';
$route['callback'] = 'frontend/site/callback';


$route['search'] = 'frontend/site/search';

$route['summary/(:any)'] = 'frontend/site/summary';

$route['section/(:any)'] = "frontend/site/section";
$route['summary/(:any)'] = "frontend/site/summary";

//$route['page/(:any)'] = "frontend/site/index";
//$route['page'] = "frontend/site";
$route['send-contact'] = 'frontend/site/contact';

$route['off'] = "frontend/off";

/* End of file routes.php */
/* Location: ./application/config/routes.php */