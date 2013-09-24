<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class block extends AB_Controller {

   public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
    }
	
	public function index(){
		$this->db->cache_delete('block', 'index');
		$data['boxes'] = $this->boxes_model->get();
		//$data['block'] = $this->block_model->get();
		
		$tem =  $this->lib_database->get_filde('templates',array('active'=>1),'name');
		$xml = simplexml_load_file(site_url('../templates/'.$tem.'/templateDetails.xml'));
		$data['position'] = $xml->positions->position;

		$this->out('block','block',$data);		
		}
		
	public function insert_block(){
		if($this->block_model->validation() == TRUE){
			$data = $this->block_model->array_from_post(array('name','box','position','active','row'));
			$this->block_model->save($data);
		}
		$data['boxes'] = $this->boxes_model->get();
		$data['block'] = $this->block_model->get();
		$tem = $this->lib_database->get_filde('templates',array('active'=>1),'name');
		$xml = simplexml_load_file(site_url('templates/'.$tem.'/templateDetails.xml'));
		$data['position'] = $xml->positions->position;
		$this->out('block','block',$data);
		}
		
	public function edit_block(){
		$data['boxes'] = $this->boxes_model->get();
		
		$block = $this->block_model->get_by(array('id'=>$this->uri->segment(2)));
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
		if($this->block_model->validation() == TRUE){
			$data = $this->block_model->array_from_post(array('name','box','position','active','row'));
			$this->block_model->save($data,$id); 
			redirect('block/success');
		}
		$data['boxes'] = $this->boxes_model->get();
		$data['block'] = $this->block_model->get();
		$this->out('block','block',$data);
		
		}
		
	public function delete_block(){
		$this->block_model->delete();
		redirect('block');
		}
		
	public function active_block(){
		$id = $this->uri->segment(2);
		$data = array('active'=>'0');
		$this->block_model->save($data,$id); 
		redirect('block/success');
		}
		
	public function inactive_block(){
		$id = $this->uri->segment(2);
		$data = array('active'=>'1');
		$this->block_model->save($data,$id); 
		redirect('block/success');
		}		

	
}/* end { */

/* End of file block.php */
/* Location: ./blog/controllers/block.php */