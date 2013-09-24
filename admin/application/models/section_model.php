<?php
class section_model extends AB_Model{
	
		protected $_table_name = 'article_section';
		protected $_order_by = 'id';
		protected $_rules = array('title' => array(
										'field' => 'title', 
										'label' => 'عنوان', 
										'rules' => 'trim|required|xss_clean'
									)
								);
									
	
	public function Article_Select_Section(){
			$section   = $this->uri->segment(3);
			$result = $this->model_section->get_by(array('title'=> urldecode($section)));
			foreach($result as $row){
				$id = $row->id;
				}
			if(isset($id)){
				     $count = $this->uri->segment(3);
					 $this->db->order_by("id", "desc");
					 $this->db->limit(5,$count);
					 $this->db->where('archive','0');
					 $this->db->where('sectionId',$id);
					 $this->db->where('publish_up <= '.adate(4).date('His'));
					 $this->db->where('publish_down >= '.adate(4));
			$data  = $this->db->get('article'); 
			return $data->result();
				}
				

	  }
}