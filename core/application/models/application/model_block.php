<?php
class model_block extends MY_Model{
	
		protected $_table_name = 'block';
		protected $_order_by = 'id';
		protected $_rules = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'نام', 
			'rules' => 'trim|required|xss_clean'
		), 
		'box' => array(
			'field' => 'box', 
			'label' => 'بلوک', 
			'rules' => 'trim|xss_clean'
		),
		'position' => array(
			'field' => 'position', 
			'label' => 'موقعیت', 
			'rules' => 'trim|required|xss_clean'
		),
		'active' => array(
			'field' => 'active', 
			'label' => 'فعال', 
			'rules' => 'trim|required|xss_clean'
		),
		'row' => array(
			'field' => 'row', 
			'label' => 'ردیف', 
			'rules' => 'trim|required|xss_clean'
		)
	);	
	public function delete(){
		$this->db->where('block',$this->uri->segment(2));
		 foreach($this->db->get('menu')->result() as $row){
			  $this->db->where('parent',$row->id);
			  $this->db->delete('menu');
			 }
			  $this->db->where('block',$id); 
		$this->db->delete('menu');
		$this->db->where('id',$id);
		$this->db->delete('block');
		}
				
	
	}