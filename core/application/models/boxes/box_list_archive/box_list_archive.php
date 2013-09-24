<?php
class box_list_archive extends CI_Model
{
	public function initialize(){

		    $ListArticle = $this->lib_database->group_by('article','archiveDate',1);

			$return = '<div class="panel panel-default text-right dir-rtl">';
			$return .= '<div class="panel-heading">';
			$return .= '<label class="panel-text">آرشیو</label>';
			$return .= '</div>';
			$return .= '<div class="panel-body">';
			$return .= "<div class='list-group'>";
			foreach ($ListArticle as $row){
				$return .= "<a href='".site_url("archive")."/".$row->archiveDate."' class='list-group-item'>".$row->archiveDate."</a>";
				}
			$return .="</div>";					
			$return .='</div>';
			$return .= '</div>';

		return $return;	
	}
		
	public function model_install(){
		
		return array('title'=>'آرشیو مطالب');
		
		}
		
	public function configuration_install(){
			
		}

	
}

  