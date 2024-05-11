<?php

/* 
not paid
delivered
shipped
*/ 

include('server/connection.php');

if(isset($_POST['order_details_btn'])  && isset( $_POST["order_id"])) {

    $order_id =$_POST['order_id'];
    $order_status = $_POST['order_status'];
    $stmt = $conn->prepare("SELECT * from order_items where order_id=?");
    $stmt->bind_param('i',$order_id);
    $stmt->execute();
    $order_details = $stmt->get_result();

}else{
    header( "location: account.php" );
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

   <!--Bootsrtap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!---fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <!--CSS file-->
    <link rel ="stylesheet" href="assets/css/style.css"/>


</head>
<body>
    <!---NAVBAR--->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
    <div class="container">
      <img class="logo" src="assets/imgs/logo.jpg">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li> -->

          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact Us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart</a>
          </li>


          <li class="nav-item">
            <!-- <a href="cart.php"><i class="fas fa-shopping-cart"></i></a> -->
            <a href="account.php"><i class="fas fa-user"></i></a>
          </li>       

        </ul>
        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </nav>




  <!-- Orders Details -->
<section  id="orders" class="orders container my-2 py-5">
    <div class="container mt-5">
        <h2 class="font-weight-bold text-center">Order Details</h2>
        <hr class="mx-auto">

    </div>



    <table class="mt-5 pt-5 mx-auto">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>

        <?php while($row=$order_details->fetch_assoc()){?>
        
         <tr>
            <td>
                <div >
                     <img src="assets/imgs/<?php echo $row['product_image'];?>"/> 
                    <div>
                        <p class="mt-3"><?php echo $row['product_name'];?></p>
                    </div>
                </div> 
                
            </td>
            <td>
              <span>$<?php echo $row['product_price'];?></p></span>
            </td>
            <td>
              <span><?php echo $row['product_quantity'];?></p></span>
            </td>
            
           
        </tr> 

     <?php }?>
    </table> 




<?php if($order_status == "not paid"){?>
    <form style="float: right">
        <input type="submit" class="btn btn-primary" value="Pay Now"/>
    </form>


<?php } ?>




  </section>




   <!-- Footer -->
   <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo" src="assets/imgs/logo.jpg">
            <p class="pt-3">We provide the best products for the more affordable prices</p>
          </div>
          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Featured</h5>
            <ul class="text-uppercase">
              <li><a href="#">men</a></li>
              <li><a href="#">women</a></li>
              <li><a href="#">boys</a></li>
              <li><a href="#">girls</a></li>
              <li><a href="#">new arrivals</a></li>
              <li><a href="#">clothes</a></li>
            </ul>
          </div>
          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Contact Us</h5>
            <div>
              <h6 class="text-uppercase">Address</h6>
              <p>Hostel 10 FCSE, GIKI</p>
            </div>
            <div>
              <h6 class="text-uppercase">Phone Number</h6>
              <p>0300-031909</p>
            </div>
            <div>
              <h6 class="text-uppercase">Email</h6>
              <p>muhammadaurangzaibbhatti@gmail.com</p>
            </div>
          </div>
          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Instagram</h5>
            <div class="row">
              <img src="assets/imgs/footer1.jpg" class="img-fluid w-25 h-100 m-2">
              <img src="assets/imgs/footer2.jpg" class="img-fluid w-25 h-100 m-2">
              <img src="assets/imgs/footer3.jpg" class="img-fluid w-25 h-100 m-2">
              <img src="assets/imgs/footer4.jpg" class="img-fluid w-25 h-100 m-2">
              <img src="assets/imgs/footer5.jpg" class="img-fluid w-25 h-100 m-2">
            </div>
          </div>
  
        </div>
  
        <div class="copyright mt-5">
          <div class="row container mx-auto">
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <img src="assets/imgs/payment.jpg">
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
              <p>eCommerce @ 2024 All Right Reserved   </p>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
          </div>
        </div>
  
  
      </footer>
  
  
  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  </html>