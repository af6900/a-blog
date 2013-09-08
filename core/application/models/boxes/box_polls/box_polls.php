<?php
class box_polls extends CI_Model
{
	public function initialize(){
			
		$get_poll = $this->lib_database->get('a_polls',NULL,NULL,'id_polls');
		foreach($get_poll as $row){
			$get_answer = $this->lib_database->get('a_polls_answer',NULL,array('id_poll'=>$row->id_polls),'id_answer');
			 $return = '<div class="boxTitle">'.$row->polls_title.'</div>';
			 				     
    		 $return .= '<input type="hidden" value="'.$_SERVER['REMOTE_ADDR'].'id="user_ip"/>';
			 $return .= '<input type="hidden" value="'.$row->id_polls.'id="polls_id"/>';
			 
			 foreach($get_answer as $answer_row){
				 $return .='<ul class="UlLeftMenu">';
				 $return .='<li class="LiRightMenu">';
				 $return .= '<input type="radio" name="polls" class="radio"   value="'.$answer_row->id_answer.'"/>'.$answer_row->answer_title;
				 $return .='</li>';
				 $return .='</ul>';
				 }
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

      

