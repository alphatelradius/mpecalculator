<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo @$t ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="layout" content="main"/>
        <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jsapi"></script>
        <script src="<?php echo base_url('assets') ?>/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
        <link href="<?php echo base_url('assets') ?>/css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />
        <link href="<?php echo base_url('assets') ?>/css/jquery.dataTables.min.css" type="text/css" media="screen, projection" rel="stylesheet" />
        <link href="<?php echo base_url('assets') ?>/css/dataTables.bootstrap.css" type="text/css" media="screen, projection" rel="stylesheet" />
        <style>
        </style>
    </head>
    <body>
        <?php $this->load->view('inc/header'); ?>
        <div id="body-container">
            <div id="body-content">
                <?php $this->load->view('inc/menu'); ?>
                <section class="nav nav-page">
                    <div class="container">
                        <div class="row">
                            <div class="span7">
                            </div>
                            <div class="page-nav-options">
                                <div class="span9">
                                    <ul class="nav nav-tabs pull-right" style="float: right!important;">
                                        <li class="active">
                                            <a href="<?php echo base_url('antenna/add') ?>"><i class="icon-plus"></i>Add</a>
                                        </li>
                                        <li class="active">
                                            <a href="<?php echo base_url('antenna/upload') ?>"><i class="icon-upload"></i>Upload</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="page container">
                    <div class="row">
                        <div class="span16">
                            <div id="Person-1" class="box">
                                <div class="box-header">
                                    <i class="icon-signal icon-large"></i>
                                    <h5>Antenna</h5>
                                </div>
                                <div class="box-content box-table">
                                    <table class="table table-hover tablesorter" id="antenna-table">
                                        <thead>
                                            <tr>
                                                <th>Antenna Model</th>
                                                <th>Antenna Gain</th>
                                                <th>Aperture</th>
                                                <th>Horizontal BW</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >

                                        </tbody>
                                    </table>
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

        <?php $this->load->view('inc/footer') ?>

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
        <script src="<?php echo base_url('assets') ?>//js/jquery/virtual-tour.js" type="text/javascript" ></script>

        <script src="<?php echo base_url('assets') ?>//js/jquery.dataTables.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets') ?>//js/dataTables.bootstrap.js" type="text/javascript" ></script>

        <script type="text/javascript">
            $(function () {
                $('#person-list.nav > li > a').click(function (e) {
                    if ($(this).attr('id') == "view-all") {
                        $('div[id*="Person-"]').fadeIn('fast');
                    } else {
                        var aRef = $(this);
                        var tablesToHide = $('div[id*="Person-"]:visible').length > 1
                                ? $('div[id*="Person-"]:visible') : $($('#person-list > li[class="active"] > a').attr('href'));

                        tablesToHide.hide();
                        $(aRef.attr('href')).fadeIn('fast');
                    }
                    $('#person-list > li[class="active"]').removeClass('active');
                    $(this).parent().addClass('active');
                    e.preventDefault();
                });

                $(function () {
                    $('table').tablesorter();
                    $("[rel=tooltip]").tooltip();
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                var oTable = $('#antenna-table').dataTable({
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": '<?php echo base_url(); ?>antenna/getData',
                    "sPaginationType": "full_numbers",
                    "iDisplayStart ": 20,
                    "oLanguage": {
                        "sProcessing": "<img src='<?php echo base_url(); ?>assets/images/ajax-load.gif'>"
                    },
                    "fnInitComplete": function () {
                        //oTable.fnAdjustColumnSizing();
                    },
                    'fnServerData': function (sSource, aoData, fnCallback)
                    {
                        $.ajax
                                ({
                                    'dataType': 'json',
                                    'type': 'POST',
                                    'url': sSource,
                                    'data': aoData,
                                    'success': fnCallback
                                });
                    }
                });
            });
        </script>
    </body>
</html>