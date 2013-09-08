<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class robots extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();
    }
	public function index(){
		
	$this->db->cache_delete('robots', 'index');
    $data['string'] = read_file('./robots.txt');
	$this->out('robots','robots',$data);	
		}	

	public function save(){
		$robots = $this->input->post('text',TRUE);
		if($robots !=''){
			write_file('./robots.txt', $robots,'w');
			}
		
		redirect('robots');
		}
}/* end { */

/* End of file about.php */
/* Location: ./blog/controllers/about.php */