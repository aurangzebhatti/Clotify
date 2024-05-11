
<?php 
session_start();

// Include MongoDB library
require 'vendor/autoload.php';

// Connect to MongoDB
use MongoDB\Client as MongoClient;
$mongoClient = new MongoClient('mongodb+srv://sheheryarstar:Shery12345@cluster0.jiszkqv.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0');
$collection = $mongoClient->clothify->login; // Replace 'your_database_name' with your actual MongoDB database name

if(isset($_SESSION['logged_in'])){
  header('location: account.php');
}
if(isset($_POST['login_btn'])){

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  // Find user in MongoDB collection
  $user = $collection->findOne(['user_email' => $email, 'user_password' => $password]);

  if($user){
    $_SESSION['user_id'] = $user['_id'];
    $_SESSION['user_name'] = $user['user_name'];
    $_SESSION['user_email'] = $user['user_email'];
    $_SESSION['logged_in']= true;
    header('location: account.php?login_success=Logged in successfully');
  } else {
    header('location: login.php?error=Could not verify your account');
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- Navbar -->
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
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a href="account.php"><i class="fas fa-user"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Login Section -->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-both">Login</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="login-form" method="POST" action="login.php">
            <p style="color:red" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login">
            </div>
            <div class="form-group">
                <a id="register-url" href="register.php" class="btn">Don't have an account? Register</a>
            </div>
        </form>
    </div>
</section>

<!-- Footer -->
<footer class="mt-5 py-5">
    <!-- Footer content here -->
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
