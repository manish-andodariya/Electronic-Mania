<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Insert || Electronic Mania</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body  style="background-image: url(images/admin-ins.jpg); background-size: cover;">

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php"> Electronic Mania</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
              if($_SESSION["type"]!="admin"){echo '<li><a href="orders.php">My Orders</a></li>';}
              if($_SESSION["type"]!="admin"){echo '<li><a href="cart.php">View Cart</a></li>';}
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li class="active"><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>



      <h2 style="color: red; text-align: center; margin-top: 0.4in; ">Add Products.</h2>

    <form method="POST" action="product-insert.php" style="margin-top:50px; margin-left: 0.5in">
      <div class="row">
        <div class="small-8">

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" style="font-size: 20px; font-weight: bold;">id</label>
            </div>
            <div class="small-8 columns">
              <input type="number" id="right-label" placeholder="1" name="id">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" style="font-size: 20px; font-weight: bold;">Product_code</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="electronic1" name="product_code">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" style="font-size: 20px; font-weight: bold;">Product_name</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="MI TV" name="product_name">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" style="font-size: 20px; font-weight: bold;">Description</label>
            </div>
            <div class="small-8 columns">
              <input type="text" rows="5" id="right-label" placeholder="description about product" name="product_desc">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" style="font-size: 20px; font-weight: bold;">Product_image</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" name="product_img_name" style="margin-top: 10px; color:gold; font-size: 20px;">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" style="font-size: 20px; font-weight: bold;">Quntity</label>
            </div>
            <div class="small-8 columns">
              <input type="number" id="right-label" placeholder="00" name="qty">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" style="font-size: 20px; font-weight: bold;">Price</label>
            </div>
            <div class="small-8 columns">
              <input type="number" id="right-label" name="price">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Add" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>

