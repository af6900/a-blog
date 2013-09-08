<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class friend extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();
    }
	public function index(){
		$this->db->cache_delete('friend', 'index');
		$data['friends'] = $this->lib_database->get('a_friends');
		$this->out('friends','friends',$data);		
		}
		
	public function newFriend(){
		$name   = $this->input->post('name',TRUE);
		$link   = $this->input->post('link',TRUE);
		$data = array('name'=>$name, 'link'=>$link);
		$this->lib_database->save('a_friends',$data);
		redirect('friend');
		}	
	public function deleteFriende(){
		$this->lib_database->delete('a_friends',array('id'=>$this->uri->segment(2)));
		redirect('friend');
		}		
}/* end { */

/* End of file friends.php */
/* Location: ./blog/controllers/friends.php */