<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class block extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
    }
	
	public function index(){
		$this->db->cache_delete('block', 'index');
		$data['boxes'] = $this->model_boxes->get();
		//$data['block'] = $this->model_block->get();
		
		$tem = $this->model_web_template->get_one(array('active'=>1),'name');
		$xml = simplexml_load_file(site_url('templates/'.$tem.'/templateDetails.xml'));
		$data['position'] = $xml->positions->position;

		$this->out('block','block',$data);		
		}
		
	public function insert_block(){
		if($this->model_block->validation() == TRUE){
			$data = $this->model_block->array_from_post(array('name','box','position','active','row'));
			$this->model_block->save($data);
		}
		$data['boxes'] = $this->model_boxes->get();
		$data['block'] = $this->model_block->get();
		$tem = $this->model_web_template->get_one(array('active'=>1),'name');
		$xml = simplexml_load_file(site_url('templates/'.$tem.'/templateDetails.xml'));
		$data['position'] = $xml->positions->position;
		$this->out('block','block',$data);
		}
		
	public function edit_block(){
		$data['boxes'] = $this->model_boxes->get();
		
		$block = $this->model_block->get_by(array('id'=>$this->uri->segment(2)));
		foreach($block as $row){
			$data['id'] =$row->id;
			$data['name'] = $row->name;
			$data['row'] = $row->row;
			$data['box'] = $row->box;
			$data['position'] = $row->position;
			$data['status'] = $row->active;
			}
		$this->out('block','edit',$data);	
		}
		
	public function update_block(){
		$id = $this->input->post('id');
		if($this->model_block->validation() == TRUE){
			$data = $this->model_block->array_from_post(array('name','box','position','active','row'));
			$this->model_block->save($data,$id); 
			redirect('block/success');
		}
		$data['boxes'] = $this->model_boxes->get();
		$data['block'] = $this->model_block->get();
		$this->out('block','block',$data);
		
		}
		
	public function delete_block(){
		$this->model_block->delete();
		redirect('block');
		}
		
	public function active_block(){
		$id = $this->uri->segment(2);
		$data = array('active'=>'0');
		$this->model_block->save($data,$id); 
		redirect('block/success');
		}
		
	public function inactive_block(){
		$id = $this->uri->segment(2);
		$data = array('active'=>'1');
		$this->model_block->save($data,$id); 
		redirect('block/success');
		}		

	
}/* end { */

/* End of file block.php */
/* Location: ./blog/controllers/block.php */