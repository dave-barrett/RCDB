<?php

session_start();

$conn = mysqli_connect("localhost","root","","dbroutecard");


$thedate = date('Y-m-d',strtotime($_POST['chosendate']));

$clientid = $_POST['clientselected'];
$clientname = $_POST['clientname'];
$jobtype = $_POST['jobtype'];


$orderno = $_POST['orderno'];
$model = $_POST['model'];
$machinesize = $_POST['machinesize'];

$meterin = $_POST['meterin'];
$meterout = $_POST['meterout'];
$manhours = $_POST['manhours'];

$sanitised = $_POST['sanitised'];
$packaging = $_POST['packaging'];
$engineer = $_POST['engineer'];

$comment = $_POST['comment'];
$partsused = $_POST['partsused'];
$serialno = trim($_POST['serialno']);

$thetime= gmdate('H:i:s');


$sql = mysqli_query($conn,"insert into tblrecords values(null,'$thedate','$clientid','$clientname','$jobtype','$orderno','$model','$machinesize','$meterin','$meterout','$manhours','$sanitised','$packaging','$engineer','$comment','$partsused','$serialno' , '$thetime')");




$sqlidfind = mysqli_query($conn, "select * from tblrecords where record_date='$thedate' and record_serial_number='$serialno' limit 1");
$idrow = mysqli_fetch_assoc($sqlidfind);

$rcid = $idrow['record_id'];

$thisdate = $idrow['record_date'];

$thisclient = $idrow['record_client'];
$clientcontact = $idrow['record_client_contact_name'];
$jobtype = $idrow['record_jobtype'];

$orderno = $idrow['record_order_number'];
$model = $idrow['record_model'];
$machinesize = $idrow['record_size'];

$meterin = $idrow['record_meter_in'];
$meterout = $idrow['record_meter_out'];
$manhours = $idrow['record_man_hours'];

$sanitised = $idrow['record_sanitised'];
$packaging = $idrow['record_packaging'];
$technician = $idrow['record_technician'];

$comment = $idrow['record_comments'];
$partsused = $idrow['record_parts_used'];
$serialno = $idrow['record_serial_number'];




$_SESSION['rcid'] = $rcid;
$_SESSION['thisdate'] = $thisdate;

$_SESSION['thisclient'] = $thisclient;
$_SESSION['clientcontact'] = $clientcontact;
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

$_SESSION['comment'] = $comment;

$_SESSION['partsused'] = $partsused;
$_SESSION['serialno'] = $serialno;




header("Location:printcard.php");







?>