<?php
class boxes_model extends AB_Model{
	
	//model_box v 1 beta
	
	protected $_table_name = 'boxes';
	protected $_order_by = 'id';
	
	public function upload(){
		if(!file_exists('./temporary/temp')){
			mkdir('./temporary/temp',0777,TRUE);
			}
		
		delete_files('./temporary/temp/', TRUE);
		
		$config['upload_path'] = './temporary/temp/';
		$config['allowed_types'] = '*';
		$config['max_size'] = '9000000';
		$this->upload->initialize($config);
		$this->upload->do_upload();
		$upload_data = $this->upload->data();
		$this->save($upload_data);
		}
		
	public function save($file = array()){
		$file['file_ext'];
		$file['raw_name'];
		$file['file_name'];
		
		$this->unzip->extract('temporary/temp/'.$file['raw_name'].'.zip');
		if(!file_exists(APPPATH.'models/boxes/'.$file['raw_name'])){
			mkdir(APPPATH.'models/boxes/'.$file['raw_name'],0755,TRUE);
			}
		if(!file_exists('./assets/models/'.$file['raw_name'])){
			mkdir('./assets/models/'.$file['raw_name'],0755,TRUE);
    		 copy('./assets/models/index.html','./assets/models/'.$file['raw_name'].'/index.html');
			}

		$getfile = get_dir_file_info("./temporary/temp");
		
		foreach($getfile as $row){
			  $ext = explode('.',$row['name']);
		      $fileExt = $ext[1];
			  
			  if($fileExt == 'php'){
				 copy('./temporary/temp/'.$file['raw_name'].'.php',APPPATH.'models/boxes/'.$file['raw_name'].'/'.$row['name']);
			     copy('./temporary/temp/index.html',APPPATH.'models/boxes/'.$file['raw_name'].'/index.html');
				 unlink('./temporary/temp/'.$file['raw_name'].'.php');
				  }
			 
			 if($fileExt == 'png' or $fileExt == 'jpg'){
				if(!file_exists('./assets/models/'.$file['raw_name'].'/images/')){
					mkdir('./assets/models/'.$file['raw_name'].'/images/',0755,TRUE);
					}
				 copy('./temporary/temp/'.$row['name'],'./assets/models/'.$file['raw_name'].'/images/'.$row['name']);

				 }
				 
			if($fileExt == 'css'){
				if(!file_exists('./assets/models/'.$file['raw_name'].'/css/')){
					mkdir('./assets/models/'.$file['raw_name'].'/css/',0755,TRUE);
					}
				 copy('./temporary/temp/'.$row['name'],'./assets/models/'.$file['raw_name'].'/css/'.$row['name']);
				 }
				 
			if($fileExt == 'js'){
				if(!file_exists('./assets/models/'.$file['raw_name'].'/javascript/')){
					mkdir('./assets/models/'.$file['raw_name'].'/javascript/',0755,TRUE);
					}
				 copy('./temporary/temp/'.$row['name'],'./assets/models/'.$file['raw_name'].'/javascript/'.$row['name']);
				 }	 	 
			}

		$this->load->model("boxes/".$file['raw_name']."/".$file['raw_name']."",'ModelBox',TRUE);
		
		
		$configuration_install = $this->ModelBox->configuration_install();
		
		if($configuration_install != NULL){
			$this->db->insert_batch('configuration',$configuration_install);
		}
		
		$model_install = $this->ModelBox->model_install();
		if($model_install != NULL){
			$data = array('name'=>$file['raw_name'],'title'=> $model_install);
		    $this->db->insert('boxes',$data);
		}

		
		}		
			
	public function update(){
		$box_name = $this->input->post('box_name');
		$kay = $this->input->post();
		foreach($kay as $row => $value) {
			$this->db->where('box_name',$box_name);
			$this->db->where('kay',$row);
			$data = array('value'=>$value);
			$this->db->update('configuration',$data);
			}
		}
	
	public function configuration_boxName($box_name){
		$this->db->where('box_name',$box_name);
		return $this->db->get('configuration')->result();
		}	

	public function configuration_kay($kay){
		$this->db->where('kay',$kay);
		$data = $this->db->get('configuration');
		foreach($data->result() as $row){
			return $row->value;
			}
		}	
	}