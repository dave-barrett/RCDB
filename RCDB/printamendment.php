<?php
session_start();



#edit the data for the input fields!!!!!

	$id = $_SESSION['recid'];
	$thedate = date('d-m-Y', strtotime($_SESSION['thedate']));
	
	$clientid = $_SESSION['clientid'];
	$ccname = $_SESSION['clientname'];
	$jobtype = $_SESSION['jobtype'];
	
	$orderno = $_SESSION['orderno'];
	$model = $_SESSION['model'];
	$machinesize = $_SESSION['machinesize'];
	
	$meterin = $_SESSION['meterin'];
	$meterout = $_SESSION['meterout'];
	$manhours = $_SESSION['manhours'];
	
	$sanitised = $_SESSION['sanitised'];
	$packaging = $_SESSION['packaging'];
	$technician = $_SESSION['technician'];
	
	$comments = $_SESSION['comments'];
	$partsused = $_SESSION['partsused'];
	$serialno = $_SESSION['serialno'];

?>

<!--TRANSFORM THIS PAGE WITH COLLECTED DATA READY FOR A PRINTOUT!!!!!!-->

<!doctype html>
<head>
<title>Ceva Routecards</title>
<link rel = "stylesheet" href="style.css"/>
</head>
<body bgcolor="#990000"  onload="window.print()">

<form action = "insertdata.php" method = "POST">

	<div id="cardwrap">
		<table id = "cardid" width="97%">
			<tr>
				<td id ="leftalign" width="32%"><label id="labelfont">Route Card No.&nbsp</label>
				
				
				<!--
				<input type="text" id="textboxsize" name="txtrcid" value = "Auto"/>
				-->
				<?php
				
				echo "<input type='text' id='textboxsize' name='txtrcid' value='".$id."' readonly />";
								
				?>
				
				
				</td>
				<td id= "labelfont2" width="auto"><label id="labelfont">Date.&nbsp</label>
				
				
				<?php
				
				echo "<input type='text' id='textboxsize' name='chosendate' value='".date('d-m-Y', strtotime($thedate))."' readonly /> ";
				
				?>
				
				</td>				
				<td id= "labelfont2" width="25%"><a href="cleanslate.php">
				
				<input type="button" id="buttonlayout2" value="Exit"></a>
				<a href="findroutecard.php"><input type="button" value="Back" id='buttonlayout2'></a>
				</td>
			</tr>
		</table><br/>
			<div id="cardcontent">
				<table width="100%" id="cardcontenttab">
				<tr>
				
				<td id="labelfont"><label> &nbsp Client ID.&nbsp</label>
				
				<?php
				
					echo "<input type='text' id='textboxsize' value='".$clientid."' readonly />";
					
				?>
				
				
				</td>

					
					<td><label>Client Contact Name.&nbsp</label>
					
					<!-- this list needs to be updated based on the required table contents and autofilled <input type="text" id="textboxsize" name="clientname"/> -->
					
					<?php

					echo "<input type='text' id='textboxsize' value='".$ccname."' readonly />";
					
					
					?>			
					</td>
					<td width="30%"><label>Job Type.&nbsp</label>
					
					
					
					<?php

					echo "<input type='text' id='textboxsize2' value='".$jobtype."' readonly />";
					
					
					?>
					
					
					</td>
					</tr>

					<tr>
					<td id="labelfont2"><label>Order Number.&nbsp  </label> 
					
					<?php
					$order = $_SESSION['orderno'];
					
					echo "<input type='text' id='textboxsize' value='$orderno' readonly /> ";
					
					
					?>
					
					</td>
					<td><label> &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp Model.&nbsp </label>
					
					
					<!--
					<input type="text" id="textboxsize" name="model"/>
					-->
					
					<?php
					
					echo "<input type='text' id='textboxsize' value='".$model."' readonly />";
					
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
					
					echo "<input type='text' id='textboxsize2' value='".$machinesize."' readonly />";
					
					
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
					
					echo "<input type='text' id='textboxsize' value='".$meterin."' readonly />";
					
					?>
					
					</td>
					<td><label> &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp Meter Out.&nbsp </label>
					<!--
					<input type="text" id="textboxsize" name="meterout"/>
					-->
					
					<?php
						
						echo "<input type='text' id='textboxsize' value='".$meterout."' readonly />";
						
					?>
					
					</td>
					
					<!-- this list needs to be updated based on the required table contents and autofilled-->
					
					<td id="labelfont"><label>  Man Hours.&nbsp  </label> 
					
					
					<!--
					<input type="text" id="textboxsize4" name="manhours"/>
					-->
					
					<?php
					
					echo "<input type='text' id='textboxsize2' value='".$manhours."' readonly />";
					
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
					
					echo "<input type='text' id='textboxsize' value='".$sanitised."' readonly />";
					
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
					
					echo "<input type='text' id='textboxsize' value='".$packaging."' readonly />";
					
					?>
					
					</td>
					
					<td width="25%"><label>Operative.&nbsp</label>
					
					
					
					<?php
					
		
					
					
					echo "<input type='text' id='textboxsize2' value='".$technician."' readonly />";
					
					
					
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
					

					
					echo "<textarea id='textarea1' readonly >".strip_tags(nl2br($comments))."</textarea>";
					
					?>
						
						
						</td>
						
						
						
						
						
						
						<td><label id="labelfontdesc">Parts Used</label>
						
						<!--<textarea id = "textarea1" name="partsused"></textarea>-->
					<?php
					

					
					echo "<textarea id='textarea1' readonly >".strip_tags(nl2br($partsused))."</textarea>";
					
					?>
						</td>
					</tr>
				</table>
			
			</div>
			<br/>
			<div id="serialaligner">
			<label id="labelfontdesc">Serial No. or Part No.</label><br/>
				<?php
					
					
					echo "<input type='text' id='textarea2' value='".trim($serialno)."' readonly />";
					
					
					
				?>
			
			
			</div>
			
		</div>
	</form>
</body>
</html>

