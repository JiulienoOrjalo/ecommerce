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
<<style>
.modal-dialog,
.modal-content {
    /* 80% of window height */
    height: 62%;
}

.modal-body {
    /* 100% = dialog height, 120px = header + footer */
    max-height: calc(100% - 120px);
    overflow-y: scroll;
}

.project-tab {
    padding: 10%;
    margin-top: -8%;
}
.project-tab #tabs{
    background: #007b5e;
    color: #eee;
}
.project-tab #tabs h6.section-title{
    color: #eee;
}
.project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #0062cc;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid !important;
    font-size: 16px;
    font-weight: bold;
}
.project-tab .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #0062cc;
    font-size: 16px;
    font-weight: 600;
}
.project-tab .nav-link:hover {
    border: none;
}
.project-tab thead{
    background: #f3f3f3;
    color: #333;
}
.project-tab a{
    text-decoration: none;
    color: #333;
    font-weight: 600;
}
</style>
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
        <a class="nav-link" href="#">Bag <i class="fa fa-shopping-bag" aria-hidden="true" ></i></a>
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



<section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <h1 style="text-align: center; margin-top: 30px;">ORDERS</h1>
                                
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Location</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    $newquery=mysqli_query($connection,"SELECT * FROM bag");
                                        //$mysqli = "SELECT * FROM bag";
                                        //$res = mysqli_query($newquery);
                                        while($row=mysqli_fetch_assoc($newquery))
                                        {
                                    ?>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['bp_name']; ?></td>
                                            <td><?php echo $row['bp_description']; ?></td>
                                            <td><?php echo $row['bp_location']; ?></td>
                                            <td><?php echo $row['bp_total12']; ?></td>
                                            <td></td>
                                        </tr>

                                        <?php
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
</form>

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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>