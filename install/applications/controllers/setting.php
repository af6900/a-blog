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

        //write store frontend config file
        $this->write_config_file();


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
	

    private function write_config_file() {
		
		$this->load->helper('file');
		$file = file_get_contents('../core/application/config/config.php');
        $lines = explode("\n", $file);
		$sess = str_replace( '$config[\'sess_use_database\'] = FALSE;','$config[\'sess_use_database\'] = TRUE;', $lines); 
        $fp = @fopen('../core/application/config/config.php', 'w');
        @fputs($fp, implode("\n", $sess));
        fclose($fp);
		
		
		$config = file_get_contents('../core/application/config/config.php');
        $hash = explode("\n", $config);
		$encryption = str_replace( '$config[\'encryption_key\'] = \'blog\';','$config[\'encryption_key\'] = \''.md5(rand(111111,rand(1111111111,9999999999))).'\';', $hash);
		$fpn = @fopen('../core/application/config/config.php', 'w');
		@fputs($fpn, implode("\n", $encryption));
		fclose($fpn);
		
		
		$www_location = 'http://' . $_SERVER['HTTP_HOST'];
		if (isset($_SERVER['REQUEST_URI']) && (empty($_SERVER['REQUEST_URI']) === false)) {
			$www_location .= $_SERVER['REQUEST_URI'];
		} else {
			$www_location .= $_SERVER['SCRIPT_FILENAME'];
		}
		
		$www_location = substr($www_location, 0, strpos($www_location, 'install'));
				
		$url = file_get_contents('../core/application/config/config.php');
        $base = explode("\n", $url);
		$base_url = str_replace( '$config[\'base_url\'] = \'blog\';','$config[\'base_url\'] = \''.$www_location.'\';', $base); 
        $fpc = @fopen('../core/application/config/config.php', 'w');
        @fputs($fpc, implode("\n", $base_url));
        fclose($fpc);
				
		
		
		write_file('./lock.md5', md5('blog install lock'),'w');

		
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