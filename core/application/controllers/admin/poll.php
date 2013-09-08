<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class poll extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
    }
	
	public function index(){
 		$this->db->cache_delete('poll', 'index');
		$data['polls'] = $this->model_polls->get();
		$this->out('polls','polls',$data);		
		}
		
	public function newPoll(){
		$data['polls'] = $this->model_polls->get();
		$this->out('polls','new',$data);
		}
		
	public function delete(){
		 $this->model_polls->delete_polls();
		 redirect('poll');
		}
				
	public function save_polls(){
		$this->db->cache_delete('poll', 'index');
		$this->form_validation->set_rules('title','عنوان رای گیری','required|trim|xss_clean');
		if( $this->form_validation->run()){
			    $this->model_polls->insert_polls();
			    redirect('poll');
			} else {
				 $this->out('polls','polls',$data);
				}
		}
		
	public function save_sub_polls(){
		$this->form_validation->set_rules('subpolls','عنوان رای گیری','required|trim|xss_clean');
		if( $this->form_validation->run()){
			    $this->model_polls->insert_sub_polls();
			    redirect('poll/polls');
			} else {
				 $this->out('polls','polls',$data);
				}
		}
		
	public function edit(){
		$data['polls'] = $this->model_polls->edit();
		$this->out('polls','edit',$data);
		}
	public function update(){
		$this->model_polls->update();
		redirect('poll');
		}
			
	
				
}/* end { */

/* End of file poll.php */
/* Location: ./blog/controllers/poll.php */