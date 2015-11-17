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
            .input-prepend {
                margin-right: 10px;
            }
            #body-content { padding-top: 40px;}

            #addParam{
                float: right;
                width: 10px;
            }

            .lbl{
                width: 20%!important;
            }

            .labelbox{
                margin-right: 20px;
            }
        </style>
    </head>
    <body>
        <?php $this->load->view('inc/header'); ?>
        <div id="body-container">
            <div id="body-content">
                <?php $this->load->view('inc/menu'); ?>
                <section class="nav nav-page" style="margin-top: 0px;">
                    <div class="container">
                        <div class="row">
                            <div class="span7">
                            </div>
                            <div class="page-nav-options">
                                <div class="span9">
                                    <ul class="nav nav-tabs pull-right" style="float: right!important;">
                                        <li class="active">
                                            <a href="<?php echo base_url('site') ?>"><i class="icon-table"></i>Show All Data</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="page container">          
                    <div class="row">
                        <div class="span12">
                            <div class="box">
                                <div class="box-header">
                                    <i class="icon-book"></i>
                                    <h5>Site Informations</h5>
                                </div>
                                <div class="box-content">
                                    <form class="form-inline" action="<?php echo base_url('site/save') ?>" id="extract-step-1" method="POST">
                                        <div class="input-prepend">
                                            <input class="span2 labelbox" type="text" value="Region" disabled="true">
                                            <input type="hidden" value="<?php echo @$site->id; ?>" name='id'/>
                                            <input class="span6" type="text" placeholder="" id="region" name="region"  value="<?php echo @$site->region ?>">
                                        </div>
                                        <br>
                                        <div class="input-prepend">
                                            <input class="span2 labelbox" type="text" value="Market" disabled="true">
                                            <input class="span6" type="text" placeholder="" id="market" name="market"  value="<?php echo @$site->market ?>">
                                        </div>
                                        <br>
                                        <div class="input-prepend">
                                            <input class="span2 labelbox" type="text" value="Site ID" disabled="true">
                                            <input class="span6" type="text" placeholder="" id="site_id" name="site_id"  value="<?php echo @$site->site_id ?>">
                                        </div>
                                        <br>
                                        <div class="input-prepend">
                                            <input class="span2 labelbox" type="text" value="Sector" disabled="true">
                                            <input class="span6" type="text" placeholder="" id="sector" name="sector"  value="<?php echo @$site->sector ?>">
                                        </div>
                                        <br>
                                        <div class="input-prepend">
                                            <input class="span2 labelbox" type="text" value="Pole" disabled="true">
                                            <select class='span4' name='pole' id='pole'>
                                                <option value="pole">Pole</option>
                                                <option value="nonpole">Non Pole</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="input-prepend">
                                            <input class="span2 labelbox" type="text" value="Collo" disabled="true">
                                            <select class='span4' name='collo' id='collo'>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="input-prepend">
                                            <input class="span2 labelbox" type="text" value="Antenna Rad Center" disabled="true">
                                            <input class="span6" type="text" placeholder="" id="ant_rad_center" name="ant_rad_center"  value="<?php echo @$site->ant_rad_center ?>">
                                        </div>
                                        <br>
                                        <div class="input-prepend">
                                            <input class="span2 labelbox" type="text" value="Above Ground Dist" disabled="true">
                                            <input class="span6" type="text" placeholder="" id="above_ground_list" name="above_ground_dist"  value="<?php echo @$site->above_ground_dist ?>">
                                        </div>
                                        <br>
                                        <div class="input-prepend">
                                            <input class="span2 labelbox" type="text" value="Min Controlled Dist" disabled="true">
                                            <input class="span6" type="text" placeholder="" id="min_controlled_list" name="min_controlled_dist"  value="<?php echo @$site->min_controlled_dist ?>">
                                        </div>
                                        <br>
                                        <div class="input-prepend">
                                            <input class="span2 labelbox" type="text" value="Min Uncontrolled Dist" disabled="true">
                                            <input class="span6" type="text" placeholder="" id="min_uncontrolled_dist" name="min_uncontrolled_dist"  value="<?php echo @$site->min_uncontrolled_dist ?>">
                                        </div>
                                        <br>
                                        <div class="input-prepend">
                                            <input class="btn btn-primary span2" type="submit" value="Save">
                                        </div>
                                        <br>
                                    </form>
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

        </script>
    </body>
</html>