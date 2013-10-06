<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news extends AB_Controller {

   public function __construct()
    {
        parent::__construct();

    }
	public function index(){
		$this->db->cache_delete('admin-news-list', 'index');
		$data['data'] = $this->lib_database->get('news');
		$this->out('news','news',$data);	
		}
		
		
	public function insert(){
		$date        = adate();
		$author      = $this->session->userdata('name');
		$title       = $this->input->post('title',TRUE);
		$keywords    = $this->input->post('keywords',TRUE);
		$publish_up  	 = $this->input->post('start',TRUE);
		$publish_down		 = $this->input->post('end',TRUE);
		
		$description = $this->input->post('description'); 
		$data = array('title'      =>$title,
					  'keywords'   =>$keywords,
					  'description'=>$description,
					  'date'       =>$date,
					  'author'     =>$author,
					  'startDate'  => $publish_up,
					  'endDate'    =>$publish_down);
					  
		$result = $this->lib_database->save('news',$data);
		if($result){
			redirect('admin-news/success');
			} else {
				redirect('admin-news/error');
				}
		

		}
	
	public function news_list(){
		$data['news'] = $this->lib_database->get('news');
		$this->out('news','list',$data); 
		}
	
	public function deleteNews(){
		$id = $this->uri->segment(2);
		$this->lib_database->delete('news',array('id'=>$id));
		redirect('admin-news');
		}
		
	public function edit(){
		$id = $this->uri->segment(2);
		$result = $this->lib_database->get('news',NULL,array('id'=>$id));
		foreach ($result as $row){
			$data['id']          = $row->id; 
			$data['title']       = $row->title;
			$data['keywords']    = $row->keywords;
			$data['description'] = $row->description;
			$data['publish_up'] = $row->publish_up;
			$data['publish_down'] = $row->publish_down;
			}
		$this->out('news','edit',$data); 	
		}
					
	public function update(){
		$id = $this->input->post('id');
		$title       = $this->input->post('title',TRUE);
		$keywords    = $this->input->post('keywords',TRUE);
		$publish_up  	 = $this->input->post('start',TRUE);
		$publish_down		 = $this->input->post('end',TRUE);
		$description = $this->input->post('description'); 
		$data = array('title'      =>$title,
					  'keywords'   =>$keywords,
					  'description'=>$description,
					  'startDate'  => $publish_up,
					  'endDate'    =>$publish_down);
		
		$result = $this->lib_database->save('news',$data,array('id'=>$id));
		if($result){
			redirect('admin-news/success');
			}else{
			redirect('admin-news/error');
				}
		
		}	
	
}/* end { */

/* End of file news.php */
/* Location: ./blog/controllers/news.php */