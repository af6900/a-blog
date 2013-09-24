<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends AB_Controller {
	      
	// Frontend site v 1.0.1 
   public function __construct()
    {
        parent::__construct();

    }
	public function index(){
		
		$search = $this->model_search->search();
		if($search == FALSE){
			redirect('index');
			}else{
				$data['search'] = $search;		
				}	
		$this->template->out($data);

	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */