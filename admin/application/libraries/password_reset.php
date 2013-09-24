<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CI_password_reset {
	 public function __construct($rules = array())
		{
			
	
		}

	
	public function validate_user($tabelName = NULL, $query = array()){
		  			$CI =& get_instance();
		            $CI->db->where($query);	
					$CI->db->limit(1);				
    	$_query    = $CI->db->get($tabelName);
		
		if($_query->num_rows() == 1){
			$this->get_email_mobile($tabelName, $query);
			return TRUE;
			}else {
				return FALSE;
				}
		}


	public function get_email_mobile($tabelName = NULL, $query = array()){
					$CI =& get_instance();
					$CI->db->where($query);					
    	    $result    = $CI->db->get($tabelName)->result();
			foreach($result as $row){
				$email = $row->UserEmail;
				$mobile = $row->UserMobile;
				$id =  $row->id;
				}
			  $this->chenge_password($id, $tabelName,$email,$mobile);
		
		}
	
	public function chenge_password($id,$tabelName,$email,$mobile){
		 $CI =& get_instance();
		 $pass = rand(111111,999999);
		 $newPass  = $CI->ablog->a_hash($pass);
		 
		 $CI->db->where('id',$id);
		 $data = array('LoginPass'=>$newPass);
		 $CI->db->update($tabelName,$data);
		 
		 $this->send_pass_email($email,$pass);
		 $this->send_pass_mobile($mobile,$pass);
		}
		
  public function send_pass_mobile($mobile,$pass){
	  $CI =& get_instance();
	  $CI->sms->send("رمز جدید شما : $pass",$mobile);
	  }
	  				
  public function send_pass_email($email, $pass) {
	            $CI =& get_instance();
				
				$emailTemplate = $CI->lib_database->get('email_template',NULL,array('id'=>1));
				foreach( $emailTemplate as $row ){
					$template['tem'] = $row->template;
					$template['title'] = $row->title;
					}
				$WebTitle = $CI->model_web_config->get();
					foreach($WebTitle as $row){
						$WebTitle['title'] = $row->Web_Title;
						}
				
				$search = array($pass,$template['title'],$WebTitle['title']);	
				$replace = array('%pass%','%title%','%webName%');	
				$message = str_replace($replace,$search,$template['tem']);
				
						
				$config['mailtype'] = 'html';
				
				$CI->email->initialize($config);	
				$CI->email->from('ResetPass', $WebTitle['title']);
				$CI->email->to($email);
				
				$CI->email->subject('بازیابی رمز عبور');
				$CI->email->message($message);
				
				$CI->email->send();
				return TRUE;							

		
     }
	
	public function send_validate_code($email, $pass){
		
	            $CI =& get_instance();
				
				$emailTemplate = $CI->lib_database->get('email_template',NULL,array('id'=>6));
				foreach( $emailTemplate as $row ){
					$template['tem'] = $row->template;
					$template['title'] = $row->title;
					}
				$WebTitle = $CI->model_web_config->get();
					foreach($WebTitle as $row){
						$WebTitle['title'] = $row->Web_Title;
						}
				
				$search = array($pass,$template['title'],$WebTitle['title']);	
				$replace = array('%pass%','%title%','%webName%');	
				$message = str_replace($replace,$search,$template['tem']);
				
						
				$config['mailtype'] = 'html';
				
				$CI->email->initialize($config);	
				$CI->email->from('ResetPass', $WebTitle['title']);
				$CI->email->to($email);
				
				$CI->email->subject('کد امنیتی');
				$CI->email->message($message);
				
				$CI->email->send();
				return TRUE;			
		}
	 
}
