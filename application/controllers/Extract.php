<?php

class Extract extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('datatables');
    }

    function index() {
        $data['title'] = "RFDS Extractor";
        $this->load->view('rfdsextractor/add', $data);
    }

    function show() {
        $data['title'] = "RFDS Extractor";
        $this->load->view('rfdsextractor/list', $data);
    }

    function getData() {
        $this->datatables->select('id,name,foldername, site_id_cell, rbs_type_cell, lat_cell, long_cell,address_cell,fileresult')
                ->unset_column('id')
                ->unset_column('fileresult')
                ->from('rfds_extract');
        $this->datatables->add_column('File', '<a href="' . base_url('extract/edit/$1') . '"><div class="btn btn-success btn-mini"><i class="icon-download"></i></div></a>', 'fileresult');
        $this->datatables->add_column('Action', '<a href="' . base_url('extract/delete/$1') . '"><div class="btn btn-danger btn-mini"><i class="icon icon-trash"></i></div></a>'
                . '                 <a href="' . base_url('extract/detail/$1') . '"><div class="btn btn-success btn-mini"><i class="icon-info-sign"></i></div></a>', 'id');
        echo $this->datatables->generate();
    }

    function do_upload() {
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
                'filename' => '/assets/files/rfdsextract' . '/' . $dir . '/' . $fileName
            );
            $this->modeldb->insert($data, 'rfds_extract_files');
        }
    }

    function do_extract() {
        $extract_info = NULL;
        $extracts_data = $this->modeldb->get_by(array('id' => $this->session->userdata('id_folder')), 'rfds_extract');
        foreach ($extracts_data as $ed) {
            $extract_info = $ed;
        }
        $extracts_file = $this->modeldb->get_by(array('id_folder' => $this->session->userdata('id_folder')), 'rfds_extract_files');
        $extracts_data = $this->modeldb->get_by(array('id' => $this->session->userdata('id_folder')), 'rfds_extract');
        $header = array('Filename', 'Site ID', 'RBS Type', 'Latitude', 'Longitude', 'Address');
        $data_table = array();
        $i = 0;
        $data_table[0]['filename'] = "Filename";
        $data_table[0]['siteid'] = "Site ID";
        $data_table[0]['rbstype'] = "RBS Type";
        $data_table[0]['latitude'] = "Latitude";
        $data_table[0]['longitude'] = "Longitude";
        $data_table[0]['address'] = "Address";
        foreach ($extracts_file as $row) {
            $file = '.' . $row->filename;
            $file_get = explode('/', $file);
            $count_file = count($file_get);
            $filename = $file_get[$count_file - 1];
            $objPHPExcel = PHPExcel_IOFactory::load($file);
            $val = $objPHPExcel->getActiveSheet()->getCell('A1')->getValue();
            $data_table[$i + 1]['filename'] = $filename;
            $data_table[$i + 1]['siteid'] = $objPHPExcel->getActiveSheet()->getCell($extracts_data[0]->site_id_cell)->getValue();
            $data_table[$i + 1]['rbstype'] = $objPHPExcel->getActiveSheet()->getCell($extracts_data[0]->rbs_type_cell)->getValue();
            $data_table[$i + 1]['latitude'] = $objPHPExcel->getActiveSheet()->getCell($extracts_data[0]->lat_cell)->getValue();
            $data_table[$i + 1]['longitude'] = $objPHPExcel->getActiveSheet()->getCell($extracts_data[0]->long_cell)->getValue();
            $data_table[$i + 1]['address'] = $objPHPExcel->getActiveSheet()->getCell($extracts_data[0]->address_cell)->getValue();
            $i++;
//            $table = "antenna";
//            $this->Modeldb->insert($ins, $table);
        }

        //echo json_encode($data_table);
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('RFDS');
        $this->excel->getActiveSheet()->fromArray($data_table, null, 'A1');
        $header_range = "A1:Z1";
        $this->excel->getActiveSheet()->getStyle($header_range)->getFont()->setBold(true);
        $filename = str_replace(' ','_',$this->session->userdata('dropzone_folder'));
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

    function save_step_one() {
        $data = array(
            'name' => $this->input->post('name'),
            'foldername' => $this->input->post('foldername'),
            'site_id_sheet' => $this->input->post('site_id_sheet'),
            'site_id_cell' => $this->input->post('site_id_cell'),
            'rbs_type_sheet' => $this->input->post('rbs_type_sheet'),
            'rbs_type_cell' => $this->input->post('rbs_type_cell'),
            'long_sheet' => $this->input->post('long_sheet'),
            'long_cell' => $this->input->post('long_cell'),
            'lat_sheet' => $this->input->post('lat_sheet'),
            'lat_cell' => $this->input->post('lat_cell'),
            'address_sheet' => $this->input->post('address_sheet'),
            'address_cell' => $this->input->post('address_cell')
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
