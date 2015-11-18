<?php $this->load->view('include/head'); ?>

<!-- Custom styling plus plugins -->
<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/icheck/flat/green.css" rel="stylesheet">


<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<style>
    .error{
        color:#cc0000;
    }

    .float-right{
        float: right;
    }
</style>
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
                    <br>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Process <small>single site data</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div id="-wizard" class="form_wizard wizard_horizontal">
                                        <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url('calculate/save') ?>" id='form-calculate'>

                                            <p>For processing multiple site data by upload it, you can use this link</p>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Region <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <?php
                                                    if(@$site!=NULL){
                                                        echo '<input id="id" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="id" value="'.@$site->id.'" type="text">';
                                                    }
                                                    ?>
                                                    <input id="region" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="region" placeholder="region e.g Northeast" type="text" value="<?php echo @$site->region ?>">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Market <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="market" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="market" placeholder="region e.g Philadelhia" type="text" value="<?php echo @$site->market ?>">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Site ID <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="site_id" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="site_id" placeholder="" value="<?php echo @$site->site_id ?>" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sector <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="sector" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sector" placeholder="" type="text" value="<?php echo @$site->sector ?>">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Site Type <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select class='form-control' name='site_type'>
                                                        <option value="Pole" <?php if($site->pole=='Pole') echo 'selected;' ?>>Pole</option>
                                                        <option value="Non-pole" <?php if($site->pole=='Non-pole') echo 'selected;' ?>>Non-pole</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Collo <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select class='form-control' name='collo' id='collo'>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Antenna Rad. Center <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="ant_rad_center" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="ant_rad_center"  type="text" value="<?php echo @$site->ant_rad_center ?>">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Calculation point above ground or roof surface (ft) <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="calculation_point_above_ground" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="calculation_point_above_ground" type="text" value="<?php echo @$site->calculation_point_above_ground ?>">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Minimum Controlled Distance (ft) <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="min_controlled_dist" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="min_controlled_dist" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Minimum Uncontrolled Distance(ft)<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="min_uncontrolled_dist" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="min_uncontrolled_dist" type="text">
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div id='antenna-grup' style="height:auto; overflow: hidden;">
                                                <div class='antenna' style="height:auto; overflow: hidden;">
                                                    <div class='col-md-5'>
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
                                                    <div class='col-md-5'>
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
                                                    <div class='col-md-1'>
                                                        <div class="add-form btn btn-primary btn-small" id=""><i class="fa fa-plus"></i></div>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>

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
    <!-- form validation -->
    <script src="<?php echo base_url(); ?>assets/js/validator/validator.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validator/jquery.validate.js"></script>
    <script>
        $(".add-form").click(function () {
            var intId = $("#form-rbs section").length;
            var app = '';

            data = "length=" + intId;

            $.ajax({
                type: "POST",
                url: '<?php echo base_url('calculate/insertAntenna') ?>',
                data: data,
                success: function (data) {
                    app = $(data);

                },
                async: false
            });
            $("#antenna-grup").append(app);

        });

        $("body").on("click", ".delete-form", function () {
            $(this).parent().parent().remove();

        });
        
        // initialize the validator function
        validator.message['date'] = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
                .on('blur', 'input[required], input.optional, select.required', validator.checkField)
                .on('change', 'select.required', validator.checkField)
                .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required')
                .on('keyup blur', 'input', function () {
                    validator.checkField.apply($(this).siblings().last()[0]);
                });

        // bind the validation to the form submit event
        //$('#send').click('submit');//.prop('disabled', true);

        $("#form-calculate").validate({
            rules: {
                market: "required",
                region: "required",
                site_id: "required",
                sector: {
                    required: true,
                    number: true
                },
                pole: "required",
                collo: "required",
                ant_rad_center: "required",
                calculation_point_above_ground: "required",
                min_controlled_dist: "required",
                min_uncontrolled_dist: "required"
            },
            messages: {
                market: "Please input value",
                region: "Please input value",
                site_id: "Please input value",
                sector: {
                    required: "Please input value",
                    number: "Please input number only"
                },
                pole: "Please input value",
                collo: "Please input value",
                ant_rad_center: "Please input value",
                calculation_point_above_ground: "Please input value",
                min_controlled_dist: "Please input value input value",
                min_uncontrolled_dist: "Please input value input value"
            }
        });

    </script>

    <!-- form wizard -->
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/wizard/jquery.smartWizard.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Smart Wizard 	
            $('#wizard').smartWizard();

            function onFinishCallback() {
                $('#wizard').smartWizard('showMessage', 'Finish Clicked');
                alert('Finish Clicked');
                jQuery('form').submit();

            }
        });

        $(document).ready(function () {
            // Smart Wizard	
            $('#wizard_verticle').smartWizard({
                transitionEffect: 'slide'
            });

        });
    </script>

</body>

</html>
