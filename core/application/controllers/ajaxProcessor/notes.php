<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notes extends Admin_Controller {
	      

   public function __construct()
    {
        parent::__construct();	
    }

	public function index()  
    {
	    $this->db->cache_delete('ajaxProcessor', 'notes');
	    echo $this->lib_database->get_filde('a_notes',NULL,'text');
	  
	}
	
	public function save(){
		$data = array(
					'text'=>$this->input->get('text',TRUE),
					);
		$this->lib_database->save('a_notes',$data,array('id'=>1));
		echo json_decode('1'); 
	}

	
}
