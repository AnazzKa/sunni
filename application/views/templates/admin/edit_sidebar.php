</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col left_col menu_fixed menu_fixed mCustomScrollbar _mCS_1 mCS-autoHide">
            <div class="left_col scroll-view">
                <div class="navbar nav_title nvbg" style="">

                    <a href="" class="site_title whiteclr"><i class="whiteclr"><img
                                    src="<?php echo base_url(); ?>assets/admin/images/img.jpg"
                                    style="width:35px;height:35px" alt="..." class="img-circle profile_img"></i>SUNNI MANZIL</a>


                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">

                </div>
                <!-- /menu profile quick info -->


                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">

                        <ul class="nav side-menu">


                            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-tachometer"
                                                                                      aria-hidden="true"></i> Dashboard
                                </a></li>


                            <li><a href="<?php echo base_url(); ?>admin/preference/religion"><i class="fa fa-star" aria-hidden="true"></i>Religion</a></li>

                            <li><a href="<?php echo base_url(); ?>admin/preference/cast"><i class="fa fa-star" aria-hidden="true"></i>Cast</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/preference/educations"><i class="fa fa-star"
                                                                                                 aria-hidden="true"></i>Education</a>
                            </li>

                            <li><a href="<?php echo base_url(); ?>admin/preference/languages"><i class="fa fa-star" aria-hidden="true"></i>Language</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/preference/occupation"><i class="fa fa-star" aria-hidden="true"></i>Occupation</a></li>

                               <li><a><i class="fa fa-star" aria-hidden="true"></i>Users<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>admin/users"> Verified users</a>
                                    </li>
                                    
                                </ul>
                            </li>
                          <!--   <li><a><i class="fa fa-star" aria-hidden="true"></i>Reports<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>admin/report/customer_report">Customer
                                            Report</a></li>
                                    <li><a href="<?php echo base_url(); ?>admin/report/vendor_report">Vendor Report</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>admin/report/purchase_report">Purchase
                                            Report</a></li>

                                    <li><a href="<?php echo base_url(); ?>admin/report/current_assets_report">Current
                                            Assets</a></li>
                                    <li><a href="<?php echo base_url(); ?>admin/report/current_liability_report">Current
                                            Liability</a></li>
                                    <li><a href="<?php echo base_url(); ?>admin/report/sales_report">Sales Report</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>admin/report/monthly_total_report">Monthly
                                            Total Report</a></li>
                                    <?php if (has_role('view_customer_pending_credit')) { ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/customer/pending_credit_by_customer">Pending
                                                Credits</a></li>

                                    <?php } ?>
                                    <li><a href="<?php echo base_url(); ?>admin/report/product_wise_report">Product Sale
                                            Report</a></li>
                                    <li><a href="<?php echo base_url(); ?>admin/report/customer_wise_report">Customer
                                            Sale Report</a></li>
                                    <li><a href="<?php echo base_url(); ?>admin/report/state_wise_report">State wise
                                            Sale Report</a></li>
                                </ul>
                            </li> -->


                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">


                <nav>


                    <ul class="nav navbar-nav navbar-right">


                        <li class="">

                            <!-- <img src="<?php /*echo base_url();*/ ?>assets/admin/images/extreme.png" style="height:40px;padding-top:10px">-->


                        </li>


                        <li><a href="<?php echo base_url(); ?>admin/login/loged_out"><i class="fa fa-sign-out"
                                                                                        style="margin-right:6px;"></i>Log
                                Out</a></li>
                        <li><a href="" data-toggle="modal" data-target="#change_password"><i class="fa fa-key"
                                                                                             style=""></i> Password</a>
                        </li>


                    </ul>
                </nav>


                <div class="nav toggle lft10">

                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>


                <nav class="navbar navbar-inverse fllft hidemobilmenu" role="navigation">
                    <div class="">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1">
                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </button>

                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                            <ul class="nav navbar-nav">


                                <li>
                                    <a href="<?php echo base_url(); ?>admin/dashboard" class=""><i
                                                class="fa fa-home"></i><span class="mnulist">Dashoard</span></a>

                                </li>


                                <!--=================== add button end here=========================================-->


                                <li class="">
                                    <a href="<?php echo base_url(); ?>admin/customer" class=""><i
                                                class="fa fa-user"></i><span class="mnulist">Customer</span></a>

                                </li>


                                <li class="">
                                    <a href="<?php echo base_url(); ?>admin/sales/add_new_sale" class=""><i
                                                class="fa fa-camera-retro"></i><span
                                                class="mnulist">Add a new invoice</span></a></li>

                                <li>
                                    <a href="<?php echo base_url(); ?>admin/privilege"><i class="fa fa-cog"></i><span
                                                class="mnulist"> Privilege</span></a>
                                </li>


                            </ul>


                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>

            </div>
        </div>


        <div id="change_password" class="modal fade" role="dialog">
            <div class="modal-dialog" style="max-width:600px">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Change Password</h4>
                    </div>
                    <form id="password_form" method="post" action="">
                        <div class="modal-body">
                            <p>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">

                                    <label>Current password</label>
                                    <input type="password" name="current_password" data-rule-required="true"
                                           placeholder="Current password" class="form-control current_password">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">

                                    <label>New password</label>
                                    <input type="password" name="new_password" data-rule-required="true"
                                           placeholder="New password" class="form-control new_password">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">

                                    <label>Confirm password</label>
                                    <input type="password" name="confirm_password" data-rule-required="true"
                                           placeholder="Confirm password" class="form-control confirm_password">
                                </div>
                            </div>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="submit_password" class="btn btn-default">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
