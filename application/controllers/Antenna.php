<?php

class Antenna extends CI_Controller {

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
        $this->load->view('antenna/upload', $data);
    }

    function getData() {
        $this->datatables->select('id,antenna_model,antenna_gain,aperture,hor_bw')
                ->unset_column('id')
                ->from('antenna');
        $this->datatables->add_column('Action', '<a href="' . base_url('antenna/edit/$1') . '"><div class="btn btn-warning btn-mini"><i class="icon icon-edit"></i></div></a>
                                    <a href="' . base_url('antenna/delete/$1') . '"><div class="btn btn-danger btn-mini"><i class="icon icon-trash"></i></div></a>'
                . '                 <a href="' . base_url('antenna/detail/$1') . '"><div class="btn btn-success btn-mini"><i class="icon-info-sign"></i></div></a>', 'id');
        echo $this->datatables->generate();
    }

    function getDetail() {
        $this->datatables->select('id,antenna_model,antenna_gain,aperture,hor_bw')
                ->unset_column('id')
                ->from('antenna');
        $this->datatables->add_column('Action', '<a href="' . base_url('antenna/edit/$1') . '"><div class="btn btn-warning btn-mini"><i class="icon icon-edit"></i></div></a>
                                    <a href="' . base_url('antenna/delete/$1') . '"><div class="btn btn-danger btn-mini"><i class="icon icon-trash"></i></div></a>'
                . '                 <a href="' . base_url('antenna/detail/$1') . '"><div class="btn btn-success btn-mini"><i class="icon-info-sign"></i></div></a>', 'id');
        echo $this->datatables->generate();
    }

}
