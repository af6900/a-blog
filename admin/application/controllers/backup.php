<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class backup extends AB_Controller {

   public function __construct()
    {
        parent::__construct();
	
    }
	
	public function index()
	{

		
	  if(!file_exists(APPPATH.'backup')){
	     mkdir(APPPATH.'backup',0777,TRUE);
	  }
	  	 
	  $map = get_dir_file_info(APPPATH."backup/");
	  $data['file']= $map;
		$this->out('backup','backup',$data);
			
	}
	
	public function create(){

		$this->load->dbutil();
		
		$prefs = array(
			'format'      => 'txt',             // gzip, zip, txt
			'filename'    => 'mybackup',    // File name - NEEDED ONLY WITH ZIP FILES
			'newline'     => "\n"               // Newline character used in backup file
		  );
	  $backup =& $this->dbutil->backup($prefs); 
	  
		// Load the file helper and write the file to your server date('Y-m-d');
		$name = adate(1);
		write_file(APPPATH.'backup/'.$name.'.sql', $backup); 
		
		redirect('backup');
		}
		
	public function download(){
		$file = $this->uri->segment(2);
		$folder = file_get_contents(APPPATH."backup/".$file);
		force_download($file,$folder);	
		}
		
	public function delete(){
		$file = $this->uri->segment(2);
		@unlink(APPPATH."backup/".$file);
		redirect('backup');
		}		
	
	public function restore(){
			
			$yeni = explode(";\n", read_file(APPPATH.'backup/'.$this->uri->segment(2)));
			foreach($yeni as $sql){
				if(trim($sql) != ''){
					 $this->db->query(trim($sql));
				}
			} 
			redirect('backup');
		}	
}/* end { */

/* End of file backup.php */
/* Location: ./blog/controllers/admin.php */