<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Frontend_Controller extends MY_Controller
{

	function __construct ()
	{
		parent::__construct();
		  $web = $this->model_web_config->get_one(array('id'=>1),'WebOff');
     		if($web == 0 and $this->session->userdata('is_logged_in') === FALSE){
				redirect('off');
				}
				
				
		$this->web_config->start_cache();
	}
}