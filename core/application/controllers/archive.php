<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class archive extends AB_Controller {
	      
	// Frontend site v 1.0.1 
   public function __construct()
    {
        parent::__construct();

    }
	public function index(){
		
	    $total_rows 		= $this->section_model->count_db();
		$section		   = $this->uri->segment(2);
		$data['page']	  = NULL; //$this->PageCount($total_rows, 'section', $section, '4' );
		$data['article']   = $this->lib_database->get('article','result',array('archiveDate'=>$section));
		$this->template->out($data);
		

	}


}

/* End of file archive.php */
/* Location: ./blog/controllers/site.php */