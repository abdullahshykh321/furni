



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>furni Free Bootstrap 5 Template for furniture and Interior Design Websites by Untree.co </title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="furni navigation bar">

			<div class="container">
			<a class="navbar-brand" href="index.php">Abdullah.furni<span></span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsfurni" aria-controls="navbarsfurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsfurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li><a class="nav-link" href="shop.php">Shop</a></li>
						<li><a class="nav-link" href="about.php">About us</a></li>
						<li><a class="nav-link" href="services.php">Services</a></li>
						<li><a class="nav-link" href="blog.php">Blog</a></li>
						<li><a class="nav-link" href="contact.php">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="signup.php"><img src="images/user.svg"></a></li>
						<li><a class="nav-link" href="cart.php?id=2332321"><img src="images/cart.svg"></a></li>
					</ul>
					<?php
session_start(); // Start the session

// Check if user is logged in
if(isset($_SESSION['username'])) {
    // User is logged in, show logout tab
    echo '<a href="logout.php" style="color: white;">LOGOUT</a>';
} else {
    // User is not logged in, show login tab
    echo '<a href="login.php" style="color: white;">LOGIN</a>';
}
?>

					
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->
		<?php

include "config.php";
if(isset($_POST['submit'])){
  
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = "SELECT username FROM users where username = '{$username}'";
    $result = mysqli_query($conn,$sql) or die("query failed");

    if(mysqli_num_rows($result) > 0){
        echo "<div id='command' style='background-color:#3b5d50; color:white;'>SIGNED UP</div>"; 
    } else {
        $sql1 = "INSERT INTO users (f_name, l_name, username, email, password) VALUES ('{$fname}', '{$lname}', '{$username}', '{$email}', '{$password}')";

        if(mysqli_query($conn, $sql1)){
            echo "<div id='command' style='background-color:#3b5d50; color:white;'>SIGNED UP SUCCESSFULLY</div>"; 
        }
    }
}
?>


		<!-- Start Hero Section -->
			
		<!-- End Hero Section -->

		<div class="untree_co-section">
		    <div class="container">
		     
		      <div class="row">
		        <div class="col-md-6 mb-5 mb-md-0">
		          <h2 class="h3 mb-3 text-black">Signup</h2>
		          <div class="p-3 p-lg-5 border bg-white">
		            <div class="form-group">
		            
					<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		            </div>
		            <div class="form-group row">
						
		              <div class="col-md-6">
		                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="fname" name="fname">
		              </div>
		              <div class="col-md-6">
		                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="lname" name="lname">
		              </div>

					  	
		              <div class="col-md-6">
		                <label for="c_fname" class="text-black">Username<span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="username" name="username">
		              </div>
		            </div>

					

		            
		            <div class="form-group row">
		              <div class="col-md-12">
                        <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
		              
		              </div>
		            </div>
 
		            


		            <div class="form-group row mb-5">
		              <div class="col-md-6">
		               
		                <input type="text" class="form-control" id="c_email" name="email">
					
		              </div>
		          
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="c_email_address" class="text-black">Password <span class="text-danger">*</span></label>
                        
                        </div>
                      </div>
   
                      
  
  
                      <div class="form-group row mb-5">
                        <div class="col-md-6">
                         
                          <input type="password" class="form-control" id="password" name="password">
                        </div>
		         
                        <div class="form-group" style="padding-top: 50px;">
                            <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location=''" name="submit">Signup</button>
                          </div>

						  <div class="col-md-12" style="padding-top: 50px;">
							<div class="border p-4 rounded" role="alert">
							  Returning customer? <a href="login.php">Click here</a> to login
							</div>
						  </div>
                    

                    

		          

		         

		        </div>
		      </div>
		
</form>
		    </div>
		  </div>

		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="images/sofa.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					
					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
