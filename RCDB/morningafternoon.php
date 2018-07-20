<!doctype html>
<head>
<title>Ceva Routecards - Home</title>
<link rel = "stylesheet" href="style.css"/>
</head>
<body bgcolor="#990000">
<div id="wrap">

<table id="title"width="95%">
</tr><td bgcolor="white"><font size="7"> <img src="img/cevalogoindex.jpg" height="75px" width="140px"/>&nbsp<b><div id="titletext">WORKSHOP INTERACTIVE SYSTEM</div></b></font></td></tr>
</table>



<table WIDTH="95%" id='content' border='1'>
<tr><td colspan = '2'>Completed Jobs Done Before 13:00</td></tr>

<?php

$today = date('Y-m-d');
$conn = mysqli_connect("localhost","root","","dbroutecard");
$thejobs = mysqli_query($conn, "select * from tbljobtype order by jobtype_name");

while($jobs = mysqli_fetch_assoc($thejobs)){
	$thejob = $jobs['jobtype_name'];
	$jobquery = mysqli_query($conn, "select * from tblrecords where record_jobtype='$thejob' and record_date='$today' and record_time between '00:00:00' and '12:59:59' ");
	$result = mysqli_num_rows($jobquery);
	if($result < 1){
		
	}else{
	
	echo "<tr><td width='50%'>$thejob</td><td width='50%'>$result</td></tr>";
	
	}
}



?>


</table>



<table WIDTH="95%" id='content' border='1'>
<tr><td colspan = '2'>Completed Jobs Done After 13:00</td></tr>

<?php

$today = date('Y-m-d');
$conn = mysqli_connect("localhost","root","","dbroutecard");
$thejobs = mysqli_query($conn, "select * from tbljobtype order by jobtype_name");

while($jobs = mysqli_fetch_assoc($thejobs)){
	$thejob = $jobs['jobtype_name'];
	$jobquery = mysqli_query($conn, "select * from tblrecords where record_jobtype='$thejob' and record_date='$today' and record_time between '13:00:00' and '23:59:59' ");
	$result = mysqli_num_rows($jobquery);
	if($result < 1){
		
	}else{
	
	echo "<tr><td width='50%'>$thejob</td><td width='50%'>$result</td></tr>";
	
	}
}



?>


</table>

</div>
</body>
</html>
