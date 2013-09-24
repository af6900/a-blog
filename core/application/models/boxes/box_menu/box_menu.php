<?php
class box_menu extends CI_Model
{
	public function initialize($name){
		
			$block = $this->lib_database->get_filde('block',array('name'=>$name),'id');
			$position = $this->lib_database->get_filde('block',array('name'=>$name),'position');
			$menu = $this->lib_database->get('menu',NULL,array('block'=>$block),'id','DESC');
			if($position == 'top'){
				foreach ($menu as $row){
					$return = "<li>";
					$return .= "<a href=".site_url($row->link).">".$row->name."</a>";
					$return .= "</li>";
					echo $return;
					}
				
			}else{
				
				$return = '<div class="panel panel-default text-right">';
				$return .= '<div class="panel-heading">';
				$return .= '<label class="panel-text">'.$name.'</label>';
				$return .= '</div>';
				$return .= '<div class="panel-body">';
				$return .= "<div class='list-group'>";
				foreach ($menu as $row){
					$return .= "<a href='".site_url($row->link)."' class='list-group-item'>".$row->name."</a>";
					}
				$return .="</div>";					
				$return .='</div>';
				$return .= '</div>';
				return $return;						
				}

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
		
		$return = array (array('title'=>'منو'));
						
		return $return;
		}
		
		
		public function configuration_install(){
			
		}
	
}/*end ?>*/
/* BOX_FRIENDS_LIST */
  