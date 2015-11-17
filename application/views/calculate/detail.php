<?php $this->load->view('include/head'); ?>

<!-- Custom styling plus plugins -->
<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/icheck/flat/green.css" rel="stylesheet">


<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

<!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('include/nav_left'); ?>
            <!-- top navigation -->
            <?php $this->load->view('include/nav_top'); ?>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class='col-md-12'>
                            <a class='pull-right' href=''><div class='btn btn-success'>Analyze Now</div></a>                                    
                        </div>
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Site Info</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <ul class="stats-overview">
                                            <li>
                                                <br><span class="name"> Site ID </span>
                                                <span class="value text-success"> <?php echo $site->site_id; ?> </span>
                                            </li>
                                            <li>
                                                <br><span class="name"> Region </span>
                                                <span class="value text-success"> <?php echo $site->region; ?> </span>
                                            </li>
                                            <li class="hidden-phone">
                                                <br><span class="name"> Market </span>
                                                <span class="value text-success"> <?php echo $site->market; ?> </span>
                                            </li>
                                            <li>
                                                <br><span class="name"> Sector </span>
                                                <span class="value text-success"> <?php echo $site->sector; ?> </span>
                                            </li>
                                            <li>
                                                <br><span class="name"> Pole </span>
                                                <span class="value text-success"> <?php echo $site->pole; ?> </span>
                                            </li>
                                            <li class="hidden-phone">
                                                <br><span class="name"> Collo </span>
                                                <span class="value text-success"> <?php echo $site->collo; ?> </span>
                                            </li>
                                            <li>
                                                <br><span class="name"> Antenna Rd. Center </span>
                                                <span class="value text-success"> <?php echo $site->ant_rad_center; ?> </span>
                                            </li>
                                            <li>
                                                <br><span class="name"> Above Ground </span>
                                                <span class="value text-success"> <?php echo $site->calculation_point_above_ground; ?> </span>
                                            </li>
                                            <li class="hidden-phone">
                                            </li>
                                            <li class="hidden-phone">
                                                <br><span class="name"> Min Controlled Dist </span>
                                                <span class="value text-success"> <?php echo $site->min_controlled_dist; ?> </span>
                                            </li>
                                            <li class="hidden-phone">
                                                <br><span class="name"> Min Uncontrolled Dist </span>
                                                <span class="value text-success"> <?php echo $site->min_uncontrolled_dist; ?> </span>
                                            </li>

                                            <li></li>
                                            <li class="hidden-phone">
                                                <br><span class="name"> Total (at same distance from antenna) for PCS - AWS </span>
                                                <span class="value text-success"> <?php echo $site->pcs_aws_total_same_distance_antenna; ?> </span>
                                            </li>
                                            <li class="hidden-phone">
                                                <br><span class="name"> Distance with max power density (ft) </span>
                                                <span class="value text-success"> <?php echo $site->pcs_aws_distance_with_max_power_density; ?> </span>
                                            </li>
                                            <li class="hidden-phone">
                                                <br><span class="name"> Next steps on mid-band </span>
                                                <span class="value text-success"> <?php echo $site->pcs_aws_ns_on_mid_band; ?> </span>
                                            </li>

                                            <li class="hidden-phone">
                                                <br><span class="name"> Total (at same distance from antenna) for PCS - AWS </span>
                                                <span class="value text-success"> <?php echo $site->_750_850_total_same_distance_antenna; ?> </span>
                                            </li>
                                            <li class="hidden-phone">
                                                <br><span class="name"> Distance with max power density (ft) </span>
                                                <span class="value text-success"> <?php echo $site->_750_850_distance_with_max_power_density; ?> </span>
                                            </li>
                                            <li class="hidden-phone">
                                                <br><span class="name"> Next steps on mid-band </span>
                                                <span class="value text-success"> <?php echo $site->_750_850_ns_on_mid_band; ?> </span>
                                            </li>
                                        </ul>
                                        <br />

                                    </div>
                                    <div class='col-md-12'>
                                        <div class="x_title">
                                            <h2>Antenna Description</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <!-- start project-detail sidebar -->
                                        <?php foreach ($antenna as $row) { ?>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <section class="panel">
                                                    <div class="panel-body">
                                                        <h3 class="green"><i class="fa fa-paint-brush"></i> <?php echo $row->technology_or_band; ?></h3>
                                                        <div class="project_detail">

                                                            <p class="title">Model</p>
                                                            <p><?php echo $row->model; ?></p>
                                                            <p class="title">Aperture</p>
                                                            <p><?php echo $row->aperture; ?></p>
                                                            <p class="title">Horizontal Beamwidth</p>
                                                            <p><?php echo $row->hor_beamdiwth; ?></p>

                                                            <p class="title">Antenna Gain</p>
                                                            <p><?php echo $row->gain; ?></p>
                                                            <p class="title">Total Mech Tilt (deg)</p>
                                                            <p><?php echo $row->total_mech_tilt; ?></p>
                                                            <p class="title">TRX Count</p>
                                                            <p><?php echo $row->trx_count; ?></p>

                                                            <p class="title">Max Power per TRX (W)</p>
                                                            <p><?php echo $row->max_power_per_trx; ?></p>
                                                            <p class="title">Total Losses (dB)</p>
                                                            <p><?php echo $row->total_losses; ?></p>
                                                            <p class="title">Total EIRP (dBm)</p>
                                                            <p><?php echo $row->total_eirp_dbm; ?></p>
                                                            <p class="title">Total EIRP (W)</p>
                                                            <p><?php echo $row->total_eirp_w; ?></p>

                                                            <p class="title">Highest Power Density (μW/cm2)<br>
                                                                Total</p>
                                                            <p><?php echo $row->total_same_distance_antenna; ?></p>
                                                            <p class="title">Highest Power Density (μW/cm2)<br>
                                                                Distance with max power density (ft)</p>
                                                            <p><?php echo $row->distance_with_max_power_density; ?></p>
                                                        </div>
                                                        <div class="text-center mtop20">
                                                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                                        </div>
                                                    </div>

                                                </section>

                                            </div>
                                        <?php } ?>
                                        <!-- end project-detail sidebar -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer content -->
                <?php $this->load->view('include/footer'); ?>

                <!-- /footer content -->

            </div>
            <!-- /page content -->
        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!-- chart js -->
    <script src="<?php echo base_url(); ?>assets/js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="<?php echo base_url(); ?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

    <!-- echart -->
    <script src="<?php echo base_url(); ?>assets/js/echart/echarts-all.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/echart/green.js"></script>


</body>

</html>