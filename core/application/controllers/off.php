<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class off extends CI_Controller {
	      
	
   public function __construct()
    {
        parent::__construct();

    }
	public function index(){


			$data['WebOff']         = $this->lib_database->get_filde('web_config',array('id'=>1),'WebOff');
			$data['OffDescription'] =  $this->lib_database->get_filde('web_config',array('id'=>1),'OffDescription'); 


			if($data['WebOff']== 1 or $this->session->userdata('is_logged_in') === TRUE ){
				redirect('site');
				}
							
			$this->load->view("system/off",$data);					
	}
}

/* End of file site.php */
/* Location: ./blog/controllers/site.php */