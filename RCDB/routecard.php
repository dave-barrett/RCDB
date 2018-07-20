<?php session_start(); 

if(!isset($_SESSION['refresh'])){
	
	$_SESSION['refresh'] = "Done";
	header("Location: routecard.php");
	
}else(
	session_destroy()
)

?>

<!doctype html>


<head>
<title>Ceva Routecards - Create New</title>
<link rel = "stylesheet" href="style.css"/>
</head>
<body bgcolor="#990000">

<form action = "insertdata.php" method = "POST">

	<div id="cardwrap">
		<table id = "cardid" width="97%">
			<tr>
				<td id ="leftalign" width="32%"><label id="labelfont">Route Card No.&nbsp</label>
				
				
				
				<input type="text" id="textboxsize" name="txtrcid" value = "Auto" readonly /></td>
				
				
				
				
				</td>
				<td id= "labelfont2" width="auto"><label id="labelfont">Date.&nbsp</label>
				
				
				
				
				<?php
				$thedate = date("d-m-Y");
				echo "<input type='text' id='textboxsize' name='chosendate' value='".$thedate."' required /> ";
				
				?>
				
								
				<td id= "labelfont2" width="25%">
				
				<Input type="submit" value="Save Record" id='buttonlayout2'/>

				<a href="cleanslate.php"><input type="button" value="Exit" id='buttonlayout2'></a>
				
				</td>
			</tr>
		</table><br/>
			<div id="cardcontent">
				<table width="100%" id="cardcontenttab">
				<tr>
				
				<td id="labelfont"><label> &nbsp Client ID.&nbsp</label>
				
				<?php
				
					$conn = mysqli_connect("localhost","root","", "dbroutecard");			
					$sqlclients = mysqli_query($conn, "select * from tblclients");
					
					echo "<select id='textboxsizeclient' name='clientselected'>";
					
					while ($row = mysqli_fetch_assoc($sqlclients)){
						
						echo "<option value='".$row['client_desc']."'>".$row['client_desc']."</option>";
						
					}
					
					echo "</select>";
					
					
				?>
				
				
				</td>
		
					
					
					
					
					
					
					<td><label>Client Contact Name.&nbsp</label><input type="text" id="textboxsize" name="clientname" required /></td>
					
					<!-- this list needs to be updated based on the required table contents and autofilled-->
					
					<td width="30%"><label>Job Type.&nbsp</label>
					
					
					
					<?php
					$conn = mysqli_connect("localhost","root","", "dbroutecard");			
					$sqljobs = mysqli_query($conn, "select * from tbljobtype ORDER BY jobtype_name");
					
					echo "<select id='textboxsize2' name='jobtype'>";
					
					while ($row = mysqli_fetch_assoc($sqljobs)){
						
						echo "<option value='".$row['jobtype_name']."'>".$row['jobtype_name']."</option>";
						
					}
					
					echo "</select>";
					
					
					?>
					
					
					</td>
					</tr>

					<tr>
					<td id="labelfont2"><label>Order Number.&nbsp  </label> <input type="text" id="textboxsize" name="orderno"/></td>
					<td><label> &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp Model.&nbsp </label><input type="text" id="textboxsize" name="model" required /></td>
					
					<!-- this list needs to be updated based on the required table contents and autofilled-->
					
					<td width="40%"><label>&nbsp &nbsp &nbsp &nbsp Size.&nbsp</label>
					
					<select id="textboxsize2" name="machinesize">
						<option value="small" height="25px">Small</option>
						<option value="medium">Medium</option>
						<option value="large">Large</option>					
					</select>
					
					</td>
					</tr>
					
					
					
					
					
					
					
					</tr>
					
					<tr>
					<td id="labelfont"><label>&nbsp Meter In.&nbsp  </label> <input type="text" id="textboxsize" name="meterin" required /></td>
					<td><label> &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp Meter Out.&nbsp </label><input type="text" id="textboxsize" name="meterout" required /></td>
					
					<!-- this list needs to be updated based on the required table contents and autofilled-->
					
					<td id="labelfont"><label>  Man Hours.&nbsp  </label> <input type="text" id="textboxsize4" name="manhours" required /></td>

					</tr>
					
					<tr>
					
					<td><label>&nbsp &nbsp &nbsp &nbsp Sanitised.&nbsp</label>
					
					<select id="textboxsize3" name='sanitised'>
						<option value="Yes" height="25px">Yes</option>
						<option value="No">No</option>
				
					</select>
					
					</td>
					<td><label>Packaging.&nbsp</label>
					
					<select id="textboxsize3" name="packaging">
						<option value="Yes" height="25px">Yes</option>
						<option value="No">No</option>
				
					</select>
					
					</td>
					
					<td width="25%"><label>Operative.&nbsp</label>
					
					
					
					<?php
					$conn = mysqli_connect("localhost","root","", "dbroutecard");			
					$sqltechs = mysqli_query($conn, "select * from tbltechnicians order by technicians_desc asc");
					
					echo "<select id='textboxsize2' name='engineer'>";
					
					while ($row = mysqli_fetch_assoc($sqltechs)){
						
						echo "<option value='".$row['technicians_desc']."'>".$row['technicians_desc']."</option>";
						
					}
					
					echo "</select>";
					
					
					?>
					
					

					
					
					
					
					</td>
					</tr>
					
					
					
					
					
				</table>
								<table width = "100%" id = "rcdesc">
					<tr>
						<td><label id="labelfontdesc" >Comments</label><textarea id= "textarea1" name="comment" required ></textarea></td>
						<td><label id="labelfontdesc">Parts Used</label><textarea id = "textarea1" name="partsused" required ></textarea></td>
					</tr>
				</table>
			
			</div>
			<br/>
			<div id="serialaligner">
			<label id="labelfontdesc">Serial No. or Part No.</label>
			<textarea id = "textarea2" name="serialno" align="left">
			</textarea>
			</div>
			
		</div>
	</form>
</body>
</html>