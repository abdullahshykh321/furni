<?php
include "config.php";
 $firstname =  mysqli_real_escape_string($conn,$_POST['fname']);
 $lastname =  mysqli_real_escape_string($conn,$_POST['lname']);
 $address =  mysqli_real_escape_string($conn,$_POST['address']);
 $emailaddress =  mysqli_real_escape_string($conn,$_POST['emailaddress']);
 $phone = mysqli_real_escape_string($conn,$_POST['phone']);
session_start();
$user_id = $_SESSION['user_id'];

$id = $_SESSION['user_id'];
if(isset($id)) {
    include "config.php";

    $check_sql = "SELECT * FROM cart WHERE id = $id";
    $check_result = mysqli_query($conn, $check_sql);
    if(mysqli_num_rows($check_result) == 0) {
        // Fetch data from the products table
        $sql = "SELECT * FROM cart WHERE user_id = $user_id";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $rows = array(); // Initialize an empty array to store the results
            while($row = $result->fetch_assoc()) {
                $rows[] = $row['title']; // Store the 'title' column value in the $rows array
               
            }
            $varrr = implode(", ", $rows);
             // Echo the array values with comma separation
           
            $sqlsum = "SELECT SUM(CAST(SUBSTRING(price, 4) AS UNSIGNED)) AS total_price FROM cart WHERE user_id = $user_id";
            $resultsum = mysqli_query($conn, $sqlsum) or die("query failed");
            if (mysqli_num_rows($resultsum) > 0) {
              while ($rowsum = mysqli_fetch_assoc($resultsum)) { 
         $total_payment = $rowsum ['total_price'];
              }

               $sqlinsert = "INSERT INTO `orders` (`products`, `order_id`, `payment`) VALUES ('$varrr', '', '$total_payment')";
             
             mysqli_query($conn,$sqlinsert);
        

        } else {    
            echo "No data found";
        }
    } else {
        
    }}
        


    $sqluserinsert = "SELECT * FROM orders";
    $resultinsert = mysqli_query($conn, $sqluserinsert) or die("query failed");
    if (mysqli_num_rows($resultinsert) > 0) {
      while ($rowinsrt = mysqli_fetch_assoc($resultinsert)) { 
     $order_id = $rowinsrt ['order_id'];
    
      }

       $sqluserinsert = "INSERT INTO `order_users` (`order_id`, `f_name`, `l_name`, `address`, `email`, `phone_number`) VALUES ('$order_id', '$firstname', '$lastname', '$address', '$emailaddress', '$phone');";
     
     mysqli_query($conn,$sqluserinsert);
     header("Location: thankyou.php");
     
  
} else {    
    echo "No data found";
}


}





?>