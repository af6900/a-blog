<?php
class box_author extends CI_Model
{
	public function initialize(){
			$count = $this->boxes_model->configuration_kay('COUNT_AUTHOR');
		    $author = $this->lib_database->group_by('article','author',$count);
		    $return = '<div class="panel panel-default text-right">';
			$return .= '<div class="panel-heading">';
			$return .= '<label class="panel-text">نویسندگان</label>';
			$return .= '</div>';
			$return .= '<div class="panel-body">';
			$return .= "<div class='list-group'>";
			foreach ($author as $row){
				$return .= "<a href='".site_url('author/'.$row->author)."' class='list-group-item'>".$row->author."</a>";
				}
			$return .="</div>";					
			$return .='</div>';
			$return .= '</div>';
		 return $return;
	}
	
	public function model_install(){	
		$title = 'لیست نویسندگان';
						
		return $title;
		}
	
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
	
	
	
	public function configuration_install(){
		
				$return = array (array('title'=>'لیست نویسندگان',
						'kay'=>'COUNT_AUTHOR',
						'value'=>'10',
						'description'=>'تعداد نویسندگان ',
						'box_name'=>'box_author',
						'use_input'=>'text_value()',
						'set_input_value'=>'10'));
				return $return;	
		}	
}/*end ?>*/
/* BOX_FRIENDS_LIST */
  