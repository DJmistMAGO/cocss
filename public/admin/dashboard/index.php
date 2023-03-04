<link rel="stylesheet" type="text/css" href="dashboard/dashboard.css"/>

<div class="row">
    <div class="col-12">
        <div class="card" style="margin-bottom: 15px;">
            <div class="card-body paddingbreadcard" style="padding-top: 25px; padding-bottom: 25px;">
                <div class="row page-titles" style="padding-bottom: 0px;">
                    <div class="col-md-6 align-self-center">
                        <h3 class="mb-0 mt-0 textdashboardbread3"><span>Welcome, </span> <span class="text-themecolor textdashboardbread3" style="font-weight: 500; font-size: 25px;" id="txtuserFname"></span></h3>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <h4 class="mb-0 mt-0 float-right textdashboardbread textdashboardbread2" style="font-weight: 400; color: #5f5f5f;"><span class="textdashboardbread" id="txtdatex"></span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row" style="justify-content: center;">
            <div class="col-xs-12 col-md-6 col-lg-4 col-xlg-3 coldashboardbox">
                <div class="card text-white bg-dark" style="margin-bottom: 15px;">
                    <div class="box bg-info" style="background-color: #FFF!important;">
                        <div class="box bg-info" style="background-color: #FFF!important;">
                            <h1 class="textdashboardboxes" id="txtTotnurses" style="color: #1f87c0;">0</h1>
                            <h6 class="font-light textdashboardboxes2" style="color: #1f87c0;">Total Nurses</h6>
                            <div class="dboxicon">
                              <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4 col-xlg-3 coldashboardbox2">
                <div class="card text-white bg-dark" style="margin-bottom: 15px;">
                    <div class="box bg-info" style="background-color: #FFF!important;">
                        <div class="box bg-info" style="background-color: #FFF!important;">
                            <h1 class="textdashboardboxes" id="txtTotpatients" style="color: #1f87c0;">0</h1>
                            <h6 class="font-light textdashboardboxes2" style="color: #1f87c0;">Total Patients</h6>
                            <div class="dboxicon">
                              <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4 col-xlg-3 coldashboardbox">
                <div class="card text-white bg-dark" style="margin-bottom: 15px;">
                    <div class="box bg-info" style="background-color: #FFF!important;">
                        <div class="box bg-info" style="background-color: #FFF!important;">
                            <h1 class="textdashboardboxes" id="txtTotappointments" style="color: #1f87c0;">0</h1>
                            <h6 class="font-light textdashboardboxes2" style="color: #1f87c0;">Total Appointments</h6>
                            <div class="dboxicon">
                              <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/plugins/Chart.js/Chart.min.js"></script>
<?php include("dashboard/dashboardscript.php"); ?>