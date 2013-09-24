<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed extends CI_Controller {
	      

   public function __construct()
    {
        parent::__construct();
			
    }

	public function index()  
    {  
 		$this->load->helper('xml');
		$this->load->helper('text');

		$data['Site_Title'] = $this->lib_database->get_filde('web_config',array('id' => 1),'Web_Title');  
		$data['Site_Description'] =  $this->lib_database->get_filde('web_config',array('id'=>1),'Description');    

		$data['Site_Url'] = base_url();	  
        $data['encoding'] = 'utf-8'; // the encoding  
		$where = "archive ='0' and publish_up <= '".adate(4).date('His')."' and publish_down >= '".adate(4)."'";
		$data['posts'] = $this->lib_database->limit('article',$where,10,NULL,'id','DESC');
	
 		 $this->output->set_header("Content-Type: application/rss+xml"); 
         $this->load->view('feed/rss', $data); 
    }

	
}

/* End of file feed.php */
/* Location: ./blog/controllers/feed.php */