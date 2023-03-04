<?php
	include("../connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'displaypatientlist':
            if($_POST['srchprod'] != ''){
                $searchpatient = "AND (userID LIKE '%". $_POST['srchprod'] ."%' OR CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchpatient = "";
            }

            $page = $_POST["page"];
            $limit = ($page-1) * 10;
			$res = mysqli_query($connection, "SELECT userID, CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END, username, email, phonenum, id FROM patient WHERE id != '' " . $searchpatient . " ORDER BY userID ASC LIMIT ". $limit .",10");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){

					echo "<tr style='cursor:pointer;'>
	                        <td style='white-space: nowrap; font-weight: 400'>" . $row[0] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[1] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[2] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[3] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[4] . "</td>
	                        <td style='white-space: nowrap; text-align: center;'>
	                        	<button class='btn btn-light orderapprovebutton' style='font-weight: 400; width:40px;background-color:#e3e3e3; border-color:#e3e3e3;' onclick='modaleditpatient(\"". $row[0] ."\")'><i class='fas fa-edit'></i></button>
	                        	<button class='btn btn-dark orderapprovebutton' style='font-weight: 400; width:40px;' onclick='deletepatient(\"". $row[5] ."\")'><i class='fas fa-trash'></i></button>
	                        </td>
	                    </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;

		case "loadpatientlistPagination":
			if($_POST['srchprod'] != ''){
                $searchpatient = "AND (userID LIKE '%". $_POST['srchprod'] ."%' OR CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchpatient = "";
            }

			$page = $_POST["page"];
			$rowCount = mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(id) FROM patient WHERE id != '' " . $searchpatient . ";"));
			$rowsperpage = 10;
			$range = 1;
			$totalpages = ceil($rowCount[0] / $rowsperpage);
			$prevpage;
			$nextpage;
			if($page > 1 ){
			   	echo "<li style='width:50px !important;' onclick='patientlistPageFunc(1)'><< </li>";
			   	$prevpage = $page - 1;
			   	echo "<li style='width:70px !important;' onclick='patientlistPageFunc(". $prevpage .")'>< </li>";
			}
			for($x = ($page - $range); $x < (($page + $range) + 1); $x++){
			   	if (($x > 0) && ($x <= $totalpages)){
			      	if ($x == $page){
		   				echo "<li id='pgpatientlistPageFunc" . $x . "' class='pgnumpatientlistPageFunc active' onclick='patientlistPageFunc(" . $x . ",". $x .")'>" . $x . "</li>"; 
		   				$ex = $x;
		   			} else{
						echo "<li id='pgpatientlistPageFunc" . $x . "' class='pgnumpatientlistPageFunc' onclick='patientlistPageFunc(" . $x . ",". $x .")'>" . $x . "</li>"; 
						$ex = $x;
					}
		      	}
		    }
		    if($page < ($totalpages - $range)){ 
		    	echo "<li>...</li>"; 
		    }
		    if ($page != $totalpages && $rowCount[0] != 0){
		       	$nextpage = $page + 1;
		       	echo "<li style='width:50px !important;' onclick='patientlistPageFunc(". $nextpage .", ". $nextpage .")'> ></li>";
		       	echo "<li style='width:50px !important;' onclick='patientlistPageFunc(". $totalpages .", ". $totalpages .")'> >></li>";
		    }
		    echo "|". $ex;
		break;

        case 'addpatientacc':
        	$genID = generateID($connection, 'userID', 'patient', 'P');
			$addpatientacc = mysqli_query($connection, "INSERT INTO patient SET userID = '" . $genID . "', firstname = '" . $_POST['textaddpatientFname'] . "', middlename = '" . $_POST['textaddpatientMname'] . "', lastname = '" . $_POST['textaddpatientLname'] . "', email = '" . $_POST['textaddpatientEmail'] . "', phonenum = '" . $_POST['textaddpatientContactNum'] . "', username = '" . $_POST['textaddpatientUsername'] . "', password = '" . $_POST['textaddpatientpass'] . "', date_added = '" . date("Y-m-d") . "';");
		break;

		case 'modaleditpatient':
            $nursedet = mysqli_fetch_array(mysqli_query($connection, "SELECT userID, firstname, middlename, lastname, username, password, email, phonenum FROM patient WHERE userID = '" . $_POST['userID'] . "';"));

            echo $nursedet[1] . "|" . $nursedet[2]  . "|" . $nursedet[3]  . "|" . $nursedet[4] . "|" . $nursedet[5] . "|" . $nursedet[6] . "|" . $nursedet[7];
		break;

		case 'editpatient':
			$editpatient = mysqli_query($connection, "UPDATE patient SET firstname = '" . $_POST['textaddpatientFname'] . "', middlename = '" . $_POST['textaddpatientMname'] . "', lastname = '" . $_POST['textaddpatientLname'] . "', email = '" . $_POST['textaddpatientEmail'] . "', phonenum = '" . $_POST['textaddpatientContactNum'] . "', username = '" . $_POST['textaddpatientUsername'] . "', password = '" . $_POST['textaddpatientpass'] . "' WHERE userID = '" . $_POST['textpatientID'] . "';");
		break;

		case 'deletepatient':
			$deletepatient = mysqli_query($connection, "DELETE FROM patient WHERE id = '".$_POST['id']."'");
		break;
	}
?>