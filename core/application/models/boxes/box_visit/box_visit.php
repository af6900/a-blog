<?php
class box_visit extends CI_Model
{
	public function initialize(){
		
		$db_date = $this->lib_database->get_filde('a_visit',NULL,'date');
		if($db_date < date('Ymd')){
				
			$this->lib_database->save('a_visit',array('date'=>date('Ymd')),array('id'=>1));
			$this->lib_database->save('a_visit',array('week'=>$this->lib_database->get_filde('a_visit',NULL,'dey')),array('id'=>1));
			$this->lib_database->save('a_visit',array('dey'=>1),array('id'=>1));
			$this->lib_database->empty_table('a_useronline');
			
			}
		
		/* user online */
		$result = $this->lib_database->get('a_useronline','row',array('ip'=>$_SERVER['REMOTE_ADDR']),'ip');
		if($result == FALSE ){
			$this->lib_database->save('a_useronline',array('ip'=>$_SERVER['REMOTE_ADDR'],'time'=>date('Ymd')));
			}
		
		
		/* dey visit */	
		$dey = 1 + $this->lib_database->get_filde('a_visit',NULL,'dey');
		$this->lib_database->save('a_visit',array('dey'=>$dey),array('id'=>1));
		/* total */
		$total = 1 + $this->lib_database->get_filde('a_visit',NULL,'total');
		$this->lib_database->save('a_visit',array('total'=>$total),array('id'=>1));
		
		$return = '<div class="boxTitle">آمار</div>';
		$return .= '<ul class="UlLeftMenu">';
		$return .= "<li class='LiRightMenu'>"."کاربر:".$this->lib_database->count_all('a_useronline')."</li>";
		$return .= "<li class='LiRightMenu'>"."امروز:".$this->lib_database->get_filde('a_visit',NULL,'dey')."</li>";
		$return .= "<li class='LiRightMenu'>"."دیروز:".$this->lib_database->get_filde('a_visit',NULL,'week')."</li>";
		$return .= "<li class='LiRightMenu'>"."کل:".$this->lib_database->get_filde('a_visit',NULL,'total')."</li>";
		$return .= "<li class='LiRightMenu'>"."آی پی:".$_SERVER['REMOTE_ADDR']."</li>";
		$return .= '</ul>';
		return $return;
	}
	
	public function model_install(){

		
		$title = 'آمار بازدید کننده ها';
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

      

