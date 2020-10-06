<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us || Electronic Mania</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body background="images/all.jpg" style="height: 100%; width: 100%;">

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
          <li class="active"><a href="about.php">About</a></li>
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
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:30px;">
      <div class="small-12" style="color: white">
        <p style="text-align: justify;margin-left:-0.80in;">This is very important site for the online product purchaser because in this site, we are provide all the important and extra information about the product. We are developed this site in HTML, CSS, JAVASCRIPT & PHP. 
  In this site, we are sale the all type of digital electronic product. All the product are has rating by buyers. They are also give the comment and suggetion for the better implitation. In this site we are provide both type of payment system means cash on delivery & online payment.
  In this site we are provide all the information as like performance, hardware, specification, provide service etc. In this site we are provide comparision with other as well as product because the buyers have confution about the product and by this service they clear their confution and take the better decision for buying the best product in their budget.
  In this site we are provide other service as like if the product has the specific video as like advertisement or company give also other demo video or other user created video. By this service the buyer has take decision about the product and give the reviews about the product.
  In this site we are also provide the service center with nearest city or area of city or big village. In this site we provides speed and best service for our customer. We are gives them warrenty for 1 months and give the fastest delivery of product with best and understandable demo of that product and ready to give the answer or solution of their problems.

        <a href="index.php" target="_blank">EM Speed & Power</a>.</p>

        <footer>
           <p style="text-align:center; font-size:0.8em; margin-top: 40%;">EM speed & power.</p>
        </footer>

      </div>
    </div>







    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
