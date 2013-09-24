<?php
class box_news extends AB_Model
{
	public function initialize(){
		$count = $this->boxes_model->configuration_kay('COUNT_LIST_NEWS');
		$weher = array('publish_up <='=>adate(3),'publish_down >='=>adate(3)); 
		$newsList = $this->lib_database->get('news',NULL,$weher,'id','DESC');
		
		   	$return = '<div class="panel panel-default text-right">';
			$return .= '<div class="panel-heading">';
			$return .= '<label class="panel-text">لیست اخبار</label>';
			$return .= '</div>';
			$return .= '<div class="panel-body">';
			$return .= "<div class='list-group'>";
			foreach ($newsList as $row){
				$return .= "<a href=".site_url("news")."/".$row->id." class='list-group-item'>".$row->title."</a>";
				}
			$return .="</div>";					
			$return .='</div>';
			$return .= '</div>';		

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

  