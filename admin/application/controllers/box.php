<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class box extends AB_Controller {

   public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
		$this->unzip->allow(array('css', 'js', 'png', 'gif', 'jpeg', 'jpg', 'html', 'swf','php','xml'));
		
    }
	public function index(){
		$this->db->cache_delete('box', 'index');
		$data['boxes'] = $this->boxes_model->get();
		$this->out('boxes','boxes',$data);		
		}
	public function save_boxes(){
		$this->boxes_model->upload();
	    redirect('box');
		}
		
	public function edit_box(){
		$data['id'] = $this->uri->segment(2);
		$this->out('boxes','edit',$data);
		}	
	public function update_boxes(){
		$this->boxes_model->update();
		redirect('box');

		}			
}/* end { */

/* End of file box.php */
/* Location: ./blog/controllers/box.php */