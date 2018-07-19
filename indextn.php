<?php
session_start();
$pagetitle = "techNET :: Portal";
$pageid = 1;
$secondsWait = 600;
header("refresh:$secondsWait; Portal/logout.php");
echo "<!doctype html>";
echo "<html lang='en-GB'>";
echo "<head>";
echo "<meta charset='utf-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>" . $pagetitle . "</title>";
echo "<link rel='stylesheet' href='_res/_css/master.css'>";
?>
<script>
function btest() {
var isChrome = !!window.chrome && !!window.chrome.webstore;
 if (isChrome == true) {
  document.getElementById('bmsg').style.display = 'none';
 }
}
</script>
<?php
echo "</head>";
echo "<body onload='btest()'>";
if ($_SESSION['login_user'] == "") {
	echo "<div class='headerdiv'>" . $pagetitle . "<br/></div>";
} else {
	
// include header start
	session_start();
	echo "<div class='headerdiv'>";
	echo $pagetitle;
	echo "<br/>";
	echo "<div class='welcomediv'>";
	echo "Logged in as: <a href='Portal/userprofile.php'>" . $_SESSION['full_name'] . "</a> | ";
	echo $_SESSION['portal_level'];
	echo " | ";
	date_default_timezone_set("Europe/London");
	echo date("d/m/Y H:i:s");
		if ($pageid == 101) {
			echo " | <a href='logout.php'>Logout</a></div>";
		} else {
		echo " | <a href='Portal/logout.php'>Logout</a></div>";
		}
	echo "</div>";
// include header end
	}
echo "<div class='maincontentdiv'><br/>";
echo "<div class='bmsg' id='bmsg'>Chrome not detected. This portal works best with Chrome as it has the best support for HTML5 and other elements used within.</div>";
if ($_GET['eid'] <> "") {                       // error messages
  echo "<div class='emsg'>";
  switch ($_GET['eid']) {
    case 1:
	  echo "";
	  break;
    case 2:
	  echo "The account " . $GET['un'] . "is currently disabled. Please contact a system administrator if you require this account.";
	  break;
    case 3:
	  echo "Username or password incorrect";
	  break;
  }	  
  echo "</div>";	
}
if ($_GET['mid'] <> "") {                           // info messages 
  echo "<div class='imsg'>";
  switch ($_GET['mid']) {
    case 1:
	  echo "";
	  break;
    case 2:
	  echo "";
	  break;
    case 3:
	  echo "";
	  break;
  }	  
  echo "</div>";	
}
echo "<br/>";
echo "<h1>Welcome ";
if($_SESSION['login_user'] == "") {
  echo "";
} else {
  echo $_SESSION['full_name'] . ", ";
}
echo "to the techNET Portal.</h1>";
echo "<br/>";

//logincheck

if($_SESSION['login_user'] == "") {
  echo "<a class='whitebg' href='Portal/login.htm'>Login</a>";
} else {
	echo "<table>";
	echo " <tr>";
	echo "  <th>Link</th>";
	echo "  <th>Destination</th>";
	echo " </tr>";
	echo "  <td>";
	echo "<a class='whitebg' href='RCDB/index.php'>Access</a></td>";
	echo "  <td>Route Card Database</td>";
	echo " </tr>";
		if ($_SESSION['portal_level'] > 99) {
			include 'Portal/_inc/inc_admin.php';
		} else {
			echo "</table>";	
		}
}
// logincheck

echo "<br/>";
if ($_SESSION['login_user'] == "Dave") {
echo "<div style='text-align:left;border:3px solid red; padding: 12px; background-color:lightgrey;'>";
echo "<h3>ToDo List:</h3>";

echo "<table><tr><td>";
echo "<ol>";
echo "<li>Page IDs need ordering</li>";
echo "<li>logout script need to be placed in all pages</li>";
echo "<li>Page IDs need indexing</li>";
echo "<li>CSS link include needs switch on page ID</li>";
echo "<li>header include needs switch on page ID</li>";
echo "<li>CCC - NavBar neeed updaing</li>";
echo "<li>CCC - Needs Kellys testing comments included</li>";
echo "<li>Aborts needs SQL written</li>";
echo "<li>CCC - Needs logging</li>";
echo "<li>Aborts needs logging</li>";
echo "<li>Trunk - needs restyling</li>";
echo "<li>Customer server errors need style link</li>";
echo "<li>dir permissions need to be set</li>";
echo "<li>external port detection</li>";
echo "</ol>";
echo "</td><td><table style='width:200px'><tr><tr><th colspan='2'>page id ranges</th></tr>";
echo "<th>site section</th>";
echo "<th>page id</th>";
echo "</tr>";
echo "<tr>";
echo "<td>Index</td>";
echo "<td>001</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Portal (inc. admin)</td>";
echo "<td>100</td>";
echo "</tr>";
echo "<tr>";
echo "<td>CCC</td>";
echo "<td>200</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Aborts</td>";
echo "<td>300</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Trunk</td>";
echo "<td>400</td>";
echo "</tr>";
echo "<tr>";
echo "<td>CPR</td>";
echo "<td>500</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Surcharge Log</td>";
echo "<td>600</td>";
echo "</tr>";
echo "</table>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}
echo "<br/>";
echo "</div>";
echo "<div class='footerdiv'>";
echo "CEVA Logistics :: techNET";
echo "</div>";
echo "</body>";
echo "</html>";
?>
