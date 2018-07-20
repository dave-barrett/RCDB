<?php

require("connect.php");

$thedate = date('Y-m-d');

$clientid = "Canon";

$clientname = "NA";

$jobtype = "G3";

$orderno = "1";

$model = "MPC3503";

$machinesize = "medium";

$meterin = "102245";

$meterout = "102250";

$manhours = "0.5";

$sanitised = "yes";

$packaging = "yes";

$engineer = "Andy Benford";

$comment = "Sanitisation Done<br>Sent G3";

$partsused = "tag id is nothing as this is a dummy!";

$serialno = "W492ka399212";

$thetime= gmdate('H:i:s');

$counter = "1";

while($counter <= 25000){
	$counter++;
	
	$sql = mysqli_query($conn,"insert into tblrecords values(null,'$thedate','$clientid','$clientname','$jobtype','$orderno','$model','$machinesize','$meterin','$meterout','$manhours','$sanitised','$packaging','$engineer','$comment','$partsused','$serialno' , '$thetime')");

	
	
}


echo "data upload has been completed";


?>