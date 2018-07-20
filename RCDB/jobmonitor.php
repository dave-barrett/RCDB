<?php

session_start();

?>

<!doctype html>

<head>
<title>Ceva Routecards - Export</title>
<link rel = "stylesheet" href="style.css"/>
</head>
<body bgcolor="#990000">
<div id="wrap">

<table id="title"width="95%">
</tr><td bgcolor="white"><font size="7"> <img src="img/cevalogoindex.jpg" height="75px" width="140px"/>&nbsp<b><div id="titletext">WORKSHOP INTERACTIVE SYSTEM</div></b></font></td></tr>
</table>



<table id="content" WIDTH="95%">
	<tr>
		<td>
			<h4>Please Select a start and end date for the data you wish to export.</h4>
		</td>
	</tr>
	
	
<form action="jobmonitoroutput.php" method="POST">
	<tr>
	<td>
		<label>Please Select Your Name</label><br/><br/>
		
		<?php
			$conn = mysqli_connect("localhost","root","","dbroutecard");
			$gettechnicians = mysqli_query($conn, "select * from tbltechnicians order by technicians_desc");
			echo "<select name='technician' id='textboxsize2'>";
			
			
				while ($row = mysqli_fetch_assoc($gettechnicians)){
						
					echo "<option value='".$row['technicians_desc']."'>".$row['technicians_desc']."</option>";
						
				}
					
			echo"</select>";
		?>
		<br/><br/>
			
			<input type = "submit" id = "buttonlayout"value="SUBMIT"/>
			
		<br/><br/>
		
		<a href="cleanslate.php"><input type="button" value="Exit" id='buttonlayout'></a>
		
	</td>
	</tr>
</form>
</table>

</div>
</body>
</html>