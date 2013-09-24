<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
*   aBlog cms
*	www.a-blog.ir
* 	template helper v 1.0.0 beta
*	@author  Afshin Nj 
* 	qr helper
*/
if(! function_exists('qr_email')){
	function qr_email($email = NULL, $subject = NULL, $text = NULL)
	{
			 $CI =& get_instance();
			 $url = 'http://chart.apis.google.com/chart?cht=qr&chs=100x100&choe=UTF-8&chl=mailto:'.$email.':'.$subject.':'.$text.'';
			 echo '<img class="img-rounded" src="'.$url.'">';	
	}
}/* qr email*/   





if(! function_exists('qr_text')){
	
	function qr_text($text = NULL)
	{
		 $CI =& get_instance();
		 $url = 'http://chart.apis.google.com/chart?cht=qr&chs=100x100&choe=UTF-8&chl='.$text.'';
		 echo '<img class="img-rounded" src="'.$url.'">';		
	}

}
/* qr_text*/






if(! function_exists('qr_number')){
	
	function qr_number($number = NULL)
		{
				 $CI =& get_instance();
				 $url = 'http://chart.apis.google.com/chart?cht=qr&chs=100x100&choe=UTF-8&chl=tel:'.$number.'';
				 echo '<img class="img-rounded" src="'.$url.'">';	 
		
		}
			
	}
/* qr_number*/





if(! function_exists('qr_sms')){
	
	function qr_sms($number = NULL, $text = NULL)
	{
		 $CI =& get_instance();
		 $url = 'http://chart.apis.google.com/chart?cht=qr&chs=100x100&choe=UTF-8&chl=smsto:'.$number.':'.$text.'';
		 echo '<img class="img-rounded" src="'.$url.'">';
	}
}
	
/* qr_Sms*/








if(! function_exists('qr_url'))
{
	function qr_url($url = NULL)
	{
		 $CI =& get_instance();
		 $url = 'http://chart.apis.google.com/chart?cht=qr&chs=100x100&choe=UTF-8&chl='.$url.'';
		 echo '<img class="img-rounded" src="'.$url.'">';
	
	}
}/* qr_url*/



