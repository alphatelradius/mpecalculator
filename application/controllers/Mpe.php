<?php

class Mpe extends CI_Controller {

    function __contruct() {
        
    }
    
    function index(){
        $data['title']="MPE Calcultor - All MPE";
        $this->load->view('mpe/index');
    }
    
    function add(){
        $data['title']="MPE Calcultor - Add MPE";
        $this->load->view('mpe/add');
    }

}
