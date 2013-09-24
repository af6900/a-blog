<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class configuration extends AB_Controller {

   public function __construct()
    {
        parent::__construct();
    }
	
	public function index(){
		
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
		$this->lib_database->save('web_config',$data,array('id'=>1));
		redirect('configuration/success');
		}
				
	public function SiteOff(){
		
		$data   = $this->lib_database->get('web_config');
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
		    $this->lib_database->save('web_config',$data, array('id'=>1));
			redirect('SiteOff/success');
	
		}
		
	public function login(){
		
		$data['on'] = '';
		$data['off'] = '';
		$data['email'] = '';		
		$data['sms'] = '';
		$data['cacheOn'] = '';
		$data['cacheOff'] = '';
		if( get_login() == 1){$data['on']='checked="checked"';} else {$data['off']='checked="checked"';}
		if( get_send_email() == 1){$data['email']='checked="checked"';}
		if( get_send_sms() == 1){$data['sms']='checked="checked"';}
		if( get_cache() == 1){$data['cacheOn']='checked="checked"';} else {$data['cacheOff']='checked="checked"';}		
		$this->out('settings','login',$data);
		}
		
		
	public function savelogin(){
		$login = $this->input->post('login');
		$email =  $this->input->post('email');
		$sms = $this->input->post('sms');
		
			$data = array('login'=>$login, 'email'=>$email, 'sms'=>$sms);
     		$result = $this->lib_database->save('web_config',$data,array('id'=>1));
			if($result == 1){
				redirect('settings/success');
				}else{
					redirect('settings/error');
					}
		}
	public function cache(){
		$cache = $this->input->post('cache');
			$data = array('cache'=>$cache);
     		$result = $this->lib_database->save('web_config',$data,array('id'=>1));
			if($result == 1){
				 redirect('settings/success');
				}else{
					 redirect('settings/error');
					}		
		}	
}/* end { */

/* End of file configuration.php */
/* Location: ./blog/controllers/configuration.php */