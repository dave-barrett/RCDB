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
	<tr><td>KPI Data</td></tr>
	<tr>
		<td width="50%">
			<form action="kpirequest.php" method="post">
				<input type="submit" id="buttonlayout"value="Date Defined"/>
			</form><br/>
			
			<form action="morningafternoon.php" method="post">
				<input type="submit" id="buttonlayout"value="Morning/Afternoon"/>
				
			</form><br/>
			<form action="cleanslate.php" method="post">
				<input type="submit" id="buttonlayout"value="Exit"/>
				
			</form><br/>			
		</td>
	</tr>
	
</table>

</div>
</body>
</html>