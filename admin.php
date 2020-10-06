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
    <title>Admin || Electronic Mania</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body style="background-image: url(images/admin.jpg); height: 100%; width: 100%; background-repeat: repeat; background-size: cover;">

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
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
              if($_SESSION["type"]!="admin"){echo '<li><a href="orders.php">My Orders</a></li>';}
              if($_SESSION["type"]!="admin"){echo '<li><a href="cart.php">View Cart</a></li>';}
            echo '<li class="active"><a href="order-admin.php">Manage Orders</a></li>';
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="product_purchase.php">Buy Products</a></li>';
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
      <div class="large-12">
        <h3 style="color:white;">Hey Admin! <a href="admin-product.php" style="border:none;padding:2px; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; margin-left:6.2in;">Insert Products</a></h3></h3>
        <hr>
      <center>
        <br>
        <br>
        <form method="post" action="#">
          <table style="background:transparent; border: none;">
            <tr>
<td style="padding-left: 4in;"><p style=" font-color:black;">From Time : </p></td><td><input style="width: 50%; margin-top:20px;" type="date" name="from" /></td>
</tr>
<tr style="background:transparent; border: none;">
<td style="padding-left:4in;"><p style="font-color:black;">To Time   : </p></td><td><input style="width: 50%; margin-top: 20px;" type="date" name="to" /></td>
</tr>
<tr>
  <td colspan="2" style="text-align: center;"><input style="cursor:pointer; margin-left: 5in; border-radius: 25px; padding: 10px; margin-top: 10px; background-color:silver; flood-color: black; font-weight: bold;" type="submit" name="submit" value="Submit" /></td>
</tr>
</table>
</form>
<center style="color:wheat;">
<?php
$sum_buy=0;
$sum_sell=0;
$sell=0;
$buy=0;

    if(isset($_POST['submit']))
    {
     
    $from = $_POST['from'];
    $to = $_POST['to'];
     
    $sql = $mysqli->query("SELECT sum(price*qty) as sum_buy from buy where pdate>= '$from' and pdate <= '$to'");
    if($sql){
      while ($obj=$sql->fetch_object()) {
        $buy=$obj->sum_buy;
        echo "<p style='color:wheat; font-family:tesla; font-size:20px;'>Total Buy Value : ".$buy;
      }
    }
     $sql2= $mysqli->query("SELECT sum(price*units) as sum_sell from orders where date>= '$from' and date<= '$to'");
    if($sql2){
      while ($obj2=$sql2->fetch_object()) {
        $sell=$obj2->sum_sell;
        echo "<p style='color:wheat; font-family:tesla; font-size:20px;'>Total Sell Value  : ".$sell;
        echo "<br>";
        echo "<p style='color:wheat; font-family:tesla; font-size:20px;'>Total Profit : ".($sell-$buy);
        echo "</p>";
      }
    }
  }

?>


 </center>
    </div>
  </div>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
