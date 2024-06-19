<?php

  include "config.php";
  session_start();
  $user_id = $_SESSION["user_id"];
  $id = $_GET['id'];
  


  $sql = "DELETE FROM cart WHERE id = {$id} AND user_id = {$user_id};";
  

  if(mysqli_multi_query($conn, $sql)){
    header("Location: cart.php?id=12121");
  }else{
    echo "Query Failed";
  }
?>
