<?php
session_start();




#echo $_SESSION['thisdate'];

#echo $_SESSION['thisclient'];
#echo $_SESSION['clientcontact'];
#echo $_SESSION['jobtype'];

#echo $_SESSION['orderno'];

#echo $_SESSION['model'];
#echo $_SESSION['machinesize'];

#echo $_SESSION['meterin'];
#echo $_SESSION['meterout'];
#echo $_SESSION['manhours'];

#echo $_SESSION['sanitised'];
#echo $_SESSION['packaging'];
#echo $_SESSION['technician'];

#echo $_SESSION['rcid'];
#echo $_SESSION['comment'];

#echo $_SESSION['partsused'];
#echo $_SESSION['serialno'];






?>

<!--TRANSFORM THIS PAGE WITH COLLECTED DATA READY FOR A PRINTOUT!!!!!!-->

<!doctype html>
<head>
<title>Ceva Routecards - Create New</title>
<link rel = "stylesheet" href="style.css"/>
</head>
<body bgcolor="#990000" onload="window.print()">

<form action = "insertdata.php" method = "POST">

	<div id="cardwrap">
		<table id = "cardid" width="97%">
			<tr>
				<td id ="leftalign" width="32%"><label id="labelfont">Route Card No.&nbsp</label>
				
				
				<!--
				<input type="text" id="textboxsize" name="txtrcid" value = "Auto"/>
				-->
				<?php
				
				echo "<input type='text' id='textboxsize' name='txtrcid' value='".$_SESSION['rcid']."' readonly />";
								
				?>
				
				
				</td>
				<td id= "labelfont2" width="auto"><label id="labelfont">Date.&nbsp</label>
				
				
				<?php
				
				echo "<input type='text' id='textboxsize' name='chosendate' value='".date('d-m-Y', strtotime($_SESSION['thisdate']))."' readonly /> ";
				
				?>
				
				</td>				
				<td id= "labelfont2" width="18%"><a href="cleanslate.php">
				
				<input type="button" id="buttonlayout2" value="Exit"></a>
				</td>
			</tr>
		</table><br/>
			<div id="cardcontent">
				<table width="100%" id="cardcontenttab">
				<tr>
				
				<td id="labelfont"><label> &nbsp Client ID.&nbsp</label>
				
				<?php
				
					echo "<input type='text' id='textboxsize' value='".$_SESSION['thisclient']."' readonly />";
					
				?>
				
				
				</td>

					
					<td><label>Client Contact Name.&nbsp</label>
					
					<!-- this list needs to be updated based on the required table contents and autofilled <input type="text" id="textboxsize" name="clientname"/> -->
					
					<?php

					echo "<input type='text' id='textboxsize' value='".$_SESSION['clientcontact']."' readonly />";
					
					
					?>			
					</td>
					<td width="30%"><label>Job Type.&nbsp</label>
					
					
					
					<?php

					echo "<input type='text' id='textboxsize2' value='".$_SESSION['jobtype']."' readonly />";
					
					
					?>
					
					
					</td>
					</tr>

					<tr>
					<td id="labelfont2"><label>Order Number.&nbsp  </label> 
					
					<?php
					$order = $_SESSION['orderno'];
					
					echo "<input type='text' id='textboxsize' value='$order' readonly /> ";
					
					
					?>
					
					</td>
					<td><label> &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp Model.&nbsp </label>
					
					
					<!--
					<input type="text" id="textboxsize" name="model"/>
					-->
					
					<?php
					
					echo "<input type='text' id='textboxsize' value='".$_SESSION['model']."' readonly />";
					
					?>
					
					
					</td>
					
					<!-- this list needs to be updated based on the required table contents and autofilled-->
					
					<td width="40%"><label>&nbsp &nbsp &nbsp &nbsp Size.&nbsp</label>
					<!--
					<select id="textboxsize2" name="machinesize">
						<option value="small" height="25px">Small</option>
						<option value="medium">Medium</option>
						<option value="large">Large</option>					
					</select>
					-->
					<?php
					
					echo "<input type='text' id='textboxsize2' value='".$_SESSION['machinesize']."' readonly />";
					
					
					?>
					
					
					
					</td>
					</tr>
					
					
					
					
					
					
					
					</tr>
					
					<tr>
					<td id="labelfont"><label>&nbsp Meter In.&nbsp  </label>
					
					<!--
					<input type="text" id="textboxsize" name="meterin"/>
					-->
					
					<?php
					
					echo "<input type='text' id='textboxsize' value='".$_SESSION['meterin']."' readonly />";
					
					?>
					
					</td>
					<td><label> &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp Meter Out.&nbsp </label>
					<!--
					<input type="text" id="textboxsize" name="meterout"/>
					-->
					
					<?php
						
						echo "<input type='text' id='textboxsize' value='".$_SESSION['meterout']."' readonly />";
						
					?>
					
					</td>
					
					<!-- this list needs to be updated based on the required table contents and autofilled-->
					
					<td id="labelfont"><label>  Man Hours.&nbsp  </label> 
					
					
					<!--
					<input type="text" id="textboxsize4" name="manhours"/>
					-->
					
					<?php
					
					echo "<input type='text' id='textboxsize2' value='".$_SESSION['manhours']."' readonly />";
					
					?>
					</td>

					</tr>
					
					<tr>
					
					<td><label>&nbsp &nbsp &nbsp &nbsp Sanitised.&nbsp</label>
					<!--
					<select id="textboxsize3" name='sanitised'>
						<option value="Yes" height="25px">Yes</option>
						<option value="No">No</option>
				
					</select>
					-->
					<?php
					
					echo "<input type='text' id='textboxsize' value='".$_SESSION['sanitised']."' readonly />";
					
					?>
					
					</td>
					<td><label>Packaging.&nbsp</label>
					<!--
					<select id="textboxsize3" name="packaging">
						<option value="Yes" height="25px">Yes</option>
						<option value="No">No</option>
				
					</select>
					-->
					
					
					<?php
					
					echo "<input type='text' id='textboxsize' value='".$_SESSION['packaging']."' readonly />";
					
					?>
					
					</td>
					
					<td width="25%"><label>Operative.&nbsp</label>
					
					
					
					<?php
					
					
					/**
					$conn = mysqli_connect("localhost","root","", "dbroutecard");			
					$sqltechs = mysqli_query($conn, "select * from tbltechnicians order by technicians_desc asc");
					
					echo "<select id='textboxsize2' name='engineer'>";
					
					while ($row = mysqli_fetch_assoc($sqltechs)){
						
						echo "<option value='".$row['technicians_desc']."'>".$row['technicians_desc']."</option>";
						
					}
					
					echo "</select>";
					**/
					
					
					
					
					echo "<input type='text' id='textboxsize2' value='".$_SESSION['technician']."' readonly />";
					
					
					
					?>
					
					
					</td>
					</tr>
					
					
					
					
					<!--<td><label>Job Type.&nbsp</label><input type="text" id="textboxsize" name="clientid"/></td>-->
				</table>
								<table width = "100%" id = "rcdesc">
					<tr>
						<td><label id="labelfontdesc" >Comments</label>
						
						
						<!--<textarea id= "textarea1" name="comment"></textarea> -->
					<?php
					

					
					echo "<textarea id='textarea1' readonly >".strip_tags(nl2br($_SESSION['comment']))."</textarea>";
					
					?>
						
						
						</td>
						
						
						
						
						
						
						<td><label id="labelfontdesc">Parts Used</label>
						
						<!--<textarea id = "textarea1" name="partsused"></textarea>-->
					<?php
					

					
					echo "<textarea id='textarea1' readonly >".strip_tags(nl2br($_SESSION['partsused']))."</textarea>";
					
					?>
						</td>
					</tr>
				</table>
			
			</div>
			<br/>
			<div id="serialaligner">
			<label id="labelfontdesc">Serial No. or Part No.</label><br/>
				<?php
					
					
					echo "<input type='text' id='textarea2' value='".trim($_SESSION['serialno'])."' readonly />";
					
					
					
				?>
			
			
			</div>
			
		</div>
	</form>
</body>
</html>

