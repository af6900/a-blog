<?php
class box_salavat extends CI_Model
{
	public function initialize(){
			$return = '<div class="boxTitle">صلوات شمار</div>';
		    $return .= '<script language="javascript" src="'.base_url().'assets/models/box_salavat/javascript/salavat.js"></script>';
		    $return .= '<center>';
			$return .= "<img id='salavat' src= '".base_url()."assets/models/box_salavat/images/btn.png' alt='نوشته های یک مبتدی'/>";
			$return .= "</center>";
		    $return .= "<div class='divSalavat'><span class='salavat'></span></div>";	
		return $return;	
	}
	
	public function model_install(){
		$return = array (array('title'=>'صلوات شمار',
						'kay'=>'COUNT_SALAVAT',
						'value'=>'1',
						'description'=>'تعداد صلوات ها',
						'box_name'=>'BOX_SALAVAT',
						'use_input'=>'text_value()',
						'set_input_value'=>''));
						
		return $return;
		
		}	

  	public function configuration_install(){
			
		}	
}



   
    
   
    
    