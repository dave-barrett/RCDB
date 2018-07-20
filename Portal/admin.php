<?php
session_start();
if ($_SESSION['portal_level'] < 100) {
  header ("location: ../indextn.php");
}
include '../_res/_inc/inc_dbcon_login.php';
$pageid = 101;
$pagetitle = "techNET :: Portal :: ADMIN";
$sql = "SELECT * FROM tblUsers WHERE UserPortalLevel <= " . $_SESSION['portal_level'] . " AND UserID <> " . $_SESSION['UserID'];
$result = mysqli_query($conn,$sql);
$rowcount = mysqli_num_rows($result);
echo "<!doctype html>";
echo "<html>";
echo "<head>";
echo "<title>" . $pagetitle . "</title>";
include '_inc/inc_csslink.php';
?>
<script>
function val() {
var vmsg = ""
var v1 = document.forms['adduser']['txtUsername'].value;
  if (v1 == "") {
   vmsg += "Username is required.\n";
  }
if (document.forms['adduser']['txtUsername'].value.length < 5) {
	vmsg += "Username must be a minimum of 5 characters.\n";
}
var v1 = document.forms['adduser']['txtUsername'].value;
var pattern = new RegExp(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
if (pattern.test(v1)) {
	vmsg += "Usename can not contain special characters.\n";
}
var v2 = document.forms['adduser']['txtPassword'].value;
  if (v2 == "") {
   vmsg += "Password is required.\n";
  }
if (document.forms['adduser']['txtPassword'].value.length < 7) {
	vmsg += "Password must be a minimum of 7 characters.\n";
}
var v2 = document.forms['adduser']['txtPassword'].value;
var pattern = new RegExp(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
if (pattern.test(v2)) {
	vmsg += "Password can not contain special characters.\n";
}
var v3 = document.forms['adduser']['txtPasswordCheck'].value;
  if (v3 != v2) {
   vmsg += "Passwords do not match.\n";
  }
var v4 = document.forms['adduser']['txtFullname'].value;
  if (v4 == "") {
   vmsg += "Full name must be entered.\n";
  }
var v4 = document.forms['adduser']['txtFullname'].value;
var pattern = new RegExp(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
if (pattern.test(v4)) {
	vmsg += "Full name can not contain special characters.\n";
}
var v5 = document.forms['adduser']['txtEmailaddress'].value;
  if (v5 == "") {
   vmsg += "Email must be entered.\n";
  }
  if (vmsg == "") {
   return true;
  }else{
  vmsg = "Some values are missing or do not match the criteria:\n" + vmsg;
  alert(vmsg);
   return false;
  }
}
function toggle_visibility(id) {
var e = document.getElementById(id);
if(e.style.display == 'none')
e.style.display = 'block';
else
e.style.display = 'none';
}
</script>
<?php
echo "</head>";
echo "<body>";
if ($_SESSION['login_user'] == "") {
	echo "<div class='headerdiv'>" . $pagetitle . "<br/></div>";
} else {
	include '_inc/inc_header.php';
}
echo "<div class='maincontentdiv'><br/>";
echo $_SERVER['SERVER_SOFTWARE'];
echo "<br/>";
if ($_GET['eid'] == 1) {
	echo "<div class='portaladminerror'>Error: Username " . $_GET['un'] . " already exists.</div>";
}
if ($_GET['mid'] == 1) {
	echo "<div class='portaladminmessage'>User " . $_GET['un'] . " added successfully.</div>";
}

echo "<a class='whitebg' href='#' name='adduserdiv' onclick=\"toggle_visibility('hddiv1');\">Add User</a>";
echo "<div id='hddiv1' style='display:none;'>";
echo "<form onsubmit='return val();' name='adduser' id='adduser' action='do_admin.php' method='post'>";
echo "PAGE IS SET UP FOR TESTING WILL NEED ALL THE PHP WRITTEN FOR LIVE<br/><br/><br/>";
echo "<label for='txtUsername'>Username: </label>";
echo "<input type='text' id='txtUsername' name='txtUsername'>&nbsp;&nbsp;&nbsp;";
echo "<label for='txtPassword'>Password: </label>";
echo "<input type='password' id='txtPassword' name='txtPassword'>&nbsp;&nbsp;&nbsp;";
echo "<label for='txtPasswordCheck'>Retype Password : </label>";
echo "<input type='password' id='txtPasswordCheck' name='txtPasswordCheck'><br/><br/>";
echo "<label for='txtFullname'>Full Name: </label>";
echo "<input type='text' id='txtFullname' name='txtFullname'>&nbsp;&nbsp;&nbsp";
echo "<label for='txtEmailadress'>Email: </label>";
echo "<input type='email' id='txtEmailaddress' name='txtEmailaddress'><br/><br/>";
echo "<label for='selPortalLevel'>Portal Level: </label>";
echo "<select id='selPortalLevel' name='selPortalLevel'>";
  for ($ctr = 0; $ctr <= $_SESSION['portal_level']; $ctr++) {
	echo "<option value=" . $ctr . ">" . $ctr . "</option>";  
  }
echo "</select>&nbsp;&nbsp;&nbsp";
echo "<label for='selCallcentrelevel'>Call Centre Level: </label>";
echo "<select id='selCallcentrelevel' name='selCallcentrelevel'>";
  for ($ctr = 0; $ctr <= $_SESSION['ccc_level']; $ctr++) {
	echo "<option value=" . $ctr . ">" . $ctr . "</option>";  
  } 
echo "</select>&nbsp;&nbsp;&nbsp";
echo "<label for='selAbortlevel'>Aborts Level: </label>";
echo "<select id='selAbortlevel' name='selAbortlevel'>";
  for ($ctr = 0; $ctr <= $_SESSION['abort_level']; $ctr++) {
	echo "<option value=" . $ctr . ">" . $ctr . "</option>";  
  }
echo "</select>&nbsp;&nbsp;&nbsp";
echo "<label for='selTrunklevel'>Trunk Level: </label>";
echo "<select id='selTrunklevel' name='selTrunklevel'>";
  for ($ctr = 0; $ctr <= $_SESSION['trunk_level']; $ctr++) {
	echo "<option value=" . $ctr . ">" . $ctr . "</option>";  
  }
echo "</select>&nbsp;&nbsp;&nbsp";
echo "<label for='selSurchargelevel'>Surcharge Level: </label>";
echo "<select id='selSurchargelevel' name='selSurchargelevel'>";
  for ($ctr = 0; $ctr <= $_SESSION['surcharge_level']; $ctr++) {
	echo "<option value=" . $ctr . ">" . $ctr . "</option>";  
  }
echo "</select>&nbsp;&nbsp;&nbsp";
echo "<label for='selCPRlevel'>CPR Level: </label>";
echo "<select id='selCPRlevel' name='selCPRlevel'>";
  for ($ctr = 0; $ctr <= $_SESSION['cpr_level']; $ctr++) {
	echo "<option value=" . $ctr . ">" . $ctr . "</option>";  
  }
echo "</select><br/><br/>";
echo "<input type='submit' value='Add New User'>";
echo "</form>";
echo "</div>";
echo "<br/><br/>";
echo "<a class='whitebg' href='#' name='edituserdiv' onclick=\"toggle_visibility('hddiv2');\">Edit Users</a>";
echo "<div id='hddiv2' style='display:none;'>";
echo "<div class='datatables'><table class='datatablesclps'><tr><th>ID</th><th>Username</th><th>Full Name</th><th>Email</th><th>Portal Access</th><th>Call Centre Access</th><th>Aborts Access</th><th>Trunk Access</th><th>Surcharge Access</th><th>CPR Access</th><th>Last Logon</th><th>Logged on Now</th><th>Active</th><th>ACTION</th>";
if ($rowcount > 0) {
  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    echo "<tr><td><a class='whitebg' href='edituser.php?uid=" . $row["UserID"] . "'>" . $row["UserID"] . "</a></td><td>" . $row["UserName"] . "</td><td>" . $row["UserFullName"] . "</td><td>" . $row["UserEmail"] . "</td><td>" . $row["UserPortalLevel"] . "</td><td>" . $row["UserCallCentreLevel"] . "</td><td>" . $row["UserAbortsLevel"] . "</td><td>" . $row["UserTrunkLevel"] . "</td><td>" . $row["UserSurchargeLevel"] . "</td><td>" . $row["UserCPRLevel"] . "</td><td>" . $row["UserLastLogon"] . "</td><td>" . $row["UserLoggedOnNow"] . "</td><td>" . $row["UserActive"] . "</td><td><a class='whitebg' href='edituser.php?uid=" . $row["UserID"] . "'>Edit</a> / <a class='whitebg' onclick=\"return confirm('Are you sure you want to reset the users password?')\" href='do_resetpassword.php?uid=" . $row["UserID"] . "'>Reset Password</a></td></tr>";
  }
}
echo "</table></div>";
echo "<br/>Records Found: " . $rowcount;
echo "</div>";
echo "<br/><br/><br/>";
echo "<a class='whitebg' href='viewlogs.php'>View Logs</a>";
echo "<br/><br/><br/>";
echo "<a class='whitebg' href='../indextn.php'>RETURN TO PREVIOUS PAGE</a>";
echo "</div>";
include '_inc/inc_footer.php';
echo "</body>";
echo "</html>";
?>
