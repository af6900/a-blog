<?php
class MY_Controller extends CI_Controller {
	
		function __construct() {
			parent::__construct();
			
			//حذف محتوای پوشه 
			delete_files('./temporary/temp/', TRUE);
			}
}