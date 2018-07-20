<?php
session_start();
if ($_SESSION['portal_level'] < 100) {
  header ("location: ../indextn.php");
}
$pageid = 102;
$pagetitle = "techNET :: Portal :: VIEW LOGS";
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>" . $pagetitle . "</title>";
include '../_inc/inc_csslink.php';
echo "</head>";
echo "<body>";
if ($_SESSION['login_user'] == "") {
	echo "<div class='headerdiv'>" . $pagetitle . "<br/></div>";
} else {
	include '_inc/inc_header.php';
}
echo "<div class='maincontentdiv'><br/>";


echo "<label for='selLog'>Select log to view: </label>";
?>
<select onchange="location = this.options[this.selectedIndex].value;">
<?php
echo "<option value='viewlogs.php?lid=none'>Select Log</option>";
foreach (new DirectoryIterator("../_res/_log/") as $file) {
  if ($file->isFile()) {
    $tempfile = $file->getFilename();
      echo "<option id='selLog' name='selLog' value='viewlogs.php?lid=" . $tempfile;
	  if ($tempfile == $_GET['lid']) {
        echo "' selected>";
	  } else {
        echo "'>";
	  }
	  echo $tempfile . "</option>";
  }
}
echo "<option value='viewlogs.php?lid=all'";
if ($_GET['lid'] == "all") {
  echo " selected";	
}
echo ">ALL</option>";
echo "</select>";
echo "<br/>";

if ($_GET['lid'] != "none") {
  if ($_GET['lid'] == "all") {
    $filetext = "";
    $directory = "_log/";
    $dir = opendir($directory);
      while (($file = readdir($dir)) !== false) {
        $filename = $directory . $file;
        $type = filetype($filename);
        if ($type == 'file') {
          $contents = file_get_contents($filename);
          $filetext .= "\n" . $contents;
        }
      }
  closedir($dir);
  } else {
    $filetext = "";
    $directory = "_log/";
    $dir = opendir($directory);
    $file = $_GET['lid'];
    $filename = $directory . $file;
    $contents = file_get_contents($filename);
    $filetext .= "\n" . $contents;
  }
}
echo "<textarea wrap='soft'>"; //move to css when set.
/*
$handle = fopen("_log/portal.log", "r");
$contents = ''; 
while (!feof($handle)) 
{ 
$contents .= fread($handle, 8192); 
} 
fclose($handle); 
echo $contents; 
*/

echo $filetext;
echo "</textarea>";
echo "<br/><br/><br/>";
echo "<a class='whitebg' href='admin.php'>RETURN TO ADMIN PAGE</a>";
echo "</div>";
include '../_res/_inc/inc_footer.php';
echo "</body>";
echo "</html>";
?>
