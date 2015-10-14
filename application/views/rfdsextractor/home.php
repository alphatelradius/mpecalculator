<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo @$title ?> - MPE Calculator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="layout" content="main"/>
        <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jsapi"></script>
        <script src="<?php echo base_url('assets') ?>/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
        <link href="<?php echo base_url('assets') ?>/css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/dropzone/dropzone.css" type="text/css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>assets/dropzone/dropzone.js"></script>
        <style>
            #body-content { padding-top: 40px;}
        </style>
    </head>
    <body>
        <?php $this->load->view('inc/header'); ?>

        <div id="body-container">
            <div id="body-content">
                <?php $this->load->view('inc/menu'); ?>
                <section class="page container">          
                    <div class="row">
                        <div class="span8">
                            <div class="box">
                                <div class="box-header">
                                    <i class="icon-book"></i>
                                    <h5>Extract RFDS Informations</h5>
                                </div>
                                <div class="box-content">
                                    <form class="form-inline" action="<?php echo base_url('extract/save_step_one') ?>" id="extract-step-1">
                                        <div class="input-prepend">
                                            <span class="add-on"><i class="icon-book"></i></span>
                                            <input class="span4" type="text" placeholder="Title" id="name">
                                        </div>
                                        <br>
                                        <div class="input-prepend">
                                            <span class="add-on"><i class="icon-folder-open"></i></span>
                                            <input class="span4" type="text" placeholder="Folder Name" id="foldername">
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button id="extract-step-1-submit" class="btn btn-primary">
                                        <i class="icon-forward"></i>
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="span8" style="display: none;" id="upload-file">
                            <div class="box">
                                <div class="box-header">
                                    <i class="icon-book"></i>
                                    <h5>File to extract</h5>
                                </div>
                                <div class="box-content">
                                    <form id="upload-form" action="<?php echo site_url('/dropzone/upload/'); ?>" class="dropzone"  ></form>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="icon-ok"></i>
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div id="spinner" class="spinner" style="display:none;">
            Loading&hellip;
        </div>
        <?php $this->load->view('inc/footer'); ?>

        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-transition.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-alert.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-modal.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-dropdown.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-scrollspy.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-tab.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-tooltip.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-popover.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-button.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-collapse.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-carousel.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-typeahead.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-affix.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/bootstrap/bootstrap-datepicker.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/jquery/jquery-tablesorter.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/jquery/jquery-chosen.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>/js/jquery/virtual-tour.js" type="text/javascript" ></script>
        <script type="text/javascript">
            $(function () {
                $('#sample-table').tablesorter();
                $('#datepicker').datepicker();
                $(".chosen").chosen();
            });

            $("#extract-step-1-submit").click(function () {
                var foldername = $("#foldername").val();
                var name = $("#name").val();
                console.log("foldername");
// Returns successful data submission message when the entered information is stored in database.
                var dataString = 'name=' + name + '&foldername=' + foldername;
                if (foldername == '')
                {
                    alert("Please fill folder name");
                }
                else
                {
// AJAX Code To Submit Form.
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('extract/save_step_one') ?>",
                        data: dataString,
                        cache: false,
                        success: function (result) {
                            console.log(result);
                            alert("Now upload the files will saved on " + result);
                            $("#extract-step-1-submit").remove();
                            $("#upload-file").css("display", "block");
                            $("#name").attr("readonly", "true");
                            $("#foldername").attr("readonly", "true");
                        }
                    });
                }
                return false;
            });
        </script>
    </body>
</html>