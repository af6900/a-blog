<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pages extends AB_Controller {
	      

   public function __construct()
    {
        parent::__construct();	
    }

	public function index()  
    {
		  
	}
	public function delete(){
		 $this->db->cache_delete('ajaxProcessor', 'page');
		$this->lib_database->delete('pages',array('id'=>$this->input->get('id')));
		echo json_decode('1');
		}	
	
}
