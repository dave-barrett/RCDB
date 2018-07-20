<?php  
session_start();
if($_SESSION['login_user'] == "") {
         header("location: ../indextn.php");
}
include '_inc/inc_dbcon_login.php';
$UserIDIn = $_POST['txtUserID'];
$UserNameIn = $_POST['txtUsername'];
$UserNameHiddenIn = $_POST['txtUsernameHidden'];
$UserFullNameIn = $_POST['txtFullname'];
$UserEmailIn = $_POST['txtEmailaddress'];
$UserPortalLevelIn = $_POST['selPortalLevel'];
$UserCallCentreLevelIn = $_POST['selCallcentrelevel'];
$UserAbortsLevelIn = $_POST['selAbortlevel'];
$UserTrunkLevelIn = $_POST['selTrunklevel'];
$UserSurchargeLevelIn = $_POST['selSurchargelevel'];
$UserCPRLevelIn = $_POST['selCPRlevel'];
$UserActiveIn = $_POST['chkUserActive'];
if ($UserActiveIn <> 1) {
	$UserActiveIn = 0;
}
$sql = "UPDATE tblUsers SET UserFullName = '" . $UserFullNameIn . "', UserEmail = '" . $UserEmailIn . "', UserPortalLevel = '" . $UserPortalLevelIn . "',UserCallCentreLevel = '" . $UserCallCentreLevelIn . "',UserAbortsLevel = '" . $UserAbortsLevelIn . "',UserTrunkLevel = '" . $UserTrunkLevelIn . "',UserSurchargeLevel = '" . $UserSurchargeLevelIn . "',UserCPRLevel = '" . $UserCPRLevelIn . "',UserActive = '" . $UserActiveIn  . "' WHERE UserID = " . $UserIDIn;
echo $sql;

echo "<br/>";
if ($conn->query($sql) === TRUE) {
	
	$logmsg = "edituser";
	include 'do_addtolog.php';
	
	/*
  $myfile = fopen("_log/portal.log", "a+") or die("Unable to open file!");
  $txt = "\n" . date('d/m/Y H:i:s') . " » " . $_SESSION['login_user'] . " » edited " . $UserNameHiddenIn . "s details. Values FN:" . $UserFullNameIn . " E:" . $UserEmailIn . " PL:" . $UserPortalLevelIn . " CL:" . $UserCallCentreLevelIn . " AL:" . $UserAbortsLevelIn . " TL:" . $UserTrunkLevelIn . " SL:" . $UserSurchargeLevelIn . " CPRL:" . $UserCPRLevelIn . " A:" . $UserActiveIn;
  fwrite($myfile, $txt);
  fclose($myfile);
  */
  header("location: edituser.php?imsg=1&odr=" . $UserNameHiddenIn);
} else {
  header("location: error.php?eid=3");
}
mysqli_close($conn);
?>
