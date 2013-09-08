<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Output extends CI_Output {
       
    /**
     * Clears all cache from the cache directory
     */
    public function clear_all_cache()
    {
        $CI =& get_instance();
	    $path = $CI->config->item('cache_path');
        
        $cache_path = ($path == '') ? APPPATH.'cache/' : $path;
        
        $handle = opendir($cache_path);

			if($CI->web_config->get_cache() == 1){
				while (($file = readdir($handle))!== FALSE) 
				{
					//Leave the directory protection alone
					if ($file != '.htaccess' && $file != 'index.php')
					{
					   @unlink($cache_path.'/'.$file);
					}
				}		
				
			}


        closedir($handle);
    }
}

/* End of file MY_Output.php */
/* Location: ./application/core/MY_Output.php */