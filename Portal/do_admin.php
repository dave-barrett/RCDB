<?php
session_start();
if ($_SESSION['portal_level'] < 100) {
  header ("location: ../indextn.php");
}
include '../_res/_inc/inc_dbcon_login.php';
$usernamein = $_POST['txtUsername'];
$passwordin = $_POST['txtPassword'];
$fullnamein = $_POST['txtFullname'];
$emailin = $_POST['txtEmailaddress'];
$portallevelin = $_POST['selPortalLevel'];
$callcentrelevelin = $_POST['selCallcentrelevel'];
$abortslevelin = $_POST['selAbortlevel'];
$trunklevelin = $_POST['selTrunklevel'];
$surchargelevelin = $_POST['selSurchargelevel'];
$cprlevelin = $_POST['selCPRlevel'];
$UserActive = 1;
$sql = "SELECT * FROM tblUsers WHERE UserName = '$usernamein'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
if($count > 0) {
  mysqli_close($conn);
    header("location: admin.php?eid=1&un=" . $usernamein);
} else {
$hash = password_hash($passwordin, PASSWORD_BCRYPT, ['cost' => 13]);
$sql = "INSERT INTO tblUsers (UserName, UserPassword, UserFullName, UserEmail, UserCallCentreLevel, UserPortalLevel, UserAbortsLevel, UserTrunkLevel, UserSurchargeLevel, UserCPRLevel, UserActive) VALUES ('$usernamein', '$hash', '$fullnamein', '$emailin', '$callcentrelevelin', '$portallevelin', '$abortslevelin', '$trunklevelin', '$surchargelevelin', '$cprlevelin', '$UserActive')";
if ($conn->query($sql) === TRUE) {
  $myfile = fopen("../_res/_log/portal.log", "a+") or die("Unable to open file!");
  $txt = "\n" . date('d/m/Y H:i:s') . " » " . $_SESSION['login_user'] . " » added user " . $usernamein . "s. Values FN:" . $fullnamein . " E:" . $emailin . " PL:" . $portallevelin . " CL:" . $callcentrelevelin . " AL:" . $abortslevelin . " TL:" . $trunklevelin . " SL:" . $surchargelevelin . " CPRL:" . $cprlevelin . " A:" . $UserActive;
  fwrite($myfile, $txt);
  fclose($myfile);
  header("location: admin.php?mid=1&un=" . $usernamein);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
}
?>
