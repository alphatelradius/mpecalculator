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
        //echo json_encode($this->input->post());
        //exit();
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
            // echo 'update';
        } else {
            $id = $this->Modeldb->insert($data, 'site_info');
            //   echo 'insert';
        }

        $antenna_model = $this->input->post('antenna_model');
        $total_mech_tilt = $this->input->post('total_mech_tilt');
        $trx_count = $this->input->post('trx_count');
        $max_power_per_trx = $this->input->post('max_power_per_trx');
        $total_losses = $this->input->post('total_losses');
        $i = 0;
        foreach ($antenna_model as $am) {
            $antenna_gain = 0;
            $aperture = 0;
            $hor_bw = 0;
            $get_antenna = $this->Modeldb->query("Select * from antenna where antenna_model like '%" . $am . "%' ");
            foreach ($get_antenna as $row1) {
                $antenna_gain = $row1->antenna_gain;
                $aperture = $row1->aperture;
                $hor_bw = $row1->hor_bw;
            }
            if ($max_power_per_trx[$i] == 0 || $max_power_per_trx[$i] == '') {
                $total_eirp_dbm = 0;
                $total_eirp_w = 0.001 * 10 ^ ($total_eirp_dbm / 10);
            } else {
                $total_eirp_dbm = 10 * log(($trx_count[$i] * $max_power_per_trx[$i]) / 0.001) - $total_losses[$i] + $antenna_gain + 2.15;
                $total_eirp_w = 0.001 * 10 ^ ($total_eirp_dbm / 10);
            }
            $data_antenna = array(
                'site_info_id' => $id,
                'model' => $antenna_model[$i],
                'total_mech_tilt' => $total_mech_tilt[$i],
                'trx_count' => $trx_count[$i],
                'max_power_per_trx' => $max_power_per_trx[$i],
                'total_losses' => $total_losses[$i],
                'total_eirp_dbm' => $total_eirp_dbm,
                'total_eirp_w' => $total_eirp_w,
                'gain' => $antenna_gain,
                'aperture' => $aperture,
                'hor_beamdiwth' => $hor_bw
            );
            if ($antenna_model[$i] != '') {
                $this->Modeldb->insert($data_antenna, 'site_antenna_data');
            }
            $i++;
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
