<?php
echo "<!doctype html>";
echo "<html>";
echo "<head>";
echo "<link rel='stylesheet' href='_css/portal.css'>";
echo "</head>";
echo "<body>";
$now = new \DateTime('now');
$month = $now->format('M');
$year = $now->format('Y');
echo "month " . $month;
echo "<br/>";
echo "year " . $year;
echo "<br/>";
//------------- 
$pathtolog = "_log/";
$loginuse = $pathtolog . $month . $year ."_Portal.log";
$myfile = fopen($loginuse, "a+") or die("Unable to open file!");
$txt = "\n" . date('d/m/Y H:i:s') . " » " . $_SESSION['login_user'] . " » logged in.";
fwrite($myfile, $txt);
fclose($myfile);
//------------- 



echo "<br/>";
echo "<label for='selLog'>Select log to view: </label>";
?>
<select onchange="location = this.options[this.selectedIndex].value;">
<?php
foreach (new DirectoryIterator("_log/") as $file) {
  if ($file->isFile()) {
    $tempfile = $file->getFilename();
      echo "<option id='selLog' name='selLog' value='zlogtest.php?lid=" . $tempfile;
	  if ($tempfile == $_GET['lid']) {
        echo "' selected>";
	  } else {
        echo "'>";
	  }
	  echo $tempfile . "</option>";
  }
}
echo "<option value='zlogtest.php?lid=all'";
if ($_GET['lid'] == "all") {
  echo " selected";	
}
echo ">ALL</option>";
echo "</select>";
echo "<br/>";
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
echo "<textarea>" . $filetext . "</textarea>";
echo "</body>";
echo "</html>";
/*
GET THE MONTH AND YEAR
accepted
Full version:
<? echo date('F Y'); ?>
Short version:
<? echo date('M Y'); ?>
Here is a good reference for the different date options.
update
To show the previous month we would have to introduce the mktime() function
and make us of the optional timestamp parameter for the date() function. Like this:
echo date('F Y', mktime(0, 0, 0, date('m')-1, 1, date('Y')));
This will also work (it's typically used to get the last day of the previous month):
echo date('F Y', mktime(0, 0, 0, date('m'), 0, date('Y')));
Hope that helps.
=================================
SIMPLER
   $now = new \DateTime('now');
   $month = $now->format('m');
   $year = $now->format('Y');
===================================
GET ALL THE FILENAMES FROM A DIR
foreach (new DirectoryIterator("_log/") as $file) {
  if ($file->isFile()) {
      print $file->getFilename() . "\n";
  }
}
=======================================

READING MULTIPLE TEXT FILES IN TO PHP

$directory = "_log/";
$dir = opendir($directory);
while (($file = readdir($dir)) !== false) {
  $filename = $directory . $file;
  $type = filetype($filename);
  if ($type == 'file') {
     $contents = file_get_contents($filename);
     $items = explode('¬', $contents);
     echo '<table width="500" border="1" cellpadding="4">';
     foreach ($items as $item) {
       echo "<tr><td>$item</td></tr>\n";
     }
     echo '</table>';
  }
}
closedir($dir);

 */
 
 ?>