<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Administrators_Model extends CI_Model
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
     * Create customer data
     *
     * @access public
     * @param $username
     * @param $password
     * @param $email
     * @return boolean
     */
    public function create($store_owner_name,$username, $password, $email)
    {
        //insert into admin table
        $result = $this->db->insert('admin_user', array('name'=>$store_owner_name,'LoginName' => $username, 'LoginPass' => encrypt_string($password), 'UserEmail' => $email));

    }
}
/* End of file administrators_model.php */
/* Location: ./install/application/models/administrators_model.php */