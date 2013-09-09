<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_template
{
	protected $CI;

	
	public function __construct()
	{
		$this->CI =& get_instance();

	}
	
	function get_template_name(){
		$this->CI->db->where('active','1');
		$result = $this->CI->db->get('templates')->result();
		foreach($result as $row){
			return $row->name;
			}
		}
		
	function PageCount($total_rows = NULL, $page = NULL ,$section = NULL, $segment = NULL){
		      $config['base_url'] = site_url($page.'/'.$section);
			  $config['total_rows'] = $total_rows;
			  $config['per_page'] = 5;
			  
			  $config['next_link'] = FALSE;
			  $config['prev_link'] = FALSE;
			  
			  $config['last_link'] = FALSE;
			  $config['first_link'] = FALSE;
			  
			  $config['uri_segment'] = $segment;
			  
			  $config['num_links'] = 15;
			  
			  $config['cur_tag_open'] = '<div class="cur_tag">';
			  $config['cur_tag_close'] = '</div>';
			  
			  $config['num_tag_open'] = '<div class="num_tag">';
    		  $config['num_tag_close'] = '</div>';
			  $this->CI->pagination->initialize($config);
			  $count = $this->CI->pagination->create_links();
			  return $count;	
		}
			
	public function out($data= array('not_things'=>'empty'))//$page = 'contain',
	{

		 $data['date'] = adate();
         $data['UserName'] = $this->CI->session->all_userdata(); 
		
		$page = urldecode($this->CI->uri->segment(1));
		
		/* article visit count */
		$article_id = $this->CI->uri->segment(2);
		if(! is_null($article_id) AND $page =='summary'){
			$this->CI->db->cache_delete('default', 'index');
			$visit = 1 + $this->CI->lib_database->get_filde('article',array('id'=>$article_id),'visit');
		 	$this->CI->lib_database->save('article',array('visit'=>$visit),array('id'=>$article_id));
			}
		/* section visit count */	
		$section =urldecode($this->CI->uri->segment(2));	
		if(! is_null($section) AND $page == 'section'){
			$this->CI->db->cache_delete('default', 'index');
			$visit = 1 + $this->CI->lib_database->get_filde('article_section',array('title'=>$section),'visit');
			$this->CI->lib_database->save('article_section',array('visit'=>$visit),array('title'=>$section));
			}
		
		
			
		if ( ! file_exists("templates/".$this->get_template_name()."/".$page.".php"))
			{
			$page = 'contain';	
    		}
		$this->CI->load->view("../../../templates/".$this->get_template_name()."/header",$data);
		$this->CI->load->view("../../../templates/".$this->get_template_name()."/".$page."");
		$this->CI->load->view("../../../templates/".$this->get_template_name()."/footer");

    }
	
				
}
 