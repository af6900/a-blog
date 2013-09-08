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
         
		$config = $this->model_web_config->get();
		foreach($config as $row){
			$data['Site_Title'] = $row->Web_Title;
			$data['Site_Description'] = $row->Description;    
			}
		$data['Site_Url'] = base_url();	  
        $data['encoding'] = 'utf-8'; // the encoding  
		$where = "archive ='0' and publish_up <= '".adate(4).date('His')."' and publish_down >= '".adate(4)."'";
		$data['posts'] = $this->lib_database->limit('a_article',$where,10,NULL,'id','DESC');
		
 		$this->output->set_header("Content-Type: application/rss+xml"); 
        $this->load->view('../../../templates/feed/rss', $data); 
    }

	
}

/* End of file feed.php */
/* Location: ./blog/controllers/feed.php */