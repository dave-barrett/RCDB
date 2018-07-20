<!doctype html>
<head>
<title>Ceva Routecards - Delete A Client</title>
<link rel = "stylesheet" href="style.css"/>
</head>
<body bgcolor="#990000">
<div id="wrap">

<table id="title"width="95%">
</tr><td bgcolor="white"><font size="7"> <img src="img/cevalogoindex.jpg" height="75px" width="140px"/>&nbsp<b><div id="titletext">WORKSHOP INTERACTIVE SYSTEM</div></b></font></td></tr>
</table>



<table id="content" WIDTH="95%">

	<tr width="100%">
		<td>
			<form action="deleteclientparse.php" method="post">
				<h3>Delete A Client</h3>
				<Label>Please choose an id number from the list below</label><br/><br/>
				<input type="text" name="selectedidno" id="textboxsize2"/><br/><br/>
				<input type="submit"  id="buttonlayout" value="Delete Client"/><br/><br/>
			</form>
			<hr/>
			<form action="index.php">
				<input type = "submit" id = "buttonlayout"value="EXIT"/>
			</form>
			<hr/>
		</td>
		
	</tr>
	<tr>
		<td>
		<?php
		echo "";
				$conn = mysqli_connect("localhost","root","","dbroutecard");
				$sqlclients = mysqli_query($conn, "select * from tblclients");
				
				while ($row = mysqli_fetch_assoc($sqlclients)){
					
					echo $row['client_desc']." ID NO: ".$row['client_id']."<br/>";
					
				}
			
		?>
		</td>
		
	</tr>

</table>

</div>
</body>
</html>
