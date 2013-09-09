<?php
class model_admin_users extends MY_Model
{
	protected $_table_name = 'admin_user';
	protected $_order_by = 'id';
	protected $_rules = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'نام', 
			'rules' => 'trim|required|xss_clean|is_unique[admin_user.name]'
		),
		'LoginName' => array(
			'field' => 'LoginName', 
			'label' => 'نام کاربری', 
			'rules' => 'trim|required|xss_clean|is_unique[admin_user.LoginName]'
		), 
		'LoginPass' => array(
			'field' => 'LoginPass', 
			'label' => 'رمز عبور', 
			'rules' => 'trim|required|min_length[6]|max_length[12]|matches[LoginPassconf]'
		),
		'LoginPassfconf' => array(
			'field' => 'LoginPassconf', 
			'label' => 'تکرار رمز عبور', 
			'rules' => 'trim|required|min_length[6]|max_length[12]'
		),
		'UserEmail' => array(
			'field' => 'UserEmail', 
			'label' => 'ایمیل', 
			'rules' => 'trim|required|xss_clean|valid_email'
		),
		'mobile' => array(
			'field' => 'mobile', 
			'label' => 'تلفن همراه', 
			'rules' => 'trim|required|xss_clean'
		)
	);


}