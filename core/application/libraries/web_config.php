<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CI_web_config {
	protected $CI;
	public function __construct()
	{
		$this->CI =& get_instance();

	}	
	public function get_admin_email(){
		return $this->CI->model_web_config->get_one(array('id'=>1),'Admin_Email');
		}/* end admin email */
	public function get_login(){
  		 return $this->CI->model_web_config->get_one(array('id'=>1),'login');		
		}/* login */
	public function get_send_email(){
		return $this->CI->model_web_config->get_one(array('id'=>1),'email');			
		}/* email */
	public function get_send_sms(){
     	return $this->CI->model_web_config->get_one(array('id'=>1),'sms');			
		}/* sms */	
	public function get_cache(){
		return $this->CI->model_web_config->get_one(array('id'=>1),'cache');
		}
	public function start_cache(){
			if($this->get_cache() == 1){
				$this->CI->output->cache(1);
			}
		}				
}/*end web_config class*/
