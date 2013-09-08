<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
	//box helper v 1.0.0 beta 1/2/1392
	

function add_box($position = NULL){
	$CI =& get_instance();
		$CI->db->order_by('row');
		$CI->db->where('position',$position);
		$CI->db->where('active',1); 
		$po = $CI->db->get('a_block')->result();
		
	foreach($po as $row){
		  if($row->box !='0'){
			   $box = $CI->lib_database->get('a_boxes',NULL,array('id'=>$row->box)); 
				foreach($box as $rows){ 
					$name = $rows->name;
					$CI->load->model("boxes/".$name."/".$name."",'',TRUE);
					echo $CI->$name->initialize($row->name);
				}
			  } 
		}
}
	

function edit_box($id){
		$CI =& get_instance();
		$CI->db->where('id',$id);
		$data = $CI->db->get('a_boxes');
		foreach($data->result() as $row){
			$box_name = $row->name;
			$box_title = $row->title;
			}
		$CI->db->where('box_name',$box_name);	
		$data = $CI->db->get('a_configuration');	
		$data->result();
		$return = '<input type="hidden" name="box_name" value="'.$box_name.'"/>';
	    $return .='<table border="0" dir="rtl" width="100%">';
    	$return .='<tr>';
        $return .='<td width="70px;" align="left">عنوان :</td>';
        $return .='<td>'.$box_title.'</td>';
        $return .='</tr>';
        foreach($data->result() as $row){
        
		 if($row->use_input == 'text_value()'){
			$input = '<input type="text" value="'.$row->value.'" name="'.$row->kay.'"/>';
			}
			
		if($row->use_input == 'textarea_value()'){
			$input = '<textarea name="'.$row->kay.'">'.$row->value.'</textarea>';
			}
			
		if($row->use_input == 'select_option()'){
			$input = '<select name='.$row->kay.'>';
			$value = explode(',',$row->set_input_value);
			foreach($value as $op){
				$input .="<option>";
				$input .= $op;
				$input .="</option>";
				}
			$input.='</select>';
			
			}		
	
        $return .='<tr>';
        $return .='<td></td>';
        $return .='<td>'.$row->description.'</td>';
        $return .='</tr>';
        $return .='<tr>';
        $return .='<td></td>';
        $return .='<td>'.$input.'</td>';
        $return .='</tr>';
		}
        $return .='<tr>';
        $return .='<td align="left"></td>';
        $return .='<td><input type="submit" value="ذخیره"/></td>';
        $return .='</tr>';
        $return .='</table>';
		echo $return;
	}