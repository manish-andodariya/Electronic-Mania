<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';
$qty1=0;
$unit=0;
$result1=$mysqli->query("select * from orders where id = '$_GET[id]'");
$result2 = $mysqli->query("select * from products where product_code= '$_GET[p]'");



if($result1)
	{while ($obj=$result1->fetch_object()) {
		$qty1="$obj->units";
		//echo $qty1;
	}
}
if($result2)
	{while ($obj=$result2->fetch_object()) {
		$unit="$obj->qty";
		//echo $unit;
	}}
	$R=$qty1+$unit;
$result3=$mysqli->query("update products set qty=$R where product_code='$_GET[p]'");
$result = $mysqli->query("delete FROM orders WHERE id = '$_GET[id]'");

if($result){

  header ("refresh:1; url=orders.php");
  
  }
  else 
  {
    header("location:index.php");
  }
?>
