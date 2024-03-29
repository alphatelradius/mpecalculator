<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Simple Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="layout" content="main"/>

        <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jsapi"></script>

        <script src="<?php echo base_url('assets') ?>/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
        <link href="<?php echo base_url('assets') ?>/css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />

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
                                <!--                                <header class="page-header">
                                                                    <h3><i class="icon-signal icon-large"></i> Antenna</h3>
                                                                </header>-->
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
                <section id="my-account-security-form" class="page container">
                    <form id="userSecurityForm" class="form-horizontal" action="dashboard.html" method="post">
                        <div class="container">
                            <div class="row">
                                <div id="acct-password-row" class="span7">
                                    <fieldset>
                                        <legend>Account Password</legend><br>
                                        <div class="control-group ">
                                            <label class="control-label">Current Password <span class="required">*</span></label>
                                            <div class="controls">
                                                <input id="current-pass-control" name="password" class="span4" type="password" value="" autocomplete="false">

                                            </div>
                                        </div>
                                        <div class="control-group ">
                                            <label class="control-label">New Password</label>
                                            <div class="controls">
                                                <input id="new-pass-control" name="newPassword" class="span4" type="password" value="" autocomplete="false">

                                            </div>
                                        </div>
                                        <div class="control-group ">
                                            <label class="control-label">Verify New Password</label>
                                            <div class="controls">
                                                <input id="new-pass-verify-control" name="newPasswordVerification" class="span4" type="password" value="" autocomplete="false">

                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="acct-verify-row" class="span9">
                                    <fieldset>
                                        <legend>Account Verification</legend>
                                        <div class="control-group">
                                            <label for="challengeQuestion" class="control-label">Question</label>
                                            <div class="controls">
                                                <select id="challenge_question_control" class="span5">
                                                    <option value="">-- Select a Question --</option>
                                                    <option value="In which city were you born?">
                                                        In which city were you born?
                                                    </option>
                                                    <option value="What is your birth date?">
                                                        What is your birth date?
                                                    </option>
                                                    <option value="What are the last four digits of your driver's license number?">
                                                        What are the last four digits of your drivers license number?
                                                    </option>
                                                    <option value="What is your zip or postal code?">
                                                        What is your zip or postal code?
                                                    </option>
                                                    <option value="What high school did you attend?">
                                                        What high school did you attend?
                                                    </option>
                                                    <option value="What was the name of your first pet?">
                                                        What was the name of your first pet?
                                                    </option>
                                                    <option value="What is your father's middle name?">
                                                        What is your father's middle name?
                                                    </option>
                                                    <option value="What is your mother's middle name?">
                                                        What is your mother's middle name?
                                                    </option>
                                                    <option value="What is your mother's maiden name?">
                                                        What is your mother's maiden name?
                                                    </option>
                                                    <option value="What is your spouse's middle name?">
                                                        What is your spouse's middle name?
                                                    </option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="control-group ">
                                            <label class="control-label">Answer</label>
                                            <div class="controls">
                                                <input id="challenge-answer-control" name="challengeAnswer" class="span5" type="password" value="" autocomplete="false">

                                            </div>
                                        </div>
                                        <div class="control-group ">
                                            <label class="control-label">Verify Answer</label>
                                            <div class="controls">
                                                <input id="challenge-answer-verify-control" name="challengeAnswerVerification" class="span5" type="password" value="" autocomplete="false">

                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <footer id="submit-actions" class="form-actions">
                                <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM">Save</button>
                                <button type="submit" class="btn" name="action" value="CANCEL">Cancel</button>
                            </footer>
                        </div>
                    </form>
                </section>

            </div>
        </div>

        <footer class="application-footer">
            <div class="container">
                <p>Application Footer</p>
                <div class="disclaimer">
                    <p>This is an example disclaimer. All right reserved.</p>
                    <p>Copyright © keaplogik 2011-2012</p>
                </div>
            </div>
        </footer>
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
                $('.chosen').chosen();
                $("[rel=tooltip]").tooltip();

                $("#vguide-button").click(function (e) {
                    new VTour(null, $('.nav-page')).tourGuide();
                    e.preventDefault();
                });
                $("#vtour-button").click(function (e) {
                    new VTour(null, $('.nav-page')).tour();
                    e.preventDefault();
                });
            });
        </script>

    </body>
</html>