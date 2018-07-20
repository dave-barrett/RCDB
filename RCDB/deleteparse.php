<?php

$conn = mysqli_connect("localhost","root","","dbroutecard");
$id = $_POST['selectedidno'];

/**ADD SOME VALIDATION FOR IF THE ID DOESNT EXIST **/

$sqldelete = mysqli_query($conn, "delete from tbljobtype where jobtype_id='$id'");

Header("Location: deletejob.php");

?>