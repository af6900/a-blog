<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class seo extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
		
    }
	
	public function index()
	{
 		$this->load->helper('xml');
		$this->load->helper('text');
         

		$data['Site_Url'] = base_url();	  
        $data['encoding'] = 'utf-8'; // the encoding  
		$data['article'] = $this->lib_database->get('article');
		
 		//$this->output->set_header("Content-Type: application/rss+xml"); 
		$this->output->set_header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap/sitemap",$data);		
			
	}

}/* end { */

/* End of file admin.php */
/* Location: ./blog/controllers/admin.php */