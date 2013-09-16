<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class banner extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();
		
    }
	
	public function index()
	{

	
	$this->out('banner','banner');		
	}

}/* end { */

/* End of file banner.php */
/* Location: ./application/controllers/banner.php */