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
    <title>My Orders || Electronic Mania</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body style="background-image: url(images/order1.jpg); background-repeat:repeat; background-position:relative;">

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Electronic Mania</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li class="active"><a href="order-admin.php">Manage Orders</a></li>
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
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:10px;">
      <div class="large-12" style="background-image:inherit;">
        <h3>My COD Orders</h3>
        <hr>
       <hr>
        <?php
          $user = $_SESSION["username"];
          $result = $mysqli->query("SELECT * from orders");
          if($result) {
            while($obj = $result->fetch_object()) {
              echo '<div class="large-6">';
              echo '<p><h4>Order ID                     &emsp;&emsp;            :'.$obj->id.'</h4></p>';
              echo '<p><strong>Date of Purchase</strong> &nbsp;&nbsp;&nbsp;     : '.$obj->date.'</p>';
              echo '<p><strong>Product Code</strong>    &emsp;&emsp;            : '.$obj->product_code.'</p>';
              echo '<p><strong>Product Name</strong>     &emsp;&emsp;           : '.$obj->product_name.'</p>';
              echo '<p><strong>Price Per Unit</strong>   &emsp;&emsp;&nbsp;     : '.$obj->price.'</p>';
              echo '<p><strong>Units Bought</strong>    &emsp;&emsp; &nbsp;     : '.$obj->units.'</p>';
              echo '<p><strong>Total Cost</strong>&nbsp;      &emsp;&emsp;&emsp;&emsp;: '.$currency.$obj->total.'</p>';
              echo '<img src="images/products/'.$obj->product_name.'.jpg" style="Height:150px; width:150px;">';
              echo '<br>';
              echo '<br>';
              echo "</div>";
              echo "<a href=delete.php?id=".$obj->id."&p=".$obj->product_code." style='background:#0078A0; border-style:solid; border-width:2px; border-color:darkorange; color:white; font-size: 1em; padding: 5px;'>Cancel Order</a>";
               echo "<a href=delivery.php?id=".$obj->id."&p=".$obj->product_code." style='background:#0078A0; border-style:solid; border-width:2px; border-color:darkorange; color:white; font-size: 1em; padding: 5px; margin-left:10px;'>delivery Order</a>";
              echo '<p><hr></p>';
              }
          }
        ?>
      </div>
    </div>







    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
