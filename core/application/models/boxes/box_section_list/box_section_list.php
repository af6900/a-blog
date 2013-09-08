<?php
class box_section_list extends CI_Model
{
	public function initialize(){
	$count = $this->model_boxes->configuration_kay('ARTICLE_LIST');	
	$Section = $this->model_section->get_limit($count);
	$sectinBox = '<div class="boxTitle">بخش ها</div>';
	$sectinBox .="<ul class='UlLeftMenu'>";
	foreach ($Section as $row){
		$sectinBox .= "<li class='LiRightMenu'><a href='".base_url()."section/$row->title'>";
		$sectinBox .=  $row->title;
		$sectinBox .= '</a></li>';
    	}
		$sectinBox .= '</ul>';
		return $sectinBox;
	}
	
	public function model_install(){
		
		/*
		* نمونه کد ها برای شبیح سازی تگ های اچ تی ام ال
		* text_value() = <input type="text" /> 
		* textarea_value() = <textarea></textarea>
		* select_option() = <select></select>
		*/
		
		/* 
		* مقدار دهی برای فیلد  انتخابی      
		* text_value() = a-blog
		* textarea_value() = a-blog
		* select_option() = 1,2,3,4
		*/
		
		
		/*
		* اگر فقت یک فیلد دارید باید از این کد استفاده کنید
		* $return = array (array('title'=>'لیست دوستان',
		*		  'kay'=>'COUNT_FRIEND_LIST',
		*		  'value'=>'10',
		*		  'description'=>'تعداد دوستان قابل نمایش',
		*		  'box_name'=>'BOX_FRIENDS_LIST',
		*		  'use_input'=>'text_value()',
		*		  'set_input_value'=>'10'));
		*/
		
		
		/*
		* برای اضافه کردن چندین مقدار از کد زیر استفاده کنید
		* $return = array (
		*					array('title'=>'لیست دوستان',
		*		  				'kay'=>'COUNT_FRIEND_LIST',
		*		  				'value'=>'10',
		*		  				'description'=>'تعداد دوستان قابل نمایش',
		*		  				'box_name'=>'BOX_FRIENDS_LIST',
		*		  				'use_input'=>'text_value()',
		*		  				'set_input_value'=>'10'),
		*					array('title'=>'لیست دوستان',
		*		  				'kay'=>'COUNT_FRIEND_LIST',
		*		  				'value'=>'10',
		*		  				'description'=>'تعداد دوستان قابل نمایش',
		*		  				'box_name'=>'BOX_FRIENDS_LIST',
		*		  				'use_input'=>'text_value()',
		*		  				'set_input_value'=>'10')
		*					);
		*/
		
		$return = array (array('title'=>'لیست بخش ها',
						'kay'=>'ARTICLE_LIST',
						'value'=>'10',
						'description'=>'تعداد بخش های قابل نمایش',
						'box_name'=>'BOX_SECTION_LIST',
						'use_input'=>'text_value()',
						'set_input_value'=>''));
						
		return $return;
		}
		
		public function configuration_install(){
			
		}
}

      

