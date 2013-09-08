<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EmailTemplate extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
    }
	public function index(){
		$data['EmailTemplate'] = $this->model_email_template->get();
		$this->out('emailTemplate','emailTemplate',$data);		
		}
		
	//--- Email Template ---\\
	public function save(){
		$id       = $this->input->post('id');
		$template = $this->input->post('template'); 
		$data = array('template'=>$template);	
		$result = $this->model_email_template->save($data,$id);
		if($result){
			redirect('EmailTemplate/success');
			} else {
				redirect('EmailTemplate/error');
				}
		
		
		}	
	public function edit(){
		$id = $this->uri->segment(2);
		$data = $this->model_email_template->get($id);
		foreach($data as $row){
			$data['title'] = $row->title;
			$data['template'] = $row->template;
			$data['id'] = $row->id;
			}
		$this->out('emailTemplate','emailTemplateEdit',$data);	
		}	
}/* end { */

/* End of file EmailTemplate.php */
/* Location: ./blog/controllers/EmailTemplate.php */