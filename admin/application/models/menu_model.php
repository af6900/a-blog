<?php
class menu_model extends AB_Model
{
	protected $_table_name = 'menu';
	protected $_order_by = 'id';
	protected $_rules = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'نام', 
			'rules' => 'trim|required|xss_clean'
		), 
		'block' => array(
			'field' => 'block', 
			'label' => 'بلوک', 
			'rules' => 'trim|required|xss_clean'
		),
		'link' => array(
			'field' => 'link', 
			'label' => 'لینک', 
			'rules' => 'trim|required'
		)
	);
	
				
	public function insert_subMenu(){
		$data = array('name'=>$this->input->post('name',TRUE),'link'=>$this->input->post('link',TRUE),'parent'=>$this->input->post('parent',TRUE));
		$this->db->insert('menu',$data);
		}

		
	public function parentMenu(){
		$this->db->where('parent',0);
		return $this->db->get('menu')->result();
		}
		
	public function get_subMenu($id){
		 		$this->db->where('parent',$id); 
		return $this->db->get('menu')->result();
		}
			
	public function get_id(){
		$this->db->where('id',$this->input->post('id',TRUE));
		return $this->db->get('menu')->result();
		}				
		
}