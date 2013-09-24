<?php
class AB_Controller extends CI_Controller {
	
		function __construct() {
			parent::__construct();

			if($this->session->userdata('is_logged_in') === FALSE){
				redirect('login');
				}
			
				$this->lang->initialize();
				$this->output->set_header('Content-Type: text/html; charset=' . $this->lang->get_character_set());
				setlocale(LC_TIME, explode(',', $this->lang->get_locale()));
				
			     $this->lang->set('fa_IR');
			     delete_files('./temporary/temp/', TRUE);

			}
			
			
	public function out($folder ='panel', $name = 'panel', $data= array('not_things'=>'empty'))
		{

		    $this->CI =& get_instance();
			$data['UserName'] = $this->CI->session->all_userdata(); 
			$this->CI->load->view('panel/header',$data);
			$this->CI->load->view("$folder/$name"); 
			$this->CI->load->view("panel/footer");
		}			
			
}