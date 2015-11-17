<?php

class Calculate extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['title'] = 'Site\'s MPE';
        $this->load->view('calculate/home', $data);
    }

    function getData() {
        $this->datatables->select('id,site_id,region,market')
                ->unset_column('id')
                ->from('site_info');
        $this->datatables->add_column('Action', '<a href="' . base_url('calculate/add/$1') . '"><div class="btn btn-warning btn-mini"><i class="icon icon-edit"></i></div></a>
                                    <a href="' . base_url('calculate/delete/$1') . '"><div class="btn btn-danger btn-mini"><i class="icon icon-trash"></i></div></a>
                                    <a href="' . base_url('calculate/detail/$1') . '"><div class="btn btn-success btn-mini"><i class="icon icon-play"></i></div></a>', 'id');
        echo $this->datatables->generate();
    }

    function add($id = NULL) {
        if ($id != NULL) {
            $site = $this->modeldb->get_by(array('id' => $id), 'site_info');
            $data['site'] = $site[0];
        }

        $data['title'] = 'Site\'s MPE';
        $this->load->view('calculate/add', $data);
    }

    function save() {
        $data = array(
            'market' => $this->input->post('market'),
            'region' => $this->input->post('region'),
            'site_id' => $this->input->post('site_id'),
            'sector' => $this->input->post('sector'),
            'pole' => $this->input->post('site_type'),
            'collo' => $this->input->post('collo'),
            'ant_rad_center' => $this->input->post('ant_rad_center'),
            'calculation_point_above_ground' => $this->input->post('calculation_point_above_ground'),
            'min_controlled_dist' => $this->input->post('min_controlled_dist'),
            'min_uncontrolled_dist' => $this->input->post('min_uncontrolled_dist')
        );
        $id = $this->input->post('id');
        echo json_encode($data);
        if ($id != '') {
            $this->Modeldb->update($id, $data, 'site_info');
            echo 'update';
        } else {
            $this->Modeldb->insert($data, 'site_info');
            echo 'insert';
        }
        redirect(base_url('calculate'));
    }

    function detail($id) {
        $site = $this->Modeldb->get_by(array('id' => $id), 'site_info');
        $data['antenna'] = $this->Modeldb->get_by(array('site_info_id' => $id), 'site_antenna_data');
        $data['site'] = $site[0];
        $data['title'] = 'Site\'s MPE Detail';
        $this->load->view('calculate/detail', $data);
    }

    function insertAntenna() {
        $insert = '<div class="antenna" style="height:auto; overflow: hidden;">
                    <div class="col-md-5">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Antenna Model <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="antenna_model" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="antenna_model[]" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total Mech Tilt (deg)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="total_mech_tilt" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="total_mech_tilt[]" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Trx Count<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="trx_count" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="trx_count[]" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total Mech Tilt (deg)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="total_mech_tilt" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="total_mech_tilt[]" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Max Power per TRX (W)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="max_power_per_trx" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="max_power_per_trx[]" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total Losses (dB)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="total_losses" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="total_losses[]" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="delete-form btn btn-danger btn-small" id=""><i class="fa fa-trash-o"></i></div>
                    </div>
                </div>
                <br>';
        echo $insert;
    }

}
