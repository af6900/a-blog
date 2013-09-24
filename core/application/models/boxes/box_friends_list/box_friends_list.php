<?php
class box_friends_list extends CI_Model
{
	public function initialize(){

			$count = $this->boxes_model->configuration_kay('COUNT_FRIEND_LIST');
			
		   $friends = $this->lib_database->limit('friends',NULL, $count);
		   	$return = '<div class="panel panel-default text-right dir-rtl">';
			$return .= '<div class="panel-heading">';
			$return .= '<label class="panel-text">لیست دوستان</label>';
			$return .= '</div>';
			$return .= '<div class="panel-body">';
			$return .= "<div class='list-group'>";
			foreach ($friends as $row){
				$return .= "<a href='".$row->link."' class='list-group-item'>".$row->name."</a>";
				}
			$return .="</div>";					
			$return .='</div>';
			$return .= '</div>';
		
			
			
		return $return;	
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
		
		$return = array (array('title'=>'لیست دوستان',
						'kay'=>'COUNT_FRIEND_LIST',
						'value'=>'10',
						'description'=>'تعداد دوستان قابل نمایش',
						'box_name'=>'BOX_FRIENDS_LIST',
						'use_input'=>'text_value()',
						'set_input_value'=>'10'));
						
		return $return;
		}
	
	public function configuration_install(){
			
		}	
}/*end ?>*/
/* BOX_FRIENDS_LIST */
  