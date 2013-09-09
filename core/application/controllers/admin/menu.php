<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();
        
    }
	public function index(){
		$this->db->cache_delete('menu', 'index');
		if($this->model_menu->validation() == TRUE){
			$data = $this->model_menu->array_from_post(array('name','block','link'));
			$this->model_menu->save($data);
			}
		$data['pages'] = $this->lib_database->get('pages');	
		$data['article'] = $this->model_article->get();
		$data['section'] = $this->model_section->get();
		$data['block'] = $this->model_block->get_by(array('box'=>9));
		$data['parent'] = $this->model_menu->parentMenu();
		$this->out('menu','menu',$data);		
		}
		
	public function delete(){
		$this->model_menu->delete($this->uri->segment(2));
		redirect('menu');
		}
		
	public function edit(){
		 $data = $this->model_menu->get_by(array('id'=>$this->uri->segment(2)));
		 foreach($data as $row){
			 $data['id']= $row->id;
			 $data['name']= $row->name;
			 $data['selected']= $row->block;
			 $data['link']= $row->link;
			 }
			 $data['article'] = $this->model_article->get();
		     $data['section'] = $this->model_section->get();
			 $data['dropdown'] = $this->model_block->get_by(array('box'=>9));
		$this->out('menu','editMenu',$data);	  
		}
		
	public function update(){
			$id = $this->input->post('id');
			$data = $this->model_menu->array_from_post(array('name','block','link'));
			$this->model_menu->save($data,$id);
			redirect('menu');
		}
					
	public function subMenu(){
		$data['parent'] = $this->model_menu->parentMenu();
		$this->out('menu','subMenu',$data);
		}	
	public function insert_submenu(){
		$this->model_menu->insert_subMenu();
		redirect('menu/menus');
		}		
}/* end { */

/* End of file menu.php */
/* Location: ./blog/controllers/menu.php */