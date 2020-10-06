<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';

$_SESSION["products_id"] = array();
$_SESSION["products_id"] = $_REQUEST['quantity'];


$result = $mysqli->query("SELECT * FROM products ORDER BY id asc");
$result2 = $mysqli->query("SELECT * FROM product_purchase ORDER BY id asc");
$i=0;
$x=1;

if($result && $result2) {
  while($obj = $result->fetch_object()) {
    if(empty($_SESSION["products_id"][$i])) {
      $i++;
      $x++;
    }
    else {
      $newqty = $obj->qty + $_SESSION["products_id"][$i];
      if($newqty < 0) $newqty = 0; //So, Qty will not be in negative.
      //$update = $mysqli->query("UPDATE products SET qty =".$newqty." WHERE id =".$x);
      $update=$mysqli->query("UPDATE product_purchase SET qty =".$newqty." WHERE id =".$x);
      $update1=$mysqli->query("UPDATE product_purchase SET pdate =current_timestamp WHERE id =".$x);
      $SELECT=$mysqli->query("SELECT * from product_purchase where id=".$x);
      $str=implode("",$_REQUEST['quantity'] );
      $q=(int)$str;
      if($SELECT){
        while ($o=$SELECT->fetch_object()) {
         $nm=$o->product_name;
        $p=$o->price;
        if($mysqli->query("INSERT INTO buy (product_name,qty,price,pdate) VALUES('$nm', '$q', '$p', current_timestamp)")){
  echo 'Data inserted';
  echo '<br/>';
}
        }
      }
      $update2=$mysqli->query("UPDATE products SET qty =".$newqty." WHERE id =".$x);
      if($update && $update1)

      $i++;
      $x++;
    }
  }
}


   header("location:success.php");



?>
