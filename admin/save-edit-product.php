<?php
include "config.php";

// Check if new image is empty
if(empty($_FILES['new-image']['name'])){
    // Agar koi nayi image upload nahi hui, toh old image ka URL use karein
    $image_name = $_POST['old_image'];
}else{
    $errors = array();

    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
    $file_ext = strtolower(end(explode('.',$file_name)));

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false){
        $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
        $errors[] = "File size must be 2mb or lower.";
    }

    $new_name = time(). "-".basename($file_name);
    $target = "upload-images/".$new_name;
    $image_name = $new_name;
    if(empty($errors) == true){
        move_uploaded_file($file_tmp,$target);
    }else{
        print_r($errors);
        die();
    }
}

$sql = "UPDATE `products` SET `title` = '{$_POST["title"]}', `price` = '{$_POST["price"]}', 
`img` = '{$image_name}' WHERE `products`.`id` = {$_POST["id"]}";

$result = mysqli_multi_query($conn,$sql);

if($result){
    header("location: {$hostname}/admin/products.php");
}else{
    echo "Query Failed";
}
?>
