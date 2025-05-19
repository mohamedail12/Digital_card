<?php
include('contact.php');
$ID=$_GET['id'];
mysqli_query($conn,"DELETE FROM design WHERE id=$ID");
header('LOCATION:edit_design.php');
exit; 
?>