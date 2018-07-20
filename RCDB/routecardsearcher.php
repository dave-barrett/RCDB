<?php
session_start();


$counter = $_SESSION['counter'];

if(isset($_GET['first'])){
	$_SESSION['command'] = "first";
	header("Location: findroutecard.php");
	
}
if(isset($_GET['decrease'])){
	$_SESSION['command'] = "decrease";
	header("Location: findroutecard.php");
	
}
if(isset($_GET['increase'])){
	$_SESSION['command'] = "increase";
	header("Location: findroutecard.php");
	
}
if(isset($_GET['last'])){
	$_SESSION['command'] = "last";
	header("Location: findroutecard.php");
	
}

if(isset($_GET['serialsearch'])){
	
	$_SESSION['command'] = "search";
	$searchparam = $_GET['searchparam'];
	$_SESSION['searchparam'] = $searchparam;
	header("Location: findroutecard.php");
}


if(isset($_GET['editrecord'])){
	
	$recordid = $_SESSION['counter'];
	
	$date = date('Y-m-d', strtotime($_GET['chosendate']));
	
	$clientid = $_GET['clientselected'];
	$clientname = $_GET['clientname'];
	$jobtype = $_GET['jobtype'];
	
	$orderno = $_GET['orderno'];
	$model = $_GET['model'];
	$machinesize = $_GET['selectedsize'];
	
	$meterin = $_GET['meterin'];
	$meterout = $_GET['meterout'];
	$manhours = $_GET['manhours'];
	
	$sanitised = $_GET['sanitised'];
	$packaging = $_GET['packaging'];
	$technician = $_GET['engineer'];
	
	$comments = $_GET['comment'];
	$partsused = $_GET['partsused'];
	$serialno = $_GET['serialno'];
	
	
	require("connect.php");
	
	$updatequery = mysqli_query($conn, "update tblrecords set record_client='$clientid', record_client_contact_name='$clientname', record_jobtype='$jobtype', record_order_number='$orderno', record_model='$model', record_size='$machinesize', record_meter_in='$meterin', record_meter_out='$meterout', record_man_hours='$manhours', record_sanitised='$sanitised', record_packaging = '$packaging', record_technician='$technician', record_comments='$comments', record_parts_used='$partsused', record_serial_number='$serialno' where record_id='$recordid'");                          
	
	#give the above variable values to the sessions below!!!!!
	$_SESSION['recid'] = $recordid;
	$_SESSION['thedate']=$date;
	
	$_SESSION['clientid'] = $clientid;
	$_SESSION['clientname'] = $clientname;
	$_SESSION['jobtype'] = $jobtype;
	
	$_SESSION['orderno'] = $orderno;
	$_SESSION['model'] = $model;
	$_SESSION['machinesize'] = $machinesize;
	
	$_SESSION['meterin'] = $meterin;
	$_SESSION['meterout'] = $meterout;
	$_SESSION['manhours'] = $manhours;
	
	$_SESSION['sanitised'] = $sanitised;
	$_SESSION['packaging'] = $packaging;
	$_SESSION['technician'] = $technician;
	
	$_SESSION['comments'] = $comments;
	$_SESSION['partsused'] = $partsused;
	$_SESSION['serialno'] = $serialno;
	
	
	
	
	
	header("Location: printamendment.php");
	
}



?>