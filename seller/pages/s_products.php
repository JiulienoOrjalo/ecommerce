<?php

include ('s_server.php');
?> 
                
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
         <link rel="shortcut icon" href="assets/ico/icon.png">

        <title>Pick A Plants - Accounts</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets/css/style1.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

<style type="text/css">
        #dic{
            width: 50px;
            height: auto;


        }
</style>


    </head>
    <body style="outline: none;">

        <div id="wrapper">

              <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
                <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Benshop</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"style="padding: 10px">
                            <i class="fa fa-user fa-fw"></i> Admin <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="user_profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                            <img src="../../img/benshop.png">
                            </li>

                            <li>
                                <a href="index.php" style="color: #64ca87;"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a href="s_products.php" class="active"  style="color: #64ca87;">
                                    <i class="fa fa-leaf" aria-hidden="true"></i> Products</a>
                            </li>

                            <li>
                                <a href="s_order.php" style="color: #64ca87;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Orders   <small>
                                    <span class="badge badge-primary" style="background-color: #64ca87;">5
                    
                                </span></small> </a>
                            </li>

                           
             </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">

                       
                    <div class="row">

                        <div class="col-lg-12">
                         
                        <nav aria-label="breadcrumb" style="margin-top: 40px;">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><a href="s_products.php">Home</a></li>
                            </ol>
                        </nav>     
                            <h1 class="page-header">List of Products
                                <a href="s_add_products.php"><button type="submit" name="btndictionary" class="btn btn-success btn-xs" style="outline: none;">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> New</button></a></h1>

                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Products
                                </div>
                                <!-- /.panel-heading -->
                                <form action="s_server.php" method="post">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        
                                <table id="employee_data" class="table table-striped table-bordered">  
                                          <thead>  
                                               <tr>  
                                                      
                                                    <td><small><strong>Name</strong></small></td>  
                                                    <td style="width: 100px;"> <small><strong>Location</strong></small></td>  
                                                    <td style="width: 30px;"><strong><small>Price</strong></small></td> 
                                                    <td style="width: 30px;"><strong><small>Image</strong></small></td>  
                                                    <td style="width: 100px;"><small><strong>Discounted Price</strong></small></td> 
                                                    <td style="width: 30px;"><small><strong>Stocks</strong></small></td> 
                                                    <td style="width: 5px;"><small><strong>Action</strong></small></td>  
                                                    
                                                      
                                                
                                                     
                                               </tr>  
                                          </thead>  

                                          
                                          <?php  
                                  $view_query=mysqli_query($connection,"SELECT * FROM products ORDER BY id DESC");
                                  while ($row1=mysqli_fetch_assoc($view_query)) {
                                        
                                        echo'  

                                            <tr>
                                            
                                            
                                            <td>'.$row1["product_name"].'</td>  
                                            <td>'.$row1["product_location"].'</td>  
                                            <td>'.'&#8369;'.$row1["product_price"].'</td>
                                            
                                           
                                            <form action="sa_edit_products.php" method="post">  
                                            <td><center> <a onclick="javascript:confirmationEdit($(this));return false;" 
                                            href=s_edit_products.php?editprod='.$row1["id"].'>
                                           
                                             </form> 
                                            </tr> 
                                        

                                            '; 
                                         ?>



    

                                         <!-- START MODAL-->
    <div class="modal fade" role="dialog" id="<?php echo $row1['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--MODAL HEADER-->
                <div class="modal-header">
                    <h3 class="modal-title">Product Information</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
     
                <div class="modal-body">

<form  method="POST" action="#">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-m-12">
                    <div class="col-md-8 responsive">
                          <img width="250" class="img-portfolio" height="300" alt="" src="<?php echo $row1['photo']?>">
                    </div>
                </div>
                
            </div>
        </div>
    <div class="col-md-6">
              <input type="hidden" name="PROPRICE" value="">
              <input type="hidden" id="PROQTY" name="PROQTY" value="">

              <input type="hidden" name="PROID" value="<?php echo $row1['id']?>">

              <h3>Category</h3><h4><?php echo $row1['category']?></h4><hr>
                <p></p>
             <div class="d-inline-flex p-3"><strong>Product name:</strong>
              <span>  &nbsp;  &nbsp;<?php echo $row1['prodcut']; ?> </span>
            </div>

            <div class="d-inline-flex p-3"><strong>Description:</strong>
              <span>  &nbsp;  &nbsp;<?php echo $row1['description']; ?> </span>
            </div>

             <div class="d-inline-flex p-3"><strong>Location:</strong>
              <span>  &nbsp;  &nbsp;<?php echo $row1['location']; ?> </span>
            </div>

             <div class="d-inline-flex p-3"><strong>Discount:</strong>
              <span>  &nbsp;  &nbsp;<?php echo $row1['sale']; ?>%</span>
            </div>

             <div class="d-inline-flex p-3"><strong>Discounted Price:</strong>
              <span>  &nbsp;  &nbsp; &#8369; <?php echo $row1['new_price'];?> </span>
            </div>

            <div class="d-inline-flex p-3"><strong>Stocks:</strong>
              <span>  &nbsp;  &nbsp;<?php echo $row1['stocks'];?> </span>
            </div>

           
            <hr>
    </div>
</div>

</form>
                </div>
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                <!--MODAL FOOTER-->
            </div>
        </div>
    </div>



    <?php  }    ?>
                                    
                                     </table> 
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-default" name="deleteconcern" style="outline: none;"><i class="fa fa-trash fw-fa"></i> Delete Selected</button>
                                      </div>
                                      </form>
                           </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /#wrapper -->

        

<!-- MODAL PART -->
















        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('#superadmin').DataTable();  
 });  
 </script>

 <script type="text/javascript">
function confirmationDelete(anchor){
     var conf = confirm("Are you sure you want to delete the record?");
if (conf)
    window.location=anchor.attr("href");
}
</script>

<script type="text/javascript">
    function confirmationEdit(anchor){
        var conf = confirm("Are you sure you want to Edit this Record");
    if (conf)
        window.location=anchor.attr("href");
    }
</script>






</body>
</html>
