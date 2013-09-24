<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('lang'))
{
    function lang($key)
    {
        $CI =& get_instance();

        return $CI->lang->line($key);
    }
}

/**
 * Gets all languages
 *
 * @access public
 * @return array languages
 */
if( ! function_exists('lang_code'))
{
    function lang_code()
    {
        $CI =& get_instance();

        return $CI->lang->get_code();
    }
}

/**
 * Gets all languages
 *
 * @access public
 * @return array languages
 */
if( ! function_exists('get_languages'))
{
    function get_languages()
    {
        $CI =& get_instance();

        return $CI->lang->get_languages();
    }
}

/**
 * Display language flag
 *
 * @access public
 * @param $code language code
 * @return array languages
 */
if( ! function_exists('get_language_flag'))
{
    function get_language_flag($code)
    {
        $flag = strtolower(substr($code, 3));

        return site_url('../assets/images/worldflags/' . $flag . '.png');
    }
}


if ( ! function_exists('lang_get_text_direction'))
{
  function lang_get_text_direction() {
    $CI =& get_instance();
    
    $text_direction = $CI->lang->get_text_direction();
    
    return $text_direction;
  }

}


if ( ! function_exists('lang_get_code'))
{
  function lang_get_code() {
    $CI =& get_instance();
    
    $lang_code = $CI->lang->get_code();
    
    return $lang_code;
  }
}

if ( ! function_exists('lang_id'))
{
  function lang_id() {
    $CI =& get_instance();
    
    $lang_id = $CI->lang->get_id();
    
    return $lang_id;
  }
}

if( ! function_exists('lang_get_all'))
{
  function lang_get_all()
  {
    $CI =& get_instance();
    $line = $CI->lang->get_all();
    
    if (empty($line)) {
      return $key;
    }

    return $line;
  }
}

if( ! function_exists('config'))
{
  function config($key)
  {
    $CI =& get_instance();
    $line = $CI->configuration->line($key);

    return $line;
  }
}
/* End of file general_helper.php */

