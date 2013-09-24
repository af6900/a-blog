<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class section extends AB_Controller {
	      

   public function __construct()
    {
        parent::__construct();

    }
	public function index(){
		
	    $total_rows 		= $this->section_model->count_db();
		$section		   = $this->uri->segment(2);
		$data['page']	  = PageCount($total_rows, 'section', $section, '3' );
		$article   = $this->section_model->Article_Select_Section();
		if($article){
			$data['article'] = $article;
			$this->template->out($data);
			}else{
				redirect('index');
				}
		

	}


}

/* End of file section.php */
/* Location: ./application/controllers/section.php */