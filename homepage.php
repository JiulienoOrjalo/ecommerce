<?php 

$connection = mysqli_connect("localhost", "root", "", "ecommerce");

session_start();
if(!isset($_SESSION['username'])){
  echo "<script>alert('You must login before viewing this page.'); location.href='index.php';</script>";
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
          <a class="nav-link" href="#">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bag.php">Bag <i class="fa fa-shopping-bag" aria-hidden="true" ></i></a>
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

<header>

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/RCAhiGJsUUE/1920x1080')">
        <div class="carousel-caption">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1920x1080')">
        <div class="carousel-caption">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('https://source.unsplash.com/lHGeqh3XhRY/1920x1080')">
        <div class="carousel-caption">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</header>

<!-- Page Content -->
<section class="py-5">
  <div class="container">
    <h1 class="fw-light">Welcome to Shop</h1>
    <p class="lead">
Shoppers, business owners, and civic leaders come together to support small
businesses and help their communities thrive.</a>!</p>
  </div>

            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">

                      <?php  

                                  
                                
                                  $view_query=mysqli_query($connection,"SELECT * FROM products ORDER BY id DESC");
                                  while ($row1=mysqli_fetch_assoc($view_query)) { ?>



                <!-- Start Card box-->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image--> 

                            <img class="card-img-top" src="seller/pages/<?php echo $row1['product_image'];?>" height="280px" width="auto">
                            
                          
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder text-start"><?php echo $row1['product_name']?></h5>
                                    <p class="text-start"><small><i class="fa fa-map-marker fa-xs" aria-hidden="true"></i> &nbsp;<?php echo $row1['product_location']?></small></p>
                                   
                                    <!-- Product price-->
                                    <h4 class="fw-bolder text-center bg-success text-white">$<?php echo $row1['product_price']?></h4>
                                     
                                </div>
                            </div>
                            
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-success mt-auto" href="product_page.php?buy=<?php echo $row1['id']; ?>">View Product</a></div>
                            </div>
                        </div>
                    </div>
                    <?php }?>



                </div>
            </div>
</section>


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
            <span class="small">Salefullntern &copy; All Rights Reserved.</span>
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
