<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends AB_Controller {

   public function __construct()
    {
        parent::__construct();
		
    }
	
	public function index()
	{

		
		$data['articleList'] = $this->lib_database->limit('article',NULL, 5,NULL,'id','DESC');
		$data['articleCout'] =  $this->lib_database->count_all('article');	
		$data['sectionCout'] =  $this->lib_database->count_all('article_section');
		$data['newsCount']   =  $this->lib_database->count_all('news');
		$data['commentCount'] = $this->lib_database->count_all('comment');
		$data['countStatus'] = $this->lib_database->count_all('status');
		$data['sectionvisit'] = $this->lib_database->limit('article_section',array('visit >='=>1),5,NULL,'visit','DESC');
		$data['articlevisit'] = $this->lib_database->limit('article',array('visit >='=>1),5,NULL,'visit','DESC');
		$data['dey'] = $this->lib_database->get_filde('visit',NULL,'dey');
		$data['total'] = $this->lib_database->get_filde('visit',NULL,'total');
		
		$this->out('panel','panel',$data); 
		
		$expire = $this->CI->lib_database->get_filde('web_config',NULL,'clear_cache');
		if($expire < time()){
			$this->db->cache_delete_all();
			$this->CI->lib_database->save('web_config',array('clear_cache'=> time()+ 7200),array('id'=>1));
			}
			
			
			
			

			
			
	}

	public function fileManager()
	{
		$this->out('fileManager','fileManager');
	}
}/* end { */

/* End of file admin.php */
/* Location: ./blog/controllers/admin.php */