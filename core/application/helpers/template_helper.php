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
				echo str_replace(' ','-',urldecode($CI->uri->segment(2))); 
				break;
			case 'summary';
				echo str_replace(' ','-',urldecode($CI->uri->segment(2))); 
				break;
			default:
				echo $CI->lib_database->get_filde('web_config',array('id'=>1),'Web_Title');
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
				$title = str_replace('-',' ',urldecode($CI->uri->segment(2)));
				echo strip_tags($CI->lib_database->get_filde('article',array('title'=>$title),'keywords'));
				break;
			default:
				echo strip_tags($CI->lib_database->get_filde('web_config',array('id'=>1),'Keywords'));
		}		

}/* end Keywords */




if( !function_exists('get_description')){ 
	function get_description(){
			$CI =& get_instance();
			$uri = $CI->uri->segment(1);
			
			switch($uri){
				case 'section';
					echo  urldecode($CI->uri->segment(2));
					break;
				case 'summary';
					$title = str_replace('-',' ',urldecode($CI->uri->segment(2)));
					echo substr(htmlspecialchars(strip_tags($CI->lib_database->get_filde('article',array('title'=>$title),'summary'))),0,155);
					break;
				default:
					echo strip_tags($CI->lib_database->get_filde('web_config',array('id'=>1),'Description'));
			}	
	
	}/* end Description */
}


function add_javaScript($js = NULL){
	$CI =& get_instance();
	echo "<script src='"
			.site_url('templates/'.$CI->template->get_template_name().
			'/assets/js/'.$js)."' language='javascript' type='text/javascript'></script> \n";
}	
/* end add_javasecript function*/




function add_javaScript_base_url(){
	echo "<script language='javascript'>var base_url='".site_url('')."'</script> \n";
	}



function add_css($css = NULL){
	$CI =& get_instance();
	
	echo "<link href='".site_url('templates/'.$CI->template->get_template_name().'/assets/style/'.$css)."' rel='stylesheet' type='text/css'/> \n";
}	
/*end add_css function*/




function image($imageName = NULL,$attr = NULL){
	$CI =& get_instance();
	echo '<img alt="'.$imageName.'"  src="'.site_url('templates/'.$CI->template->get_template_name().'/assets/images/'.$imageName).'" '.$attr.'/>';
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


function assets($url = NULL){
	echo site_url('assets/'.$url);	
}




function twitter($url = NULL ){
	
	echo  '<a id="twitter" href="https://twitter.com/'.$url.'"></a>';  
}


if(! function_exists('contain')){
	function contain(){
		$CI =& get_instance();
		$contain = $CI->uri->segment(1);
		if($contain == 'index' or $contain == '' or $contain == 'site'){
			$contain = 'contain';
			}
		if ( ! file_exists("templates/".$CI->template->get_template_name()."/".$contain.".php"))
			{
				$contain = 'contain';	
			}
			
		return($CI->load->view($CI->template->get_template_name()."/".$contain.""));
	}
}


if(! function_exists('summary')){
	function summary($url = NULL, $title = NULL){ 
	   return '<a href="'.site_url('summary'.'/'.rawurlencode (str_replace(' ','-',urldecode($url)))).'">'.$title.'</a>';
		}
}





if(! function_exists('social_network')){	
	function social_network($yahoo,$twitter,$facebook,$instagram)
	{
		$CI =& get_instance();
		
		echo '<div class="text-left">';
		if($twitter != ''){
			echo  '<a id="twitter" href="https://twitter.com/'.$twitter.'">
			<img  src="'.site_url('templates/'.$CI->template->get_template_name().'/assets/images/twitter1.png').'"/></a>';
		}
		if($facebook != ''){
			echo  '<a id="facebook" href="https://facebook.com/'.$facebook.'">
			<img  src="'.site_url('templates/'.$CI->template->get_template_name().'/assets/images/fa.png').'"/></a>';
		}
		if($instagram != ''){
			echo  '<a id="instagram" href="http://instagram.com/'.$instagram.'">
			<img  src="'.site_url('templates/'.$CI->template->get_template_name().'/assets/images/instagram.png').'"/></a>';
		}
		
		if($yahoo !=''){
			$getstatus = file_get_contents('http://mail.opi.yahoo.com/online?u='.$yahoo.'&m=a&t=1');
			switch($getstatus) {
				case "00": 
				$status = '<a href="ymsgr:sendIM?'.$yahoo.'">
				<img src="'.site_url('templates/'.$CI->template->get_template_name().'/assets/images/yahoo_off.png').'"/></a>';
			break;
				case "01":
				$status = '<a href="ymsgr:sendIM?'.$yahoo.'">
				<img src="'.site_url('templates/'.$CI->template->get_template_name().'/assets/images/yahoo_on.png').'"/></a>';
			break;
			}
			echo $status;
		}
		echo '</div>';
	}
}

if(!function_exists('article_image'))
{
	function article_image($image,$title){
		
	 return '<a href="'.site_url('summary'.'/'.rawurlencode (str_replace(' ','-',urldecode($title)))).'">
	         <img src = "'.site_url('upload/'.$image).'" class = "img-responsive img-thumbnail pull-left" 
             width = "200" alt = "'.$title.'" title = "'.$title.'" style = "margin-right:10px;"> </a>';
	}
	
}

if(!function_exists('summary_image'))
{
	function summary_image($image,$title){
		
	 return '<a href="'.site_url('summary'.'/'.rawurlencode (str_replace(' ','-',urldecode($title)))).'">
	         <img src = "'.site_url('upload/'.$image).'" class = "img-responsive img-thumbnail" 
             alt = "'.$title.'" title = "'.$title.'" style = "margin:0 0 20px 0;"> </a>';
	}
	
}

if(!function_exists('facebook'))
{
	function facebook($id = NULL)
	{
		$url ="<a class='facebook' href='http://www.facebook.com/share.php?u=".site_url('summary?id='.str_replace(' ','-',urldecode($id)))."'></a>";
		return $url; 
	}
}