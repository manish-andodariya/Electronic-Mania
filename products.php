<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || Electronic Mania</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body style="height: 100%; width: 100%; background-image:url(images/product.jpg); background-repeat: repeat;">

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
          <li class='active'><a href="products.php">Products</a></li>
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
    <form action="#" method="post">
      <table style="background-image: url(images/product.jpg);">
        <tr>
     <td><input style="width:30%; margin-left:38%; margin-top: 10px; border: solid silver; border-radius:15px;" type="search" name="serh" placeholder="Search products"></td>
        </tr>
    </table>
    </form>
              <?php  function show_everything(){
             include 'config.php';
        echo '<div class="row" style="margin-top:10px;">';
      echo '<div class="small-12">';
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $mysqli->query('SELECT * FROM products');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-4 columns">';
              echo '<p><h4 style="color:white;">'.$obj->product_name.'</h4></p>';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
               echo "<a href='products/$obj->product_name.php' style='background:transparent; color:white;'>View in detail</a>";
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
        }
          ?>
     </div>
   </div>
        <?php
          function show_search($search){
             include 'config.php';
        echo '<div class="row" style="margin-top:10px;">';
      echo '<div class="small-12">';
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $mysqli->query("SELECT * FROM products where product_name like '%".$search."%'");

          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-4 columns">';
              echo '<p><h4 style="color:white;">'.$obj->product_name.'</h4></p>';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
        }
          ?>
       
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
<?php
if(isset($_POST['serh'])&& !empty($_POST['serh'])){
 if(preg_match("/[A-Z  | a-z]+/", $_POST['serh']))
  {
    $search = $_POST['serh'];
    show_search($search);
  }
}
  else{
    show_everything();
  }
  ?>