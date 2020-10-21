<?php
	
	//Connect to mysql server
	require "config.php";
	if (isset($_POST['login'])) {
		
	$phone = $_POST['phone'];
	
	//Create query
	$qry="SELECT * FROM customer WHERE contact='$phone'";
	$result=mysqli_query($con,$qry);

	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {

			header("location: list.php?con=$phone");

		}else {
			//Login failed
			echo "<script>alert('Email does not exists')</script>";
			
		}
	}else {
		echo "<script>alert('Contact number does not exists')</script>";
	}
	}

?>

<?php include 'header.php';?>
<div class="container">

       <div class="col-sm-4 col-sm-offset-4 spacer">
<h3>Reschedule Ticket</h3>
    <form role="form" class="wowload fadeInRight" method="post">
        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Enter Phone Number" name="phone">
        </div>       

        <button class="btn btn-default" type="submit" name="login">View Tickets</button>
    </form>    
</div>




</div>
<?php include 'footer.php';?>