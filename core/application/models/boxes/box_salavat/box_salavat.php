<?php
class box_salavat extends CI_Model
{
	public function initialize(){
		    $return = '<script language="javascript" src="'.site_url('assets/models/box_salavat/javascript/salavat.js').'"></script>';
			$return .= '<div class="panel panel-default text-right">';
			$return .= '<div class="panel-heading">';
			$return .= '<label class="panel-text">صلوات شمار</label>';
			$return .= '</div>';
			$return .= '<div class="panel-body">';
		    $return .= '<center>';
			$return .= "<img id='salavat' src= '".site_url('assets/models/box_salavat/images/btn.png')."' alt='نوشته های یک مبتدی'/>";
			$return .= "</center>";
			$return .= "<div><center><span class='badge divSalavat'></span></center></div>";						
			$return .='</div>';
			$return .= '</div>';
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



   
    
   
    
    