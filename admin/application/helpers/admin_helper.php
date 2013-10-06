<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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
	echo site_url('assets/'.$url);	
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
	
	$tem =  $CI->lib_database->get_filde('templates',array('active'=>1),'name');
	$xml = simplexml_load_file(site_url('../templates/'.$tem.'/templateDetails.xml'));
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
 
 

if (!function_exists('get_ip_address'))
{
    function get_ip_address()
    {
        if (isset($_SERVER))
        {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            elseif (isset($_SERVER['HTTP_CLIENT_IP']))
            {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
            else
            {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        }
        else
        {
            if (getenv('HTTP_X_FORWARDED_FOR'))
            {
                $ip = getenv('HTTP_X_FORWARDED_FOR');
            }
            elseif (getenv('HTTP_CLIENT_IP'))
            {
                $ip = getenv('HTTP_CLIENT_IP');
            }
            else
            {
                $ip = getenv('REMOTE_ADDR');
            }
        }

        return $ip;
    }
}

/**
 * Encrypt password
 *
 * @access public
 * @param $plian
 * @return string
 */
if( ! function_exists('encrypt'))
{
    function encrypt($encrypt)
    {
		$CI =& get_instance();
        $password = '';

		  $salt = '#4osKp86d}.aO_J@QRoN_psk>q#45?';
		  $salt .= $CI->config->item('encryption_key');
		  $salt1 = $CI->config->item('encryption_key');
		  $salt1 .="eaf66a7604370019def1ae85757c0b9553dbd1e0";
		  $hash= do_hash(md5($salt . $encrypt . $salt1));
		  $password = do_hash(sha1(base64_encode(md5($salt . $hash . $salt1))));

        return $password;
    }
}


function get_web_title(){
		$CI =& get_instance();
		return $CI->lib_database->get_filde('web_config',array('id'=>1),'Web_Title');
		}/* end web title */
		

function get_admin_email(){
		$CI =& get_instance();
		return $CI->lib_database->get_filde('web_config',array('id'=>1),'Admin_Email');
		}/* end admin email */
		
		
function get_login(){
		$CI =& get_instance();
		 return $CI->lib_database->get_filde('web_config',array('id'=>1),'login');	
		}/* login */
		
		
function get_send_email(){
		$CI =& get_instance();
		return $CI->lib_database->get_filde('web_config',array('id'=>1),'email');	
		}/* email */
		
		
		
function get_send_sms(){
		$CI =& get_instance();
		return $CI->lib_database->get_filde('web_config',array('id'=>1),'sms');			
		}/* sms */
		
		
function get_cache(){
		$CI =& get_instance();
		return $CI->lib_database->get_filde('web_config',array('id'=>1),'cache');
		}
		
		
function get_keywords(){
		$CI =& get_instance();
		return $CI->lib_database->get_filde('web_config',array('id'=>1),'Keywords');
		}
		
function get_description(){
		$CI =& get_instance();
		return $CI->lib_database->get_filde('web_config',array('id'=>1),'Description');
		}
		
		
function start_cache(){
		      $CI =& get_instance();
			if($this->get_cache() == 1){
				$CI->output->cache(1);
			}
		}
		
		
		
/**

ویرایش باکس های نصب شده

*/		
function edit_box($id){
		$CI =& get_instance();
		$CI->db->where('id',$id);
		$data = $CI->db->get('boxes');
		foreach($data->result() as $row){
			$box_name = $row->name;
			$box_title = $row->title;
			}
		$CI->db->where('box_name',$box_name);	
		$data = $CI->db->get('configuration');	
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
	
 function PageCount($controller = NULL, $total_rows = NULL, $per_page = NULL, $segment = NULL){
	 
	 		  $CI =& get_instance();
				
		      $config['base_url'] = site_url($controller);
			  $config['total_rows'] = $total_rows;
			  $config['per_page'] = $per_page;
			  
			  $config['next_link'] = FALSE;
			  $config['prev_link'] = FALSE;
			  
			  $config['last_link'] = FALSE;
			  $config['first_link'] = FALSE;
			  
			  $config['uri_segment'] = $segment;
			  
			  $config['num_links'] = 20;
			  
			  $config['cur_tag_open'] = '<li><a>';
			  $config['cur_tag_close'] = '</a></li>';
			  
			  $config['num_tag_open'] = '<li>';
    		  $config['num_tag_close'] = '</li>';
			  
			  $config['next_link'] = '&laquo;';
			  $config['next_tag_open'] = '<li>';
			  $config['next_tag_close'] = '</li>';
			  
			  $config['prev_link'] = '&raquo;';
			  $config['prev_tag_open'] = '<li>';
			  $config['prev_tag_close'] = '</li>';
			  
			  $CI->pagination->initialize($config);
			  $count = $CI->pagination->create_links();
    		  return $count;	
	
		}
		
function ajax_upload($path = NULL){
	?>
	<form id="upload" method="post" action="ajaxUpload" enctype="multipart/form-data">
    		<input type="hidden" name="path" value="<?php echo $path; ?>">
			<div id="drop">
				Drop Here

				<a>Browse</a>
				<input type="file" name="upl" />
			</div>

			<ul>
				<!-- The file uploads will be shown here -->
			</ul>
		</form>
        
	    <link href="<?php echo site_url('assets/upload/css/style.css')?>" rel="stylesheet" />
		<script src="<?php echo site_url('assets/upload/js/jquery.knob.js')?>"></script>
        <script src="<?php echo site_url('assets/upload/js/jquery.ui.widget.js')?>"></script>
	    <script src="<?php echo site_url('assets/upload/js/jquery.iframe-transport.js')?>"></script>
        <script src="<?php echo site_url('assets/upload/js/jquery.fileupload.js')?>"></script>
  		<script src="<?php echo site_url('assets/upload/js/script.js')?>"></script>
	 <?php
	}		