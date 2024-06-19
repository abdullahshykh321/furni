<?php
include "config.php";

if(isset($_FILES['image'])){
    $errors = array();
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
$file_ext = end(explode('.', $file_name));

$extensions = array("jpg","jpeg","png");

if(in_array($file_ext,$extensions) === false)
{
    $errors[] = "this extension file not allowed ";
}

if($file_size > 2097152)
{$errors[] = "file size mst be 2mb or lower";
}

if(empty($errors) == true){
    move_uploaded_file($file_tmp, "upload-images/" . $file_name);

}

else{print_r($errors);
die();
}
}
session_start();
$title = mysqli_real_escape_string($conn, $_POST['title']);
$price = mysqli_real_escape_string($conn, $_POST['price']);

$item_type = mysqli_real_escape_string($conn, $_POST['item-type']);



$sql = "INSERT INTO `products` (`id`,`title`, `price`, `img`, `items_type`) VALUES ('','{$title}', '{$price}', '{$file_name}','{$item_type}')";


if(mysqli_query($conn,$sql)){
    header("location: {$hostname}/admin/products.php");
} else {echo " cant run query";}

?>