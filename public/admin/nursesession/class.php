<?php
	include("../connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'displaynurselogslist':
            if($_POST['srchprod'] != ''){
                $searchnurselogs = "AND (a.userID LIKE '%". $_POST['srchprod'] ."%' OR CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchnurselogs = "";
            }

            $page = $_POST["page"];
            $limit = ($page-1) * 10;
			$res = mysqli_query($connection, "SELECT a.userID, CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END, a.loghistory, a.DATETIME_LOG FROM tbl_nurse_logs AS a LEFT JOIN nurse AS b ON a.userID = b.userID WHERE a.id != '' " . $searchnurselogs . " ORDER BY a.id DESC LIMIT ". $limit .",10");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){
					echo "<tr style='cursor:pointer;'>
	                        <td style='white-space: nowrap; font-weight: 400'>" . $row[0] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[1] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[2] . "</td>
	                        <td style='white-space: nowrap;'>" . date('g:i a', strtotime($row[3])) . "</td>
	                        <td style='white-space: nowrap;'>" . date('F d, Y', strtotime($row[3])) . "</td>
	                    </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;

		case "loadnurselogslistPagination":
			if($_POST['srchprod'] != ''){
                $searchnurselogs = "AND (a.userID LIKE '%". $_POST['srchprod'] ."%' OR CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchnurselogs = "";
            }

			$page = $_POST["page"];
			$rowCount = mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(a.id) FROM tbl_nurse_logs AS a LEFT JOIN nurse AS b ON a.userID = b.userID WHERE a.id != '' " . $searchnurselogs . ";"));
			$rowsperpage = 10;
			$range = 1;
			$totalpages = ceil($rowCount[0] / $rowsperpage);
			$prevpage;
			$nextpage;
			if($page > 1 ){
			   	echo "<li style='width:50px !important;' onclick='nurselogslistPageFunc(1)'><< </li>";
			   	$prevpage = $page - 1;
			   	echo "<li style='width:70px !important;' onclick='nurselogslistPageFunc(". $prevpage .")'>< </li>";
			}
			for($x = ($page - $range); $x < (($page + $range) + 1); $x++){
			   	if (($x > 0) && ($x <= $totalpages)){
			      	if ($x == $page){
		   				echo "<li id='pgnurselogslistPageFunc" . $x . "' class='pgnumnurselogslistPageFunc active' onclick='nurselogslistPageFunc(" . $x . ",". $x .")'>" . $x . "</li>"; 
		   				$ex = $x;
		   			} else{
						echo "<li id='pgnurselogslistPageFunc" . $x . "' class='pgnumnurselogslistPageFunc' onclick='nurselogslistPageFunc(" . $x . ",". $x .")'>" . $x . "</li>"; 
						$ex = $x;
					}
		      	}
		    }
		    if($page < ($totalpages - $range)){ 
		    	echo "<li>...</li>"; 
		    }
		    if ($page != $totalpages && $rowCount[0] != 0){
		       	$nextpage = $page + 1;
		       	echo "<li style='width:50px !important;' onclick='nurselogslistPageFunc(". $nextpage .", ". $nextpage .")'> ></li>";
		       	echo "<li style='width:50px !important;' onclick='nurselogslistPageFunc(". $totalpages .", ". $totalpages .")'> >></li>";
		    }
		    echo "|". $ex;
		break;
	}
?>