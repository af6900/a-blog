<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();
		
    }
	
	public function index()
	{
		$this->db->cache_delete('admin', 'index');
		$this->db->cache_delete('ajaxProcessor', 'index');
		//$this->db->cache_delete_all();
		$data['articleList'] = $this->lib_database->limit('a_article',NULL, 5,NULL,'id','DESC');
		$data['articleCout'] =  $this->lib_database->count_all('a_article');	
		$data['sectionCout'] =  $this->lib_database->count_all('a_article_section');
		$data['newsCount']   =  $this->lib_database->count_all('a_news');
		$data['commentCount'] = $this->lib_database->count_all('a_comment');
		$data['countStatus'] = $this->lib_database->count_all('a_status');
		$data['sectionvisit'] = $this->lib_database->limit('a_article_section',array('visit >='=>1),5,NULL,'visit','DESC');
		$data['articlevisit'] = $this->lib_database->limit('a_article',array('visit >='=>1),5,NULL,'visit','DESC');
		$data['dey'] = $this->lib_database->get_filde('a_visit',NULL,'dey');
		$data['total'] = $this->lib_database->get_filde('a_visit',NULL,'total');
		
		$this->out('panel','panel',$data); 
	}

	public function fileManager()
	{
		$this->out('fileManager','fileManager');
	}
}/* end { */

/* End of file admin.php */
/* Location: ./blog/controllers/admin.php */