

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



<table id="content" WIDTH="95%">
<tr>
	<td>
		<u>ROUTE CARD</u><p/>
	</td>
	<td>
		<u>STATISTICS</u><p/>
	</td>
	<td>
		<u>ADD / AMEND</u><p/>
	</td>
</tr>
<tr>
	<td id="divide">
		<form action="routecard.php" >
			<input type="submit" value="Create A New Routecard" id="buttonlayout"/>
		</form>
	</td>
	<td id="divide">
		<form action="statsmenu.php" >
		
			<input type="submit" value="KPI Data" id="buttonlayout"/>
		</form>	
	</td>

	<td>
		<form action="amendclient.php" >
			<input type="submit" value="Client ID" id="buttonlayout"/>
		</form>	
	
	</td>
</tr>
<tr>
	<td id="divide">
		<form action="findroutecard.php">
			<input type="submit" value="View All Route Cards" id="buttonlayout"/>
		</form>	
	</td>
	<td id="divide">
		<form action="jobmonitor.php">
			<input type="submit" value="Activity Monitor" id="buttonlayout"/>
		</form>	
	</td>
	<td>
		<form action="Amendjob.php" >
			<input type="submit" value="Job Type" id="buttonlayout"/>
		</form> 
	</td>
</tr>
<tr>
	<td id="divide">
	</td>
	<td id="divide">
	</td>
	<td>
		<form action="amendtechnician.php" >
			<input type="submit" value="Technicians" id="buttonlayout"/>
		</form>
	</td>
</tr>

</table>

</div>
</body>
</html>
