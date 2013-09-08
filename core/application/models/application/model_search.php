<?php
class Model_Search extends MY_Model
{

	public function search(){
		$search = $this->input->post('search',TRUE);
		if($search){
			$this->db->like('title', $search, 'both');
			$this->db->or_like('summary', $search, 'both');
			$this->db->or_like('fulltext', $search, 'both');
			return $this->db->get('a_article')->result();
		}else{
			return FALSE;
			}
		}

}