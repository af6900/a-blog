<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class comment extends AB_Controller {

   public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
    }
	
	public function index(){

		$this->db->select('*');
		$this->db->from('article');
		$this->db->order_by('id', 'DESC');
		$this->db->join('comment', "article.id = comment.id_article");
		$data['comment'] = $this->db->get()->result();
		$this->out('comment','comment',$data);		
		}
	public function commentActive(){
		$data = array('active'=>'1');
		$this->comment_model->save($data, $this->uri->segment(2));
		redirect('comment');
		}
		
	public function commentDeActive(){
		$data = array('active'=>'0');
		$this->comment_model->save($data,$this->uri->segment(2));
		redirect('comment');
		}
		
	public function commentEdit(){
		$id = $this->uri->segment(2);
		$data = $this->comment_model->get($id);
		foreach ($data as $row){
			$data['email'] = $row->user_email;
			$data['comment'] = $row->comment; 
			$data['answer'] = $row->answer;
			$data['id'] = $row->id_comment;
			$data['user_name'] = $row->user_name;
			}
		$this->out('comment','editComment',$data);
		}
		
	public function updateComment(){
		comment_send_email($this->input->post('email'));
		$id = $this->input->post('id');
	    $comment = $this->input->post('comment',TRUE);
		$answer = $this->input->post('answer',TRUE);
		$data = array('comment'=>$comment, 'answer'=>$answer);
		 $this->comment_model->save($data,$id);
		redirect('comment');

		}
						
	public function commentDelete(){
		$this->comment_model->delete($this->uri->segment(2));
		redirect('comment');
		}

}/* end { */

/* End of file comment.php */
/* Location: ./blog/controllers/comment.php */