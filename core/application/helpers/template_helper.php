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
					echo  strip_tags($CI->lib_database->get_filde('article',array('title'=>$title),'summary'));
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


function assets($url = NULL){
	echo site_url('assets/'.$url);	
}




function twitter($url = NULL ){
	
	echo  '<a id="twitter" href="https://twitter.com/'.$url.'"></a>';  
}



function contain(){
	$CI =& get_instance();
	$contain = $CI->uri->segment(1);
	if($contain == 'index' or $contain == '' or $contain == 'site'){
		$contain = 'contain';
		}
	return($CI->load->view($CI->template->get_template_name()."/".$contain.""));
	}

function summary($url = NULL, $title = NULL){ 

   return '<a href="'.site_url('summary'.'/'.rawurlencode (str_replace(' ','-',urldecode($url)))).'">'.$title.'</a>';
	}