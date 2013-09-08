<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	      

   public function __construct()
    {
        parent::__construct();	
    }

	public function index()  
    {
		  
	}
	
	public function salavat()  
    {  
		$item = $this->input->get('salavat');
		$query = $this->model_boxes->configuration_kay('COUNT_SALAVAT');
    	$salavat = $item + $query;
		$this->db->where('kay','COUNT_SALAVAT');
		$up = array('value'=>$salavat);
		$this->db->update('a_configuration',$up);
		$this->db->cache_delete('ajax', 'salavat');
		echo $this->model_boxes->configuration_kay('COUNT_SALAVAT');
    }
	public function show_votes(){
		
		}
	public function save_answer(){
		$id_answer = $this->input->get('idAnswer',TRUE);
		$user_votes = $this->input->get('user_votes',TRUE);
		$user_ip = $this->input->get('userIp',TRUE);
		$this->model_polls->save_answer($id_answer,$user_votes,$user_ip);
		}
		
	public function new_polls(){
		$question = $this->input->get('question',TRUE);
		$answer = $this->input->get('answer');
		$status = $this->input->get('status',TRUE);
		$this->model_polls->insert_polls($question, $answer, $status);	
		}
	public function get_answer(){
		$id = $this->input->get('id',TRUE);
		$result = $this->model_polls->get_answer($id);
		foreach($result as $row){
			echo"<tr><td></td><td>$row->answer_title</td><td>0</td><td></td><td></td><td></td></tr>";
			}
		}
			
	public function delete_polls(){
		$this->model_polls->delete_polls($this->input->get('id',TRUE));
		}
	
	public function delete_answer(){

		}		
	
	public function captcha(){
		echo captcha();
		}
		
	public function validation_captcha(){
	   	 echo  $this->ablog->match_captch($this->input->get('captcha',TRUE));
		}
		
	public function comment(){
		$articleId = $this->input->get('articleId',TRUE);
		$getResult = $this->lib_database->get('a_article');
		foreach($getResult as $row){
			$id = $row->id;

			if($articleId == $this->ablog->a_hash($id)){
 			$data = array('id_article'   =>$id, 
						  'contact_date' =>$this->input->get('date'),
						  'user_name'    =>$this->input->get('name',TRUE),
						  'user_email'   =>$this->input->get('email',TRUE),
						  'comment'      =>$this->input->get('text',TRUE) );
		comment_send_admin($this->input->get('name',TRUE),$this->input->get('email',TRUE),$this->input->get('text',TRUE),$this->input->get('author',TRUE));			  
				$result = $this->db->insert('a_comment',$data);
				echo $result;
			}
			}			
			

	}
			
	public function contact(){
		$name      = $this->input->get('name',TRUE);
		$email     = $this->input->get('email',TRUE);
		$subject   = $this->input->get('subject',TRUE);
		$message      = $this->input->get('message',TRUE);	
		$captcha      = $this->input->get('captcha',TRUE);	
	    echo contact($name,$email,$subject,$message,$captcha);	
	}
	
	public function status(){
		$text = $this->input->get('status',TRUE);
		$data   = array('value'=>$text);
		$this->lib_database->save('a_configuration',$data,array('kay'=>'STATUS_TEXT'));
		}			
	public function pages(){
		
		$this->lib_database->delete('a_pages',array('id'=>$_GET['id']));
		echo json_decode('1');
		}	
	
}
