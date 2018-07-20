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
$pathtolog = "../_res/_log/";
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
foreach (new DirectoryIterator("../_res/_log/") as $file) {
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
$directory = "../_res/_log/";
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
$directory = "../_res/_log/";
$dir = opendir($directory);
$file = $_GET['lid'];
$filename = $directory . $file;
$contents = file_get_contents($filename);
       $filetext .= "\n" . $contents;
}
echo "<textarea>" . $filetext . "</textarea>";
echo "</body>";
echo "</html>";

 ?>
