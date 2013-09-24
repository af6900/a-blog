<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_template
{
	protected $CI;
	
	private $cache_lifetime = 0;
	
	public function __construct()
	{
		$this->CI =& get_instance();

	}
	
	function get_template_name(){
		
		return $this->CI->lib_database->get_filde('templates',array('active'=>1),'name');
	}

			
	public function out($data= array('not_things'=>'empty'))
	{
		// Disable sodding IE7's constant cacheing!!
		$this->CI->output->set_header('Expires: Sat, 01 Jan 2000 00:00:01 GMT');
		$this->CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->CI->output->set_header('Cache-Control: post-check=0, pre-check=0, max-age=0');
		$this->CI->output->set_header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
		$this->CI->output->set_header('Pragma: no-cache');
		
		// Let CI do the caching instead of the browser
		$this->CI->output->cache($this->cache_lifetime);

		 $data['date'] = adate();
         $data['UserName'] = $this->CI->session->all_userdata(); 



		$this->CI->load->view($this->get_template_name()."/index",$data);
		
	
    }
	
	public function set_cache($minutes = 0)
	{
		$this->cache_lifetime = $minutes;
		return $this;
	}
				
}
 