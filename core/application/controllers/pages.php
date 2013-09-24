<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pages extends AB_Controller {
	      
	// Frontend site v 1.0.1 
   public function __construct()
    {
        parent::__construct();

    }
	public function index(){
		
		$page = $this->lib_database->get('pages',NULL,array('enTitle'=>$this->uri->segment(2)));
		foreach($page as $row){
			$data = array('enTitle'=>$row->enTitle,
							'title'=>$row->title,
							'keywords'=>$row->keywords,
							'discription'=>$row->discription,
							'option'=>$row->option);
			}
		$this->template->out($data);

	}

}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */