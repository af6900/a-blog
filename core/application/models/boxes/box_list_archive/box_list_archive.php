<?php
class box_list_archive extends CI_Model
{
	public function initialize(){

		$ListArticle = $this->model_article->group_by(array('archive'=>'1'),'archiveDate');
		$return = '<div class="boxTitle">آرشیو</div>';
		$return .= '<ul class="UlLeftMenu">';
		foreach ($ListArticle as $row){
			$return .= "<li class='LiRightMenu'><a href=".base_url()."archive/".$row->archiveDate.">";
			$return .= $row->archiveDate;
			$return .= "</a></li>";
			}
		$return .= "</ul>";	
		return $return;	
	}
		
	public function model_install(){
		
		return array('title'=>'آرشیو مطالب');
		
		}
		
	public function configuration_install(){
			
		}

	
}

  