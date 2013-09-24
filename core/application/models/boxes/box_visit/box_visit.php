<?php
class box_visit extends CI_Model
{
	public function initialize(){
		$this->db->cache_off();
		$db_date = $this->lib_database->get_filde('visit',NULL,'date');
		if($db_date < date('Ymd')){
				
			$this->lib_database->save('visit',array('date'=>date('Ymd')),array('id'=>1));
			$this->lib_database->save('visit',array('week'=>$this->lib_database->get_filde('visit',NULL,'dey')),array('id'=>1));
			$this->lib_database->save('visit',array('dey'=>1),array('id'=>1));
			$this->lib_database->empty_table('useronline');
			
			}
		
		/* user online */
		$result = $this->lib_database->get('useronline','row',array('ip'=>$_SERVER['REMOTE_ADDR']),'ip');
		if($result == FALSE ){
			$this->lib_database->save('useronline',array('ip'=>$_SERVER['REMOTE_ADDR'],'time'=>date('Ymd')));
			}
		
		
		/* dey visit */	
		$dey = 1 + $this->lib_database->get_filde('visit',NULL,'dey');
		$this->lib_database->save('visit',array('dey'=>$dey),array('id'=>1));
		/* total */
		$total = 1 + $this->lib_database->get_filde('visit',NULL,'total');
		$this->lib_database->save('visit',array('total'=>$total),array('id'=>1));
		
			$return = '<div class="panel panel-default text-right dir-rtl">';
			$return .= '<div class="panel-heading">';
			$return .= '<label class="panel-text">آمار</label>';
			$return .= '</div>';
			$return .= '<div class="panel-body">';
			$return .= "<div class='list-group'>";
			$return .= "<a href='#' class='list-group-item'>"."کاربر <span class='badge pull-left'>".$this->lib_database->count_all('useronline')."</span></a>";
			$return .= "<a href='#' class='list-group-item'>"."امروز <span class='badge pull-left'>".$this->lib_database->get_filde('visit',NULL,'dey')."</span></a>";
			$return .= "<a href='#' class='list-group-item'>"."دیروز <span class='badge pull-left'>".$this->lib_database->get_filde('visit',NULL,'week')."</span></a>";
			$return .= "<a href='#' class='list-group-item'>"."کل <span class='badge pull-left'>".$this->lib_database->get_filde('visit',NULL,'total')."</span></a>";
			$return .= "<a href='#' class='list-group-item'>"."آی پی <span class='badge pull-left'>".get_ip_address()."</span></a>";
			$return .="</div>";					
			$return .='</div>';
			$return .= '</div>';
		
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

      

