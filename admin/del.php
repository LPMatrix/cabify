<?php 
include '../config.php';
if (@$_GET['del']==1) {
	$id=@$_GET['id'];
	$result = mysqli_query($con, "DELETE FROM customer WHERE transactionum='$id' ") or die('Error');

	header('location:index.php');
}
elseif (@$_GET['del']==2) {
	$id=@$_GET['id'];
	$result = mysqli_query($con, "DELETE FROM route WHERE id='$id' ") or die('Error');

	header('location:bus.php');
}
elseif (@$_GET['del']==3) {
	$id=@$_GET['id'];
	$result = mysqli_query($con, "DELETE FROM reserve WHERE id='$id' ") or die('Error');

	header('location:inventory.php');
}
 ?>