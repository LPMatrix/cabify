<?php 
include '../config.php';
if (@$_GET['edit']==1) {
	//var_dump($_POST);exit();
	$roomid = $_POST['id'];
	$type=$_POST['type'];
	$route=$_POST['route'];
	$price=$_POST['price'];
	$seat=$_POST['seat'];
	$time=$_POST['time'];

	$result =mysqli_query($con, "UPDATE route SET type='$type', price='$price', route='$route', numseats='$seat', time='$time' WHERE id='$roomid'") or die(mysqli_error($con));

	header('location:bus.php');
}
elseif (@$_GET['edit']==2) {
	$id = $_POST['id'];
	$status = $_POST['status'];

	$r=mysqli_query($con,"UPDATE customer SET status='$status' WHERE id='$id'") or die(mysqli_error($con));
	header("location: index.php");
}

 ?>