<?php

class MY_Controller extends CI_Controller {

    public $site_data;

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('loged_in') == NULL) {
            redirect(base_url('home/login'));
        }
        
    }

    function site_data() {
        return $this->site_data;
    }

}