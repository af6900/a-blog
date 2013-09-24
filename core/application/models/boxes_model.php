<?php
class boxes_model extends AB_Model{
	
	//model_box v 1 beta
	
	protected $_table_name = 'boxes';
	protected $_order_by = 'id';

	
	public function configuration_boxName($box_name){
		$this->db->where('box_name',$box_name);
		return $this->db->get('configuration')->result();
		}	

	public function configuration_kay($kay){
		$this->db->where('kay',$kay);
		$data = $this->db->get('configuration');
		foreach($data->result() as $row){
			return $row->value;
			}
		}	
	}