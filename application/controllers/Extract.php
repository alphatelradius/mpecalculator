<?php

class Extract extends CI_Controller {

    function index() {
        $data['title'] = "RFDS Extractor";
        $this->load->view('rfdsextractor/home', $data);
    }

    function save_step_one() {
        $data = array(
            'name' => $this->input->post('name'),
            'foldername' => $this->input->post('foldername')
        );
        $foldername = $this->input->post('foldername');
        $id = $this->modeldb->insert($data, "rfds_extract");

        $path = "assets/files/rfdsextract/" . $foldername;

        if (!is_dir($path)) { //create the folder if it's not already exists
            mkdir($path, 0755, TRUE);
        }
        $this->session->set_userdata('id_folder', $id);
        $this->session->set_userdata('dropzone_folder', $foldername);
        echo $foldername;
    }

}
