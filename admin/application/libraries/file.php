<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CI_file {
	protected $CI;
	public function __construct()
	{
		$this->CI =& get_instance();

	}
   	public function upload($folder,$types){
		
			$config['upload_path']   = $folder;
			$config['allowed_types'] = $types;
			$config['max_size']	  = '9000000';
			$this->CI->upload->initialize($config);
			$this->CI->upload->do_upload();
			 $data = $this->CI->upload->data();
			return $data['file_name'];
				
		}
		/* end upload */
		
	public function watermark($source,$hor,$vrt){
			$this->CI->load->library('image_lib');
		    $config['source_image'] = './images/avatar/12.jpg';
			$config['wm_text'] = 'afshin';
			$config['wm_type'] = 'text';
			$config['wm_font_path'] = './core/system/fonts/texb.ttf';
			$config['wm_font_size'] = '16';
			$config['wm_font_color'] = 'ffffff';
//			$config['wm_vrt_alignment'] = 'bottom';
// 			$config['wm_hor_alignment'] = 'center';
			$config['wm_hor_offset'] = '-100px';
			$config['wm_vrt_offset'] = '500px';
			$this->CI->image_lib->initialize($config);
			$this->CI->image_lib->watermark();
		
		}	
}
