<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet"> 
    <title>Contact || Electronic Mania</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body style="background-image: url(images/contact.jpg); ">

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
          <li class="active"><a href="contact.php">Contact</a></li>
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
    <p style="color:white;font-family: 'Roboto Mono', monospace; font-size: 40px; text-align: center;">Devlopers</p>
    <hr><hr>
    <p style="color:#ed671a; font-family:'Gugi',cursive;font-size: 25px;text-align: center;">Andodariya Manish</p>
    <p style="color:#ed671a; font-family:'Gugi',cursive;font-size: 25px;text-align: center;">Ghumaliya Amit</p>
    <p style="color:#ed671a; font-family:'Gugi',cursive;font-size: 25px;text-align: center;">Guna Niranjan</p>
    <p style="color:#ed671a; font-family:'Gugi',cursive;font-size: 25px;text-align: center;">Mori Jay</p>
   </body>
</html>
