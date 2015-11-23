<?php

class Home extends CI_Controller {

    function index() {
        if ($this->session->userdata('loged_in') == NULL) {
            $this->load->view('login');
        } else {
            $this->load->view('home');
        }
    }

    function login() {
        $data['title'] = "Login";
        $this->load->view('login', $data);
    }

    function process_login() {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );
        $loged_in = $this->Modeldb->get_by($data, 'users');
        if ($loged_in != NULL) {
            $this->session->set_userdata('loged_in', $loged_in[0]->password);
            $this->session->set_userdata('name', $loged_in[0]->fullname);
            redirect(base_url('home'));
        } else {
            $data['warning'] = "Username/Password is wrong";
            $data['title'] = "Login";
            $this->load->view('login', $data);
        }
    }
    
    function logout(){
        $this->session->unset_userdata('loged_in');
        $this->session->unset_userdata('name');
        redirect(base_url('home'));
    }

}
