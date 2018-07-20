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
	
	
<form action="kpiprint.php" method="POST">
	<tr>
	<td>
		<label>Date From</label><br/>
		
		<input type="date" id = "textboxsize" name="datefrom" required />	<br/><br/>	
		<label>Date to</label><br/>
		<input type="date" id = "textboxsize" name="dateto" required /><br/><br/><br/>
		<input type="submit" id="buttonlayout" value="Export"/><br/><br/>
		<a href="cleanslate.php"><input type="button" value="Exit" id='buttonlayout'></a>
	</td>
	</tr>
</form>
</table>

</div>
</body>
</html>