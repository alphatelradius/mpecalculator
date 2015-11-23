<?php $this->load->view('include/head'); ?>

<!-- Custom styling plus plugins -->

<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/icheck/flat/green.css" rel="stylesheet">
<!-- editor -->
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/editor/index.css" rel="stylesheet">
<!-- select2 -->
<link href="<?php echo base_url(); ?>assets/css/select/select2.min.css" rel="stylesheet">
<!-- switchery -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/switchery/switchery.min.css" />

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
                        <div class="col-md-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>MPE Calculator<small>process multiple data from excelsheet</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="<?php echo base_url('calculate/do_upload') ?>" class="dropzone" style="border: 1px solid #e5e5e5; height: 300px; ">

                                    </form>
                                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url('calculate/savemultiple') ?>" id='form-calculate'>
                                        <br>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Start Row <span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="start_row" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="start_row" type="text" value="4">
                                                </div>
                                            </div>
                                        
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Region <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <?php
                                                    if(@$site!=NULL){
                                                        echo '<input id="id" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="id" value="'.@$site->id.'" type="text">';
                                                    }
                                                    ?>
                                                    <input id="region" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="region" placeholder="Column, e.g A" type="text" value="<?php echo @$site->region ?>">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Market <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="market" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="market" placeholder="Column, e.g B" type="text" value="<?php echo @$site->market ?>">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Site ID <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="site_id" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="site_id" placeholder="Column, e.g C" value="<?php echo @$site->site_id ?>" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >Sector <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="sector" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sector" placeholder="Column, e.g D" type="text" value="<?php echo @$site->sector ?>">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Site Type <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="site_type" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="site_type" placeholder="Column, e.g E" type="text" value="<?php echo @$site->pole ?>">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Collo <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="collo" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="collo" placeholder="Column, e.g F" type="text" value="<?php echo @$site->collo ?>">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Antenna Rad. Center <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="ant_rad_center" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="ant_rad_center"  type="text" placeholder="Column, e.g G" value="<?php echo @$site->ant_rad_center ?>">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Calculation point above ground or roof surface (ft) <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="calculation_point_above_ground" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="calculation_point_above_ground" type="text" placeholder="Column, e.g H" value="<?php echo @$site->calculation_point_above_ground ?>">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Minimum Controlled Distance (ft) <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="min_controlled_dist" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="min_controlled_dist" type="text" placeholder="Column, e.g I">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Minimum Uncontrolled Distance(ft)<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="min_uncontrolled_dist" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="min_uncontrolled_dist" type="text" placeholder="Column, e.g J">
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
                                                                <input id="antenna_model" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="antenna_model[]" type="text" placeholder="Column, e.g K">
                                                            </div>
                                                        </div>
                                                        <div class="item form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total Mech Tilt (deg)<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="total_mech_tilt" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="total_mech_tilt[]" type="text" placeholder="Column, e.g O">
                                                            </div>
                                                        </div>
                                                        <div class="item form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Trx Count<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="trx_count" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="trx_count[]" type="text" placeholder="Column, e.g P">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-5'>
                                                        <div class="item form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Max Power per TRX (W)<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="max_power_per_trx" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="max_power_per_trx[]" type="text" placeholder="Column, e.g Q">
                                                            </div>
                                                        </div>
                                                        <div class="item form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total Losses (dB)<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="total_losses" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="total_losses[]" type="text" placeholder="Column, e.g R">
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
                            </div
                        </div>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <?php
                $this->load->view('include/footer');
                ?>
                <!-- /footer content -->

            </div>

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
    <!-- tags -->
    <script src="<?php echo base_url(); ?>assets/js/tags/jquery.tagsinput.min.js"></script>
    <!-- switchery -->
    <script src="<?php echo base_url(); ?>assets/js/switchery/switchery.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/daterangepicker.js"></script>
    <!-- richtext editor -->
    <script src="<?php echo base_url(); ?>assets/js/editor/bootstrap-wysiwyg.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/editor/external/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/editor/external/google-code-prettify/prettify.js"></script>
    <!-- select2 -->
    <script src="<?php echo base_url(); ?>assets/js/select/select2.full.js"></script>
    <!-- form validation -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/parsley/parsley.min.js"></script>
    <!-- textarea resize -->
    <script src="<?php echo base_url(); ?>assets/js/textarea/autosize.min.js"></script>
    <script>
        autosize($('.resizable_textarea'));
    </script>
    <!-- Autocomplete -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/autocomplete/countries.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/autocomplete/jquery.autocomplete.js"></script>
    <script type="text/javascript">
        $(function () {
            'use strict';
            var countriesArray = $.map(countries, function (value, key) {
                return {
                    value: value,
                    data: key
                };
            });
            // Initialize autocomplete with custom appendTo:
            $('#autocomplete-custom-append').autocomplete({
                lookup: countriesArray,
                appendTo: '#autocomplete-container'
            });
        });
    </script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <!-- select2 -->
    <script>
        $(document).ready(function () {
            $(".select2_single").select2({
                placeholder: "Select a state",
                allowClear: true
            });
            $(".select2_group").select2({});
            $(".select2_multiple").select2({
                maximumSelectionLength: 4,
                placeholder: "With Max Selection limit 4",
                allowClear: true
            });
        });
    </script>
    <!-- /select2 -->
    <!-- input tags -->
    <script>
        function onAddTag(tag) {
            alert("Added a tag: " + tag);
        }

        function onRemoveTag(tag) {
            alert("Removed a tag: " + tag);
        }

        function onChangeTag(input, tag) {
            alert("Changed a tag: " + tag);
        }

        $(function () {
            $('#tags_1').tagsInput({
                width: 'auto'
            });
        });
    </script>
    <!-- /input tags -->
    <!-- form validation -->
    <script type="text/javascript">
        $(document).ready(function () {
            $.listen('parsley:field:validate', function () {
                validateFront();
            });
            $('#demo-form .btn').on('click', function () {
                $('#demo-form').parsley().validate();
                validateFront();
            });
            var validateFront = function () {
                if (true === $('#demo-form').parsley().isValid()) {
                    $('.bs-callout-info').removeClass('hidden');
                    $('.bs-callout-warning').addClass('hidden');
                } else {
                    $('.bs-callout-info').addClass('hidden');
                    $('.bs-callout-warning').removeClass('hidden');
                }
            };
        });

        $(document).ready(function () {
            $.listen('parsley:field:validate', function () {
                validateFront();
            });
            $('#demo-form2 .btn').on('click', function () {
                $('#demo-form2').parsley().validate();
                validateFront();
            });
            var validateFront = function () {
                if (true === $('#demo-form2').parsley().isValid()) {
                    $('.bs-callout-info').removeClass('hidden');
                    $('.bs-callout-warning').addClass('hidden');
                } else {
                    $('.bs-callout-info').addClass('hidden');
                    $('.bs-callout-warning').removeClass('hidden');
                }
            };
        });
        try {
            hljs.initHighlightingOnLoad();
        } catch (err) {
        }
    </script>
    <!-- /form validation -->
    <!-- editor -->
    <script>
        $(".add-form").click(function () {
            var intId = $("#form-rbs section").length;
            var app = '';

            data = "length=" + intId;

            $.ajax({
                type: "POST",
                url: '<?php echo base_url('extract/form1') ?>',
                data: data,
                success: function (data) {
                    app = $(data);

                },
                async: false
            });
            $("#form-content").append(app);

        });

        $("body").on("click", ".delete-form", function () {
            $(this).parent().parent().remove();

        });

        $(document).ready(function () {
            $('.xcxc').click(function () {
                $('#descr').val($('#editor').html());
            });
        });

        $(function () {
            function initToolbarBootstrapBindings() {
                var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                    'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                    'Times New Roman', 'Verdana'],
                        fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                $.each(fonts, function (idx, fontName) {
                    fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                });
                $('a[title]').tooltip({
                    container: 'body'
                });
                $('.dropdown-menu input').click(function () {
                    return false;
                })
                        .change(function () {
                            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                        })
                        .keydown('esc', function () {
                            this.value = '';
                            $(this).change();
                        });

                $('[data-role=magic-overlay]').each(function () {
                    var overlay = $(this),
                            target = $(overlay.data('target'));
                    overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                });
                if ("onwebkitspeechchange" in document.createElement("input")) {
                    var editorOffset = $('#editor').offset();
                    $('#voiceBtn').css('position', 'absolute').offset({
                        top: editorOffset.top,
                        left: editorOffset.left + $('#editor').innerWidth() - 35
                    });
                } else {
                    $('#voiceBtn').hide();
                }
            }
            ;

            function showErrorAlert(reason, detail) {
                var msg = '';
                if (reason === 'unsupported-file-type') {
                    msg = "Unsupported format " + detail;
                } else {
                    console.log("error uploading file", reason, detail);
                }
                $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
            }
            ;
            initToolbarBootstrapBindings();
            $('#editor').wysiwyg({
                fileUploadError: showErrorAlert
            });
            window.prettyPrint && prettyPrint();
        });
    </script>
    <!-- dropzone -->
    <script src="<?php echo base_url(); ?>assets/js/dropzone/dropzone.js"></script>
    <!-- /editor -->
</body>

</html>