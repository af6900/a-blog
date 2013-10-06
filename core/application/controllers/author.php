<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class author extends AB_Controller {
	      
	
   public function __construct()
    {
        parent::__construct();

    }
	
	public function index(){

		$name = urldecode($this->uri->segment(2));
		$author = $this->lib_database->get('admin_user','result',array('name'=>$name));
		foreach($author as $row){
			$data['name'] = $row->name;
			$data['mobile'] = $row->UserMobile;
			$data['email'] = $row->UserEmail;
			$data['UserAvatar'] = $row->UserAvatar;
			$data['yahoo'] = $row->yahoo;
			$data['facebook'] = $row->facebook;
			$data['twitter'] = $row->twitter;
			$data['instagram'] = $row->instagram;
			$data['about'] = $row->about;
			}
		$this->template->out($data);
	}
}

/* End of file author.php */
/* Location: ./application/controllers/author.php */