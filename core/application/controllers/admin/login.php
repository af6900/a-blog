<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
		
		$this->db->cache_off();
		$this->db->cache_delete('admin_logout','index');
		$this->db->cache_delete('login', 'index');
		$this->db->cache_delete('validate_credentials', 'index');
	    $this->db->cache_delete('validate_code', 'index');
		
    }
	
	public function index(){

		$this->ip_banned->banned();
		$this->load->view('admin/Login/login'); 
		}
		
	public function validate_credentials(){
		
		
		$userName = htmlspecialchars(mysql_real_escape_string($this->input->get('name',TRUE)),ENT_QUOTES);
		$pass     = htmlspecialchars(mysql_real_escape_string($this->input->get('pass',TRUE)),ENT_QUOTES);
		$query = array('LoginName'=>$userName,'LoginPass'=>trim($this->ablog->a_hash($pass)));
		$result = $this->lib_database->can_log_in('admin_user',$query);
		$image = $this->lib_database->get_filde('admin_user',array('LoginName'=>$userName),'UserAvatar');
		$name = $this->lib_database->get_filde('admin_user',array('LoginName'=>$userName),'name');
		if($result == 1){
				$login = $this->lib_database->get_filde('web_config',array('id'=>1),'login');
				if($login == 1){
						$code = rand(111111,999999);
						$email = $this->lib_database->get_filde('admin_user',array('LoginName'=>$userName),'UserEmail');
						$mobile = $this->lib_database->get_filde('admin_user',array('LoginName'=>$userName),'UserMobile');
						$id = $this->lib_database->get_filde('admin_user',array('LoginName'=>$userName),'id');


						$newCode = $this->ablog->a_hash($code);
						$userData = array('validateCode'=>$newCode);	
						$this->model_admin_users->save($userData,$id);
						if($this->web_config->get_send_sms() == 1){
							$this->sms->send("کد امنیتی: $code",$mobile);
							}
						if($this->web_config->get_send_email() == 1){
							$this->password_reset->send_validate_code($email,$code);
							}		
						echo json_encode('validate_code');
						
					}else{
					   $data = array('avatar'=>$image,'name'=>$name,'is_logged_in'=>1);
		  			   $this->session->set_userdata($data);
					   echo json_encode('admin');
						}			
			}else{
				
				echo json_encode('login');
				
				}
		
		}
	public function user_logout(){
		$this->session->sess_destroy();
		redirect('login');
		}
	
	public function passReset(){
			$email = $this->input->get('email');
			$a = $this->password_reset->validate_user('admin_user',array('UserEmail'=>$email));
			echo json_encode($a);
		}
		
	public function validate_code(){

		 $input_code = $this->input->post('validate_code',TRUE);
		if($input_code !=""){
			$user_Name =  $this->model_admin_users->get_one(array('validateCode'=>$this->ablog->a_hash($input_code)),'LoginName');
			$hash_code =  $this->model_admin_users->get_one(array('validateCode'=>$this->ablog->a_hash($input_code)),'validateCode');
			$image = $this->model_admin_users->get_one(array('LoginName'=>$user_Name),'UserAvatar');
			$name = $this->lib_database->get_filde('admin_user',array('LoginName'=>$user_Name),'name');
		if($hash_code == $this->ablog->a_hash($input_code)){
			$data = array('avatar'=>$image,'security_code'=>$hash_code,'name'=>$name,'is_logged_in'=>1);
		    $this->session->set_userdata($data);
				redirect('admin');	
			}else{
				redirect('login');
				}	
		}
		$this->load->view('admin/Login/validate_code'); 
		}			

	public function banned(){
		$this->load->view('admin/Login/banned');
		}
}/* end { */

/* End of file login.php */
/* Location: ./blog/controllers/login.php */