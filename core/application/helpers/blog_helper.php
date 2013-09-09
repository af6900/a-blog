<?php
function btn_edit ($uri = NULL)
{
	return anchor($uri, '<i class="glyphicon glyphicon-edit"></i>');
}

function btn_delete ($uri = NULL)
{
	return anchor($uri, '<i class="glyphicon glyphicon-trash"></i>', array(
		'onclick' => "return confirm('بعد از حذف امکان برگشت وجود ندارد. ');"
	));
}

function btn_check ($uri = NULL)
{
	return anchor($uri, '<i class="glyphicon glyphicon-check"></i>');	
}

function btn_uncheck ($uri = NULL)
{
	return anchor($uri, '<i class="glyphicon glyphicon-remove"></i>');	
}

function btn_restore ($uri = NULL)
{
	return anchor($uri, '<i class="glyphicon glyphicon-repeat"></i>');	
}

function btn_archive ($uri = NULL)
{
	return anchor($uri, '<i class="glyphicon glyphicon-briefcase"></i>');	
}

function btn_new ($uri = NULL, $text = 'جدید')
{
	return anchor($uri, $text .'  '.'<span class="glyphicon glyphicon-plus-sign"></span>');	
}

function btn_download($uri = NULL){
	
	return anchor($uri,'<i class="glyphicon glyphicon-download-alt"></i>');
}

function btn_restor($uri = NULL){
	
	return anchor($uri,'<i class="glyphicon glyphicon-repeat"></i>');
}

function btn_email($uri = NULL){
	
	return anchor($uri,'<i class="glyphicon glyphicon-envelope"></i>');
}

function btn_cancel($url = NULL){
	$return ='<script language="javascript">$(document).ready(function(e){$("#btnCancel").click(function(){window.location = "'.site_url($url).'"})});</script>'; 
	$return .= '<button type="reset" class="btn btn-danger" id="btnCancel">انصراف</button>';
	return $return;
	}

function assets($url){
	echo site_url('assets/admin/'.$url);	
}
	
function section_dropdown($name = NULL, $data = array(), $selected = NULL, $attr = NULL)
{
	$array = array();
	foreach ($data as $filde) {
	   $array[$filde->id] = $filde->title;
	} 
	return form_dropdown($name, $array, $selected, $attr);

}

function block_dropdown($name = NULL, $data = array(), $selected = NULL, $attr = NULL)
{
	$array = array();
	foreach ($data as $filde) {
	   $array[$filde->id] = $filde->name;
	} 
	return form_dropdown($name, $array, $selected, $attr);
	
}

function position_dropdown($name = NULL, $selected = NULL, $attr = NULL)
{
	$CI =& get_instance();
	
	$tem = $CI->model_web_template->get_one(array('active'=>1),'name');
	$xml = simplexml_load_file(site_url('templates/'.$tem.'/templateDetails.xml'));
	$position = $xml->positions->position;
	$array = array();
	foreach($position as $row){
			$array["$row"] = $row;
			}
	
	return form_dropdown($name, $array, $selected, $attr);
}

function status_dropdown($name = NULL, $selected = NULL, $attr = NULL)
{
	$options = array('1'  => 'فعال','0'  => 'غیر فعال');          
	return form_dropdown($name, $options, $selected, $attr);
}

function messages($segment = NULL, $title = NULL, $successText =  NULL, $errorText = NULL){
		$CI =& get_instance();
		$uri = $CI->uri->segment(2);
		if($segment == 'success' OR $uri == 'success'){
			return '<div class="alert alert-success success dir-rtl">
					<button type="button" class="close pull-right" data-dismiss="alert">&times;</button>
					<h4>'.$title.'</h4>
					'.$successText.'
					</div>';
			}
	   if($segment == 'error' OR $uri == 'error') {
			return '<div class="alert alert-error success dir-rtl">
					<button type="button" class="close pull-right" data-dismiss="alert">&times;</button>
					<h4>'.$title.'</h4>
					'.$errorText.'
					</div>';			
			
			}
	
}

function adate($type = NULL, $format = NULL )
{
	    $CI =& get_instance();
		switch($type){
			case 1;
				$date = $CI->jalalidate->date("Y-m-d", false, false, true);
				break;
			case 2;
				$date = $CI->jalalidate->date("Ymd", false, false, true);
				break;
			case 3;
				$date = $CI->jalalidate->date("d/m/Y",NULL,FALSE);
				break;	
			case 4;
				$date = $CI->jalalidate->date("dmY",NULL,FALSE);
				break;
			case 5;
				$date = $CI->jalalidate->date($format,NULL,FALSE);
				break;				
			default:
				$date = $CI->jalalidate->date("l j F Y");
		}
	return $date;
}
 		
function news()
{
	 $CI =& get_instance();
		$start = adate(3);
 	    $new = $CI->lib_database->get('news',NULL,array('startDate <=' =>$start, 'endDate >='=> $start));
		foreach ($new as $row){
			echo '<div class="new">';
			 echo $row->description;
			echo '</div>';
		}
}

