<?php
	include("../connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'displaynurselist':
            if($_POST['srchprod'] != ''){
                $searchnurse = "AND (userID LIKE '%". $_POST['srchprod'] ."%' OR CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchnurse = "";
            }

            $page = $_POST["page"];
            $limit = ($page-1) * 10;
			$res = mysqli_query($connection, "SELECT userID, CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END, username, email, phonenum, id FROM nurse WHERE id != '' " . $searchnurse . " ORDER BY userID ASC LIMIT ". $limit .",10");
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
	                        	<button class='btn btn-light orderapprovebutton' style='font-weight: 400; width:40px;background-color:#e3e3e3; border-color:#e3e3e3;' onclick='modaleditnurse(\"". $row[0] ."\")'><i class='fas fa-edit'></i></button>
	                        	<button class='btn btn-dark orderapprovebutton' style='font-weight: 400; width:40px;' onclick='deletenurse(\"". $row[5] ."\")'><i class='fas fa-trash'></i></button>
	                        </td>
	                    </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;

		case "loadnurselistPagination":
			if($_POST['srchprod'] != ''){
                $searchnurse = "AND (userID LIKE '%". $_POST['srchprod'] ."%' OR CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchnurse = "";
            }

			$page = $_POST["page"];
			$rowCount = mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(id) FROM nurse WHERE id != '' " . $searchnurse . ";"));
			$rowsperpage = 10;
			$range = 1;
			$totalpages = ceil($rowCount[0] / $rowsperpage);
			$prevpage;
			$nextpage;
			if($page > 1 ){
			   	echo "<li style='width:50px !important;' onclick='nurselistPageFunc(1)'><< </li>";
			   	$prevpage = $page - 1;
			   	echo "<li style='width:70px !important;' onclick='nurselistPageFunc(". $prevpage .")'>< </li>";
			}
			for($x = ($page - $range); $x < (($page + $range) + 1); $x++){
			   	if (($x > 0) && ($x <= $totalpages)){
			      	if ($x == $page){
		   				echo "<li id='pgnurselistPageFunc" . $x . "' class='pgnumnurselistPageFunc active' onclick='nurselistPageFunc(" . $x . ",". $x .")'>" . $x . "</li>"; 
		   				$ex = $x;
		   			} else{
						echo "<li id='pgnurselistPageFunc" . $x . "' class='pgnumnurselistPageFunc' onclick='nurselistPageFunc(" . $x . ",". $x .")'>" . $x . "</li>"; 
						$ex = $x;
					}
		      	}
		    }
		    if($page < ($totalpages - $range)){ 
		    	echo "<li>...</li>"; 
		    }
		    if ($page != $totalpages && $rowCount[0] != 0){
		       	$nextpage = $page + 1;
		       	echo "<li style='width:50px !important;' onclick='nurselistPageFunc(". $nextpage .", ". $nextpage .")'> ></li>";
		       	echo "<li style='width:50px !important;' onclick='nurselistPageFunc(". $totalpages .", ". $totalpages .")'> >></li>";
		    }
		    echo "|". $ex;
		break;

        case 'addnurseracc':
        	$genID = generateID($connection, 'userID', 'nurse', 'N');
			$addnurseracc = mysqli_query($connection, "INSERT INTO nurse SET userID = '" . $genID . "', firstname = '" . $_POST['textaddnurseFname'] . "', middlename = '" . $_POST['textaddnurseMname'] . "', lastname = '" . $_POST['textaddnurseLname'] . "', email = '" . $_POST['textaddnurseEmail'] . "', phonenum = '" . $_POST['textaddnurseContactNum'] . "', username = '" . $_POST['textaddnurseUsername'] . "', password = '" . $_POST['textadduserpass'] . "', date_added = '" . date("Y-m-d") . "';");
		break;

		case 'modaleditnurse':
            $nursedet = mysqli_fetch_array(mysqli_query($connection, "SELECT userID, firstname, middlename, lastname, username, password, email, phonenum FROM nurse WHERE userID = '" . $_POST['userID'] . "';"));

            echo $nursedet[1] . "|" . $nursedet[2]  . "|" . $nursedet[3]  . "|" . $nursedet[4] . "|" . $nursedet[5] . "|" . $nursedet[6] . "|" . $nursedet[7];
		break;

		case 'editnurse':
			$editnurse = mysqli_query($connection, "UPDATE nurse SET firstname = '" . $_POST['textaddnurseFname'] . "', middlename = '" . $_POST['textaddnurseMname'] . "', lastname = '" . $_POST['textaddnurseLname'] . "', email = '" . $_POST['textaddnurseEmail'] . "', phonenum = '" . $_POST['textaddnurseContactNum'] . "', username = '" . $_POST['textaddnurseUsername'] . "', password = '" . $_POST['textadduserpass'] . "' WHERE userID = '" . $_POST['textnurseID'] . "';");
		break;

		case 'deletenurse':
			$deletenurse = mysqli_query($connection, "DELETE FROM nurse WHERE id = '".$_POST['id']."'");
		break;
	}
?>