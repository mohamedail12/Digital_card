<?php 
include('conatact.php');
$resalt=mysqli_query($conn,"SELECT * FROM `design`");
while($row=mysqli_fetch_array($resalt))
{
    echo $row['name'] ."===";
    echo $row['image'] ."===";
}
















?>