<?php

$conn = mysqli_connect("localhost","root","","dbroutecard");


$newjob = $_POST['newjob'];


$sqlcheck = mysqli_query($conn, "select * from tbljobtype where jobtype_name='$newjob' limit 1");


if(mysqli_num_rows($sqlcheck) > 0){

	echo "The data already exists, Please press back on your browser";

}else{
	
	
	$sqlinsert = mysqli_query($conn, "insert into tbljobtype values (null, '$newjob')");

echo "the data has been Added";
}
	

header("Location: addjob.php");

?>