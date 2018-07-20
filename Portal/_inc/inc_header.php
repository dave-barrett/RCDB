<?php
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
?>