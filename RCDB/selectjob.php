<!--

Amend this for the options for the kpi prints being:

-daily/weekley
-morning/afternoon


---->

<!doctype html>
<head>
<title>W.I.S - KPI Data</title>
<link rel = "stylesheet" href="style.css"/>
</head>
<body bgcolor="#990000">
<div id="wrap">

<table id="title"width="95%">
</tr><td bgcolor="white"><font size="7"> <img src="img/cevalogoindex.jpg" height="75px" width="140px"/>&nbsp<b><div id="titletext">WORKSHOP INTERACTIVE SYSTEM</div></b></font></td></tr>
</table>



<table id="content" WIDTH="95%">
	
	<tr>
		<td width="50%">
			<form action="tester.php" method="post">
				<label id ='labeltext'>Please Select A Job Type</label>
				<select id="textboxsize2" name="selectedjob">
				
						<?php
									
							$conn = mysqli_connect("localhost","root","","dbroutecard");
							$getdata = mysqli_query($conn, "select * from tbljobtype order by jobtype_name");
							while($row = mysqli_fetch_assoc($getdata)){
								
								echo "<option value='".$row['jobtype_name']."'>".$row['jobtype_name']."</option>";
								
							}
									
		
						?>

				</select><br/><br/>
				<input type="submit" id="buttonlayout2" value="Submit" />
			</form><br/>
		
		</td>
	</tr>
	
</table>

</div>
</body>
</html>