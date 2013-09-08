<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_ablog
{
	protected $CI;
	
	public function __construct($rules = array())
	{
		$this->CI =& get_instance();

	}
	 public function a_hash( $pass )
	 {
		  $salt = '#4osKp86d}.aO_J@QRoN_psk>q#45?';
		  $salt1 = "eaf66a7604370019def1ae85757c0b9553dbd1e0";
		  $password = do_hash(md5($salt . $pass . $salt1));
		  $hash = do_hash(sha1(base64_encode(md5($salt . $password . $salt1))));
		  return $hash;
	 }
	
	
	public function match_captch($captcha){
		
		$query = $this->CI->db->limit(1)->get_where('a_captcha', array('captcha' => $captcha));
		if($query->num_rows() == 0){
			return false;
			}else{
				return true;
				}
		}
	
	//==-- pagination code --==\\
	public function PageCount($controller = NULL, $total_rows = NULL, $per_page = NULL, $segment = NULL){
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
			  
			  $this->CI->pagination->initialize($config);
			  $count = $this->CI->pagination->create_links();
    		  return $count;	
	
		}
		
}
 