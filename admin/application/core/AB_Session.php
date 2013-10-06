<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AB_Session extends CI_Session
{

	function sess_update ()
	{
		parent::__construct();
		// Listen to HTTP_X_REQUESTED_WITH
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
			// This is NOT an ajax call
			$this->sess_update();
		}
	}
}