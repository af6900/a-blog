<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WebTemplate extends AB_Controller {

   public function __construct()
    {
        parent::__construct();

    }
	public function index(){
		
		$data['template'] = $this->lib_database->get('templates',NULL);
		$this->out('webTemplate','template',$data);		
	}
		
}/* end { */

/* End of file WebTemplate.php */
