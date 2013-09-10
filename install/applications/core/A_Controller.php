<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A_Controller extends CI_Controller
{
    /**
     * Constructor
     *
     * @access public
     * @param string
     */
    public function __construct()
    {
        parent::__construct();

        //initialize system language
        $this->lang->initialize();
        $this->output->set_header('Content-Type: text/html; charset=' . $this->lang->get_character_set());
        setlocale(LC_TIME, explode(',', $this->lang->get_locale()));

        $this->lang->ini_load('index.php');
    }
}

/* End of file TOC_Controller.php */
/* Location: ./install/core/TOC_Controller.php */