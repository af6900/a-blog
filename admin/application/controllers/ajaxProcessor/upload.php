<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class upload extends AB_Controller {
	      

   public function __construct()
    {
        parent::__construct();	
    }

	public function index()  
    {
		$path = $this->input->post('path');
	$allowed = array('png', 'jpg', 'gif','zip');
	if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
	
		$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	
		if(!in_array(strtolower($extension), $allowed)){
			echo '{"status":"error"}';
			exit;
		}
	
		if(move_uploaded_file($_FILES['upl']['tmp_name'], '../upload/'.$path.'/'.$_FILES['upl']['name'])){
			echo '{"status":"success"}';
			exit;
		}
	}
	
	echo '{"status":"error"}';
	exit;
	}
	
	
}
