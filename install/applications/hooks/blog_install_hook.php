<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('install_hook'))
{
    function install_hook()
    {
      
  
       if (file_exists('index.php') AND file_exists('lock.md5'))
       {   
	   		 include('../core/application/config/database.php');
			 include('../core/application/config/config.php');
		  if (isset($db[$active_group]['username']) || !empty($db[$active_group]['username']))
           {  

        		 header('Location: '.$config['base_url']);
				   
        		 exit;
		   }
       }
	   
    }
}