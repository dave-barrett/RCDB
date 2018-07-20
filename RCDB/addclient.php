<!doctype html>
<head>
<title>W.I.S - Add a Client</title>
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
			<form action="insertclient.php" method="post">
				<h3>Add A new Client</h3>
				<label>Please Enter The Full Client (Please check the current list to ensure no duplicates are added!)</label><br/><br/>
				<input type="text" id="textboxsize2" name="newclient"/><br/><br/>
				<input type="submit" id="buttonlayout" value="Insert New Client"><br/><br/>
				
			</form>
			<hr/>
			<form action="index.php">
				<input type = "submit" id = "buttonlayout"value="EXIT"/>
			</form>
			<hr/>
				<h3><u>Current Clients:</h3>
				
				<?php
				
				$conn = mysqli_connect("localhost","root","","dbroutecard");
				$sqlclients = mysqli_query($conn, "select * from tblclients");
				
				while ($row = mysqli_fetch_assoc($sqlclients)){
					
					echo $row['client_desc']."<br/>";
					
				}
				
				?>
			
			
		</td>
	</tr>
	
</table>

</div>
</body>
</html>
