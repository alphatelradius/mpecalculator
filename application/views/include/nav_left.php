<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url(); ?>" class="site_title"><i class="fa fa-paw"></i> <span>RFDS Tool</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('name'); ?></h2>
            </div>
        </div>
        <!-- /menu prile quick info -->
        <br />
        <br />
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="margin-top:30px; ">
            
            <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">
                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home </a></li>
                    <li><a><i class="fa fa-edit"></i> Antenna <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?php echo base_url('antenna'); ?>">All Antenna</a></li>
                            <li><a href="<?php echo base_url('antenna/upload'); ?>">Upload Data</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> MPE Calculator <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?php echo base_url('calculate'); ?>">All MPE</a></li>
                            <li><a href="<?php echo base_url('calculate/add'); ?>">Process Data</a></li>
                            <li><a href="<?php echo base_url('calculate/multiple'); ?>">Process Multiple Data</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('extract'); ?>"><i class="fa fa-gear"></i> Extractor </a></li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>