<?php
session_start();
include '../_res/_inc/inc_dbcon_login.php';
$usernamein = $_SESSION['login_user'];
if ($_SESSION['login_user'] <> "") {
$logmsg = "logout";
include "do_addtolog.php";
}
$sql = "UPDATE tblUsers SET UserLoggedOnNow = '0' WHERE UserName = '$usernamein'";
mysqli_query($conn,$sql);
$conn->close(); 
session_unset();
session_destroy();
header( 'Location: ../indextn.php' );
?>
