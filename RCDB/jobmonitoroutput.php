<?php
require("connect.php");
?>

<!doctype html>

<head>
<title>W.I.S - Activity Monitor</title>
<link rel = "stylesheet" href="style.css"/>
</head>
<body bgcolor="#990000">
<div id="wrap">

<table id="title"width="95%">
</tr><td bgcolor="white"><font size="7"> <img src="img/cevalogoindex.jpg" height="75px" width="140px"/>&nbsp<b><div id="titletext">WORKSHOP INTERACTIVE SYSTEM</div></b></font></td></tr>
</table>

<br/><br/><br/>
			<a href="cleanslate.php"><input type="button" value="Exit" id='buttonlayout'></a>
<br/><br/><br/>
<?php

$paramdate = date("Y-m-d");
$paramengineer = $_POST['technician'];



$getdata = mysqli_query($conn, "select * from tblrecords where record_date = '$paramdate' and record_technician = '$paramengineer' ");

echo "<table border='1' id='centertable'>";
$counter = 0;

	while($row = mysqli_fetch_assoc($getdata)){
	
		$counter = $counter + $row['record_man_hours'];
		
	}
	$amount = mysqli_num_rows($getdata);
	
	echo"</tr><td colspan='4'>Total Man Hours: ".$counter."<br/>Amount of jobs: ".$amount."</td></tr>"; 



#table of stats

$getdata2 = mysqli_query($conn, "select * from tblrecords where record_date = '$paramdate' and record_technician = '$paramengineer' ");


	while($row2 = mysqli_fetch_assoc($getdata2)){
		
		echo"<tr><td>".$row2['record_man_hours']."</td><td>".$row2['record_serial_number']."</td><td>".$row2['record_jobtype']."</td></tr>";
	}

echo "</table>";

?>



</div>
</body>
</html>