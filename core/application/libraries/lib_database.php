<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CI_lib_database {
	protected $CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();
	}	
	
	/*
	* $where = array();
	*/
	public function save($tableName = NULL, $data = array() ,$where = NULL)
	{
		$this->CI->output->clear_all_cache();
		/*insert*/
		if($where === NULL ){
			$this->CI->db->set($data);
			$this->CI->db->insert($tableName);
			$id = $this->CI->db->insert_id();
			} else {
		 /*update*/
			$this->CI->db->set($data);
			$this->CI->db->where($where);
			$id = $this->CI->db->update($tableName);
				}
 		return $id;
	}
	
	public function get($tableName = NULL, $method = NULL, $where = NULL, $sortFilde = NULL ,$sort = NULL){
		if(! is_null($where))
		{
			$this->CI->db->where($where);
		}
		
		if (!count($this->CI->db->ar_orderby)) {
			if(is_null($sort)){
				$sort = 'ASC';
				}
			if(is_null($sortFilde)){
				$sortFilde = 'id';
				}	
			$this->CI->db->order_by($sortFilde, $sort);
		}
		
		if($method === NULL)
		{
			$method = 'result';
		}
		
		$result = $this->CI->db->get($tableName)->$method();
		return $result;
	}
	
	public function group_by($tableName,$filde,$limit){
		$this->CI->db->group_by($filde);
		if(isset($limit)){
			return $this->limit($tableName,NULL,$limit);
			}else{
		    return $this->get($tableName); 
			}
	}
	
	public function limit($tableName = NULL, $where = array(), $limit = NULL, $offset = NULL, $sortFilde = NULL, $sort = NULL){
		$this->CI->db->limit($limit,$offset);
		return $this->get($tableName, 'result' ,$where,$sortFilde ,$sort);
		}
	
	public function get_filde($tableName = NULL, $where = array(), $filde = NULL){
		$this->CI->db->select($filde);
		$result = $this->get($tableName, NULL, $where);
		foreach($result as $row){
			return  $row->$filde;
			}
	
	}
	public function delete($tableName = NULL, $where = NULL){
		$this->CI->db->where($where);
		$this->CI->db->delete($tableName); 
	}
	
	public function count_all($tableName = NULL){
		return $this->CI->db->count_all($tableName);
		}
		
	public function count_all_results($tableName = NULL, $where = array()){
				$this->CI->db->where($where);
		return $this->CI->db->count_all_results($tableName);
		}
		
	public function empty_table($tableName){
		$this->CI->db->empty_table($tableName); 
		}
		
	public function can_log_in($tableName = NULL, $query = array()){
				  	$CI =& get_instance();
		            $CI->db->where($query);	
					$CI->db->limit(1);				
    	$_query    = $CI->db->get($tableName);
		if($_query->num_rows() == 1){
			return TRUE;
			} else {
				return FALSE;
				}
				
		}				
}/*end web_config class*/
