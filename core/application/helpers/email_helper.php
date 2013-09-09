<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function contact($name,$email,$subject,$message,$captcha){
  $CI =& get_instance();
  $to    = $CI->lib_database->get_filde('web_config',array('id'=>1),'Admin_Email');
  $match_captch =  $CI->ablog->match_captch($captcha);
  if($match_captch == true){
	  $CI->email->from($email, $name);
	  $CI->email->to($to);
	  $CI->email->subject($subject . ' :تماس با ما ');
	  $CI->email->message($message);
	  $data = $CI->email->send();
	  return 'OK';
	  }else{
		  return 'no';
		  }	
	
}

/*=== ارسال ایمیل به کار بر در جواب به نظر کاربر ===*/
function comment_send_email($to){
		$CI =& get_instance();


		$emailTemplate = $CI->lib_database->get('email_template',NULL,array('id'=>3));
		foreach( $emailTemplate as $row ){
			$template['tem'] = $row->template;
			$template['title'] = $row->title;
			}
		
		$email = $CI->lib_database->get_filde('web_config',array('id'=>1),'Admin_Email');
		$WebTitle    = $CI->lib_database->get_filde('web_config',array('id'=>1),'Web_Title');
				
		$message = $CI->input->post('answer');	
		$search  = array($message,$template['title'],$WebTitle['title']);	
		$replace = array('%message%','%title%','%webName%');	
		$message = str_replace($replace,$search,$template['tem']);
			
		
		
		$config['mailtype'] = 'html';
        $CI->email->initialize($config);
		
			$CI->email->from($email, $title);
			$CI->email->to($to);
			$CI->email->subject('جواب مدیر');
			$CI->email->message($message);
		    $data = $CI->email->send();
		    return 'OK';
}

/*=== ارسال ایمیل به مدیر وقتی کاربری نظر بدهد ===*/
function comment_send_admin($name, $email, $text,$author){ 
		$CI =& get_instance();

		$to    = $CI->lib_database->get_filde('admin_user',array('UserEmail'=>$author),'UserEmail');
			
		$name  = htmlspecialchars(mysql_real_escape_string($name));
		$email = htmlspecialchars(mysql_real_escape_string($email));
		
		$emailTemplate = $CI->lib_database->get('email_template',NULL,array('id'=>2));
		foreach( $emailTemplate as $row ){
			$template['tem'] = $row->template;
			$template['title'] = $row->title;
			}
		
		$WebTitle['title']    = $CI->lib_database->get_filde('web_config',array('id'=>1),'Web_Title');
				
		$message = htmlspecialchars(mysql_real_escape_string($text));	
		$search  = array($message,$template['title'],$WebTitle['title']);	
		$replace = array('%message%','%title%','%webName%');	
		$message = str_replace($replace,$search,$template['tem']);

			
		$config['mailtype'] = 'html';
        $CI->email->initialize($config);
		
			$CI->email->from($email, $name);
			$CI->email->to($to);
			$CI->email->subject('یک نظر داده شده است');
			$CI->email->message($message);
		    $data = $CI->email->send();
		    return 'OK';
}

function send_email($message, $title, $to){
	  
	  $CI =& get_instance();
	  $email = $CI->lib_database->get_filde('web_config',array('id'=>1),'Admin_Email');
	  $config['mailtype'] = 'html';
	  $CI->email->initialize($config);
	  $CI->email->from($email, $CI->session->userdata('name'));
	  $CI->email->to($to);
	  $CI->email->subject($title);
	  $CI->email->message($message);
	  $data = $CI->email->send();
	  return 'OK';
}