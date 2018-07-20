<?php
session_start();
if ($_SESSION['portal_level'] < 100) {
  header("location: indextn.php");
}
include '_inc/inc_dbcon_login.php';
$length = 12;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
  $randomString .= $characters[rand(0, $charactersLength - 1)];
}
$hash = password_hash($randomString, PASSWORD_BCRYPT, ['cost' => 13]);
$sql = "UPDATE tblUsers SET UserPassword = '" . $hash . "' WHERE UserID = ". $_GET['uid'];
if ($conn->query($sql) === TRUE) {
  $sql = "SELECT UserName FROM tblUsers WHERE UserID = " . $_GET['uid'];
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $pageid = 101;
  $pagetitle = "techNET :: Portal :: " . $row['UserName'] . "'s Password Reset";
  echo "<!DOCTYPE html>";
  echo "<html>";
  echo "<head>";
  echo "<title>" . $pagetitle . "</title>";
  echo "<link rel='stylesheet' type='text/css' href='_css/portal.css'>";
  echo "</head>";
  echo "<body>";
  if ($_SESSION['login_user'] == "") {
    echo "<div class='headerdiv'>" . $pagetitle . "<br/></div>";
  } else {
    include '_inc/inc_header.php';
  }
  echo "<div class='maincontentdiv'><br/>";
  echo "Password had been updated for " . $row['UserName'] . ". The new password is " . $randomString . " please inform the user as no email or notification has been sent.";
  $conn->close();
  echo "<br/><br/><br/>";
  echo "<a class='whitebg' href='admin.php'>RETURN TO ADMIN PAGE</a>";
  echo "</div>";	
  include '_inc/inc_footer.php';
  echo "</body>";
  echo "</html>";
$logmsg = "resetpassword";
include "do_addtolog.php";  
  
  /*
  $myfile = fopen("_log/portal.log", "a+") or die("Unable to open file!");
  $txt = "\n" . date('d/m/Y H:i:s') . " » " . $_SESSION['login_user'] . " » changed " . $row['UserName'] . "'s password.";
  fwrite($myfile, $txt);
  fclose($myfile);  */
} else {
  $conn->close();
  header("location: edituser.php?eid=1"); // message for error - something went wrong
}
?>