<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
*   aBlog cms
*	www.a-blog.ir
* 	template helper v 1.0.0 beta
*	@author  Afshin Nj 
*/
function get_web_title()
{
  
        $CI =& get_instance();
		$uri = $CI->uri->segment(1);
	
		switch($uri){
			case 'section';
				echo  urldecode($CI->uri->segment(2));
				break;
			case 'summary';
				$id = $CI->uri->segment(2);
				echo $CI->model_article->get_one(array('id'=>$id),'title');
				break;
			default:
				echo $CI->model_web_config->get_one(array('id'=>1),'Web_Title');
		}

   
 
}/* end web title */   


function get_keywords(){
	 	$CI =& get_instance();
		$uri = $CI->uri->segment(1);
		
		switch($uri){
			case 'section';
				echo  urldecode($CI->uri->segment(2));
				break;
			case 'summary';
				$id = $CI->uri->segment(2);
				echo $CI->model_article->get_one(array('id'=>$id),'keywords');
				break;
			default:
				echo $CI->model_web_config->get_one(array('id'=>1),'Keywords');
		}		

}/* end Keywords */



function get_description(){
		$CI =& get_instance();
		$uri = $CI->uri->segment(1);
		
		switch($uri){
			case 'section';
				echo  urldecode($CI->uri->segment(2));
				break;
			case 'summary';
				$id = $CI->uri->segment(2);
				echo $CI->model_web_config->get_one(array('id'=>1),'Description');
				break;
			default:
				echo $CI->model_web_config->get_one(array('id'=>1),'Description');
		}	

}/* end Description */
function add_javaScript($js = array()){
	$CI =& get_instance();
	echo "<script src='".site_url('templates/'.$CI->template->get_template_name().'/assets/js/'.$js)."' language='javascript' type='text/javascript'></script>";
}	
/* end add_javasecript function*/

function add_javaScript_base_url(){
	echo "<script language='javascript'>var base_url='".site_url('')."'</script>";
	}

function add_css($css = NULL){
	$CI =& get_instance();
	echo "<link href='".site_url('templates/'.$CI->template->get_template_name().'/assets/style/'.$css)."' rel='stylesheet' type='text/css'/>";
}	
/*end add_css function*/

function image($imageName = NULL,$attr = NULL){
	$CI =& get_instance();
	echo '<img  src="'.site_url('templates/'.$CI->template->get_template_name().'/assets/images/'.$imageName).'" '.$attr.'/>';
}

function shortcut_icon($imageName = NULL){
			$CI =& get_instance();
	echo "<link rel='shortcut icon' href='".site_url('templates/'.$CI->template->get_template_name().'/assets/images/'.$imageName)."'/>";
}
function apple_touch_icon($imageName = NULL){
	$CI =& get_instance();
	echo "<link rel='apple-touch-icon' href='".site_url('templates/'.$CI->template->get_template_name().'/assets/images/'.$imageName)."'/>";
	echo "<link rel='apple-touch-icon'  sizes='72x72' href='".site_url('templates/'.$CI->template->get_template_name().'/assets/images/'.$imageName)."'/>";
	echo "<link rel='apple-touch-icon' sizes='114x114' href='".site_url('templates/'.$CI->template->get_template_name().'/assets/images/'.$imageName)."'/>";
	
	}
function status(){
	    $CI =& get_instance();
		$text = '';
		$count = $CI->lib_database->count_all('a_status');
		$result = $CI->lib_database->limit('a_status',array('date'=>adate(2)),1);
		foreach($result as $row){
			$text = $row->text;
			$id = $row->id;
			}
		if(isset($id)){
			$pre = $CI->lib_database->save('a_status',array('date'=>adate(2)+$count-1),array('id <' => $id));
			$next = $CI->lib_database->limit('a_status',array('id >'=>$id),1);
			foreach( $next as $row ){
			   $next_id = $row->id;
				}
		}
			
		

	  if(isset($next_id)){
		  $CI->lib_database->save('a_status',array('date'=>adate(2)+1),array('id'=>$next_id));
		  }
		
		?>
		<script type='text/javascript' src='<?php assets("js/jquery.ticker.js")?>'></script>
        <?php
        $status = "
			<div class='status'>
                <ul id='js-news' class='js-hidden'>
                  <li class='ticker-swipe'><h3>". $text ."</h3></li>
                </ul>
            </div> ";
		return $status ;

}

function twitter($url = NULL ){
	
	echo  '<a id="twitter" href="https://twitter.com/'.$url.'"></a>';  
}

/* Start captcha punction */

function captcha(){
			$CI =& get_instance();
			$r = rand(111111,999999);
			$captcha = rand(111111,$r);
			$CI->lib_database->save('a_captcha',array('time'=>time(), 'captcha'=>$captcha)); 
			
			$expire = time()- 320;
			$CI->lib_database->delete('a_captcha',array('time <'=>$expire));
			
		$vals = array(
			'word' => $captcha,
			'img_path' => './temporary/captcha/',
			'img_url' => site_url().'temporary/captcha/',
			'font_path' => './assets/fonts/texb.ttf',
			'img_width' => 120,
			'img_height' => 30,
			'expiration' => 320
			);
		   $cap = create_captcha($vals);
		  return $cap['image']; 
}
/* end captcha punction */


function form($option){
	if($option == 3)
	{
	?>
    <script language="javascript">
    $(document).ready(function(e) {
		captchas();
		function captchas(){
			$.ajax({type:'GET',url:base_url+"ajax/captcha",success: function(data){$('.LIcaptcha').html(data);}});
		}
       	function IsEmail(email) {
		  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		  return regex.test(email);
		} 
		
		$('.send').click(function(){
			var name = $('.userName').val()
			if( name == ''){ $('.name').html('نام خود را وارد کنید')}else{$('.name').html('')}
			
			var email = $('.userEmail').val()
			if( email == ''){ $('.email').html('ایمیل خود را وارد کنید')}else{$('.email').html('')}

			var is = IsEmail($('.userEmail').val());
			if(is == false){$('.email').html('ایمیل شما نامعتبر است');exit();}else{ $('.email').html('');}
	

			var subject = $('.userSubject').val()
			if( subject == ''){ $('.subject').html('موضوع تماس خود را وارد کنید')}else{$('.subject').html('')}

			var message = $('.userMessage').val()
			if( message == ''){ $('.message').html('موضوع تماس خود را وارد کنید')}else{$('.message').html('')}
			
			var captcha = $('.userCaptcha').val();
			$.ajax({
				type:'GET',
					url:base_url+"ajax/validation_captcha",
						data:{'captcha' : captcha},
							success: function(data){
								if(data == '1'){
									$.ajax({
										type:'GET',
											url:base_url+"ajax/contact",
												data:{'name' : name, 'email' : email, 'subject' : subject , 'message' : message, 'captcha' : captcha},
												success: function(data){
													if(data == 'OK'){
														$('.userName').val('');
														$('.userEmail').val('');
														$('.userSubject').val('');
														$('.userCaptcha').val('');
														$('.userMessage').val('');
														$('.msg').fadeIn(500).delay(5000).fadeOut(500);
														captchas();
														}
													}
										});
									
									
									}else{
										captchas();
										$('.captcha').val('کد امنیتی وارد شده اشتباه است.');
										}
								}
			})
			})/* end function send*/
		
    });
    </script>
    <?php	
	  $return = '<div class="contactForm" style="direction:rtl">';
	  $return .= '<div class="ContainTitle"></div>';
	  $return .= '<div class="msg">';
      $return .= '<h4>با تشکر از شما ، پیام تان برای مدیر ارسال شد .</h4>';
      $return .= '</div>';
	  $return .= '<ul class="ulcontact">';
	  $return .= "<li>".form_input('name',set_value('name'),'class="userName" placeholder="نام خود را وارد کنید"')."</li>";
	  $return .= '<li class="name" style="color:#f00"></li>'; 
	  $return .= '<li>'.form_input('email',set_value('email'),'class="userEmail" placeholder="'.lang('contactEmail').'"').'</li>';
	  $return .= '<li class="email" style="color:#f00"></li>';
	  $return .= '<li>'.form_input('subject',set_value('subject'),'class="userSubject" placeholder="'.lang('contactSubject').'"').'</li>';
	  $return .= '<li class="subject" style="color:#f00"></li>';
	  $return .= '<li>'.form_textarea('message',set_value('message'),'class="userMessage" placeholder="'.lang('contactText').'"').'</li>';
	  $return .= '<li class="message" style="color:#f00"></li>';
	  $return .= '<li class="LIcaptcha"></li>';
	  $return .= '<li class="captcha" style="color:#f00"></li>';
	  $return .= '<li>'.form_input('captcha','','class = "userCaptcha" placeholder="'.lang('contactCaptcha').'"');
	  $return .= '<input type="button" value="ارسال" class="send" />';
	  $return .= '</li>';
	  $return .= '<li style="text-align:right" ></li>'; 
	  $return .= '</ul>';
	  $return .= '</div>';	
	}
	
	if($option == 1){
		
		
		}
	
	return $return;	   
}

function communique()
{
	 $CI =& get_instance();
 	    $communique = $CI->lib_database->get('a_communique',NULL,array('startPublic <='=> adate(3),'endPublic >='=> adate(3)));
		foreach ($communique as $row){
			echo '<div class="communique">';
			 echo $row->text;
			echo '</div>';
		}
}