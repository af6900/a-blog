<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CI_ip_banned {
	
	 public function __construct($rules = array())
		{
			
	
		}

	public function banned(){
		  	$CI =& get_instance();
			$quant = 0;
			$quant = $CI->ip_banned_model->get_one(array('ip'=> get_ip_address()),'quant');
			
			if($quant == 5){
				redirect('ban');
				}
		}
		/* end function banned */
	
	
	public function save_ip(){
			$CI =& get_instance();
		  $ip = get_ip_address();
		  $data = array('ip'=>$ip,'quant'=>1,'timestamp'=>time());
		  $this->expire();
		  $result = $CI->ip_banned_model->get_by(array('ip'=>$ip));
		  if($result == NULL){
			  $CI->ip_banned_model->save($data);
		  }else{
			  foreach($result as $row){
				  $id = $row->id;
				  $quant = $row->quant;
			  }
			  if($quant <= 5){
					  $data = array('quant'=>$quant+1);
					  $CI->ip_banned_model->save($data,$id);
			  }else{
					 return TRUE;
					}
			  }
		
		}
		/* end function save_ip */
		
		
	   public function expire(){
		   $CI =& get_instance();
		    $expire = time()- 7200;
			$CI->ip_banned_model->delete_by('timestamp <', $expire);	
		}

}
