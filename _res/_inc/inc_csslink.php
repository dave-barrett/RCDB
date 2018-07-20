<?php
/*
if ($pageid < 100) {
echo "<link rel='stylesheet' href='Portal/_css/portal.css'>";
} else {
echo "<link rel='stylesheet' href='../Portal/_css/portal.css'>";
}
*/
/* code ready for when pageid's are sorted */

$rootpages = range(0,99,1);
$portaldir = range(100,199,1);
$subdir = range(200,999,1);

if (in_array($pageid, $rootpages)) {
  echo "<link rel='stylesheet' href='Portal/_css/portal.css'>";
}

if (in_array($pageid, $portaldir)) {
  echo "<link rel='stylesheet' href='_css/portal.css'>";
}

if (in_array($pageid, $subdir)) {
  echo "<link rel='stylesheet' href='../Portal/_css/portal.css'>";
}

?>