<?php
session_start();
if ($_SESSION['portal_level'] < 100) {
  header("location: indextn.php");
}
include '_inc/inc_dbcon_login.php';
$pageid = 101;
$pagetitle = "techNET :: Portal :: Edit User " . $_GET['un'];
$sql = "SELECT * FROM tblUsers WHERE UserID = " . $_GET['uid'];
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>" . $pagetitle . "</title>";
include '_inc/inc_csslink.php';
echo "</head>";
echo "<body>";
if ($_SESSION['login_user'] == "") {
  echo "<div class='headerdiv'>" . $pagetitle . "<br/></div>";
} else {
  include '_inc/inc_header.php';
}
echo "<div class='maincontentdiv'><br/>";
echo "<form onsubmit='' name='edituser' id='edituser' action='do_edituser.php' method='post'>";
echo "<br/><br/><br/>";
echo "<input type='hidden' name='txtUserID' id='txtUserID' value='" . $row['UserID'] . "'>";
echo "<input type='hidden' name='txtUsernameHidden' id='txtUsernameHidden' value='" . $row['UserName'] . "'>";
echo "<label for='txtUsername'>Username: </label>";
echo "<input type='text' id='txtUsername' name='txtUsername' value='" . $row['UserName'] . "' disabled>&nbsp;&nbsp;&nbsp;";
echo "<label for='txtFullname'>Full Name: </label>";
echo "<input type='text' id='txtFullname' name='txtFullname' value='" . $row['UserFullName'] . "'>&nbsp;&nbsp;&nbsp";
echo "<label for='txtEmailadress'>Email: </label>";
echo "<input type='email' id='txtEmailaddress' name='txtEmailaddress' value='" . $row['UserEmail'] . "'><br/><br/>";
echo "<label for='selPortalLevel'>Portal Level: </label>";
echo "<select id='selPortalLevel' name='selPortalLevel'>";
  for ($ctr = 0; $ctr <= $_SESSION['portal_level']; $ctr++) {
    if ($ctr == $row['UserPortalLevel']) {
	  echo "<option value=" . $ctr . " selected>" . $ctr . "</option>";
	} else {
	  echo "<option value=" . $ctr . ">" . $ctr . "</option>";  
	}
  }
echo "</select>&nbsp;&nbsp;&nbsp";
echo "<label for='selCallcentrelevel'>Call Centre Level: </label>";
echo "<select id='selCallcentrelevel' name='selCallcentrelevel'>";
  for ($ctr = 0; $ctr <= $_SESSION['ccc_level']; $ctr++) {
    if ($ctr == $row['UserCallCentreLevel']) {
	  echo "<option value=" . $ctr . " selected>" . $ctr . "</option>";  
	} else {
	  echo "<option value=" . $ctr . ">" . $ctr . "</option>";  
	}
  }  
echo "</select>&nbsp;&nbsp;&nbsp";
echo "<label for='selAbortlevel'>Aborts Level: </label>";
echo "<select id='selAbortlevel' name='selAbortlevel'>";
  for ($ctr = 0; $ctr <= $_SESSION['abort_level']; $ctr++) {  
	if ($ctr == $row['UserAbortsLevel']) {
	  echo "<option value=" . $ctr . " selected>" . $ctr . "</option>";  
	} else {
	  echo "<option value=" . $ctr . ">" . $ctr . "</option>";  		  
    }
  }
echo "</select>&nbsp;&nbsp;&nbsp";
echo "<label for='selTrunklevel'>Trunk Level: </label>";
echo "<select id='selTrunklevel' name='selTrunklevel'>";
  for ($ctr = 0; $ctr <= $_SESSION['trunk_level']; $ctr++) {
    if ($ctr == $row['UserTrunkLevel']) {
	  echo "<option value=" . $ctr . " selected>" . $ctr . "</option>";
	} else {
	  echo "<option value=" . $ctr . ">" . $ctr . "</option>";
	}	  
  }
echo "</select>&nbsp;&nbsp;&nbsp";
echo "<label for='selSurchargelevel'>Surcharge Level: </label>";
echo "<select id='selSurchargelevel' name='selSurchargelevel'>";
  for ($ctr = 0; $ctr <= $_SESSION['surcharge_level']; $ctr++) {
    if ($ctr == $row['UserSurchargeLevel']) {
	  echo "<option value=" . $ctr . " selected>" . $ctr . "</option>";  		  
	} else {
	  echo "<option value=" . $ctr . ">" . $ctr . "</option>";  
	}
  }
echo "</select>&nbsp;&nbsp;&nbsp";
echo "<label for='selCPRlevel'>CPR Level: </label>";
echo "<select id='selCPRlevel' name='selCPRlevel'>";
  for ($ctr = 0; $ctr <= $_SESSION['cpr_level']; $ctr++) {
    if ($ctr == $row['UserCPRLevel']) {
	  echo "<option value=" . $ctr . " selected>" . $ctr . "</option>";  
	} else {
	  echo "<option value=" . $ctr . ">" . $ctr . "</option>";  		  
	}
  }
echo "</select>&nbsp;&nbsp;&nbsp;";
echo "<label for='chkUserActive'>Active: </level>";
echo "<input type='checkbox' id='chkUserActive' name='chkUserActive' value=1 ";
if ($row['UserActive'] == 1) {
	echo "checked";
}
echo ">";
echo "<br/><br/>";
echo "<input type='submit' value='Update User'>";
echo "</form>";
echo "<br/><br/><br/>";
echo "<a class='whitebg' href='../indextn.php'>RETURN TO HOME PAGE</a>";
echo "</div>";	
include '_inc/inc_footer.php';
echo "</body>";
echo "</html>";

?>