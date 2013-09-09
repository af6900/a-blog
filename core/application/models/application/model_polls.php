<?php
class model_polls extends MY_Model {  
		
		protected $_table_name = 'polls';
		protected $_order_by = 'id_polls';	
		protected $_rules = array(
		'title' => array(
			'field' => 'title', 
			'label' => 'عنوان', 
			'rules' => 'trim|required|xss_clean'
		), 
		'keywords' => array(
			'field' => 'keywords', 
			'label' => 'کلمات کلیدی', 
			'rules' => 'trim|required|xss_clean'
		),
		'summary' => array(
			'field' => 'summary', 
			'label' => 'خلاصه مطلب', 
			'rules' => 'trim|required'
		)
	);
		
		public function insert_polls($question, $answer, $status){
			$polls = array('polls_title'=>$question, 'active'=>$status);
			$this->db->insert('polls',$polls);
			$this->db->order_by("id_polls", "desc");
			$this->db->limit(1);
			$result = $this->db->get('polls');
			foreach($result->result() as $rows){
				$id = $rows->id_polls;
				}
			
			foreach($answer as $row){
				if($row !=''){
					$data = array('id_poll'=>$id,'answer_title'=> $row);
					$this->db->insert('polls_answer',$data);
				}
				}
			}
			
		public function insert_sub_polls(){
			$polls = $this->input->post('polls',TRUE);
			$title = $this->input->post('subpolls', TRUE);
			if( $title != '' ){
				$data = array('id_poll'=>$polls,'answer_title' => $title);
				$result = $this->db->insert('polls_answer',$data);
				  return $result;
				}else{
					return FALSE;
					}
			}
			
		public function get_answer($id){
			$this->db->where('id_poll',$id);
			$query = $this->db->get('polls_answer');
			return $query->result();
			}
			
		public function get_votes($id){
			$this->db->where('id_answer',$id);
			$this->db->group_by('id_answer');
			$this->db->select_sum('user_votes');
			$query = $this->db->get('polls_votes');
			return $query->result();
			}
				
		public function delete_polls(){
			$id=$this->uri->segment(2);
			$this->db->where('id_polls',$id);
			$result = $this->db->delete('polls');
			}
			
		public function delete_answer($id){
			$this->db->where('id_answer',$id);
			$result = $this->db->delete('polls_answer');
			return $result;
			}
					
		public function select(){
			$this->db->where('active','1');
			$data = $this->db->get('polls');
			return $data->result();
			}
			
		public function save_answer($id_answer,$user_votes,$user_ip){
			$data = array('id_answer'=>$id_answer,'user_votes'=>'1','user_ip'=>$user_ip);
			$this->db->where('id_votes',$user_votes);
			$this->db->insert('polls_votes',$data);
			}
			
		public function edit(){
			$id = $this->uri->segment(2);
			$this->db->cache_delete('edit-poll', $id);
			$this->db->where('id_polls',$id);
			$data = $this->db->get('polls');
			return $data->result();
			}
		
		public function update(){
				$id_polls = $this->input->post('polls_id');
				$polls_title = $this->input->post('polls_title');
				$this->db->where('id_polls',$id_polls);
				$data = array('polls_title'=>$polls_title);
				$this->db->update('polls',$data);
				$id_answer = $this->input->post();
				foreach($id_answer as $row => $value){
					$this->db->where('id_answer',$row);
					$data = array('answer_title'=>$value);
					$this->db->update('polls_answer',$data);
					}
			}					
} 