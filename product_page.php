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

 $listcurrency = mysqli_query($connection, "SELECT * FROM currency");


//ADDING PRODUCTS
if (isset($_POST['buy_now'])) {
	

  $bp_price = $_POST['bp_price'];

  $peso = ($bp_price * 52.56);
  $yen = ($bp_price * 119.21);
  $btc = ($bp_price * 0.000024);

  $pick_currency = $_POST['currency'];

  if ($pick_currency == 'peso') {
    $db_currency= '₱'. $peso;
  }
  elseif ($pick_currency == 'yen'){
    $db_currency= '¥'.$yen;
  }
  elseif ($pick_currency == 'btc'){
    $db_currency= '₿'.$btc;
  }
  


  // $product_number = $_POST['product_number'];

  // if ($product_number == $product_number) {
  //     $prodid = $product_number;
  // }

  $storedFile="images/".basename($_FILES['file']["name"]);
  move_uploaded_file($_FILES["file"]["tmp_name"],$storedFile);


  $bp_name = $_POST['bp_name'];
  $bp_description = $_POST['bp_description'];
  $bp_location = $_POST['bp_location'];
  $bp_price = $db_currency;


  //insert into DB
$query = "INSERT INTO bag (bp_name, bp_description, bp_location, bp_image, bp_total) 
      VALUES ('$bp_name', '$bp_description','$bp_location', '$storedFile', '$bp_price')";
          mysqli_query($connection, $query);	
          
header('location: bag.php');

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

<?php 


while ($row=mysqli_fetch_array($rec)) {
  
?>




        <!-- Product section-->
        <section class="py-5 mt-5">
        <form method="post" action="#" enctype="multipart/form-data">

            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  
            
                    <div class="col-md-6">
                      <input type="hidden" name="file" value="<?php echo $row['product_image']; ?>">
                      <img class="card-img-top mb-5 mb-md-0" src="seller/pages/<?php echo $row['product_image']; ?>" style="width: 70%; height: auto;">
                    </div>

                    <div class="col-md-6">
                       <input type="hidden" name="bp_name" value="<?php echo $row['product_name']; ?>">
                        <h1 class="display-5 fw-bolder"><?php echo $row['product_name']?></h1>

                        <input type="hidden" name="bp_location" value="<?php echo $row['product_location']; ?>">
                        <p class="text-start"><small><i class="fa fa-map-marker fa-xs" aria-hidden="true"></i> &nbsp;<?php echo $row['product_location']?></small></p>

                        <div class="fs-5 mb-0">
                        <input type="hidden" name="bp_price" value="<?php echo $row['product_price']; ?>">
                            <b><span>$<?php echo $row['product_price']?></span></b>
                        </div>

                        <hr>

                   <div class="form-group">
                    <div class="col-md-6">
                      <div class="col-md-12">
   
                      <select class="form-control" name="currency">
                          <option readonly>-- Select currency --</option>
                       <?php  
                                  while($row2 = mysqli_fetch_array($listcurrency))  
                                  { 
                                    $pick_currency = $row2['currency'];
                                    echo "<option value='$pick_currency'>$pick_currency</option>";

                                      }  
                                  ?>  
                        </select>
                      </div>
                    </div>
                  </div>

                  <input type="hidden" name="bp_description" value="<?php echo $row['product_description']; ?>">
                        <p class="lead"><h6><?php echo $row['product_description']?></h6></p>
                        
                        <div class="d-flex mt-3" style="float: right;">
                            <!-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" /> -->
                            <input type="submit" name="buy_now"  class="form-control btn btn-primary" value="Buy now" style="outline: none; border-radius: 3">
                            
                        </div>
                    </div>
                </div>
            </div>

        </form> 
        </section>




<!-- Modal 
 data-toggle="modal" data-target="#currency"
<div class="modal fade" id="currency" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose Currency</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="col-md-12">
                        <select class="form-control" name="currency">
                          <option readonly>-- Select Currency --</option>
                          <option value="php">PHP - (Philippine Peso)</option>
                          <option value="yen">JPY - (Japanese Yen)</option>
                          <option value="btc">BTC - (Bitcoin)</option>
                        </select>
                      </div>
                    </div>
                  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Buy Now</button>
      </div>
    </div>
  </div>
</div>
-->
        
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>