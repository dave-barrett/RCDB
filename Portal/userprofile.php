<?php
session_start();
if ($_SESSION['login_user'] == "") {
  header ("location: ../indextn.php");
}
include '_inc/inc_dbcon_login.php';
$pageid = 101;
$pagetitle = "techNET :: Portal :: " . $_SESSION['login_user'] . "'s User Page";
$sql = "SELECT * FROM tblUsers WHERE UserID = " . $_SESSION['UserID'];
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>" . $pagetitle . "</title>";
include '_inc/inc_csslink.php';
echo "</head>";
echo "<body>";
include '_inc/inc_header.php';
echo "<div class='maincontentdiv'><br/>";
echo "<form onsubmit='' name='edituser' id='edituser' action='do_edituser.php' method='post'>";
echo "<br/><br/><br/>";
echo "<label for='txtFullname'>Full Name: </label>";
echo "<input type='text' id='txtFullname' name='txtFullname' value='" . $row['UserFullName'] . "'>&nbsp;&nbsp;&nbsp";
echo "<label for='txtEmailadress'>Email: </label>";
echo "<input type='email' id='txtEmailaddress' name='txtEmailaddress' value='" . $row['UserEmail'] . "'><br/><br/>";
echo "<label for='txtPassword'>Password: </label>";
echo "<input type='password' id='txtPassword' name='txtPassword'>&nbsp;&nbsp;&nbsp";
echo "<label for='txtPasswordCheck'>Repeat Password: </label>";
echo "<input type='password' id='txtPasswordCheck' name='txtPasswordCheck'><br/><br/>";
echo "Portal Access: " . $row['UserPortalLevel'] . "<br/><br/>";
echo "Call Centre Access: " . $row['UserCallCentreLevel'] . "<br/><br/>";
echo "Aborts Access: " . $row['UserAbortsLevel'] . "<br/><br/>";
echo "Trunk Access: " . $row['UserTrunkLevel'] . "<br/><br/>";
echo "Surcharge Access: " . $row['UserSurchargeLevel'] . "<br/><br/>";
echo "CPR Access: " . $row['UserCPRLevel'] . "<br/><br/>";
echo "<input type='submit' value='Update'>";
echo "</form>";
echo "<br/><br/><br/>";
echo "<a class='whitebg' href='../indextn.php'>RETURN TO HOME PAGE</a>";
echo "</div>";	
include '_inc/inc_footer.php';
echo "</body>";
echo "</html>";
$conn->close();
?>
