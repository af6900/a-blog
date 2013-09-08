<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CI_ip_banned {
	
	 public function __construct($rules = array())
		{
			
	
		}

	public function banned(){
		  	$CI =& get_instance();
			$quant = 0;
			$quant = $CI->model_ip_banned->get_one(array('ip'=>$_SERVER['REMOTE_ADDR']),'quant');
			
			if($quant == 5){
				redirect('ban');
				}
		}
		/* end function banned */
	
	
	public function save_ip(){
			$CI =& get_instance();
		  $ip = $_SERVER['REMOTE_ADDR'];
		  $data = array('ip'=>$ip,'quant'=>1,'timestamp'=>time());
		  $this->expire();
		  $result = $CI->model_ip_banned->get_by(array('ip'=>$ip));
		  if($result == NULL){
			  $CI->model_ip_banned->save($data);
		  }else{
			  foreach($result as $row){
				  $id = $row->id;
				  $quant = $row->quant;
			  }
			  if($quant <= 5){
					  $data = array('quant'=>$quant+1);
					  $CI->model_ip_banned->save($data,$id);
			  }else{
					 return TRUE;
					}
			  }
		
		}
		/* end function save_ip */
		
		
	   public function expire(){
		   $CI =& get_instance();
		    $expire = time()- 7200;
			$CI->model_ip_banned->delete_by('timestamp <', $expire);	
		}

}
