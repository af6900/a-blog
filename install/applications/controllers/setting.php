<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends A_Controller
{
    /**
     * Constructor
     *
     * @access public
     * @param void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Connect to the database
     *
     * @access public
     * @return void
     */
    public function save () {
        //store settings
		
        $store_name = trim(urldecode($this->input->post('CFG_STORE_NAME')));
		$weblog_keyword = trim(urldecode($this->input->post('HTTP_WWW_ADDRESS')));  


        $store_owner_name = trim(urldecode($this->input->post('CFG_STORE_OWNER_NAME')));
        $email = trim(urldecode($this->input->post('CFG_STORE_OWNER_EMAIL_ADDRESS')));
        $username = trim(urldecode($this->input->post('CFG_ADMINISTRATOR_USERNAME')));
        $password = trim(urldecode($this->input->post('CFG_ADMINISTRATOR_PASSWORD')));
		
        $db_config = $this->session->userdata('db_config');

        //connect to database
        $this->load->database($db_config);

        //load settings model
        $this->load->model('settings_model');
		$this->load->model('administrators_model');
		$this->administrators_model->create($store_owner_name,$username,$password,$email);
		
		
		if($this->import_sample_sql()){
			$this->settings_model->save_setting($store_name, $weblog_keyword, $email);
		}
      
        //write database configuration file
        $this->write_database_file('../core/application/config/database.php', $db_config);


        $this->output->set_output(json_encode(array('success' => TRUE)));
    }

    /**
     * Import sample sql data
     *
     * @access private
     * @return boolean
     */
    private function import_sample_sql() {
        //get database configuration from session
        $config = $this->session->userdata('db_config');

        //connect to database
        $this->load->database($config);

        //database is connected
        if ($this->db) {
            $sql_data = $this->load->file(realpath(dirname(__FILE__) . '/../../../') . '/install/blog_sample_data.sql', TRUE);
            $sql_data = str_replace('`a_', '`' . $config['dbprefix'], $sql_data);

            //split sql data with ;
            $statements = preg_split("/;[\r\n]/", $sql_data) ;

            //execute the sql statement
            foreach ($statements as $statement) {
                $this->db->query($statement);
            }

            return TRUE;
        }

        return FALSE;
    }

    /**
     * Write configuration file
     *
     * @param string $http_server
     * @param string $http_path
     * @param array $http_url
     * @return boolean
     */
    private function write_config_file($http_server, $http_path, $http_url) {
        $file = file_get_contents('../local/config/config.php');
        $lines = explode("\n", $file);

        $output = array();
        foreach ($lines as $line) {
            //config -- base url
            if (strpos($line, '$config[\'base_url\']') === 0) {
                $output[] = '$config[\'base_url\']	= \'' . $http_server . $http_path . '\';';
            }
            //config -- cookie domain
            else if (strpos($line, '$config[\'cookie_domain\']') === 0) {
                $output[] = '$config[\'cookie_domain\']	= \'' . $http_url['host'] . '\';';
            }
            //config -- cookie path
            else if (strpos($line, '$config[\'cookie_path\']') === 0) {
                $output[] = '$config[\'cookie_path\']		= \'' . $http_path . '\';';
            }else {
                $output[] = $line;
            }
        }

        //write configuration file
        $fp = @fopen('../local/config/config.php', 'w');
        @fputs($fp, implode("\n", $output));
        fclose($fp);
    }

    /**
     * Write configuration file
     *
     * @param string $http_server
     * @param string $http_path
     * @param array $http_url
     * @return boolean
     */
    private function write_admin_config_file($http_server, $http_path, $http_url) {
        $file = file_get_contents('../admin/local/config/config.php');
        $lines = explode("\n", $file);

        $output = array();
        foreach ($lines as $line) {
            //config -- base url
            if (strpos($line, '$config[\'base_url\']') === 0) {
                $output[] = '$config[\'base_url\']	= \'' . $http_server . $http_path . 'admin/\';';
            }
            //config -- cookie domain
            else if (strpos($line, '$config[\'cookie_domain\']') === 0) {
                $output[] = '$config[\'cookie_domain\']	= \'' . $http_url['host'] . '\';';
            }
            //config -- cookie path
            else if (strpos($line, '$config[\'cookie_path\']') === 0) {
                $output[] = '$config[\'cookie_path\']		= \'' . $http_path . 'admin/\';';
            }else {
                $output[] = $line;
            }
        }

        //write configuration file
        $fp = @fopen('../admin/local/config/config.php', 'w');
        @fputs($fp, implode("\n", $output));
        fclose($fp);
    }

    /**
     * Write database config file
     *
     * @access private
     * @param string $location
     * @param array $config
     * @return boolean
     */
    private function write_database_file($location, $config) {
         $file = file_get_contents($location);

        $lines = explode("\n", $file);

        $output = array();
        foreach ($lines as $line) {
            //config -- base url
            if (strpos($line, '	\'hostname\'') === 0) {
                $output[] = '	\'hostname\' => \'' . $config['hostname'] . '\',';
            }
            //config -- cookie path
            else if (strpos($line, '	\'username\'') === 0) {
                $output[] = '	\'username\' => \'' . $config['username'] . '\',';
            }
            //config -- cookie path
            else if (strpos($line, '	\'password\'') === 0) {
                $output[] = '	\'password\' => \'' . $config['password'] . '\',';
            }
            //config -- cookie path
            else if (strpos($line, '	\'database\'') === 0) {
                $output[] = '	\'database\' => \'' . $config['database'] . '\',';
            }
            //config -- cookie path
            else if (strpos($line, '	\'dbdriver\'') === 0) {
                $output[] = '	\'dbdriver\' => \'' . $config['dbdriver'] . '\',';
            }
            //config -- cookie path
            else if (strpos($line, '	\'dbprefix\'') === 0) {
                $output[] = '	\'dbprefix\' => \'' . $config['dbprefix'] . '\',';
            } else {
                $output[] = $line;
            }
        }

        //write configuration file
        $fp = @fopen($location, 'w');
        if ($fp !== FALSE) {
            @fputs($fp, implode("\n", $output));
            @fclose($fp);

            return TRUE;
        }

        return FALSE;
    }
}

/* End of file setting.php */
/* Location: ./install/applications/controllers/setting.php */