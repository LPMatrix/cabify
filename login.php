<?php
	
	//Connect to mysql server
	require "config.php";
	if (isset($_POST['login'])) {
		
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//Create query
	$qry="SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result=mysqli_query($con,$qry);

	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_start();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['user'] = $member['username'];
			//session_write_close();
			//if ($level="admin"){
			header("location: admin/index.php");

		}else {
			//Login failed
			echo "<script>alert('Login Failed')</script>";
			exit();
		}
	}else {
		echo "<script>alert('Login Failed')</script>";
	}
	}

?>

<?php include 'header.php';?>
<div class="container">

       <div class="col-sm-4 col-sm-offset-4 spacer">
<h3>Login</h3>
    <form role="form" class="wowload fadeInRight" method="post">
        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Username" name="username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control"  placeholder="Password" name="password">
        </div>        

        <button class="btn btn-default" type="submit" name="login">Login</button>
    </form>    
</div>




</div>
<?php include 'footer.php';?>