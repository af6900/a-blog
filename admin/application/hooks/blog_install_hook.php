<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('install_hook'))
{
    function install_hook()
    {
      
  
       if (file_exists('install/index.php') AND !file_exists('install/lock.md5'))
       {   
	   		 include(APPPATH.'config/database.php');
			 
		  if ( ! isset($db[$active_group]['username']) || empty($db[$active_group]['username']))
           {  
        		 header('Location: '.rtrim($_SERVER['REQUEST_URI'], '/').'/install/');
        		 exit;
		   }
       }
	   
    }
}