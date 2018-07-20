<?php
session_start();

$datefrom = $_POST['datefrom'];
$dateto = $_POST['dateto'];
$datefrom2 = date('Y-m-d', strtotime($_POST['datefrom']));
$dateto2 = date('Y-m-d', strtotime($_POST['dateto']));

$filename = "KPIDATAFOR".date('d-m-Y', strtotime($datefrom))."TO".date('d-m-Y',strtotime($dateto));

		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=".$filename.".xls");


?>

<!doctype html>

<head>
<title>Ceva Routecards - Export</title>
<link rel = "stylesheet" href="style.css"/>
</head>
<body>

		<a href="cleanslate.php"><input type="button" value="Exit" id='buttonlayout'></a><br/><br/>

	<body>
<table border="solid">
<?php
$conn = mysqli_connect("localhost","root","","dbroutecard");
$builder = mysqli_query($conn, "select distinct record_date from tblrecords where record_date between '$datefrom2' and '$dateto2' ORDER BY record_date");
echo "<tr><td></td>";
while($fields = mysqli_fetch_assoc($builder)){
		
	echo "<th>".date('d-m-Y',strtotime($fields['record_date']))."</th>";
}
echo "</tr>";

$findhowmanyjobs = mysqli_query($conn,"select * from tbljobtype");

while($currentjob = mysqli_fetch_assoc($findhowmanyjobs)){
	echo"<tr><th>".$currentjob['jobtype_name']."</th>";
	
	$paramjob = $currentjob['jobtype_name'];
	
	$findhowmanydates = mysqli_query($conn, "select distinct record_date from tblrecords where record_date between '$datefrom2' and '$dateto2' order by record_date");
	
	while($currentdate = mysqli_fetch_assoc($findhowmanydates)){
		$paramdate = $currentdate['record_date'];
		
		$calculatedayjob = mysqli_query($conn, "select * from tblrecords where record_date='$paramdate' and record_jobtype='$paramjob'");
		
		$amount=mysqli_num_rows($calculatedayjob);
		
		echo "<td>".$amount."</td>";
		
	}
echo"</tr>";
}




?>


</table>	
		
		
		
		
<p/>		
		
		
		
		

		
		
		
		
		
		
		
		
		




		
<table border="1">
<?php
$conn = mysqli_connect("localhost","root","","dbroutecard");
$builder = mysqli_query($conn, "select * from tblrecords");

echo "<tr>";

while($fields = mysqli_fetch_field($builder)){
	
	echo "<th>";
	printf($fields->name);
	echo "</th>";
}

echo "</tr>";



	

	$sqlkpi = mysqli_query($conn, "select * from tblrecords where record_date between'$datefrom' and '$dateto' order by record_date");
	
	while($row = mysqli_fetch_assoc($sqlkpi)){
		echo "<tr><td>".$row['record_id']."</td><td>".date('d-m-Y', strtotime($row['record_date']))."</td><td>".$row['record_client']."</td><td>".$row['record_client_contact_name']."</td><td>".$row['record_jobtype']."</td><td>".$row['record_order_number']."</td><td>".$row['record_model']."</td><td>".$row['record_size']."</td><td>".$row['record_meter_in']."</td><td>".$row['record_meter_out']."</td><td>".$row['record_man_hours']."</td><td>".$row['record_sanitised']."</td><td>".$row['record_packaging']."</td><td>".$row['record_technician']."</td><td>".nl2br($row['record_comments'])."</td><td>".nl2br($row['record_parts_used'])."</td><td>".$row['record_serial_number']."</td></tr>";

	}


	
	
	?>

	
</table>




</body>
</html>