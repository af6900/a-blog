<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class configuration extends Admin_Controller {

   public function __construct()
    {
        parent::__construct();
    }
	
	public function index(){
		$this->db->cache_delete('configuration', 'index');
		$this->out('settings','webConfig');	 
		}

	public function SaveWebConfig(){
		$title       = $this->input->post('title',TRUE);
		$email       = $this->input->post('email',TRUE);
		$keyword     = $this->input->post('keywords',TRUE);
		$description = $this->input->post('description',TRUE);
		$data = array('Web_Title'   =>$title,
					  'Admin_Email' =>$email,
					  'Keywords'    =>$keyword,
					  'Description' =>$description);
		$this->model_web_config->save($data,1);
		redirect('configuration/success');
		}
				
	public function SiteOff(){
		$this->db->cache_delete('SiteOff', 'index');
		$data   = $this->model_web_config->get();
		foreach($data as $row){
			$data['WebOff']	     = $row->WebOff;
			$data['OffDescription'] = $row->OffDescription;
			}
		if($data['WebOff']=='1'){
			$data['WebOn']="";
			$data['WebOff']="checked='checked'";
			}
		else{
			$data['WebOn']="checked='checked'";
			}
			
		$this->out('settings','siteOff',$data);	
		}
		
	public function SaveSiteOFF(){
		$Off         = $this->input->post('siteOff',TRUE);
		$description = $this->input->post('description',TRUE);
		$data = array(
					  'WebOff'         =>$Off,
					  'OffDescription' =>$description,
		              );
		    $this->model_web_config->save($data, 1);
			redirect('SiteOff/success');
	
		}
		
	public function login(){
		$this->db->cache_delete('settings', 'index');
		$data['on'] = '';
		$data['off'] = '';
		$data['email'] = '';		
		$data['sms'] = '';
		$data['cacheOn'] = '';
		$data['cacheOff'] = '';
		if($this->web_config->get_login() == 1){$data['on']='checked="checked"';} else {$data['off']='checked="checked"';}
		if($this->web_config->get_send_email() == 1){$data['email']='checked="checked"';}
		if($this->web_config->get_send_sms() == 1){$data['sms']='checked="checked"';}
		if($this->web_config->get_cache() == 1){$data['cacheOn']='checked="checked"';} else {$data['cacheOff']='checked="checked"';}		
		$this->out('settings','login',$data);
		}
	public function savelogin(){
		$login = $this->input->post('login');
		$email =  $this->input->post('email');
		$sms = $this->input->post('sms');
		
			$data = array('login'=>$login, 'email'=>$email, 'sms'=>$sms);
     		$result = $this->model_web_config->save($data,1);
			if($result == 1){
				redirect('settings/success');
				}else{
					redirect('settings/error');
					}
		}
	public function cache(){
		$cache = $this->input->post('cache');
			$data = array('cache'=>$cache);
     		$result = $this->model_web_config->save($data,1);
			if($result == 1){
				 redirect('settings/success');
				}else{
					 redirect('settings/error');
					}		
		}	
}/* end { */

/* End of file configuration.php */
/* Location: ./blog/controllers/configuration.php */