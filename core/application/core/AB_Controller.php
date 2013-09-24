<?php
class AB_Controller extends CI_Controller {
	
		function __construct() {
			parent::__construct();

				$this->lang->initialize();
				$this->output->set_header('Content-Type: text/html; charset=' . $this->lang->get_character_set());
				setlocale(LC_TIME, explode(',', $this->lang->get_locale()));
				
			     $this->lang->set('fa_IR');
				 
		     $web = $this->lib_database->get_filde('web_config',array('id'=>1),'WebOff');
     		 if($web == 0 and $this->session->userdata('is_logged_in') === FALSE){
				redirect('off');
				}
				
			    delete_files('./temporary/temp/', TRUE);

			}
			
			

}