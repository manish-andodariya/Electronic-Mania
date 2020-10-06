<?php

include 'config.php';

$pid = $_POST["id"];
$pcode = $_POST["product_code"];
$pname = $_POST["product_name"];
$pdesc = $_POST["product_desc"];
$pimg = $_POST["product_img_name"];
$pqty = $_POST["qty"];
$pprice = $_POST["price"];

$q= $mysqli->query("INSERT INTO products(id,product_code,product_name,product_desc,product_img_name,qty,price) VALUES('$pid', '$pcode', '$pname', '$pdesc', '$pimg', '$pqty', '$pprice')");

if($q){

   header("location:success.php");
}

else{

    echo "ERROR: Could not able to execute".mysqli_error();

}

?>