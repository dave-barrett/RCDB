<?php

$conn = mysqli_connect("localhost","root","","dbroutecard");


$newclient = $_POST['newclient'];


$sqlcheck = mysqli_query($conn, "select * from tblclients where client_desc ='$newclient' limit 1");


if(mysqli_num_rows($sqlcheck) > 0){

	echo "The data already exists, Please press back on your browser";

}else{
	
	
	$sqlinsert = mysqli_query($conn, "insert into tblclients values (null, '$newclient')");

echo "the data has been Added";
}
	

header("Location: addclient.php");

?>