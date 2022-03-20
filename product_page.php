<?php 

$connection = mysqli_connect("localhost", "root", "", "ecommerce");
session_start();
if(!isset($_SESSION['username'])){
  echo "<script>alert('You must login before viewing this page.'); location.href='index.php';</script>";
}

if (isset($_GET['buy'])) {
	$id = $_GET['buy'];
	$rec = mysqli_query($connection,"SELECT * FROM products WHERE id=$id");

 }




?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="assets3/style.css">
<link rel="stylesheet" href="assets3/css/style.css">
<link rel="shortcut icon" href="img/logo.png">
<title>Ecommerce - Home Page</title>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="img/benshop.png"  style="width: 160px; height: auto;"></a>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="homepage.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out <i class="fas fa-sign-out-alt"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php 


while ($row=mysqli_fetch_array($rec)) {
  
?>

        <!-- Product section-->
        <section class="py-5 mt-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                      <img class="card-img-top mb-5 mb-md-0" src="seller/pages/<?php echo $row['product_image']; ?>" style="width: 70%; height: auto;">
                    </div>

                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $row['product_name']?></h1>
                        <p class="text-start"><small><i class="fa fa-map-marker fa-xs" aria-hidden="true"></i> &nbsp;<?php echo $row['product_location']?></small></p>
                        <div class="fs-5 mb-5">
                            <span>$<?php echo $row['product_price']?></span>
                        </div>
                        <p class="lead"><?php echo $row['product_description']?></p>
                        <div class="d-flex">
                            <!-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" /> -->
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Buy Product
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php 
}
?>
<!-- Footer -->
<footer class="footer-95942" style="background-color:#f8f8f8;">
      
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="row">
              <div class="col-sm-6 col-md mb-4 mb-md-0">
                <h3>Discover</h3>
                <ul class="list-unstyled nav-links">
                  <li><a href="#">Website editors</a></li>
                  <li><a href="#">Online retail</a></li>
                  <li><a href="#">Get started</a></li>
                  <li><a href="#">Services</a></li>
                </ul>
              </div>
              <div class="col-sm-6 col-md mb-4 mb-md-0">
                <h3>About</h3>
                <ul class="list-unstyled nav-links">
                  <li><a href="#">Contact</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Team</a></li>
                </ul>
              </div>
              <div class="col-sm-6 col-md mb-4 mb-md-0">
                <h3>Services</h3>
                <ul class="list-unstyled nav-links">
                  <li><a href="#">Events</a></li>
                  <li><a href="#">News</a></li>
                  <li><a href="#">Awards</a></li>
                  
                </ul>
              </div>
              <div class="col-sm-6 col-md mb-4 mb-md-0">
                <h3>Buy</h3>
                <ul class="list-unstyled nav-links">
                  <li><a href="#">Where to Buy</a></li>
                  <li><a href="#">Shop Online</a></li>
                </ul>
              </div>
              <div class="col-sm-6 col-md mb-4 mb-md-0">
                <h3>Help</h3>
                <ul class="list-unstyled nav-links">
                  <li><a href="#">FAQ</a></li>
                  <li><a href="#">Support</a></li>
                  <li><a href="#">Knowledge Base</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row py-3">
          <div class="col-md-12 pb-3">
            <div class="border-top">
              
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-4">
            <ul class="list-unstyled social mb-0 pb-0 nav-left">

              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            </ul>
          </div>
          <div class="col-md-4 text-center">
            <span class="small">Colorlib &copy; All Rights Reserved.</span>
          </div>
          <div class="col-md-4 text-right">
            <ul class="list-unstyled social app mb-0 pb-0 nav-right text-end">
              <li><a href="#"><span class="icon-apple mr-3"></span> App Store</a></li>
              <li><a href="#"><span class="icon-play mr-3"></span> Google Store</a></li>
            </ul>
          </div>
        </div>
      </div>
      
    </div>
  </footer>
<!-- Footer End -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>