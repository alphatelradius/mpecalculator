<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dropzone extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'html', 'form'));
    }

    public function index() {
        $this->load->view('dropzone_view');
    }

    public function upload($dir = '') {
        $dir = $this->session->userdata('dropzone_folder');
        $id = $this->session->userdata('id_folder');
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = getcwd() . '/assets/files/rfdsextract' . '/' . $dir . '/';
            $targetFile = $targetPath . $fileName;
            move_uploaded_file($tempFile, $targetFile);
            // if you want to save in db,where here
            // with out model just for example
            // $this->load->database(); // load database
            $data = array(
                'id_folder' => $id,
                'filename' => '/assets/files/rfdsextract' . '/' . $dir . '/'.$fileName
            );
            $this->modeldb->insert($data, 'rfds_extract_files');
        }
    }

}
