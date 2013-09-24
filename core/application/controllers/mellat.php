<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mellat extends Frontend_Controller {

   public function __construct()
    {
        parent::__construct();

    }
	public function index(){
		require_once(APPPATH.'libraries/nusoap/nusoap'.EXT); //includes nusoap
		$pric = '5000';
		$order = rand(100000,999999);
	    $res = $this->mellat->request($pric,$order,'http://theafshinnotes.ir/callback');
			$data = array('price'=>$pric,'order'=>$order,'res'=>$res);
		  	$this->session->set_userdata($data);
		$this->mellat->go2bank($res);
		
		}
	public function callback(){
		 $price= $this->session->userdata('price');
		 $order_id= $this->session->userdata('order');
	     $res = $this->session->userdata('res');
		$resutl = $this->mellat->verify($price,$order_id,$res);
		 if($resutl == TRUE){
			 $data['msg'] = 'کد رهگیری'.$this->mellat->SaleReferenceId;
			 }else{
				 
			$data['msg'] = 'انصراف از پرداخت';
				 }
			$this->template->out($data);
		}

}

/* End of file site.php */
/* Location: ./blog/controllers/site.php */