<!doctype html>
<head>
<title>W.I.S - Amend Job Type</title>
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
			<form action="insertjob.php" method="post">
				<h3>Add A new Job Type</h3>
				<label>Please Enter The Full Job Type (Please check the current list to ensure no duplicates are added!)</label><br/><br/>
				<input type="text" id="textboxsize2" name="newjob"/><br/><br/>
				<input type="submit" id="buttonlayout" value="Insert New Job"><br/><br/>
				
			</form>
			<hr/>
			<form action="index.php">
				<input type = "submit" id = "buttonlayout"value="EXIT"/>
			</form>
			<hr/>
				<h3><u>Current Job Types:</h3>
				
				<?php
				
				$conn = mysqli_connect("localhost","root","","dbroutecard");
				$sqljobs = mysqli_query($conn, "select * from tbljobtype");
				
				while ($row = mysqli_fetch_assoc($sqljobs)){
					
					echo $row['jobtype_name']."<br/>";
					
				}
				
				?>
			
			
		</td>
	</tr>
	
</table>

</div>
</body>
</html>
