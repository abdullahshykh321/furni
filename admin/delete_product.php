<?php
  include "config.php";

  $id = $_GET['id'];
 
  $sql1 = "SELECT * FROM products WHERE id = {$id}";
  $result = mysqli_query($conn,$sql1) or die("Query Failed : Select");
  $row = mysqli_fetch_assoc($result);

  unlink("upload-images/".$row['img']);

  $sql = "DELETE FROM products WHERE id = {$id}";
 

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/products.php");
  }else{
    echo "Query Failed";
  }
?>
