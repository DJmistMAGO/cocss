<?php
    include("connect.php");
    session_start();
    if(empty($_SESSION['userID']))
    {   echo "<script> window.location = 'login.php';</script>"; }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_start(); 
        include('header.php');
    ?>
</head>

<body class="fix-header fix-sidebar card-no-border">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <div id="main-wrapper">
        <?php include('topbar.php'); ?>
        
        <?php 
            include('leftsidebar.php');
        ?>

        <div class="page-wrapper">

            <div class="container-fluid containerfluidneed" style="padding: 20px 20px;">
                <?php
                  if(!isset($_GET['url'])){
                        echo "<script>window.location='index.php?url=dashboard';</script>";
                  }
                  else{
                    if($_GET['url'] == "dashboard"){
                      include "dashboard/index.php";
                    }

                    if($_GET['url'] == "nurseaccount"){
                      include "nurseaccount/index.php";
                    }

                    if($_GET['url'] == "patientaccount"){
                      include "patientaccount/index.php";
                    }

                    if($_GET['url'] == "appointmenthistory"){
                      include "appointmenthistory/index.php";
                    }

                    if($_GET['url'] == "nursesession"){
                      include "nursesession/index.php";
                    }

                    if($_GET['url'] == "patientsession"){
                      include "patientsession/index.php";
                    }
                  }
                ?>
            </div>

            <?php include('footer.php'); ?>
        </div>

    </div>

    <?php include('jscripts.php'); ?>
</body>

</html>
