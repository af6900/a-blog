<?php
class box_polls extends CI_Model
{
	public function initialize(){
			
		$get_poll = $this->lib_database->get('polls',NULL,NULL,'id_polls');
			foreach($get_poll as $row){
			$get_answer = $this->lib_database->get('polls_answer',NULL,array('id_poll'=>$row->id_polls),'id_answer');
			
			$return = '<div class="panel panel-default text-right">';
			$return .= '<div class="panel-heading">';
			$return .= '<label class="panel-text">'.$row->polls_title.'</label>';
			$return .= '</div>';
			$return .= '<div class="panel-body">';
			$return .= "<div class='list-group'>";    
    		$return .= '<input type="hidden" value="'.get_ip_Address().' id="user_ip"/>';
			$return .= '<input type="hidden" value="'.$row->id_polls.'id="polls_id"/>';
			 
			 foreach($get_answer as $answer_row){
				 $return .='<a class="list-group-item">';
				 $return .= '<input type="radio" name="polls" class="radio" value="'.$answer_row->id_answer.'"/>'.$answer_row->answer_title;
				 $return .='</a>';
					 }
			
			
		   $return .="</div>";					
			$return .='</div>';
			$return .= '</div>';
		}			
		return $return;
	}
	
	public function model_install(){

		$title = 'نظر سنجی';
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
			
		}
}

      

