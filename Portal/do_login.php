<?php
session_start();
include '_inc/inc_dbcon_login.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {      
  $usernamein = $_POST['uname'];
  $passwordin = $_POST['psw'];
  $sql = "SELECT * FROM tblUsers WHERE UserName = '$usernamein'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['UserActive'];
  $fullnamein = $row['UserFullName'];
  $portallevelin = $row['UserPortalLevel'];
  $ccclevel = $row['UserCallCentreLevel'];
  $var1 = $row['UserVar1'];
  $abortsLevel = $row['UserAbortsLevel'];
  $trunkLevel = $row['UserTrunkLevel'];
  $surchargeLevel = $row['UserSurchargeLevel'];
  $CPRLevel = $row['UserCPRLevel'];
  $UserID = $row['UserID'];
  $dbpassword = $row["UserPassword"];
  $count = mysqli_num_rows($result);
  echo "starting...<br/>" . $_POST['uname'] . "<br/>" . $_POST['psw'] . "<br/>" . $sql . "<br/>count: " . $count . "<br/>Username: " . $usernamein . "<br/>dbpassword: " . $dbpassword . "<br/>end<br/>";
  if($count == 1) {
    $_SESSION['login_user'] = $usernamein;
	$_SESSION['UserID'] = $UserID; 
	$_SESSION['full_name'] = $fullnamein;
	$_SESSION['portal_level'] = $portallevelin;
	$_SESSION['user_var1'] = $var1;
    $_SESSION['ccc_level'] = $ccclevel;
	$_SESSION['abort_level'] = $abortsLevel;
	$_SESSION['trunk_level'] = $trunkLevel;
	$_SESSION['surcharge_level'] = $surchargeLevel;
	$_SESSION['cpr_level'] = $CPRLevel;
    if (password_verify($passwordin, $dbpassword)) {
      echo "this would pass login - check for active";
      if($active == 0) {
        header("location: ../indextn.php?eid=2&un=" . $usernamein); // error for user being set to inactive - account disabled
    } else {
      $datestamp = date("Y-m-d  H:i:s");
      $sql = "UPDATE tblUsers SET UserLoggedOnNow = '1', UserLastLogon = '" . $datestamp . "' WHERE UserName = '$usernamein'";
      mysqli_query($conn,$sql);
      $conn->close(); 
      $logmsg = "login";
      include 'do_addtolog.php';
      header("location: ../indextn.php");
    }
    } else {
      header("location: ../indextn.php?eid=3"); // username or password error
    }
    } else {
	  header("location: ../indextn.php?eid=3"); // username or password error
    }
}
?>