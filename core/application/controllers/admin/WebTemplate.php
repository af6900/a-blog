<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WebTemplate extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();

    }
	public function index(){
		@unlink('./templates/newBloag.zip');
		$data['template'] = $this->model_web_template->get();
		$this->out('webTemplate','template',$data);		
	}
	
	public function install(){
	   $name = $this->file->upload('./templates/','*');
	   $this->unzip->extract('templates/'.$name);
	 	
		$data = array('name'=>$name,'active'=>'0');
		$this->model_web_template->save($data);
		redirect('WebTemplate');
		
	}
		
}/* end { */

/* End of file WebTemplate.php */
