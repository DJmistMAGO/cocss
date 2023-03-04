<?php
	include("../connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'currenttime':
            echo date("Y-m-d H:i:s");
        break;  

        case 'dsplyFname':
           	$getname = mysqli_fetch_array(mysqli_query($connection, "SELECT firstname FROM admin WHERE userID = '" . $_SESSION['userID'] . "'"));
           	echo $getname[0];
        break; 

        case 'dsplytotalnurses':
        	$gettotalnurses = mysqli_fetch_array(mysqli_query($connection, "SELECT COUNT(*) FROM nurse"));
			echo number_format($gettotalnurses[0]);
		break;

		case 'dsplytotalpatients':
        	$gettotalpatients = mysqli_fetch_array(mysqli_query($connection, "SELECT COUNT(*) FROM patient"));
			echo number_format($gettotalpatients[0]);
		break;

		case 'dsplytotalappointments':
        	$gettotalappointments = mysqli_fetch_array(mysqli_query($connection, "SELECT COUNT(*) FROM appointments WHERE status != 'DISAPPROVE'"));
			echo number_format($gettotalappointments[0]);
		break;
	}
?>