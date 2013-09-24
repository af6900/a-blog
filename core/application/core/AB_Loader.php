<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_Loader Class
 * 
 * Custom Loader class that extends the base CI_Loader to override the location
 * of the views directory.
 */
class AB_Loader extends CI_Loader {

	function __construct() {
		parent::__construct();
		$this->_ci_view_paths = array('templates/'	=> TRUE);
		}

}