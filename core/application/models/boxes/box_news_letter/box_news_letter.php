<?php
class box_news_letter extends CI_Model
{
	/*
	* box name -> BOX_NEWS_LETTER
	*/
	public function initialize(){
			$URL = $this->model_boxes->configuration_kay('FEED_BURNER_URL');
			$DESCRIPTION = $this->model_boxes->configuration_kay('FEDD_BURNER_DESCRIPTION');
			$value = explode('=',$URL);
			$return = '<div class="boxTitle">خبر نامه</div>';
			$return .='<div class="newsletter">';
 			$return .='<form style="padding:3px;text-align:center;" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open("'.$URL.'", "popupwindow", "scrollbars=yes,width=550,height=520");return true">';
    $return .='<p>'.$DESCRIPTION.'</p>';
    $return .='<p>';
    $return .='<input style=" border-radius:5px; padding:5px; margin-left:20px; " type="text" name="email" placeholder="Email Address..."/>';  
    $return .='</p>';
   	$return .='<input type="hidden" value="'.$value[1].'" name="uri"/>';
	$return .='<input type="hidden" name="loc" value="en_US"/>'; 
    $return .='<input type="submit" value="اشتراک" />';
 	$return .='</form>';
	$return .='</div>';
	
		return $return;	
	}
	
	public function model_install(){
		
		$return = array (array('title'=>'خبرنامه',
						'kay'=>'FEED_BURNER_URL',
						'value'=>'http://feedburner.google.com/fb/a/mailverify?uri=a-blog/Rss',
						'description'=>'آدرس feedburner',
						'box_name'=>'BOX_NEWS_LETTER',
						'use_input'=>'text_value()',
						'set_input_value'=>''),
						array('title'=>'خبرنامه',
						'kay'=>'FEDD_BURNER_DESCRIPTION',
						'value'=>'عضویت در خبر نامه',
						'description'=>'توضیحات برای خبر نامه',
						'box_name'=>'BOX_NEWS_LETTER',
						'use_input'=>'textarea_value()',
						'set_input_value'=>''));
						
		return $return;
		}
		
	public function configuration_install(){
			
		}		
}

 
