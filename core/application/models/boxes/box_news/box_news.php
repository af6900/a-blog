<?php
class box_news extends MY_Model
{
	public function initialize(){
		$count = $this->model_boxes->configuration_kay('COUNT_LIST_NEWS');
		$weher = array('publish_up <='=>adate(3),'publish_down >='=>adate(3)); 
		$newsList = $this->lib_database->get('news',NULL,$weher,'id','DESC');
		$return = '<div class="boxTitle">لیست اخبار</div>';
		$return .= '<ul class="UlLeftMenu">';
		foreach ($newsList as $row){
			$return .= "<li class='LiRightMenu'><a href=".site_url("news")."/".$row->id.">";
			$return .= $row->title;
			$return .= "</a></li>";
			}
		$return .= "</ul>";	
		return $return;	
	}
	
	public function model_install(){
		
		/*
		* نمونه کد ها برای شبیه سازی تگ های اچ تی ام ال
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
		
		$title = 'اخبار';
						
		return $title;
		}
		
	public function configuration_install(){
				$return = array (array('title'=>'لیست اخبار',
						'kay'=>'COUNT_LIST_NEWS',
						'value'=>'10',
						'description'=>'تعداد اخبار قابل نمایش',
						'box_name'=>'BOX_LIST_NEWS',
						'use_input'=>'text_value()',
						'set_input_value'=>'10'));
						
						return $return;	
		}	
	
}

  