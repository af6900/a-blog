<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class block extends Admin_Controller {
	      

   public function __construct()
    {
        parent::__construct();	
    }

	public function index()  
    {
	echo 'ajaxProcessor';	  
	}
	
	public function save(){
		$this->db->cache_delete('ajaxProcessor', 'block');	
		$items = $this->input->get('item');
        $total_items = count($this->input->get('item'));
        for($item = 0; $item < $total_items; $item++ )
        {

            $data = array(
                    'id' => $items[$item],
                    'row' => $order = $item
            );
			$this->lib_database->save('a_block',$data,array('id'=>$data['id']));
        }
	}	
	
}
