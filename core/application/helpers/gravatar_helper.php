<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
*   aBlog cms
*	www.a-blog.ir
*	@author  Afshin Nj 
*/

if (!function_exists('gravatar'))
{
 
	function gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
		$url = 'http://www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= "?s=$s&d=$d&r=$r";
		if ( $img ) {
			$url = '<img src="' . $url . '"';
			foreach ( $atts as $key => $val )
				$url .= ' ' . $key . '="' . $val . '"';
			$url .= ' />';
		}
		return $url;
	}
 
 
}
