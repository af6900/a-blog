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
		$query = $this->boxes_model->configuration_kay('COUNT_SALAVAT');
    	$salavat = $item + $query;
		$this->db->where('kay','COUNT_SALAVAT');
		$up = array('value'=>$salavat);
		$this->db->update('configuration',$up);
		$this->output->set_output(json_encode($this->boxes_model->configuration_kay('COUNT_SALAVAT')));
    }
	
	public function like()
	{
		$action = $this->input->get('action',TRUE);
		$get_id = $this->input->get('id',TRUE);
		
		$article = $this->lib_database->get('article');
		
		foreach($article as $row){
	
			if($get_id == encrypt($row->id)){
				
				if($action == 'plus'){
					$this->lib_database->save('article',array('visit' => $row->visit + 1),array('id' => $row->id));
					$this->output->set_output(json_encode($row->visit + 1));					
					}
					
				if($action == 'minus'){
					$this->lib_database->save('article',array('visit' => $row->visit - 1),array('id' => $row->id));
					$this->output->set_output(json_encode($row->visit - 1));					
					}
				
				}
				
				
			}
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
	   	 echo  match_captch($this->input->get('captcha',TRUE));
		}
		
	public function comment(){
		$articleId = $this->input->get('articleId',TRUE);
		$getResult = $this->lib_database->get('article');
		foreach($getResult as $row){
			$id = $row->id;

			if($articleId == encrypt($id)){
 			$data = array('id_article'   =>$id, 
						  'contact_date' =>$this->input->get('date'),
						  'user_name'    =>$this->input->get('name',TRUE),
						  'user_email'   =>$this->input->get('email',TRUE),
						  'comment'      =>$this->input->get('text',TRUE) );
						  
				comment_send_admin(
						$this->input->get('name',TRUE),
						$this->input->get('email',TRUE),
						$this->input->get('text',TRUE),
						$this->input->get('author',TRUE));	
								  
				$result = $this->db->insert('comment',$data);
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
		$this->lib_database->save('configuration',$data,array('kay'=>'STATUS_TEXT'));
		}			
	public function pages(){
		
		$this->lib_database->delete('pages',array('id'=>$_GET['id']));
		echo json_decode('1');
		}	
	
}
