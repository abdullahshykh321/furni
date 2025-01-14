



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="">
  <meta name="keywords" content="bootstrap, bootstrap4">

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/tiny-slider.css" rel="stylesheet">
  
  <link href="css/style.css" rel="stylesheet">
  <title>furni Free Bootstrap 5 Template for furniture and Interior Design Websites by Untree.co</title>
</head>
<body>
  <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="furni navigation bar">
    <div class="container">
      <a class="navbar-brand" href="index.php">Abdullah.furni<span></span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsfurni" aria-controls="navbarsfurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsfurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
          <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
          <li><a class="nav-link" href="shop.php">Shop</a></li>
          <li><a class="nav-link" href="about.php">About us</a></li>
          <li><a class="nav-link" href="services.php">Services</a></li>
          <li><a class="nav-link" href="blog.php">Blog</a></li>
          <li><a class="nav-link" href="contact.php">Contact us</a></li>
        </ul>
        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
          <li><a class="nav-link" href="signup.php"><img src="images/user.svg"></a></li>
          <li><a class="nav-link" href="cart.php?id=332"><img src="images/cart.svg"></a></li>
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

  <div class="hero">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5">
          <div class="intro-excerpt">
            <h1>Shop</h1>
          </div>
        </div>
        <div class="col-lg-7">
          <!-- Any content you want to add in this column -->
        </div>
      </div>
    </div>
  </div>

  <div class="untree_co-section product-section before-footer-section">
    <div class="container">
      <div class="row">
        <?php
        include "config.php";
        $sql = "SELECT * FROM products WHERE items_type = 'main-page'";
        $result = mysqli_query($conn, $sql) or die("query failed");
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) { 
        ?>
        <div class="col-12 col-md-4 col-lg-3 mb-5">
          <a class="product-item" href="cart.php?id=<?php echo $row['id'] ?>">
            <img src="admin/upload-images/<?php echo $row['img'] ?>" class="img-fluid product-thumbnail">
            <h3 class="product-title"><?php echo $row ['title'];?></h3>
            <strong class="product-price"><?php echo $row ['price'];?></strong>
            <span class="icon-cross">
              <img src="images/cross.svg" class="img-fluid">
            </span>
          </a>
        </div> 
        <?php
          }
        } else {
          echo "no record found"; 
        }
        ?>
      </div>
    </div>
  </div>

  <footer class="footer-section">
    <!-- Your footer content here -->
  </footer>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/custom.js"></script>
  <div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
						<div class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-ou<h3tline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">furni<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

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
