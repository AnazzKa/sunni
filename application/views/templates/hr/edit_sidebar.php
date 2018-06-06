</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col left_col menu_fixed menu_fixed mCustomScrollbar _mCS_1 mCS-autoHide">
            <div class="left_col scroll-view">
                <div class="navbar nav_title nvbg" style="">

                    <a href="" class="site_title whiteclr"><i class="whiteclr"><img
                                    src="<?php echo base_url(); ?>assets/admin/images/img.jpg"
                                    style="width:35px;height:35px" alt="..." class="img-circle profile_img"></i>MCKINLEY</a>


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


                            <li><a href="<?php echo base_url(); ?>hr/dashboard"><i class="fa fa-tachometer"
                                                                                   aria-hidden="true"></i> Dashboard
                                </a></li>
                            <li><a><i class="fa fa-users" aria-hidden="true"></i>Branch<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>hr/branch/branch"> Add Baranch</a></li>
                                    <li><a href="<?php echo base_url(); ?>hr/branch/get_branch">View Baranch</a></li>
                                </ul>
                            </li>

                            <?php
                            if (has_role('manage_department')){
                            ?>
                            <li><a><i class="fa fa-star" aria-hidden="true"></i>Department<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>hr/department/add_department"> Department</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>hr/department/designations/">Designation</a>
                                    </li>
                                    <?php } ?>


                                </ul>
                            </li>

                            <li><a href="<?php echo base_url(); ?>hr/Employee/preference"><i
                                            class="fa fa-hourglass-half " aria-hidden="true"></i>Preference</a></li>

                            <li><a><i class="fa fa-users" aria-hidden="true"></i>Employee<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>hr/Employee/add_employee"> All Employees</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>hr/Employee/active_employee">Active
                                            Employees</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-money" aria-hidden="true"></i>Employee Actions<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>hr/Employee_warning/get_warning">Warnings</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>hr/requisition/"> Requisitions</a></li>
                                    <li><a href="<?php echo base_url(); ?>hr/complaint/"> Complaints</a></li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>hr/Employee_terminations/get_terminations">Terminations</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url(); ?>hr/employee_exit/get_exit">Employee Exits</a>
                                    </li>

                                    <li><a href="<?php echo base_url(); ?>hr/resignation/res_emp_list">Resignation</a>
                                    </li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-money" aria-hidden="true"></i>Payroll <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>hr/Payroll/payment">Pay Salary</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>hr/Payroll/salary_list/">Salary
                                            Payslip</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>hr/Payroll/view_paid_payslip/">Paid
                                            Salary Payslip</a>
                                    </li>

                                    <li><a href="<?php echo base_url(); ?>hr/Payroll/advance_payment">Advance
                                            Salary</a>
                                    </li>

                                </ul>
                            </li>


                            <li><a><i class="fa fa-user-plus" aria-hidden="true"></i>Recruitment <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>hr/Recruitment/requisitions">Requisitions</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>hr/Recruitment/posts">Job Posts</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url(); ?>hr/Recruitment/candidates/">Candidates</a>
                                    </li>

                                    <li><a href="<?php echo base_url(); ?>hr/Recruitment/shortlists">Shortlists</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>hr/Recruitment/selected">Selected</a>
                                    </li>

                                </ul>
                            </li>

                            <li><a><i class="fa fa-money" aria-hidden="true"></i>Time Sheets <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>hr/Timesheet/leavetype">Leave Types</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>hr/Timesheet/leaves/">Leaves</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url(); ?>hr/Timesheet/leaves_assignview/">Assign
                                            Leaves</a>
                                    </li>


                                </ul>
                            </li>


                            <li><a><i class="fa fa-money" aria-hidden="true"></i>Reports<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a><i class="fa fa-money" aria-hidden="true"></i>Employees<span
                                                    class="fa fa-chevron-down"></span></a>


                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="<?php echo base_url(); ?>hr/Employee/get_all_emp_joining_report">Employee
                                                    Joining Report</a>


                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>hr/Employee/get_active_employee_report">Active
                                                    Employees</a>
                                            </li>

                                            <li>
                                                <a href="<?php echo base_url(); ?>hr/Employee/get_requisition_report">Requisition
                                                    Report</a>
                                            </li>

                                            <li>
                                                <a href="<?php echo base_url(); ?>hr/employee_complaints/get_complaint_reports">Complaint
                                                    Report</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>hr/employee_terminations/get_termination_report">Termination
                                                    Report</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>hr/employee_warning/get_warning_report">Warning
                                                    Report</a>
                                            </li>

                                            <li><a href="<?php echo base_url(); ?>hr/employee_exit/get_exit_report">Exit
                                                    Report</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>hr/Recruitment/get_all_requisition_report">Recruitment
                                                    Report</a>
                                            </li>

                                        </ul>


                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>hr/Employee/get_designation_report">Designation</a>
                                    </li>


                                    <li><a><i class="fa fa-money" aria-hidden="true"></i>Hr Report<span
                                                    class="fa fa-chevron-down"></span></a>

                                        <ul class="nav child_menu">

                                            <li>
                                                <a href="<?php echo base_url(); ?>hr/report/departments_list">Departments</a>
                                            </li>

                                            <li>
                                                <a href="<?php echo base_url(); ?>hr/report/birthdays_calendar">Birthday
                                                    Calender</a>
                                            </li>


                                        </ul>


                                    </li>
                                    <li><a><i class="fa fa-money" aria-hidden="true"></i>Payroll Report<span
                                                    class="fa fa-chevron-down"></span></a>

                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url(); ?>hr/Payroll/get_payslip_report">Salary
                                                    Pay Slip</a>

                                            </li>

                                        </ul>


                                    </li>

                                </ul>
                            </li>


                            <li>
                                <a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-tachometer"
                                                                                      aria-hidden="true"></i>Inventory</a>
                            </li>

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

                            <!-- <img src="<?php /*echo base_url();*/ ?>assets/admin/images/extreme.png" style="height:40px;padding-top:10px">
-->

                        </li>


                        <li><a href="<?php echo base_url(); ?>admin/login/loged_out"><i class="fa fa-sign-out"
                                                                                        style="margin-right:6px;"></i>Log
                                Out</a></li>


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
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                            <ul class="nav navbar-nav">


                                <li>
                                    <a href="<?php echo base_url();?>hr/dashboard" class="" data-toggle=""><i
                                                class="fa fa-home"></i><span class="mnulist">Home</span></a>

                                </li>


                                <!--=================== add button end here=========================================-->


                                <li class="">
                                    <a href="<?php echo base_url();?>hr/employee/active_employee" class=""><i class="fa fa-user"></i><span
                                                class="mnulist">Employees</span></a>
                                </li>


                                <li class="">
                                    <a href="<?php echo base_url();?>hr/department/add_department" class=""><i class="fa fa-camera-retro"></i><span
                                                class="mnulist">Departments</span></a></li>
                                <li>
                                    <a href="<?php echo base_url();?>hr/Payroll/payment"><i class="fa fa-cog"></i><span class="mnulist"> Pay salary</span></a>
                                </li>


                            </ul>


                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>

            </div>
        </div>