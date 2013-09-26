<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class summary extends AB_Controller {
	      
	// Frontend site v 1.0.1 
   public function __construct()
    {
        parent::__construct();

    }
	public function index(){

		 $id = urldecode($this->input->get('id'));
		 if ($id == ''){
			$id = urldecode($this->uri->segment(2));
			$id = str_replace('-',' ',$id);
		 }
	    
		$article = $this->lib_database->get('article',NULL,array('title'=>$id)); 
		
		foreach($article as $row)
		{
			$data = array('id'=>encrypt($row->id),
						 'title'=>$row->title,
						 'summary' => $row->summary,
						 'fullText'=>$row->fulltext,
						 'author'=>$row->author,
						 'date'=>$row->date,
						 'showComment' => $row->comment,
						 'visit' => $row->visit);
			
		}
		
		$data['url'] = site_url('summary'.'/'.$id); 
		$user = $this->lib_database->get('admin_user',NULL,array('name'=>$row->author));
		foreach($user as $rows){
			$data['mobile'] = $rows->UserMobile;
			$data['email'] = $rows->UserEmail;
			$data['UserAvatar'] = $rows->UserAvatar;
			}
			
		$data['comment'] = $this->comment_model->get_by(array('id_article'=>$row->id,'active'=>1)); 
	    $this->template->out($data);
		}
		

}

/* End of file summary.php */
/* Location: ./application/controllers/summary.php */