<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class off extends CI_Controller {
	      
	
   public function __construct()
    {
        parent::__construct();

    }
	public function index(){

		$web = $this->model_web_config->get();
		foreach($web as $row){
			$data['WebOff']         = $row->WebOff;
			$data['OffDescription'] = $row->OffDescription; 
				}

			if($data['WebOff']== 1 or $this->session->userdata('is_logged_in') === TRUE ){
				redirect('site');
				}
							
			$this->load->view("../../../templates/system/off",$data);					
	}
}

/* End of file site.php */
/* Location: ./blog/controllers/site.php */