<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class summary extends AB_Controller {
	      
	// Frontend site v 1.0.1 
   public function __construct()
    {
        parent::__construct();

    }
	public function index(){
		$title = urldecode($this->uri->segment(2));
		if (isset($title) AND is_string($title)){
			   $title = urldecode($this->uri->segment(2));
			   $title = str_replace('-',' ',$title);
			   $article = $this->lib_database->get('article',NULL,array('title'=>$title)); 
		}	
		
		 $id_get = urldecode($this->input->get('id'));
		 if (isset($id_get) AND is_numeric($id_get)){
 				$article = $this->lib_database->get('article',NULL,array('title'=>$id_get)); 
		 }
		 
	    $id = urldecode($this->uri->segment(2));
		if(isset($id) AND is_numeric($id)){
				$article = $this->lib_database->get('article',NULL,array('id'=>$id));
			}
		
		
		foreach($article as $row)
		{
			$data = array('fb'=> $row->id,
						 'id'=>encrypt($row->id),
						 'title'=>$row->title,
						 'summary' => $row->summary,
						 'fullText'=>$row->fulltext,
						 'author'=>$row->author,
						 'date'=>$row->date,
						 'showComment' => $row->comment,
						 'visit' => $row->visit,
						 'image' => $row->image);
			
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