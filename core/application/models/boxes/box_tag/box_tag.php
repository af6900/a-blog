<?php
class box_tag extends CI_Model
{
	public function initialize(){
		   $Keywords = $this->lib_database->get_filde('web_config',array('id'=>1),'Keywords');
			$return = '<div class="panel panel-default text-right">';
			$return .= '<div class="panel-heading">';
			$return .= '<label class="panel-text">تگ بازار</label>';
			$return .= '</div>';
			$return .= '<div class="panel-body">';
				$tag = explode(',',$Keywords);
				foreach($tag as $row){
					$return .='<a href="'.site_url().'" >'.$row.'</a> ';
					}
			$return .='</div>';
			$return .= '</div>';	
			
		return $return;	
	}
	
	public function model_install(){
		

	}
		
	public function configuration_install(){
			
	}	
	
}




    	
		
			

	