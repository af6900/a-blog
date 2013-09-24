<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends AB_Controller {
	      
	// Frontend site v 1.0.1 
   public function __construct()
    {
        parent::__construct();

    }
	public function index(){
        
		$total_rows      = $this->lib_database->count_all('article');
		
		
		$data['page']    = PageCount($total_rows ,'index' ,'' ,'2');
		
		$count = $this->uri->segment(2);
		$where = "archive ='0' and publish_up <= '".trim(adate(4).date('His'))."' and publish_down >= '".trim(adate(4))."'";
		$data['article'] = $this->lib_database->limit('article',$where,5,$count,'publish_up','DESC');
		$this->template->out($data);

	}
}

/* End of file site.php */
/* Location: ./blog/controllers/site.php */