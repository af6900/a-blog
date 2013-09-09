<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminUser extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();
    }
	
	public function index(){
		$data['msg'] = NULL;

		if($this->model_admin_users->validation() == TRUE){
			 $avatar = $this->file->upload('./upload/avatar','gif|jpg|png');
			 $save=(array('name'=>$this->input->post('name',TRUE),'LoginName'=> trim($this->input->post('LoginName',TRUE)),
							'LoginPass'=>$this->ablog->a_hash(trim($this->input->post('LoginPass'))),
							'UserEmail'=>trim($this->input->post('UserEmail',TRUE)),
							'UserAvatar'=>$avatar,
							'UserMobile'=>trim($this->input->post('mobile',TRUE))));
				
				$result = $this->model_admin_users->save($save);
				if($result){
					$data['msg'] = 'success';
				}else{
					$data['msg'] = 'error';
					}		
					
			}
		
		$data['user'] = $this->model_admin_users->get();
		$this->db->cache_delete('admin-users-list', 'index');
		$this->out('adminUser','newUser',$data);	
		}
	//=== delete User Code ===\\	
	public function delete(){
		$image = $this->model_admin_users->get_one(array('id'=>$this->uri->segment(2)),'UserAvatar');
		@unlink('./images/avatar/'.$image);
		$this->model_admin_users->Delete($this->uri->segment(2));
		redirect('admin-users-list');	


		}
		
	//=== Edit User Page ===\\	
	public function edit(){
		$id = $this->uri->segment(2);
		$this->db->cache_delete('admin-user-edit', $id);
		$data = $this->model_admin_users->get_by(array('id'=>$id)); 
		if($data){ 
			foreach($data as $row){
			    $data['id']    = $row->id;
				$data['name'] = $row->name;	
			    $data['userName']  = $row->LoginName;
				$data['email'] = $row->UserEmail;
				$data['mobile'] = $row->UserMobile;
				$data['avatar'] = $row->UserAvatar;
				}
			$this->out('adminUser','editUser',$data);	
			} else{
				redirect('admin-users-list');
				}
		}
		//=== Update User Code ===\\
	public function update(){
		$avatar = $this->file->upload('./images/avatar','gif|jpg|png');
		$name = $this->input->post('name',TRUE);
		$loginName   = $this->input->post('LoginName',TRUE);
		$pass   = $this->ablog->a_hash($this->input->post('LoginPass'));
		$email  = $this->input->post('UserEmail',TRUE);
		$mobile  = $this->input->post('mobile',TRUE);
			if($avatar != NULL){
				$data=(array('name' => $name, 
							'LoginName'=>$loginName,
							'LoginPass'=>$pass,
							'UserEmail'=>$email,
							'UserAvatar'=>$avatar,
							'UserMobile'=>$mobile));
			} else {
				$data=(array(
							'name' => $name, 
							'LoginName'=>$loginName,
							'LoginPass'=>$pass,
							'UserEmail'=>$email,
							'UserMobile'=>$mobile));
				}
	     	$id = $this->input->post('id',TRUE);
			$result = $this->model_admin_users->save($data,$id);
			if($result){
				redirect('admin-users-list/success');
			}else{
				redirect('admin-users-list/error');
				}	
			
		}
		
		
		public function listUser(){
			$this->db->cache_delete('admin-user-list', 'index');
			$data['user'] = $this->lib_database->get('admin_user');
			$this->out('adminUser','list',$data);
			}
			
		public function send_email(){
			$data['id'] =  $this->uri->segment(2);
			$email = $this->lib_database->get_filde('admin_user',array('id'=>$this->input->post('id')),'UserEmail');
			$title = $this->input->post('title',TRUE);
			$msg = $this->input->post('text');
			if($msg !=''){
				send_email($msg,$title,$email);
				redirect('admin-users-list');
				}
			$this->out('adminUser','email',$data); 
			}
		
		public function send_group_email(){
			$title = $this->input->post('title',TRUE);
			$msg = $this->input->post('text');
			if($msg != ''){
				$for = $this->lib_database->get('admin_user');
				foreach($for as $row){
					send_email($msg,$title,$row->UserEmail);
					}
				}
			$this->out('adminUser','groupSend');
			}
			
}/* end { */

/* End of file users.php */
/* Location: ./blog/controllers/users.php */
