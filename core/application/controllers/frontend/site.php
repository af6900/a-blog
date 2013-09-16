<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends Frontend_Controller {
	      
	// Frontend site v 1.0.1 
   public function __construct()
    {
        parent::__construct();

    }
	public function index(){
		
		$total_rows      = $this->model_article->count_db();
		$data['page']    = $this->template->PageCount($total_rows ,'index' ,'' ,'2');
		$count = $this->uri->segment(2);
		$where = "archive ='0' and publish_up <= '".adate(4).date('His')."' and publish_down >= '".adate(4)."'";
		$data['article'] = $this->lib_database->limit('article',$where,5,$count,'publish_up','DESC');
		$this->template->out($data);					
	}
	
	public function pages(){
		
		$page = $this->lib_database->get('pages',NULL,array('enTitle'=>$this->uri->segment(2)));
		foreach($page as $row){
			$data = array('enTitle'=>$row->enTitle,
							'title'=>$row->title,
							'keywords'=>$row->keywords,
							'discription'=>$row->discription,
							'option'=>$row->option);
			}
		$this->template->out($data);
		}		
		
	public function section(){
	    $total_rows 		= $this->model_section->count_db();
		$section		   = $this->uri->segment(2);
		$data['page']	  = $this->template->PageCount($total_rows, 'section', $section, '3' );
		$article   = $this->model_section->Article_Select_Section();
		if($article){
			$data['article'] = $article;
			$this->template->out($data);
			}else{
				redirect('index');
				}
		
		}
	
	
	public function summary(){
		
		 $id = $this->input->get('id');
		 if ($id == ''){
			 $id = $this->uri->segment(2);
			 }
		$article = $this->model_article->get($id);
		foreach($article as $row)
		{
			$data = array('id'=>$this->ablog->a_hash($row->id),
						 'title'=>$row->title,
						 'summary' => $row->summary,
						 'fullText'=>$row->fulltext,
						 'author'=>$row->author,
						 'date'=>$row->date,
						 'showComment' => $row->comment);
			
		}
		$data['comment'] = $this->model_comment->get_by(array('id_article'=>$id,'active'=>1)); 
	    $this->template->out($data);
		}
		

	
	public function search(){
		$search = $this->model_search->search();
		if($search == FALSE){
			redirect('index');
			}else{
				$data['search'] = $search;		
				}	
		$this->template->out($data);
	
		}
	
	public function archive(){
	    $total_rows 		= $this->model_section->count_db();
		$section		   = $this->uri->segment(2);
		$data['page']	  = NULL; //$this->PageCount($total_rows, 'section', $section, '4' );
		$data['article']   = $this->model_article->get_by(array('archiveDate'=>$section));
		$this->template->out($data);
		
		}	

}

/* End of file site.php */
/* Location: ./blog/controllers/site.php */