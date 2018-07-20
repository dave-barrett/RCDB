<?php

$conn = mysqli_connect("localhost","root","","dbroutecard");

$id = $_POST['selectedtech'];

/**ADD SOME VALIDATION FOR IF THE ID DOESNT EXIST **/

$sqldelete = mysqli_query($conn, "delete from tbltechnicians where technicians_id='$id'");


Header("Location: deletetechnician.php");

?>