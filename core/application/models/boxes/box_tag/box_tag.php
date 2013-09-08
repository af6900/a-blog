<?php
class box_tag extends CI_Model
{
	public function initialize(){
		$web = $this->model_web_config->get();
		$return = '<div class="boxTitle">تگ بازار</div>';
		foreach($web as $row){
			$Keywords= $row->Keywords;
				}
			$return .='<div class="Tag">';
			$tag = explode(',',$Keywords);
			foreach($tag as $row){
				$return .='<a href="'.site_url().'">'.$row.'</a>';
				}
				
			$return .= '</div>';
		return $return;	
	}
	
	public function model_install(){
		

	}
		
	public function configuration_install(){
			
	}	
	
}




    	
		
			

	