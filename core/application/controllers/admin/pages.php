<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pages extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();
    }
	public function index(){

		$this->out('pages','pages');	
	}
		
	public function save(){
		
		$enTitle= $this->input->post('enTitle',TRUE);
		$title = $this->input->post('title',TRUE);
		$keywords = $this->input->post('keywords',TRUE);
		$desc = $this->input->post('desc');
		$option = $this->input->post('option');
		$data = array('enTitle'=>$enTitle,'title'=>$title, 'keywords'=>$keywords, 'discription'=>$desc, 'option'=>$option,
			'author'=>$this->session->userdata('name'));
		$this->lib_database->save('a_pages',$data);
		redirect('new-pages/success');
	}
	
	public function delete(){
		
		$this->lib_database->delete('a_pages',array('id'=>$_GET['id']));
		echo json_decode('1');
		}

	public function edit(){
		$data = $this->lib_database->get('a_pages',NULL,array('id'=>$this->uri->segment(2)));
		foreach($data as $row){
			$data = array(
						'id' => $row->id,
						'title' =>$row->title,
						'enTitle' =>$row->enTitle,
						'keywords' => $row->keywords,
						'desc' =>$row->discription,
						'option' => $row->option
			);
			}
		$this->out('pages','edit',$data); 	
		}
		
	public function update(){
		$id = $this->input->post('id');
		$title = $this->input->post('title',TRUE);
		$enTitle = $this->input->post('enTitle',TRUE);
		$keywords = $this->input->post('keywords',TRUE);
		$desc = $this->input->post('desc');
		$data = array('title'=>$title,'enTitle'=>$enTitle, 'keywords'=>$keywords, 'discription'=>$desc);
		$this->lib_database->save('a_pages',$data,array('id'=>$id));
		redirect('new-pages/success');
		}	

}/* end { */

/* End of file pages.php */
