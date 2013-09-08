<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class comment extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
    }
	
	public function index(){
		//$data['comment'] = $this->model_comment->join('a_article','id','id_article','id_comment','DESC');
		$this->db->select('*');
		$this->db->from('a_article');
		$this->db->order_by('id', 'DESC');
		$this->db->join('a_comment', "a_article.id = a_comment.id_article");
		$data['comment'] = $this->db->get()->result();
		$this->out('comment','comment',$data);		
		}
	public function commentActive(){
		$data = array('active'=>'1');
		$this->model_comment->save($data, $this->uri->segment(2));
		redirect('comment');
		}
		
	public function commentDeActive(){
		$data = array('active'=>'0');
		$this->model_comment->save($data,$this->uri->segment(2));
		redirect('comment');
		}
		
	public function commentEdit(){
		$id = $this->uri->segment(2);
		$data = $this->model_comment->get($id);
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
		 $this->model_comment->save($data,$id);
		redirect('comment');

		}
						
	public function commentDelete(){
		$this->model_comment->delete($this->uri->segment(2));
		redirect('comment');
		}

}/* end { */

/* End of file comment.php */
/* Location: ./blog/controllers/comment.php */