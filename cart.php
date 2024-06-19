<?php
$id = $_GET['id'];
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($_SESSION['user_id'])){
  header("Location: login.php");
}
if(isset($id) && isset($user_id)) {
    include "config.php";

    // Check if item already exists in the cart
    $check_sql = "SELECT * FROM cart WHERE id = $id AND user_id = $user_id";
    $check_result = mysqli_query($conn, $check_sql);
    if(mysqli_num_rows($check_result) == 0) {
        // Fetch data from the products table
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $title = $row['title'];
                $img = $row['img'];
                $price = $row['price'];
                
                $id = $row['id'];
                
                
             
                // Insert item into the cart
                $sql_insert = "INSERT INTO cart (`title`, `img`, `price`, `id`, `user_id`) VALUES ('$title', '$img', '$price','$id',$user_id)";
                $conn->query($sql_insert);
            }
        } else {    
           
        }
    } else {
        // Redirect or handle case where item already exists in cart
        
    }
}




?>
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
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
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
		

		
	</div>
</div>
	
</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Cart</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      <tbody>

					  <?php
        include "config.php";
        $sql = "SELECT * FROM cart where user_id = $user_id";
		

        $result = mysqli_query($conn, $sql) or die("query failed");
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) { 
        ?>

                
                        <tr>
                          <td class="product-thumbnail">
                            <img src="admin/upload-images/<?php echo $row['img'] ?>" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black"><?php echo $row ['title'] ?></h2>
                          </td>
                          <td><?php echo $row ['price'] ?></td>
                          <td>
                          <td>
    <div class="input-group mb-3" style="width:130px">
        <button class="input-group-text decrement-btn">-</button>
        <input type="number" class="form-control text-center input-qty bg-white" value="<?php echo $row['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">
        <button class="input-group-text increment-btn">+</button>
    </div>
</td>
                          <td><?php echo $row ['price'] ?></td>
                          <td><a href="delete-cart.php?id=<?php echo $row['id'] ?>" class="btn btn-black btn-sm">X</a></td>
                        </tr>
						<?php
          }
        } else {
          echo "no record found"; 
        }
        ?>
                   
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                 
                    <div class="col-md-6">
                      <button class="btn btn-outline-black btn-sm btn-block"  onclick="window.location='shop.php'" >Continue Shopping</button>
                    </div>
                  </div>
                  <div class="row">
                    
                    <div class="col-md-8 mb-3 mb-md-0">
                     
                    </div>
                    <div class="col-md-4">
                    
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <?php 
                      $sqlsum = "SELECT SUM(CAST(SUBSTRING(price, 4) AS UNSIGNED)) AS total_price FROM cart WHERE user_id = $user_id";
                      $resultsum = mysqli_query($conn, $sqlsum) or die("query failed");
                      if (mysqli_num_rows($resultsum) > 0) {
                        while ($rowsum = mysqli_fetch_assoc($resultsum)) { 
                      ?>
                  
                           
                   
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">RS:<?php echo $rowsum ['total_price']?>  </strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">RS:<?php echo $rowsum ['total_price']?> </strong>
                        </div>
                      </div>
                      <?php
          }
        } else {
          echo "no record found"; 
        }
        ?>
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Proceed To Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

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


		
	</body>

</html>
