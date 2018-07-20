<!doctype html>
<head>
<title>W.I.S - Add a Technician</title>
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
			<form action="inserttechnician.php" method="post">
				<h3>Add A new Technician</h3>
				<label>Please Enter The Full Technicians Name (Please check the current list to ensure no duplicates are added!)</label><br/><br/>
				<input type="text" id="textboxsize2" name="newtechnician"/><br/><br/>
				<input type="submit" id="buttonlayout" value="Insert New Technician"><br/><br/>
				
			</form>
			<hr/>
			<form action="index.php">
				<input type = "submit" id = "buttonlayout"value="EXIT"/>
			</form>
			<hr/>
				<h3><u>Current Technicians:</h3>
				
				<?php
				
				$conn = mysqli_connect("localhost","root","","dbroutecard");
				$sqlclients = mysqli_query($conn, "select * from tbltechnicians");
				
				while ($row = mysqli_fetch_assoc($sqlclients)){
					
					echo $row['technicians_desc']."<br/>";
					
				}
				
				?>
			
			
		</td>
	</tr>
	
</table>

</div>
</body>
</html>
