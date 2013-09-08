<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class status extends Admin_Controller {
	      

   public function __construct()
    {
        parent::__construct();	
    }

	public function index()  
    {
		 $this->db->cache_delete('ajaxProcessor', 'status');
	?>
        <script language="javascript">
        $(document).ready(function(e){
			
			$('.statusDel').click(function(){ 
			  var id = $(this).attr('data-del');
						$.ajax({
							 type:'GET',
							 url:base_url+"ajaxProcessor/status/delete",
							 data:{'id' : id},
							 success: function(){
									$('#'+id).fadeOut(600)

								 }
							});
				})
			
			})
		</script>
      <?php 
	  		$count = $this->input->get('count',TRUE);
	  		$status = $this->lib_database->limit('a_status',NULL,10,$count,'id','DESC');
			foreach($status as $row){
				  $return =  '<li class="list-group-item" id="'.$row->id.'">';
				  $return .= '<span class="pull-left" ><a href="javascript:void(null);" class="statusDel" data-del="'.$row->id.'"><span class="glyphicon glyphicon-trash"></span></a></span>';
				  $return .= $row->text;
				  $return .= '</li>';
				  echo $return;
			}	  
	}
	
	public function save(){
		$data = array(
					'text'=>$this->input->get('status',TRUE),
					'startPublic' => $this->input->get('start',TRUE),
					'endPublic' => $this->input->get('end',TRUE)
					);
		$this->lib_database->save('a_status',$data);
		echo json_decode('1'); 
	}
	
	public function delete(){
		$this->lib_database->delete('a_status',array('id'=>$this->input->get('id')));
		echo json_decode('1');
		}	
	
}
