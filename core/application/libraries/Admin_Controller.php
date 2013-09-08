<?php
class Admin_Controller extends MY_Controller
{

function __construct ()
	{
		parent::__construct();
		$this->CI =& get_instance();
		
		
		
		
		
		if($this->session->userdata('is_logged_in') === FALSE){
			redirect('login');
			}
	
	}




public function out($folder ='panel', $name = 'panel', $data= array('not_things'=>'empty'))
	{
		if ( ! file_exists("core/application/views/admin/".$folder."/".$name.".php"))
			{
				show_404();
    		}
        $data['UserName'] = $this->CI->session->all_userdata(); 
		$this->CI->load->view('admin/panel/header',$data);
		$this->CI->load->view("admin/$folder/$name"); 
		$this->CI->load->view("admin/panel/footer");
    }			


}