<?php
include('../config.php');
$type=$_POST['type'];
$route=$_POST['route'];
$price=$_POST['price'];
$seat=$_POST['seat'];
$time=$_POST['time'];

$update=mysqli_query($con, "INSERT INTO route () VALUES(null,'$route','$price','$seat','$type','$time')") or die(mysqli_error($con));
header("location: bus.php");
?>
