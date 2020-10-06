<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';
$result=$mysqli->query("update orders set delivery='1' where id='$_GET[id]'");

if($result){

  header ("refresh:1; url=order-admin.php");
  
  }
  else 
  {
    header("location:index.php");
  }
?>