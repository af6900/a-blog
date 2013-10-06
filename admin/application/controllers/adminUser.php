<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminUser extends AB_Controller {

   public function __construct()
    {
        parent::__construct();
    }
	
	public function index(){
		$data['msg'] = NULL;

		if($this->admin_users_model->validation() == TRUE){
			$avatar = $this->file->upload('../upload/avatar/','gif|jpg|png');
			 $save=(array('name'=>$this->input->post('name',TRUE),
			 	  			'LoginName'=> trim($this->input->post('LoginName',TRUE)),
							'LoginPass'=>encrypt(trim($this->input->post('LoginPass'))),
							'UserEmail'=>trim($this->input->post('UserEmail',TRUE)),
							'UserAvatar'=>$avatar,
							'UserMobile'=>trim($this->input->post('mobile',TRUE)),
							'yahoo'=>trim($this->input->post('yahoo',TRUE)),
							'facebook'=>trim($this->input->post('facebook',TRUE)),
							'twitter'=>trim($this->input->post('twitter',TRUE)),
							'instagram'=>trim($this->input->post('instagram',TRUE)),
							'about'=>trim($this->input->post('about',TRUE))));
				
				$result = $this->admin_users_model->save($save);
				if($result){
					$data['msg'] = 'success';
				}else{
					$data['msg'] = 'error';
					}		
					
			}
		
		$data['user'] = $this->admin_users_model->get();
		$this->out('adminUser','newUser',$data);	
		}
	//=== delete User Code ===\\	
	public function delete(){
		$image = $this->admin_users_model->get_one(array('id'=>$this->uri->segment(2)),'UserAvatar');
		@unlink('../upload/avatar/'.$image);
		$this->admin_users_model->Delete($this->uri->segment(2));
		redirect('admin-users-list');	


		}
		
	//=== Edit User Page ===\\	
	public function edit(){
		$id = $this->uri->segment(2);

		$data = $this->admin_users_model->get_by(array('id'=>$id)); 
		if($data){ 
			foreach($data as $row){
			    $data['id']    = $row->id;
				$data['name'] = $row->name;	
			    $data['userName']  = $row->LoginName;
				$data['email'] = $row->UserEmail;
				$data['mobile'] = $row->UserMobile;
				$data['avatar'] = $row->UserAvatar;
			    $data['yahoo']  = $row->yahoo;
				$data['twitter'] = $row->twitter;
				$data['facebook'] = $row->facebook;
				$data['instagram'] = $row->instagram;	
				$data['about'] = $row->about;			
				}
			$this->out('adminUser','editUser',$data);	
			} else{
				redirect('admin-users-list');
				}
		}
		//=== Update User Code ===\\
	public function update(){
		$avatar = $this->file->upload('../upload/avatar/','gif|jpg|png');
			if($avatar != NULL){
 					$data=(array('name'=>$this->input->post('name',TRUE),
			 	  			'LoginName'=> trim($this->input->post('LoginName',TRUE)),
							'LoginPass'=>encrypt(trim($this->input->post('LoginPass'))),
							'UserEmail'=>trim($this->input->post('UserEmail',TRUE)),
							'UserAvatar'=>$avatar,
							'UserMobile'=>trim($this->input->post('mobile',TRUE)),
							'yahoo'=>trim($this->input->post('yahoo',TRUE)),
							'facebook'=>trim($this->input->post('facebook',TRUE)),
							'twitter'=>trim($this->input->post('twitter',TRUE)),
							'instagram'=>trim($this->input->post('instagram',TRUE)),
							'about'=>trim($this->input->post('about',TRUE))));
			} else {
 				$data=(array('name'=>$this->input->post('name',TRUE),
			 	  			'LoginName'=> trim($this->input->post('LoginName',TRUE)),
							'LoginPass'=>encrypt(trim($this->input->post('LoginPass'))),
							'UserEmail'=>trim($this->input->post('UserEmail',TRUE)),
							'UserMobile'=>trim($this->input->post('mobile',TRUE)),
							'yahoo'=>trim($this->input->post('yahoo',TRUE)),
							'facebook'=>trim($this->input->post('facebook',TRUE)),
							'twitter'=>trim($this->input->post('twitter',TRUE)),
							'instagram'=>trim($this->input->post('instagram',TRUE)),
							'about'=>trim($this->input->post('about',TRUE))));
				}
	     	$id = $this->input->post('id',TRUE);
			$result = $this->admin_users_model->save($data,$id);
			if($result){
				redirect('admin-users-list/success');
			}else{
				redirect('admin-users-list/error');
				}	
			
		}
		
		
		public function listUser(){

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
