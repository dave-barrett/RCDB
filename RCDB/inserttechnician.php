<?php

$conn = mysqli_connect("localhost","root","","dbroutecard");


$newtech = $_POST['newtechnician'];


$sqlcheck = mysqli_query($conn, "select * from tbltechnicians where technicians_desc ='$newjob' limit 1");


if(mysqli_num_rows($sqlcheck) > 0){

	echo "The data already exists, Please press back on your browser";

}else{
	
	
	$sqlinsert = mysqli_query($conn, "insert into tbltechnicians values (null, '$newtech')");

echo "the data has been Added";

}
	

header("Location: addtechnician.php");

?>