<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class communique extends Admin_Controller {
	      

   public function __construct()
    {
        parent::__construct();	
    }

	public function index()  
    {
		$this->db->cache_delete('ajaxProcessor', 'communique');	
		?>
        <script language="javascript">
        $(document).ready(function(e){
			
			$('.commuDel').click(function(){ 
			  var id = $(this).attr('data-del');
						$.ajax({
							 type:'GET',
							 url:base_url+"ajaxProcessor/communique/delete",
							 data:{'id' : id},
							 success: function(){
									$('#'+id).fadeOut(600)

								 }
							});
				})
			
			})
		</script>
        <?php 
		$communique = $this->lib_database->get('a_communique');

			foreach($communique as $row){
				  $return =  '<li class="list-group-item" id="'.$row->id.'">';
				  $return .= '<span class="pull-left" ><a href="javascript:void(null);" class="commuDel" data-del="'.$row->id.'"><span class="glyphicon glyphicon-trash"></span></a></span>';
				  $return .= $row->text;
				  $return .= '</li>';
				  echo $return;
			}			

		
	}
	public function save(){
		$data = array(
					'text'=>$this->input->get('communique',TRUE),
					'startPublic' => $this->input->get('start',TRUE),
					'endPublic' => $this->input->get('end',TRUE)
					);
		$this->lib_database->save('a_communique',$data);
		echo json_decode('1'); 
	}
	
	public function delete(){
		$this->lib_database->delete('a_communique',array('id'=>$this->input->get('id')));
	}	
	
}
