<?php
	include("connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'loginuser':
			$sqllogin = "SELECT id, userID, username, firstname, lastname FROM admin WHERE username = '".$_POST['txtusername']."' AND password = '".$_POST['txtpassword']."' ";
			$reslogin = mysqli_query($connection, $sqllogin);
			$rowlogin = mysqli_fetch_array($reslogin);
			$numlogin = mysqli_num_rows($reslogin);

			if($numlogin > 0){
				$count = 1;
				$_SESSION['userID'] = $rowlogin['userID'];
				$_SESSION['username'] = $rowlogin['username'];
				$_SESSION['fullname'] = $rowlogin['firstname'] . " " . $rowlogin['lastname'];
				$_SESSION['firstname'] = $rowlogin['firstname'];
			} else{
				$count = 2;
				$_SESSION['userID'] = "";
				$_SESSION['username'] = "";
				$_SESSION['fullname'] = "";
			}
			echo $count;
		break;

		case 'fncdisplayuserinfo':
			$getuserinfo = mysqli_fetch_array(mysqli_query($connection, "SELECT CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(firstname, ' ', lastname) ELSE CONCAT(firstname, ' ', LEFT(middlename, '1'), '. ', lastname) END, email, image FROM admin WHERE userID = '" . $_SESSION['userID'] . "' "));

			if($getuserinfo[2] == ""){
				$dsplyimage = "assets/images/noimage5.png";
			} else{
				$dsplyimage = "assets/images/users" . $getstudimage[2];
			}

			echo $getuserinfo[0] . "|" . $getuserinfo[1] . "|" . $dsplyimage;
		break; 

		case 'signupuser':
			$genID = generateID($connection, 'userID', 'tbl_user', 'USER');
			$ressaveuser = mysqli_query($connection, "INSERT INTO tbl_user SET userID = '" . $genID . "', firstname = '" . $_POST['textsignupFname'] . "', middlename = '" . $_POST['textsignupMname'] . "', lastname = '" . $_POST['textsignupLname'] . "', gender = '" . $_POST['textsignupgender'] . "', email = '" . $_POST['textsignupemail'] . "', contact_num = '" . $_POST['textsignupnumber'] . "', usernameV = '" . $_POST['textsignupusername'] . "', passwordV = '" . $_POST['textpass'] . "', hashV = '" . md5($_POST['textpass']) . "', usertype = '" . $_POST['textsignupposition'] . "', branchID = 'BR-0000001';");
		break;

		case 'opensettingmod':
			$return_array = array();

			$getprofile = mysqli_fetch_array(mysqli_query($connection, "SELECT username, password FROM admin WHERE userID = '". $_SESSION['userID'] ."'"));

			$DateJoined = date('F d, Y', strtotime($Dateuserpharmacy[0]));
			array_push($return_array, $getprofile[0], $getprofile[1]);
			echo json_encode($return_array);
		break;

		case 'updateuser2':
			$ressavelog = mysqli_query($connection, "UPDATE admin SET username = '" . $_POST['textsetemail'] . "', password = '" . $_POST['textsetpassword'] . "' WHERE userID = '". $_SESSION['userID'] ."';");
		break;
	}
?>