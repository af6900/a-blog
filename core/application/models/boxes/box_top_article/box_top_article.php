<?php
class box_top_article extends CI_Model
{
	public function initialize(){
		
		    $articlevisit = $this->lib_database->limit('article',array('visit >='=>1),7,NULL,'visit','DESC');
		   	$return = '<div class="panel panel-default text-right dir-rtl">';
			$return .= '<div class="panel-heading">';
			$return .= '<label class="panel-text">بهترین نوشته ها</label>';
			$return .= '</div>';
			$return .= '<div class="panel-body">';
			$return .= "<div class='list-group'>";
			foreach ($articlevisit as $row){
				$return .="<a class='list-group-item' href='".site_url('summary'.'/'.rawurlencode(str_replace(' ','-',urldecode($row->title))))."'>"
					.$row->title.'<span class="badge pull-left">'.$row->visit .'</span>'."</a>";			
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
		
		$return = array (array('title'=>'بهترین نوشته ها'));
						
						
		return $return;
		}
		
		public function configuration_install(){
			
		}
}

      

