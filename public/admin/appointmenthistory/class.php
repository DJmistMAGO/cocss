<?php
	include("../connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'displayappointmenthislist':
            if($_POST['srchprod'] != ''){
                $searchappointment = "AND  (a.appID LIKE '%". $_POST['srchprod'] ."%' OR CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchappointment = "";
            }

            $page = $_POST["page"];
            $limit = ($page-1) * 10;
			$res = mysqli_query($connection, "SELECT a.appID, CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END, c.appointment_type, a.status, a.DATETIME_LOG, a.appointment_type FROM appointments AS a LEFT JOIN patient AS b ON a.userID = b.userID LEFT JOIN appointment_type AS c ON a.appointment_type = c.id WHERE a.id != '' " . $searchappointment . " ORDER BY a.id DESC LIMIT ". $limit .",10");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){
					if($row[3]=="PENDING"){
						$status = "<span class='label label-danger label-rouded'>Pending</span>";
					} elseif($row[3]=="DISAPPROVE"){
						$status = "<span class='label label-dark label-rouded'>Disapproved</span>";
					} elseif($row[3]=="APPROVED"){
						$status = "<span class='label label-success label-rouded'>Approved</span>";
					} else{
						$status = "<span class='label label-success label-rouded'>Completed</span>";
					}

					if($row[5] == 1){
						$getcheckupdetails = mysqli_fetch_array(mysqli_query($connection, "SELECT app_date, app_time FROM app_det_checkup WHERE appID = '" . $row[0] . "';"));
						$onclicks = "opencheckupdetmodal(\"". date('F d, Y', strtotime($getcheckupdetails[0])) ."\", \"". date('g:i a', strtotime($getcheckupdetails[1])) ."\");";
					} else{
						$gethealthmeddetails = mysqli_fetch_array(mysqli_query($connection, "SELECT healthissue, recommendation FROM app_det_healthmed WHERE appID = '" . $row[0] . "';"));
						$onclicks = "openhealthmeddetmodal(\"". $gethealthmeddetails[0] ."\", \"". $gethealthmeddetails[1] ."\");";
					}

					echo "<tr style='cursor:pointer;'>
	                        <td style='white-space: nowrap; font-weight: 400' onclick='" . $onclicks . "'>" . $row[0] . "</td>
	                        <td style='white-space: nowrap;' onclick='" . $onclicks . "'>" . $row[1] . "</td>
	                        <td style='white-space: nowrap;' onclick='" . $onclicks . "'>" . $row[2] . "</td>
	                        <td style='white-space: nowrap;' onclick='" . $onclicks . "'>" . $status . "</td>
	                        <td style='white-space: nowrap;' onclick='" . $onclicks . "'>" . date('F d, Y', strtotime($row[4])) . "</td>
	                    </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;

		case "loadappointmenthislistPagination":
			if($_POST['srchprod'] != ''){
                $searchappointment = "AND  (a.appID LIKE '%". $_POST['srchprod'] ."%' OR CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchappointment = "";
            }

			$page = $_POST["page"];
			$rowCount = mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(a.id) FROM appointments AS a LEFT JOIN patient AS b ON a.userID = b.userID LEFT JOIN appointment_type AS c ON a.appointment_type = c.id WHERE a.id != '' " . $searchappointment . ";"));
			$rowsperpage = 10;
			$range = 1;
			$totalpages = ceil($rowCount[0] / $rowsperpage);
			$prevpage;
			$nextpage;
			if($page > 1 ){
			   	echo "<li style='width:50px !important;' onclick='appointmenthislistPageFunc(1)'><< </li>";
			   	$prevpage = $page - 1;
			   	echo "<li style='width:70px !important;' onclick='appointmenthislistPageFunc(". $prevpage .")'>< </li>";
			}
			for($x = ($page - $range); $x < (($page + $range) + 1); $x++){
			   	if (($x > 0) && ($x <= $totalpages)){
			      	if ($x == $page){
		   				echo "<li id='pgappointmenthislistPageFunc" . $x . "' class='pgnumappointmenthislistPageFunc active' onclick='appointmenthislistPageFunc(" . $x . ",". $x .")'>" . $x . "</li>"; 
		   				$ex = $x;
		   			} else{
						echo "<li id='pgappointmenthislistPageFunc" . $x . "' class='pgnumappointmenthislistPageFunc' onclick='appointmenthislistPageFunc(" . $x . ",". $x .")'>" . $x . "</li>"; 
						$ex = $x;
					}
		      	}
		    }
		    if($page < ($totalpages - $range)){ 
		    	echo "<li>...</li>"; 
		    }
		    if ($page != $totalpages && $rowCount[0] != 0){
		       	$nextpage = $page + 1;
		       	echo "<li style='width:50px !important;' onclick='appointmenthislistPageFunc(". $nextpage .", ". $nextpage .")'> ></li>";
		       	echo "<li style='width:50px !important;' onclick='appointmenthislistPageFunc(". $totalpages .", ". $totalpages .")'> >></li>";
		    }
		    echo "|". $ex;
		break;
	}
?>