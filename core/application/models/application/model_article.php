<?php
class Model_Article extends MY_Model
{
		protected $_table_name = 'a_article';
		protected $_order_by = 'id';	
		protected $_rules = array(
		'title' => array(
			'field' => 'title', 
			'label' => 'عنوان', 
			'rules' => 'trim|required|xss_clean'
		), 
		'keywords' => array(
			'field' => 'keywords', 
			'label' => 'کلمات کلیدی', 
			'rules' => 'trim|required|xss_clean'
		),
		'summary' => array(
			'field' => 'summary', 
			'label' => 'خلاصه مطلب', 
			'rules' => 'trim|required'
		)
	);			

}