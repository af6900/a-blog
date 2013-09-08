<?php
class MY_Model extends CI_Model {
	
	//MY_Model v 1 beta
	
	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	protected $_rules = array();
		
	function __construct() {
		parent::__construct();
	}
	
	public function array_from_post($fields){
		$data = array();
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field);
		}
		return $data;
	}
	
	public function validation(){
		$this->form_validation->set_rules($this->_rules);
		if ($this->form_validation->run() == TRUE) {
			return TRUE;
		}
		else{
			return FALSE;
			}
		
	}
	
	public function get($id = NULL, $sort = NULL, $limit = NULL, $offset = NULL){
		
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'result';
		}
		else {
			$method = 'result';
		}
		
		if (!count($this->db->ar_orderby)) {
			if(is_null($sort)){
				$sort = 'ASC';
				}
			$this->db->order_by($this->_order_by, $sort);
		}
		if(! is_null($limit))
		{
		  	$this->db->limit($limit,$offset); 
	     }
		 
		return $this->db->get($this->_table_name)->$method();
	}
	
	
	public function get_by($where, $sort = NULL, $limit = NULL, $offset = NULL){
		$this->db->where($where);
		return $this->get(NULL, $sort, $limit, $offset);
	}
	
	public function group_by($where, $group){
		$this->db->group_by($group);
		return $this->get_by($where, $sort = NULL, $limit = NULL, $offset = NULL);
		}
		
			
	public function get_limit($limit){
		       $this->db->limit($limit);
		return $this->get(NULL);
		}
	
	public function get_one($where,$fildeName){
		$this->db->where($where);
		$result =  $this->get(NULL);
		foreach($result as $row){
			return $row->$fildeName;
			}
		}
		
	public function join($form,$weher1, $where2, $order_by, $sort){
		$this->db->select('*');
		$this->db->from($this->_table_name);
		
		if ( ! is_null($order_by))
		{
		$this->db->order_by($order_by, $sort);
		}
		
		$this->db->join($form, "$form.$weher1 = $this->_table_name.$where2");
		return $this->db->get()->result();

		} 
	
		
	public function save($data, $id = NULL){
		$this->output->clear_all_cache();
		// Insert
		if ($id === NULL) {
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		}
		// Update
		else {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}
		return $id;
	}
	
	public function save_by($where){
		$this->output->clear_all_cache();
		$filter = $this->_primary_filter;
		$id = $filter($id);
		$this->db->set($data);
		$this->db->where($where);
		$this->db->update($this->_table_name);
		return $id;
		
	}
	
	public function delete($id){
		$this->output->clear_all_cache();
		$filter = $this->_primary_filter;
		$id = $filter($id);
		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}
	
	public function delete_by($where = NULL, $offset = NULL){
		$this->output->clear_all_cache();
		$this->db->where($where, $offset);
		$this->db->delete($this->_table_name);
		
		}
		
	 public function count_db(){
		  $count = $this->db->count_all($this->_table_name);
		  return $count;
		  }
}