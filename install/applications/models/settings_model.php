<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_Model extends CI_Model
{

	/**
	 * Constructor
	 *
	 * @access public
	 * @param string
	 */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Save setting
     *
     * @access public
     * @param $key
     * @param $value
     * @return boolean
     */
    public function save_setting($title, $keyword, $email)
    {
        return $this->db->update('web_config', array('Web_Title' => $title,'Keywords'=>$keyword, 'Admin_Email'=>$email));
    }
}
/* End of file settings_model.php */
/* Location: ./install/application/models/settings_model.php */