<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class email extends CI_Controller {
	      

   public function __construct()
    {
        parent::__construct();
			
    }
	
	public function index(){
	redirect('site/index');
	}
	public function send(){
		$id = $this->uri->segment(3);
		if($id == NULL){
			redirect('site/index');
			}
		$article = $this->article($id);
		if($article != FALSE){
			$this->load->view("email/email",$article);
			}else{
				redirect('email/error');
				}
		
		}
	
	public function validation(){
		$this->form_validation->set_rules('to', 'ایمیل گیرنده', 'trim|strip_tags|xss_clean|required|valid_email');
		$this->form_validation->set_rules('subject', 'موضوع', 'trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('yourEmail', 'ایمیل شما', 'trim|strip_tags|xss_clean|required|valid_email');
		$this->form_validation->set_rules('yourName', 'نام شما', 'trim|strip_tags|xss_clean|required');
		if ($this->form_validation->run())
		{
			$id = $this->input->post('id',TRUE);
			$To = $this->input->post('to',TRUE);
			$subject = $this->input->post('subject',TRUE);
			$YourEmail = $this->input->post('yourEmail',TRUE);
			$YourName = $this->input->post('yourName',TRUE);
			
			$send = $this->sendEmail($id,$To,$subject,$YourEmail,$YourName);
		if($send == TRUE){
				redirect('email/Success');
			}
			
		}
		else
		{
				$id = $this->input->post('id',TRUE);
				$article = $this->article($id);
				$this->load->view("email/email",$article); 
		}
	}
	
	public function Success(){
         $this->load->view('email/Success');
		}
	public function error(){
		$this->load->view('email/error');
		}	
		
	function article($id){
		$article = $this->model_article->get_by(array('id'=>$id));
		  foreach ($article as $row){
			 $title = $row->title;
			 $summary = $row->summary;
			 $fulltext = $row->fulltext;
			 $author = $row->author;
			 }
		if( $title !=''){
			$article['id'] = $id; 	 
			$article['title'] = $title; 
			$article['summary'] = $summary;
			$article['fulltext'] = $fulltext;
			$article['author'] = $author;			
			return $article;
			}else{
				return false;
				}
		
		}
		
	function sendEmail($id,$To,$subject,$YourEmail,$YourName){
		
		  $article = $this->model_article->get_by(array('id'=>$id));
		  foreach ($article as $row){
			 $title = $row->title;
			 $summary = $row->summary;
			 $fulltext = $row->fulltext;
			 $author = $row->author;
			 }
			 		
		$WebTitle = $this->model_web_config->get();
		foreach($WebTitle as $row){
			$web_title=$row->Web_Title;
			}
			
		$emailTemplate = $this->model_email_template->get_by(array('id'=>5));
		foreach( $emailTemplate as $row ){
			$template['tem'] = $row->template;
			$template['title'] = $row->title;
			}
		$base_url = site_url();	
		$message = $summary . $fulltext;	
		$search  = array($message, $title, $web_title, $author, $YourName, $base_url);	
		$replace = array('%message%','%title%','%webName%','%author%','%YourName%', '%base_url%');	
		$message = str_replace($replace,$search,$template['tem']);	
				
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
				
		$this->email->from($YourEmail, $YourName);
		$list = array($To);
		$this->email->to($list);
		
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
		
		return TRUE;		
		}
	
}

/* End of file email.php */
/* Location: ./blog/controllers/email.php */