<?php
class MY_Controller extends CI_Controller {
	
		function __construct() {
			parent::__construct();

				$this->lang->initialize();
				$this->output->set_header('Content-Type: text/html; charset=' . $this->lang->get_character_set());
				setlocale(LC_TIME, explode(',', $this->lang->get_locale()));
				
			     $this->lang->set('fa_IR');
				 
				
			    delete_files('./temporary/temp/', TRUE);

			}
}