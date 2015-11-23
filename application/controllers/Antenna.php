<?php

class Antenna extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('datatables');
    }

    function index() {
        $data['title'] = "Antenna Data";
        $this->load->view('antenna/home', $data);
    }

    function detail() {
        $data['title'] = "Antenna Data";
        $this->load->view('antenna/detail', $data);
    }

    function upload() {
        $data['title'] = "Antenna Data";
        $this->session->set_userdata('antenna_identifier', md5(rand(1000, 5000)));
        $this->load->view('antenna/upload', $data);
        
    }

    function getData() {
        $this->datatables->select('id,antenna_model,antenna_gain,aperture,hor_bw')
                ->unset_column('id')
                ->from('antenna');
        $this->datatables->add_column('Action', '<div style="width:150px;"><a href="' . base_url('antenna/edit/$1') . '"><div class="btn btn-warning btn-mini"><i class="fa fa-pencil"></i></div></a>
                                    <a href="' . base_url('antenna/delete/$1') . '"><div class="btn btn-danger btn-mini"><i class="fa fa-trash"></i></div></a>'
                . '                 <a href="' . base_url('antenna/detail/$1') . '"><div class="btn btn-success btn-mini"><i class="fa fa-play"></i></div></a></div>', 'id');
        echo $this->datatables->generate();
    }

    function getDetail($id) {
        $this->datatables->select('id,minor_lobe_angle,selected_ant_db_offset,db_below_main_lobe')
                ->unset_column('id')
                ->from('antenna_data')
                ->where('antenna_id=' . $id);
        $this->datatables->add_column('Action', '$1', 'id');
        echo $this->datatables->generate();
    }

    function do_upload() {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = getcwd() . '/assets/files/antenna' . '/';
            $targetFile = $targetPath . $fileName;
            move_uploaded_file($tempFile, $targetFile);
            $data = array(
                'filename' => './assets/files/antenna' . '/' . $fileName,
                'session' => $this->session->userdata('antenna_identifier')
            );
            
            $this->Modeldb->insert($data, 'antenna_files');
        }
    }

    function save() {
        $this->load->library('excel');
        $session = $this->session->userdata('antenna_identifier');
        $files = $this->Modeldb->get_by(array('session' => $session), 'antenna_files');
        foreach ($files as $row) {
            $file = $row->filename;
//            if(file_exists($file)){;
//                echo 'ada';
//            }else{
//                echo 'tidak ada';
//            }
//load the excel library
//read file from path
            $objPHPExcel = PHPExcel_IOFactory::load($file);
//get only the Cell Collection
            $cell_collection = $objPHPExcel->getActiveSheet('')->getCellCollection();
//extract to a PHP readable array format
            foreach ($cell_collection as $cell) {
                $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                //header will/should be in row 1 only. of course this can be modified to suit your need.
                if ($row == 1) {
                    $header[$row][$column] = $data_value;
                } else {
                    $arr_data[$row][$column] = $data_value;
                }
            }
//send the data in an array format
            $data['header'] = $header;
            $data['values'] = $arr_data;
//            var_dump($data);
//            exit();
            $table = "antenna";
            foreach ($arr_data as $d) {
                $ins = array(
                    'antenna_model' => $d['A'],
                    'antenna_gain' => $d['B'],
                    'aperture' => $d['C'],
                    'hor_bw' => $d['D']
                );
                foreach ($header[1] as $key1 => $val1) {
                    if ($key1 != 'A' && $key1 != 'B' && $key1 != 'C' && $key1 != 'D' && $key1 != 'E') {
                        $ins['deg'.strval($val1)] = $d[$key1];
                    }
                }
//                var_dump($ins);
//                exit();

//                exit();
                $this->db->insert('antenna',$ins);
            }
        }
        redirect(base_url('antenna'));
    }

    function do_read_antenna($session) {
        $file = './assets/files/data.xlsx';
//load the excel library
        $this->load->library('excel');
//read file from path
        $objPHPExcel = PHPExcel_IOFactory::load($file);
//get only the Cell Collection
        $cell_collection = $objPHPExcel->getActiveSheet('Antenna')->getCellCollection();
//extract to a PHP readable array format
        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
            //header will/should be in row 1 only. of course this can be modified to suit your need.
            if ($row == 1) {
                $header[$row][$column] = $data_value;
            } else {
                $arr_data[$row][$column] = $data_value;
            }
        }
//send the data in an array format
        $data['header'] = $header;
        $data['values'] = $arr_data;
        $table = "antenna";
        foreach ($arr_data as $d) {
            echo json_encode($d);
            $ins = array(
                'antenna_model' => $d['A'],
                'antenna_gain' => $d['B'],
                'aperture' => $d['C'],
                'hor_bw' => $d['D']
            );
            $this->Modeldb->insert($ins, $table);
            exit();
        }
    }

}
