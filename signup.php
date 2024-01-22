<?php

include 'config.php';

// error_reporting(0);

session_start();

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$emailErr = "Invalid format please re-enter valid email";
	}
	if($password==$cpassword)
	{
		$sql="SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if(!$result->num_rows > 0)
		{
			$sql = "INSERT INTO users (name, address, city, state, zip, phone, email, password, cpassword)
			   VALUES ('$name', '$address', '$city', '$state', '$zip', '$phone', '$email', '$password','$cpassword')";
			$result = mysqli_query($conn, $sql);
			if($result)
			{
				//$_SESSION['user']=$username;
				echo '<script language="javascript">';
				echo 'alert("Successfully Registered"); location.href="index.php"';
				echo '</script>';

				$name = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				// header("Location: index.php")
			}
			else
			{
				echo "<script>alert('Woops! Sorry Something Wrong Went.')</script>";
			}

		}
		else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	}
	else{
		echo "<script>alert('Password Not Matched')</script>";
	}
}

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <h1 class="well">SIGN UP</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form method="POST">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Name</label>
								<input type="text" placeholder="Enter First Name Here.." name="name" class="form-control" required>
							</div>
							
						</div>					
						<div class="form-group">
							<label>Address</label>
							<input type="text" placeholder="Enter Address Here.." name="address" class="form-control" required>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" placeholder="Enter City Name Here.." name="city" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>State</label>
								<input type="text" placeholder="Enter State Name Here.." name="state" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" placeholder="Enter Zip Code Here.." name="zip" class="form-control" required>
							</div>		
						</div>						
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" placeholder="Enter Phone Number Here.." name="phone" class="form-control" required>
					</div>		
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" placeholder="Enter Email Address Here.." name="email" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Password</label>
						<input type="password" placeholder="Enter Password Here.." name="password" class="form-control" required>
					</div>
					<div class="form-group">
						<label> Confirm Password</label>
						<input type="password" placeholder="Enter Confirm Password Here.." name="cpassword" class="form-control" required>
					</div>	
					<button name="submit" class="btn btn-lg btn-info" style="background-color:black">Sig Up</button><div class="d-flex justify-content-center links" >
						Already have an account? <a href="login.php" class="ml-2">Login</a>
					</div>					
					</div>
				</form> 
				</div>
	</div>
	</div>

	</style>

	
<!-- php code -->

    <!-- css code -->

<style>
 @import "font-awesome.min.css";
@import "font-awesome-ie7.min.css";
/* Space out content a bit */
body {
  padding-top: 20px;
  padding-bottom: 20px;
  background: url(img/Paint-Color-PNG-Free-Image.png);
}

/* Everything but the jumbotron gets side spacing for mobile first views */
.header,
.marketing,
.footer {
  padding-right: 15px;
  padding-left: 15px;
}

/* Custom page header */
.header {
  border-bottom: 1px solid #e5e5e5;
}
/* Make the masthead heading the same height as the navigation */
.header h3 {
  padding-bottom: 19px;
  margin-top: 0;
  margin-bottom: 0;
  line-height: 40px;
}

/* Custom page footer */
.footer {
  padding-top: 19px;
  color: black;
  border-top: 1px solid black;
}

/* Customize container */
@media (min-width: 768px) {
  .container {
    max-width: 730px;
  }
}
.container-narrow > hr {
  margin: 30px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
  text-align: center;
  border-bottom: 1px solid black;
}
.jumbotron .btn {
  padding: 14px 24px;
  font-size: 21px;
}

/* Supporting marketing content */
.marketing {
  margin: 40px 0;
}
.marketing p + h4 {
  margin-top: 28px;
}

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 768px) {
  /* Remove the padding we set earlier */
  .header,
  .marketing,
  .footer {
    padding-right: 0;
    padding-left: 0;
  }
  /* Space out the masthead */
  .header {
    margin-bottom: 30px;
  }
  /* Remove the bottom border on the jumbotron for visual effect */
  .jumbotron {
    border-bottom: 0;
  }
}
