<?php
require("connect.php");
session_start();


#if anything has been assigned to session command
if(isset($_SESSION['command'])){
	
	if($_SESSION['command'] == "first"){
		$counter = 1;
		$getdata = mysqli_query($conn, "select * from tblrecords where record_id = '$counter' limit 1");
		while(mysqli_num_rows($getdata)<1){
			$counter++;
			$getdata = mysqli_query($conn, "select * from tblrecords where record_id = '$counter' limit 1");
		
		
		}
	
	
	$row = mysqli_fetch_assoc($getdata);

	
	}
	
	
	
	
	#if the session command stores a value of decrease, carry this out
	if($_SESSION['command'] == "decrease"){
		#get the new counter value
		$counter = $_SESSION['counter'];
		$counter--;
		
		#get the minimum id you do not wish to exceed
		$sqlfindminid = mysqli_query($conn, "select * from tblrecords order by record_id asc limit 1");
		$minrow = mysqli_fetch_assoc($sqlfindminid);
		$minparam = $minrow['record_id'];
		#if the counter goes lower than the last records id number
		if($counter < $minparam){
			
			#increment the counter variable
			$counter++;
			
			$getcurrentdata = mysqli_query($conn, "select * from tblrecords where record_id='$counter' limit 1");
			
			#ensure the counter doesnt go forwards into an empty result
			while(mysqli_num_rows($getcurrentdata)<1){
				$counter++;
				$getcurrentdata = mysqli_query($conn, "select * from tblrecords where record_id='$counter' limit 1");
			}
			#assign data collected from sql to a variable
			$row = mysqli_fetch_assoc($getcurrentdata);
			
			
			
		#if the counter doesnt go below the first id no.
		}else{
			#search for the new data to be used
			$getcurrentdata = mysqli_query($conn, "select * from tblrecords where record_id = '$counter'");
			#while no records are being found
			while(mysqli_num_rows($getcurrentdata)< 1){
				$counter--;
				
				$getcurrentdata = mysqli_query($conn, "select * from tblrecords where record_id = '$counter'");				
				
			}
			$row = mysqli_fetch_assoc($getcurrentdata);
			
		}
		
		
	}	
	
	
	

	
	#if the session command stores a value of increase, carry this out
	if($_SESSION['command'] == "increase"){
		#get the new counter value
		$counter = $_SESSION['counter'];
		$counter++;
		
		#get the maximum id you do not wish to exceed
		$sqlfindmaxid = mysqli_query($conn, "select * from tblrecords order by record_id desc limit 1");
		$maxrow = mysqli_fetch_assoc($sqlfindmaxid);
		$maxparam = $maxrow['record_id'];
		#if the counter goes high than the last records id number
		if($counter > $maxparam){
			
			#decrement the counter variable
			$counter--;
			
			$getcurrentdata = mysqli_query($conn, "select * from tblrecords where record_id='$counter' limit 1");
			
			#ensure the counter doesnt go backwards into an empty result
			while(mysqli_num_rows($getcurrentdata)<1){
				$counter--;
				$getcurrentdata = mysqli_query($conn, "select * from tblrecords where record_id='$counter' limit 1");
			}
			#assign data collected from sql to a variable
			$row = mysqli_fetch_assoc($getcurrentdata);
			
			
			
		#if the counter doesnt go over the last id no.
		}else{
			#search for the new data to be used
			$getcurrentdata = mysqli_query($conn, "select * from tblrecords where record_id = '$counter'");
			#while no records are being found
			while(mysqli_num_rows($getcurrentdata)< 1){
				$counter++;
				
				$getcurrentdata = mysqli_query($conn, "select * from tblrecords where record_id = '$counter'");				
				
			}
			$row = mysqli_fetch_assoc($getcurrentdata);
			
		}
		
		
	}

	if($_SESSION['command'] == "last"){
		
		$getcurrentdata = mysqli_query($conn, "select * from tblrecords order by record_id desc limit 1");
		$row = mysqli_fetch_assoc($getcurrentdata);
		
	}
	
	if($_SESSION['command'] == "search"){
		
		
		$searchsql = mysqli_query($conn, "select * from tblrecords where record_serial_number like '%".$_SESSION['searchparam']."%' limit 1");
		$row = mysqli_fetch_assoc($searchsql);
	}
		

}

if(!isset($_SESSION['command'])){
	
	$counter = 1;
	$getdata = mysqli_query($conn, "select * from tblrecords where record_id = '$counter' limit 1");
	while(mysqli_num_rows($getdata)<1){
		$counter++;
		$getdata = mysqli_query($conn, "select * from tblrecords where record_id = '$counter' limit 1");
		
		
	}
	
	$_SESSION['counter'] = $counter;
	$row = mysqli_fetch_assoc($getdata);
	
}

$_SESSION['counter'] = $row['record_id'];


?>


<!doctype html>
<head>
<title>Ceva Routecards - Home</title>
<link rel = "stylesheet" href="style.css"/>
</head>
<body bgcolor="#990000">

<form action = "routecardsearcher.php" method = "GET">

	<div id="cardwrap">
		<table id = "cardid" width="97%">
			<tr id="searchline">
				<td width = "40%">
				<input type="submit" id="buttonlayout4" name="first" value="First"/>
				<input type="submit" id="buttonlayout4" name="decrease" value="Prev"/>
				<input type="submit" id="buttonlayout4" name="increase" value="Next"/>
				<input type="submit" id="buttonlayout4" name="last" value="Last"/>
				<p/>
				</td>
				<td width = "30%">
				
				<input type="text" id="textboxsize3"name="searchparam"/>
				<input type="submit" id="buttonlayout2" name="serialsearch" value="Search"/><p/>
				
				</td>
				<td width = "30%"></td>
				
				
			</tr>
			
			<tr>
			
				<td id ="leftalign" width="32%"><label id="labelfont">Route Card No.&nbsp</label>
				

				
				<?php
				echo "<input type='text' id='textboxsize' name='txtrcid' value='".$row['record_id']."'/>";
				?>
				
				
				</td>

				
				
				</td>
				<td id= "labelfont2" width="auto"><label id="labelfont">Date.&nbsp</label>
				
				
				
				
				<?php
				
				echo "<input type='text' id='textboxsize' name='chosendate' value='".date('d-m-Y', strtotime($row['record_date']))."'/> ";
				
				?>
				
								
				<td id= "labelfont2" width="25%">
				
				<Input type="submit" name ="editrecord" value="Edit + Print" id='buttonlayout2'/>
				
				<a href="cleanslate.php"><input type="button" value="Exit" id='buttonlayout2'></a>
				
				</td>
			</tr>
		</table><br/>
			<div id="cardcontent">
				<table width="100%" id="cardcontenttab">
					<tr>
				
					<td id="labelfont"><label> &nbsp Client ID.&nbsp</label>
				
		
	
	<?php
			$sqlclients = mysqli_query($conn, "select * from tblclients");
		
			echo "<select id='textboxsizeclient' name='clientselected'>";
			
			while($clientrow = mysqli_fetch_assoc($sqlclients)){
			
					if($clientrow['client_desc'] == $row['record_client']){

						echo "<option value='".$clientrow['client_desc']."' selected='selected'>".$clientrow['client_desc']."</option>";
					
					
					}else{
					
						echo "<option value='".$clientrow['client_desc']."'>".$clientrow['client_desc']."</option>";
						
					}
			
			
			}
			
		echo "</select>";
	
	
?>	
	
	
				
				</td>
		
					
					
					
					
					
					
					<td><label>Client Contact Name.&nbsp</label>
					
					<?php
					
					echo "<input type='text' id='textboxsize' name='clientname' value='".$row['record_client_contact_name']."'/>";
					
					?>
					</td>

					
					
					
					
					
					
					
					
					
					<td width="30%"><label>Job Type.&nbsp</label>
					
					
					
					<?php
								
					$sqljobs = mysqli_query($conn, "select * from tbljobtype");
					
					echo "<select id='textboxsize2' name='jobtype'>";
					while ($jobfill = mysqli_fetch_assoc($sqljobs)){
						
						if($jobfill['jobtype_name'] == $row['record_jobtype']){
							/**FILL IN THE OPTIONS!!!!**/
							
							echo "<option value='".$jobfill['jobtype_name']."' selected='selected'>".$jobfill['jobtype_name']."</option>";
							
							
							
						}else{
							echo "<option value='".$jobfill['jobtype_name']."'>".$jobfill['jobtype_name']."</option>";
							
						}
						
						
						
					}
					echo "</select>";
					
					
					
					?>

					</td>
					
					</tr>

					<tr>
					<td id="labelfont2"><label>Order Number.&nbsp  </label>
					
					<?php
					echo "<input type='text' id='textboxsize' name='orderno' value='".$row['record_order_number']."'/>";
					?>
					
					</td>
					<td><label> &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp Model.&nbsp </label>
					
					<!--
					<input type="text" id="textboxsize" name="model"/>
					-->
					
					<?php
					
						echo "<input type='text' id='textboxsize' name='model' value='".$row['record_model']."'/>";
					
					?>
					
					
					
					</td>
					
					<!-- this list needs to be updated based on the required table contents and autofilled-->
					
					<td width="40%"><label>&nbsp &nbsp &nbsp &nbsp Size.&nbsp</label>


					
					<?php
					$conn = mysqli_connect("localhost","root","", "dbroutecard");			
					$sqlsize = mysqli_query($conn, "select * from tblsize");
					
					echo "<select id='textboxsize2' name='selectedsize'>";
					while ($sizefill = mysqli_fetch_assoc($sqlsize)){
						
						if($sizefill['size_desc'] == $row['record_size']){
							/**FILL IN THE OPTIONS!!!!**/
							
							echo "<option value='".$sizefill['size_desc']."' selected='selected'>".$sizefill['size_desc']."</option>";
							
							
						}else{
							
							echo "<option value='".$sizefill['size_desc']."'>".$sizefill['size_desc']."</option>";
							
						}
						
						
						
					}
					echo "</select>";
								
					?>
		
					</td>
					
					</tr>
					
					<tr>
					<td id="labelfont"><label>&nbsp Meter In.&nbsp </label>
					
					<?php
					
					echo "<input type='text' id='textboxsize' name='meterin' value='".$row['record_meter_in']."'/>";
					
					?>
					
					
					</td>
					
					
					
					<td><label> &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp Meter Out.&nbsp </label>
					
					<?php
					
					echo "<input type='text' name='meterout' id='textboxsize' value='".$row['record_meter_out']."'/>";
					
					?>
					
					</td>
					
					<!-- this list needs to be updated based on the required table contents and autofilled-->
					
					<td id="labelfont"><label>  Man Hours.&nbsp  </label> 
					
						<?php
						
							echo "<input type='text' id='textboxsize4' name='manhours' value='".$row['record_man_hours']."'/>";
						
						?>
						
					</td>

					</tr>
					
					<tr>
					
					<td><label>&nbsp &nbsp &nbsp &nbsp Sanitised.&nbsp</label>
			
					<?php
						
					$conn = mysqli_connect("localhost","root","","dbroutecard");
					$sqldecision = mysqli_query($conn, "select * from tblyesorno");
					
					echo "<select id='textboxsize3' name='sanitised'>";
					
					while($sanirow = mysqli_fetch_assoc($sqldecision)){
						
							if($sanirow['yesorno_desc'] == $row['record_sanitised']){
								
								echo "<option value='".$sanirow['yesorno_desc']."' selected='selected'>".$sanirow['yesorno_desc']."</option>";
								
							}else{
								
								echo "<option value='".$sanirow['yesorno_desc']."'>".$sanirow['yesorno_desc']."</option>";
								
							}
						
					}
					
					
					echo "</select>";	
					?>
					
					</td>
					<td><label>Packaging.&nbsp</label>
					

					
					
					
					<?php
						
					
					$sqldecision = mysqli_query($conn, "select * from tblyesorno");
					
					echo "<select id='textboxsize3' name='packaging'>";
					
					while($packingrow = mysqli_fetch_assoc($sqldecision)){
						
							if($packingrow['yesorno_desc'] == $row['record_packaging']){
								
								echo "<option value='".$packingrow['yesorno_desc']."' selected='selected'>".$packingrow['yesorno_desc']."</option>";
								
							}else{
								
								echo "<option value='".$packingrow['yesorno_desc']."'>".$packingrow['yesorno_desc']."</option>";
								
							}
						
					}
					
					
					echo "</select>";	
					?>
					
					
					
					
					
					
					</td>
					
					<td width="25%"><label>Operative.&nbsp</label>
					
					
					<?php
					$conn = mysqli_connect("localhost","root","", "dbroutecard");			
					$sqltechs = mysqli_query($conn, "select * from tbltechnicians order by technicians_desc asc");
					
					echo "<select id='textboxsize2' name='engineer'>";
					
					while ($techrow = mysqli_fetch_assoc($sqltechs)){
						if($techrow['technicians_desc'] == $row['record_technician']){
							
							echo "<option value='".$techrow['technicians_desc']."' selected='selected'>".$techrow['technicians_desc']."</option>";
							
						}else{
							
							
							echo "<option value='".$techrow['technicians_desc']."'>".$techrow['technicians_desc']."</option>";
						
						
						}
					}
					
					echo "</select>";
					
					
					?>
					
					

					
					
					
					
					</td>
					</tr>
			
					
				</table>
								<table width = "100%" id = "rcdesc">
					<tr>
						<td><label id="labelfontdesc" >Comments</label>
						
						
						
						
						<?php
						
						echo "<textarea id='textarea1' name='comment'>".strip_tags(nl2br($row['record_comments']))."</textarea>";
						
						?>
						
						</td>
						<td><label id="labelfontdesc">Parts Used</label>
						
					
						
						
						<?php
						
						echo "<textarea id='textarea1' name='partsused'>".strip_tags(nl2br($row['record_parts_used']))."</textarea>";
						
						?>
						
						
						
						</td>
					</tr>
				</table>
			
			</div>
			<br/>
			<div id="serialaligner">
			<label id="labelfontdesc">Serial No. or Part No.</label>

			
			
					<?php
						$serialno = $row['record_serial_number'];
						$serialno = str_replace("	", "", $serialno);
						$serialno = str_replace(" ", "",$serialno);
						
						echo "<textarea id='textarea2' name='serialno'>".strip_tags($serialno)."</textarea>";
						
					?>
			
			
			
			
			
			</div>
			
		</div>
	</form>
</body>
</html>
