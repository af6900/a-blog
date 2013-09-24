<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class article extends AB_Controller {

   public function __construct()
    {
        parent::__construct();
    }
	
	public function index(){
		
		$data['msg'] = '';
		$vowels = array("/");
		$publish_up = str_replace($vowels, "", $this->input->post('startPublic',TRUE));
		$publish_down = str_replace($vowels, "", $this->input->post('endPublic',TRUE));
		if($publish_up == ''){ $publish_up = adate(4);}
		if($publish_down == ''){ $publish_down = 99999999;}
		
		if($this->article_model->validation() == TRUE){
			$data = array('date' =>adate(),
						  'author' => $this->session->userdata('name'),
						  'title' => $this->input->post('title',TRUE),
						  'sectionId'=> $this->input->post('sectionId',TRUE),
						  'keywords'=> $this->input->post('keywords',TRUE),
						  'summary'=> $this->input->post('summary',TRUE),
						  'fulltext'=> $this->input->post('fulltext',TRUE),
						  'publish_up'=> $publish_up.date('His'),
						  'publish_down'=> $publish_down);
			
			
			$result = $this->article_model->save($data);
			$data['msg'] = 'success';
	      }
		$data['section'] = $this->section_model->get();
		$this->out('article','article',$data);	
	}
	
	
	public function editArticle(){
		$data = $this->article_model->get($this->uri->segment(2));
		foreach($data as $row){
			$data['id']       = $row->id;
			$data['title']    = $row->title;
			$data['section']  = $row->sectionId;
			$data['keywords'] = $row->keywords;
			$data['summary']  = $row->summary;
			$data['fulltext'] = $row->fulltext;
			$data['publish_up'] = wordwrap(substr($row->publish_up,0,4),2,'/',TRUE).'/'.substr($row->publish_up,4,4);
			if($row->publish_down == 99999999){$data['publish_down'] = '';} else {$data['publish_down'] = $row->publish_down;}
			}
		
		$data['allSection'] = $this->section_model->get();	 
		$this->out('article','editArticle',$data);
		}	
		
	public function UpdateArticle(){
		$vowels = array("/");
		$publish_up = str_replace($vowels, "", $this->input->post('startPublic',TRUE));
		$publish_down = str_replace($vowels, "", $this->input->post('endPublic',TRUE));
		if($publish_up == ''){ $publish_up = adate(4);}
		if($publish_down == ''){ $publish_down = 99999999;}
		
		if($this->article_model->validation() == TRUE){
						$data = array('date' =>adate(),
						  'author' => $this->session->userdata('name'),
						  'title' => $this->input->post('title',TRUE),
						  'sectionId'=> $this->input->post('section',TRUE),
						  'keywords'=> $this->input->post('keywords',TRUE),
						  'summary'=> $this->input->post('summary',TRUE),
						  'fulltext'=> $this->input->post('fulltext',TRUE),
						  'publish_up'=> $publish_up.date('His'),
						  'publish_down'=> $publish_down);
			$result = $this->article_model->save($data,$this->input->post('id'));
			redirect('article/success');
	      }else{
			redirect('article/error');
			  }
		
		}	
	
	public function articleList(){
		$this->db->cache_delete('articleList', 'index');	  
		$data['article'] = $this->article_model->get_by(array('archive'=>'0'), 'DESC', 20, $this->uri->segment(2));
		$data['articleCout'] = PageCount('articleList', $this->article_model->count_db() ,20, 2);
		$this->out('article','articleList',$data);
	}
	
	public function deleteArticle(){
		$this->article_model->delete($this->uri->segment(2));
		redirect('articleList');
	}
						
	public function archive(){
		$this->db->cache_delete('archive', 'index');
		$data['archive'] = $this->article_model->get_by(array('archive'=>'1'),'DESC');
		$this->out('article','archive',$data);
	}
		
	public function archive_article(){
		$this->article_model->save(array('archive'=>'1','archiveDate'=>adate(1)), $this->uri->segment(2));
		redirect('articleList');
	}
	
	public function restore(){
		$this->article_model->save(array('archive'=>'0','archiveDate'=>''), $this->uri->segment(2)); 
		redirect('archive');
	}
		
	public function showComment(){
		$this->article_model->save(array('comment'=>'1'),$this->uri->segment(2));
		redirect('articleList');
	}
		
	public function hideComment(){
		$this->article_model->save(array('comment'=>'0'),$this->uri->segment(2));
		redirect('articleList');
	}
	
	
	
	public function section(){
		$this->db->cache_delete('section', 'index');
		$data['section'] = $this->section_model->get();
		$sectionCout = $this->section_model->count_db();
		$data['sectionCout'] = $this->ablog->PageCount($sectionCout);
		$this->out('article','section',$data);
 	}
	public function save_section(){
			
		$data = $this->section_model->array_from_post(array('title'));
		$this->section_model->save($data);
	    redirect('section');
		}
		
	public function delete_section(){
		$this->section_model->delete($this->uri->segment(2));
		redirect('section');
		}


	public function edit_section(){
		
		$query = $this->section_model->get_by(array('id'=> $this->uri->segment(2))); 
		foreach($query as $row){
			$data['id']     = $row->id;
			$data['section']= $row->title;
			}
		$this->out('article','editSection',$data);
		}
		
	public function update_section(){
	    $id  = $this->input->post('id');
		$data = $this->article_model->array_from_post(array('title'));
		$Update = $this->section_model->save($data,$id);
		redirect('sections/success');
		}		
}/* end { */

/* End of file article.php */
/* Location: ./blog/controllers/article.php */