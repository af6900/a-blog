<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
*   aBlog cms
*	www.a-blog.ir
*	@author  Afshin Nj 
*/

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



function status(){
	    $CI =& get_instance();
		$text = '';
		$count = $CI->lib_database->count_all('status');
		$result = $CI->lib_database->limit('status',array('date'=>date('Ymd')),1);
		foreach($result as $row){
			$text = $row->text;
			$id = $row->id;
			}
		if(isset($id)){
			$CI->lib_database->save('status',array('date'=>date('Ymd')+1),array('id <'=>$id));
			$CI->lib_database->save('status',array('date'=>date('Ymd')+1),array('id >'=> $id));
			}
		?>
		<script type='text/javascript' src='<?php assets("js/jquery.ticker.js")?>'></script>
        <script type="text/javascript" language="javascript">
		$(document).ready(function(e) {
			  $('#js-news').ticker({
				  speed: 0.10,           
				  ajaxFeed: false,       
				  feedUrl: false,       
									
				  feedType: 'xml',       
				  htmlFeed: true,        
				  debugMode: true,       
									 
				  controls: false,        
				  titleText: 'کلام روز »',   
				  displayType: 'reveal', 
				  direction: 'rtl',       
				  pauseOnItems: 2000,    
				  fadeInSpeed: 300,     
				  fadeOutSpeed: 300     
			  });           
        });
	
        </script>
        <?php
		
        $status = "
			<div class='panel dir-rtl BYekan status'>
				<div class='panel-body status'>
					<ul id='js-news' class='js-hidden'>
					  <li class='ticker-swipe'>".$text."</li>
					</ul>
				</div>
            </div> ";
		return $status ;

}


/* Start captcha punction */

function captcha(){
			$CI =& get_instance();
			$r = rand(111111,999999);
			$captcha = rand(111111,$r);
			$CI->lib_database->save('captcha',array('time'=>time(), 'captcha'=>$captcha)); 
			
			$expire = time()- 320;
			$CI->lib_database->delete('captcha',array('time <'=>$expire));
			
		$vals = array(
			'word' => $captcha,
			'img_path' => './temporary/captcha/',
			'img_url' => site_url().'temporary/captcha/',
			'font_path' => './assets/fonts/texb.ttf',
			'img_width' => 120,
			'img_height' => 30,
			'expiration' => 320
			);
		   $cap = create_captcha($vals);
		  return $cap['image']; 
}
/* end captcha punction */


function match_captch($captcha)
{
		$CI =& get_instance();
		$query = $CI->db->limit(1)->get_where('captcha', array('captcha' => $captcha));
		if($query->num_rows() == 0){
			return false;
			}else{
				return true;
				}
}


function communique()
{

	 $CI =& get_instance();
	     $where = "startPublic <= ".adate(2)." AND endPublic >= ".adate(2)."";
 	     $communique = $CI->lib_database->get('communique',NULL,$where);
		foreach ($communique as $row){
			echo '<div class="panel dir-rtl BKoodakBold communique" >';
				echo '<div class="panel-body">';
					echo $row->text;
				echo '</div>';
			echo '</div>';
		}
}











if(! function_exists('add_box'))
{
	function add_box($position = NULL){
		$CI =& get_instance();
			$CI->db->order_by('row');
			$CI->db->where('position',$position);
			$CI->db->where('active',1); 
			$po = $CI->db->get('block')->result();
			
		foreach($po as $row){
			  if($row->box !='0'){
				   $box = $CI->lib_database->get('boxes',NULL,array('id'=>$row->box)); 
					foreach($box as $rows){ 
						$name = $rows->name;
						$CI->load->model("boxes/".$name."/".$name."",'',TRUE);
						echo $CI->$name->initialize($row->name)."\n";
					}
				  } 
			}
	}

}





if( ! function_exists('encrypt'))
{
    function encrypt($encrypt)
    {
		$CI =& get_instance();
        $password = '';
    	  $salt = $CI->config->item('encryption_key') . '#4osKp86d}.aO_J@QRoN_psk>q#45?';
		  $salt1 = $CI->config->item('encryption_key') . "eaf66a7604370019def1ae85757c0b9553dbd1e0";
		  $hash = do_hash(md5($salt . $encrypt . $salt1));
		  $password = do_hash(sha1(base64_encode(md5($salt . $hash . $salt1))));

        return $password;
    }
}


if( ! function_exists('adate'))
{
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
}



if( ! function_exists('PageCount'))
{
	function PageCount($total_rows = NULL, $page = NULL ,$section = NULL, $segment = NULL){
			$CI =& get_instance();	
		      $config['base_url'] = site_url($page.'/'.$section);
			  $config['total_rows'] = $total_rows;
			  $config['per_page'] = 5;
			  
			  $config['next_link'] = TRUE;
			  $config['prev_link'] = TRUE;
			  
			  $config['last_link'] = FALSE;
			  
			  $config['last_tag_open'] = '<li>';
			  $config['last_tag_close'] = '</li>';
			  
			  $config['first_link'] = FALSE;
			  $config['next_tag_open'] = '<li>';
			  $config['next_tag_close'] = '</li>';
			  
			  $config['uri_segment'] = $segment;
			  
			  $config['num_links'] = 1;
			  
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
			  
			  
			  $config['display_pages'] = TRUE; 
			  
			  $CI->pagination->initialize($config);
			  $count = $CI->pagination->create_links();
			  return $count;	
		}
}